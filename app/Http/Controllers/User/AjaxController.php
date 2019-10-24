<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Booking;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function facture(Request $request) {

        if(!is_numeric($request->booking)) {
            return false;
        }

        $booking = Booking::select(['booking.id as idB','price', 'start_date', 'end_date', 'place', 'brand', 'type'])->join('vehicle','vehicle.id','=','vehicle_id')->where(['booking.id' => $request->booking])->first();

        $pdf = App::make('dompdf.wrapper');

        $content = "<h1> Facture n° ".$booking['idB']." </h1><br> 
                    <hr>
                    <h2>". Auth::user()->firstname.' '.Auth::user()->lastname."</h2>
                    <br>
                    <h3>Du ".$booking['start_date']." au ".$booking['end_date']." </h3><br>
                    <h4>Vehicule : ".$booking['brand'].' '.$booking['type']."</h4>
                    Au départ de ". $booking['place'].
        "<br><hr>Montant TTC : ".$booking['price'] ;

        $pdf->loadHTML($content)->download();

        return $pdf->stream();
    }
}

