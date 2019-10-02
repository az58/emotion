<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    protected $_categories  = [
        'car',
        'scooter',
    ];

	public function getVehicle(Request $request)
	{
		if (!empty($request->all()) && array_key_exists("cities", $request->all()) ) {
            $iDays                              = 0;

			$sPlace								= strip_tags($request->cities);
			$sCategory                          = strip_tags($request->category);
            $sCat                               = in_array($sCategory, $this->_categories) ;

            $iMinPrice                          = (is_numeric($request->minPrice) ? $request->minPrice : null) ;
            $iMaxPrice                          = (is_numeric($request->maxPrice) ? $request->maxPrice : null) ;

			if (!$sCat) {
                $vehicles 						= Vehicle::where('current_place', htmlentities($sPlace))->whereBetween('day_price', [$iMinPrice, $iMaxPrice])->get();
            }

			if ($sCat) {
                $vehicles 						= Vehicle::where('current_place', htmlentities($sPlace))->where('category', $sCategory)->whereBetween('day_price', [$iMinPrice, $iMaxPrice])->get();
            }

			if (!$vehicles->isEmpty()){

                if (is_null($request->range)) {
                    return response('error');
                }

                $iStart                         = substr($request->range, 0,10); // or your date as well
                $iEnd                           = substr($request->range, 13); // or your date as well

                if (!$this->_validateDate($iStart) || !$this->_validateDate($iEnd)) {
                  return response('error');
                }

                $iNoAbsoluteDay                 = round((strtotime($iStart) - strtotime($iEnd)) / (60 * 60 * 24));
                $iDays                          = abs($iNoAbsoluteDay);


                return view('vehicle/modalVehicles',compact('vehicles' , 'iDays' ));
			}
		}

		return response(['vehicle' => []], 200);
	}


    protected function _validateDate($date, $format = 'm/d/Y')
    {
        $d = \DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }
}
