<?php

declare(strict_types=1);

namespace App\Http\Controllers\Vehicle;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Providers\Tools\Tools;
use App\Providers\Tools\Constant;
use App\Providers\Vehicle\VehicleProvider;
use App\Vehicle;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
	/**
	 * Récupère les elements de recherche d'un vehicule entrées par lutilisateur et retourne une liste correspondante
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
	 */

	public function search(Request $request) {
        if (!$request->has(Constant::NEEDLES)) {
            $vehicles 						= Vehicle::all();

            $iDays                          = Constant::DAYS;
            $startDate                      = Date('m/d/Y', time());
            $endDate                        = Date('m/d/Y', time());

            $startHour                      = Constant::STARTHOUR;
            $endHour                        = Constant::ENDHOUR;
            $sPlace                         = Constant::PLACE;

            return view('vehicle/show', compact('vehicles' , 'iDays', 'startDate', 'endDate', 'sPlace', 'startHour', 'endHour'));
        }

        /** nombre de jour entre les deux dates selectionnées par l'utilisateur */
        $iDays                              = 0;
        $vehicles                           = [];

        $sPlace								= strip_tags($request->input('cities'));
        $sCategory                          = strip_tags($request->input('category') ? $request->input('category') : '' );
        $startDate                          = strip_tags($request->input('startDate'));
        $endDate                            = strip_tags($request->input('endDate'));
		$startHour                      	= strip_tags($request->input('startHour'));
		$endHour                        	= strip_tags($request->input('endHour'));
        $iMaxPrice                          = (is_numeric($request->price_end) ? $request->price_end : null) ;

		$aIds								= VehicleProvider::checkIfHide();

        if(empty($aIds)) {
                return response('There aro no vehicle available');
        }

        $sCat                               = in_array(strtolower($sCategory),Constant::CATEGORIES) ;


        if (!$sCat){
            $vehicles = Vehicle::where('current_place', htmlentities($sPlace))->whereBetween('day_price', [0, $iMaxPrice])->whereIn('id', $aIds)->distinct('*')->get();
            //$vehicles 						= Vehicle::where('current_place', htmlentities($sPlace))->whereBetween('day_price', [0, $iMaxPrice])->get();
        }

        if ($sCat) {
            $vehicles = Vehicle::whereIn('id', $aIds)->distinct('*')->where('current_place', htmlentities($sPlace))->where('category', $sCategory)->whereBetween('day_price', [0, $iMaxPrice])->get();
            //$vehicles 						= Vehicle::where('current_place', htmlentities($sPlace))->where('category', $sCategory)->whereBetween('day_price', [0, $iMaxPrice])->get();
        }

        if (!$vehicles->isEmpty()) {
            if (!Tools::validateDate($startDate) || !Tools::validateDate($endDate)) {
               redirect('vehicle/search');
            }

            if (!Tools::validateHour($startHour) || !Tools::validateHour($endHour)) {
                redirect('vehicle/search');
            }

            $iNoAbsoluteDay                 = round((strtotime($startDate) - strtotime($endDate)) / (60 * 60 * 24));
            $iDays                          = abs($iNoAbsoluteDay);
        }


        return view('vehicle/show', compact('vehicles' , 'iDays', 'startDate', 'endDate' , 'sPlace', 'startHour', 'endHour'));
    }
//--------------------------------------------------------------------------------------
}
