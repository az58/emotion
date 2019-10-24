<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Booking;

use App\Http\Controllers\Controller;

use App\Booking;
use App\Http\Requests\EditBooking;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
	/**@ Récupere les datas passées par la fonction ajax et execute une requete update sur la ligne corespondant à l'id du booking
	 * @todo Tester les variables avant qu'elles ne soient envoyées à la requette UPDATE
	 * @param Request $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
    public function edit(EditBooking $request) {
        if ($request->validated()) {
            $iBooking           = $request->id_booking;
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

            return response('Vos modification on bien été prises en compte', 200);
        }

        return response('access denied', 501);
    }

//--------------------------------------------------------------------------------------

	/**
	 * Supprime la ligne ayant comme clé étrangère $iBooking dans la table Booking
	 * @param Request $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
    public function delete(Request $request){
        $iBooking            = $request->id_booking;

        if(!is_numeric($iBooking)) {
            return response("$iBooking n'est pas un identifiant valide",200);
        }

        Booking::where('id', $iBooking)
            ->delete();

        return response($iBooking,200);
    }
}
