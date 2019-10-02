<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Vehicle;
use Illuminate\Http\Request;


class VehicleController extends Controller
{
    protected $_categories  = [
        'car',
        'scooter',
    ];

    public function search(Request $request)
    {
        $iDays                                  = 0;
        $vehicles                               = [];

        if (!empty($request->all()) && array_key_exists("cities", $request->all()) ) {
            $sPlace								= strip_tags($request->cities);
            $sCategory                          = strip_tags($request->category);
            $sCat                               = in_array(strtolower($sCategory), $this->_categories) ;

            $iMaxPrice                          = (is_numeric($request->price_end) ? $request->price_end : null) ;

            if (!$sCat){
                $vehicles 						= Vehicle::where('current_place', htmlentities($sPlace))->whereBetween('day_price', [0, $iMaxPrice])->get();
            }

            if ($sCat) {
                $vehicles 						= Vehicle::where('current_place', htmlentities($sPlace))->where('category', $sCategory)->whereBetween('day_price', [0, $iMaxPrice])->get();
            }

            if (!$vehicles->isEmpty()){
                if (is_null($request->daterange)) {
                    return response('error');
                }

                $iStart                         = substr($request->daterange, 0,10); // or your date as well
                $iEnd                           = substr($request->daterange, 13); // or your date as well

                if (!$this->_validateDate($iStart) || !$this->_validateDate($iEnd)) {
                    return response('error');
                }

                $iNoAbsoluteDay                 = round((strtotime($iStart) - strtotime($iEnd)) / (60 * 60 * 24));
                $iDays                          = abs($iNoAbsoluteDay);
            }
        }

        return view('vehicle/show', compact('vehicles' , 'iDays' ));
    }


    protected function _validateDate($date, $format = 'm/d/Y')
    {
        $d = \DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }
}
