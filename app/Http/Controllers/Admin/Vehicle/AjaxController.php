<?php

namespace App\Http\Controllers\Admin\Vehicle;

use App\Http\Controllers\Controller;

use App\Vehicle;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * @var array
     */
    protected $_validCategories = [
        'scooter',
        'car',
    ];
    /**
     * @var array
     */
    protected $_validBatteryBrand = [
        'Cadmium nickel',
        'Nickel métal hydrure',
        'Lithium',
        'Lithium-ion',
    ];

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $iVehicle               = is_numeric($request->id_vehicule) ? strip_tags($request->id_vehicule) : null;
        $sCategory              = in_array($request->category, $this->_validCategories) ? strip_tags($request->category) : null;
        $sBrand                 = strip_tags($request->brand);
        $sType                  = strip_tags($request->type);
        $sColor                 = strip_tags($request->color);
        $sCurrent_place         = strip_tags($request->current_place);
        $sLicence_plate         = strip_tags($request->licence_plate);
        $sKilometer             = strip_tags($request->kilometer);
        $sSerial_number         = strip_tags($request->serial_number);
        $dDate_purchase         = is_numeric($request->date_purchase) ? strip_tags($request->date_purchase) : null;
        $iBuying_price          = is_numeric($request->buying_price) ? strip_tags($request->buying_price) : null;
        $sDay_price             = is_numeric($request->day_price) ? strip_tags($request->day_price) : null;
        $sBattery_level         = is_numeric($request->battery_level) ? strip_tags($request->battery_level) : null;
        $sBattery_brand         = in_array($request->battery_brand, $this->_validBatteryBrand) ? strip_tags($request->battery_brand) : null;

        if (!$iVehicle || !$sCategory || !$sBrand || !$sType
            || !$sColor || !$sCurrent_place || !$sLicence_plate
            || !$sKilometer || !$sSerial_number || !$dDate_purchase
            || !$iBuying_price || !$sDay_price || !$sBattery_level
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
     public function delete(Request $request){
        $iVehicle         = $request->id_vehicle;

        Vehicle::where('id', $iVehicle)
          ->delete();

          return response($iVehicle,200);
    }


}
