<?php

namespace App\Http\Controllers\Admin\Vehicle;

use App\Http\Controllers\Controller;

use App\Vehicle;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function edit(Request $request) {

        $iVehicle           = $request->id_vehicule;
        $sCategory          = $request->category;    
        $sBrand             = $request->brand;
        $sType              = $request->type;
        $sColor             = $request->color; 
        $sCurrent_place     = $request->current_place;
        $sLicence_plate     = $request->licence_plate;
        $sKilometer         = $request->kilometer;
        $sSerial_number     = $request->serial_number;
        $dDate_purchase     = $request->date_purchase;
        $iBuying_price      = $request->buying_price;
        $sDay_price         = $request->day_price;
        $sBattery_level     = $request->battery_level;
        $sBattery_brand     = $request->battery_brand;

        
        Vehicule::where('id',  $iVehicle)
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
        return response('ok', 200);
    }

     public function delete(Request $request){
        $iVehicle         = $request->id_vehicle;

        Vehicle::where('id', $iVehicle)
          ->delete();
          return response($iVehicle,200);
    }


}
