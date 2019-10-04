<?php

namespace App\Http\Controllers\Admin\Vehicle;

use App\Http\Controllers\Controller;
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
