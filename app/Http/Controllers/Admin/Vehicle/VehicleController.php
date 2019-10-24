<?php

namespace App\Http\Controllers\Admin\Vehicle;

use App\Http\Controllers\Controller;
use App\Providers\Tools\Constant;
use App\Providers\Tools\Tools;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
	/**
	 * Récupère tout les véhicule dans la variable $vehicles
	 * et envoie la variable $vehicles dans la vue show de dossier vehicle @path /ressources/views/admin/vehicle/
	 * @param $vehicles /liste complete des vehicules enregistrée en base de donnée
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function show()
    {
        $vehicles               = Vehicle::all();
        $countries              = Tools::getCountry();

        return view('admin/vehicle/show', compact('vehicles','countries'));
    }

    public function add(Request $request)
    {

        $sCategory              = in_array($request->category, Constant::CATEGORIES) ? htmlspecialchars($request->category) : null;
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
        $sBattery_brand         = array_key_exists(htmlspecialchars($request->battery_brand), Constant::BATTERRYBRAND)
            ? Constant::BATTERRYBRAND[$request->battery_brand]: null;

        $sPicture             = htmlspecialchars($request->picture);

        if (!$sCategory || !$sBrand || !$sType
            || !$sColor || !$sCurrent_place || !in_array($iAvailable, ['1','0'] )
            || !$sLicence_plate || !$sKilometer || !$sSerial_number
            || !$dDate_purchase || !$iBuying_price || !$sDay_price || !$sBattery_level
            || !$sBattery_brand
        ) {

            //Storage::disk('local')->put($sPicture, $sPicture);


            Vehicle::insert([
                'category' 		=> $sCategory,
                'brand' 		=> $sBrand,
                'type' 		    => $sType,
                'color' 		=> $sColor,
                'current_place' => strip_tags($sCurrent_place),
                'available' 	=> $iAvailable,
                'licence_plate' => $sLicence_plate,
                'kilometer'     => $sKilometer,
                'serial_number' => $sSerial_number ,
                'date_purchase' => $dDate_purchase,
                'buying_price' 	=> $iBuying_price,
                'day_price' 	=> $sDay_price,
                'battery_level' => $sBattery_level,
                'battery_brand' => $sBattery_brand,
                'picture'       => $sPicture,
            ]);
        }

        return redirect('/admin/vehicle');
    }
}
