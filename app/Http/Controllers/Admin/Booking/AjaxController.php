<?php

namespace App\Http\Controllers\Admin\Booking;

use App\Http\Controllers\Controller;

use App\Booking;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
	/**@ Récupere les datas passées par la fonction ajax et execute une requete update sur la ligne corespondant à l'id du booking
	 * @todo Tester les variables avant qu'elles ne soient envoyées à la requette UPDATE
	 * @param Request $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
    public function edit(Request $request) {
        $iBooking           = $request->id_booking;
        $iUser_id           = $request->user_id;
        $iVehicle_id        = $request->vehicle_id;
        $dStart_date        = $request->start_date;
        $dEnd_date          = $request->end_date;
        $sStatus            = $request->status;
        $sPlace           	= $request->place;
        $iPrice     		= $request->price;
        $iAge               = $request->age;
        $sPhone             = $request->phone;
        $sAddress           = $request->address;
        $sDriving_licence   = $request->driving_licence;


        Booking::where('id',  $iBooking)
            ->update([
                'user_id'        => $iUser_id,
                'vehicle_id'     => $iVehicle_id,
                'start_date'     => $dStart_date,
                'end_date'       => $dEnd_date,
                'status'         => $sStatus,
                'place'          => ucfirst($sPlace),
                'price'  		 => (int)$iPrice,
                'age'            => (int)$iAge,
                'phone'          => $sPhone,
                'address'        => $sAddress,
                'driving_licence'=> $sDriving_licence,


            ]);
        return response('ok', 200);
    }

//--------------------------------------------------------------------------------------

	/**
	 * Supprime la ligne ayant comme clé étrangère $iBooking dans la table Booking
	 * @todo Tester la variable $iBooking
	 * @param Request $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
    public function delete(Request $request){
        $iBooking            = $request->id_booking;

        Booking::where('id', $iBooking)
            ->delete();
        return response($iBooking,200);
    }
}
