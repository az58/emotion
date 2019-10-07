<?php

namespace App\Http\Controllers\Admin\Booking;

use App\Booking;
use App\Http\Controllers\Controller;


class BookingController extends Controller
{
	/**
	 * Récupère toutes les réservations dans la variable $booking
	 * et envoie la variable $booking dans la vue show de dossie booking @path /ressources/views/admin/booking/
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function show()
    {
        $bookings               = Booking::all();

        return view('admin/booking/show', compact('bookings'));
    }
}
