<?php

namespace App\Http\Controllers\Admin\Vehicle;

use App\Http\Controllers\Controller;
use App\Providers\Tools\Constant;
use App\Vehicle;

use Illuminate\Http\Request;

class AjaxController extends Controller
{

	//--------------------------------------------------------------------------------------

    /**
	 * Récupere les datas passées par la fonction ajax et execute une requete update sur la ligne corespondant à l'id_vehicle du vehicule
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $iVehicle               = htmlspecialchars($request->id_vehicle);

        if(!is_numeric($iVehicle)) {
            return response("$iVehicle n'est pas un identifiant valide",200);
        }

		/**
		 * Ceci est test ternaire (equivalant d'un if)
		 * @example  https://blog.smarchal.com/operateur-ternaire-php
		 * @var $sCategory
		 */

        $sBattery_brand = array_key_exists(htmlspecialchars($request->battery_brand), Constant::BATTERRYBRAND)
            ? Constant::BATTERRYBRAND[$request->battery_brand] : null;

        if ($request->validated() && $sBattery_brand) {
            Vehicle::where('id', $iVehicle)
                ->update([
                    'category'      => $request->category,
                    'brand'         => $request->brand,
                    'type'          => $request->type,
                    'color'         => $request->color,
                    'current_place' => $request->current_place,
                    'available'     => $request->available,
                    'licence_plate' => $request->licence_plate,
                    'kilometer'     => $request->kilometer,
                    'serial_number' => $request->serial_number,
                    'date_purchase' => $request->date_purchase,
                    'buying_price'  => $request->buying_price,
                    'day_price'     => $request->day_price,
                    'battery_level' => $request->battery_level,
                    'battery_brand' => $sBattery_brand,

                ]);

            return response('Vehicule modifié avec succès', 200);
        }

        return response('Vous n\'avez pas les autorisations pour cette action', 419);
    }

	//--------------------------------------------------------------------------------------

	/**
	 * Supprime la ligne ayant comme clé étrangère $iBooking dans la table Vehicle
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
     public function delete(Request $request){
        $iVehicle         =  htmlspecialchars($request->id_vehicle);

        if(!is_numeric($iVehicle)) {
            return response("$iVehicle n'est pas un identifiant valide",200);
        }

         Vehicle::where('id', $iVehicle)
             ->delete();

         return response('Vehicule supprimé avec succès', 200);
    }

    //--------------------------------------------------------------------------------------

    public function hide(Request $request)
    {
        $iVehicle         = $request->id_vehicle;

        Vehicle::where('id',  $iVehicle)
            ->update([
                'available'  => true,

            ]);

        return response('Vehicule caché avec succès', 200);
    }
}
