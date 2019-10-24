<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Booking;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $user                   = User::where('id', Auth::id())->get();

        $bookings               = Booking::join('vehicle', 'vehicle.id', '=', 'vehicle_id')
            ->Join('users', 'user_id', '=', 'users.id')
            ->where('user_id', Auth::id())
            ->get([
                'vehicle.brand As brand',
                'vehicle.type As type',
                'vehicle.licence_plate As licence',
                'vehicle.picture As picture',
                'price',
                'status'
            ]);

        return view('user/show',compact( 'bookings', 'user'));
    }
}

