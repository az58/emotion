<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vehicle;

class VehicleController extends Controller
{
    public function show()
    {
        $vehicles               = Vehicle::all();
        return view('admin/vehicle/show', compact('vehicles'));
    }
}
