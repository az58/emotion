<?php

namespace App\Http\Controllers\Admin\Booking;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Booking;

class BookingController extends Controller
{
    public function show()
    {
        $bookings               = Booking::all();
        return view('admin/booking/show', compact('bookings'));
    }
}
