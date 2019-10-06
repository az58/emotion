<?php

namespace App\Http\Controllers\Booking;

use App\Booking;
use App\Http\Controllers\Controller;

use App\Vehicle;
use Illuminate\Http\Request;


class AjaxController extends Controller
{
    public function store() {
        $vehicles               = Vehicle::all();

        return response($vehicles, '200');
    }
}