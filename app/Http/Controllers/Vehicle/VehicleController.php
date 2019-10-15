<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Providers\Outils\Functions;
use App\Providers\Outils\Constant;
use App\Vehicle;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
	/**
	 * Récupère les elements de recherche d'un vehicule entrées par lutilisateur et retourne une liste correspondante
	 * @param Request $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
	 */
	public function search(Request $request){
        if (!$request->has(Constant::$needles)) {
            $vehicles 						= Vehicle::all();
            $iDays                          = 1;
            $startDate                      = \Date('m/d/Y', time());
            $endDate                        = \Date('m/d/Y', time());
            $startHour                      = '08:00';
            $endHour                        = '19:00';
            $sPlace                         = 'paris';

            return view('vehicle/show', compact('vehicles' , 'iDays', 'startDate', 'endDate', 'startHour', 'endHour', 'sPlace' ));
        }

        /** nombre de jour entre les deux dates selectionnées par l'utilisateur */
        $iDays                              = 0;
        $vehicles                           = [];

        $sPlace								= strip_tags($request->input('cities'));
        $sCategory                          = strip_tags($request->input('category'));
        $startDate                          = strip_tags($request->startDate);
        $endDate                            = strip_tags($request->endDate);

        $iMaxPrice                          = (is_numeric($request->price_end) ? $request->price_end : null) ;

        $sCat                               = in_array(strtolower($sCategory),Constant::$categories) ;
        if (!$sCat){
            $vehicles 						= Vehicle::where('current_place', htmlentities($sPlace))->whereBetween('day_price', [0, $iMaxPrice])->get();
        }

        if ($sCat) {
            $vehicles 						= Vehicle::where('current_place', htmlentities($sPlace))->where('category', $sCategory)->whereBetween('day_price', [0, $iMaxPrice])->get();
        }

        if (!$vehicles->isEmpty()){
            if (!Functions::validateDate($startDate) || !Functions::validateDate($endDate)) {
                return response('error');
            }

            $iNoAbsoluteDay                 = round((strtotime($startDate) - strtotime($endDate)) / (60 * 60 * 24));
            $iDays                          = abs($iNoAbsoluteDay);
        }

        return view('vehicle/show', compact('vehicles' , 'iDays', 'startDate', 'endDate' , 'sPlace'));
    }
//--------------------------------------------------------------------------------------
}
