<?php

namespace App\Http\Controllers\Admin\Booking;

use App\Http\Controllers\Controller;

use App\Booking;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function edit(Request $request) {
        $iBooking           = $request->id_booking;
        $iUser_id           = $request->user_id;
        $iVehicle_id        = $request->vehicle_id;
        $dStart_date        = $request->start_date;
        $dEnd_date          = $request->end_date;
        $sState             = $request->state;
        $iBooking_price     = $request->booking_price;
        $iAge               = $request->age;
        $sPhone             = $request->phone;
        $sAddress            = $request->address;
        $sDriving_licence   = $request->driving_licence;


        Booking::where('id',  $iBooking)
            ->update([
                'user_id'        => $iUser_id,
                'vehicle_id'     => $iVehicle_id,
                'start_date'     => $dStart_date,
                'end_date'       => $dEnd_date,
                'state'          => $sState,
                'booking_price'  => (int)$iBooking_price,
                'age'            => (int)$iAge,
                'phone'          => $sPhone,
                'address'        => $sAddress,
                'driving_licence'=> $sDriving_licence,


            ]);
        return response('ok', 200);
    }

    public function delete(Request $request){
        $iBooking            = $request->id_booking;

        Booking::where('id', $iBooking)
            ->delete();
        return response($iBooking,200);
    }
}
