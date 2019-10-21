<?php

namespace App\Http\Controllers\Admin\Vehicle;

use App\Http\Controllers\Controller;
use App\Vehicle;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
	 * Clées des categories acceptées dans la base de de données
     * @var array
     */
    protected $_validCategories = [
        'scooter',
        'car',
    ];

    //--------------------------------------------------------------------------------------

	/**
	 * Clées de concordances des types de batteries acceptées dans la base de de données
	 * @var array
     */
    protected $_validBatteryBrand = [
        'c_n' 	=> 'Cadmium nickel',
        'n_m_h' => 'Nickel métal hydrure',
        'l' 	=> 'Lithium',
        'l_i' 	=> 'Lithium-ion',
    ];

	//--------------------------------------------------------------------------------------

    /**
	 * Récupere les datas passées par la fonction ajax et execute une requete update sur la ligne corespondant à l'id_vehicle du vehicule
	 * @todo Appliquer des test plus poussé sur les variables avant qu'elles ne soient envoyées à la requette UPDATE
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $iVehicle               = htmlspecialchars($request->id_vehicle);
		/**
		 * Ceci est test ternaire (equivalant d'un if)
		 * @example  https://blog.smarchal.com/operateur-ternaire-php
		 * @var $sCategory
		 */
        $sCategory              = in_array($request->category, $this->_validCategories) ? htmlspecialchars($request->category) : null;
        $sBrand                 = htmlspecialchars($request->brand);
        $sType                  = htmlspecialchars($request->type);
        $sColor                 = htmlspecialchars($request->color);
        $sCurrent_place         = htmlspecialchars($request->current_place);
        $iAvailable             = htmlspecialchars($request->available);

        $sLicence_plate         = htmlspecialchars($request->licence_plate);
        $sKilometer             = htmlspecialchars($request->kilometer);
        $sSerial_number         = htmlspecialchars($request->serial_number);
        $dDate_purchase         = htmlspecialchars($request->date_purchase);
        $iBuying_price          = htmlspecialchars($request->buying_price);
        $sDay_price             = htmlspecialchars($request->day_price);
        $sBattery_level         = htmlspecialchars($request->battery_level);
        $sBattery_brand         = array_key_exists(htmlspecialchars($request->battery_brand), $this->_validBatteryBrand)
            ? $this->_validBatteryBrand[$request->battery_brand]: null;

        if (!$iVehicle || !$sCategory || !$sBrand || !$sType
            || !$sColor || !$sCurrent_place || !in_array($iAvailable, ['1','0'] )
            || !$sLicence_plate || !$sKilometer || !$sSerial_number
            || !$dDate_purchase || !$iBuying_price || !$sDay_price || !$sBattery_level
            || !$sBattery_brand
        ) {
            return response('Vous n\'avez pas les autorisations pour cette action', 419);
        }
        
        Vehicle::where('id',  $iVehicle)
            ->update([
                'category'       => $sCategory,
                'brand'          => $sBrand,
                'type'           => $sType,
                'color'          => $sColor,
                'current_place'  => $sCurrent_place,
                'available    '  => $iAvailable,
                'licence_plate'  => $sLicence_plate,
                'kilometer'      => $sKilometer,
                'serial_number'  => $sSerial_number,
                'date_purchase'  => $dDate_purchase,
                'buying_price'   => $iBuying_price,
                'day_price'      => $sDay_price ,
                'battery_level'  => $sBattery_level,
                'battery_brand'  => $sBattery_brand,

            ]);

        return response('Vehicule modifié avec succès', 200);
    }

	//--------------------------------------------------------------------------------------

	/**
	 * Supprime la ligne ayant comme clé étrangère $iBooking dans la table Vehicle
	 * @todo Tester la variable $iVehicle
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
     public function delete(Request $request){
        $iVehicle         = $request->id_vehicle;

         Vehicle::where('id',  $iVehicle)
             ->update([
                 'category'       => $sCategory,
                 'brand'          => $sBrand,
                 'type'           => $sType,
                 'color'          => $sColor,
                 'current_place'  => $sCurrent_place,
                 'licence_plate'  => $sLicence_plate,
                 'kilometer'      => $sKilometer,
                 'serial_number'  => $sSerial_number,
                 'date_purchase'  => $dDate_purchase,
                 'buying_price'   => $iBuying_price,
                 'day_price'      => $sDay_price ,
                 'battery_level'  => $sBattery_level,
                 'battery_brand'  => $sBattery_brand,

             ]);

         return response('Vehicule modifié avec succès', 200);
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
