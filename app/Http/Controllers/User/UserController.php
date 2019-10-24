<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Booking;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $users                  = User::where('id', Auth::id());

        $bookings               = Booking::where('user_id', Auth::id());

        return view('user/show',compact( 'bookings', 'users') );
    }
}

