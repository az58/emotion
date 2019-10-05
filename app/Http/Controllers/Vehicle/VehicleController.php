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

    protected $_needles     = [
        'cities',
        'category',
        'startDate',
        'endDate',
        'price_end',
        'price_end',
    ];

    public function search(Request $request)
    {
        //dd($request);
        // nombre de jour entre les deux dates selectionnées par l'utilisateur
        $iDays                                  = 0;
        $vehicles                               = [];

        if ($request->has($this->_needles)) {

            $sPlace								= strip_tags($request->query('cities', 'paris'));
            $sCategory                          = strip_tags($request->query('category', ''));
            $sCat                               = in_array( strtolower($sCategory), $this->_categories ) ;
            $startDate                          = strip_tags($request->startDate);
            $endDate                            = strip_tags($request->endDate);

            $iMaxPrice                          = (is_numeric($request->price_end) ? $request->price_end : null) ;

            if (!$sCat){
                $vehicles 						= Vehicle::where('current_place', htmlentities($sPlace))->whereBetween('day_price', [0, $iMaxPrice])->get();
            }

            if ($sCat) {
                $vehicles 						= Vehicle::where('current_place', htmlentities($sPlace))->where('category', $sCategory)->whereBetween('day_price', [0, $iMaxPrice])->get();
            }

            if (!$vehicles->isEmpty()){

                //$iStart                         = substr($request->daterange, 0,10); // or your date as well
                //$iEnd                           = substr($request->daterange, 13); // or your date as well

                if (!$this->_validateDate($startDate) || !$this->_validateDate($endDate)) {
                    return response('error');
                }

                $iNoAbsoluteDay                 = round((strtotime($startDate) - strtotime($endDate)) / (60 * 60 * 24));
                $iDays                          = abs($iNoAbsoluteDay);

            }

        }


        return view('vehicle/show', compact('vehicles' , 'iDays', 'startDate', 'endDate' ));
    }


    protected function _validateDate($date, $format = 'm/d/Y')
    {
        $d = \DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }


}
