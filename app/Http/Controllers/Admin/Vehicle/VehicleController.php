<?php

namespace App\Http\Controllers\Admin\Vehicle;

use App\Http\Controllers\Controller;
use App\Vehicle;

class VehicleController extends Controller
{
	/**
	 * Récupère tout les véhicule dans la variable $vehicles
	 * et envoie la variable $vehicles dans la vue show de dossier vehicle @path /ressources/views/admin/vehicle/
	 * @param $vehicles /liste complete des vehicules enregistrée en base de donnée
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function show()
    {
        $vehicles               = Vehicle::all();

        return view('admin/vehicle/show', compact('vehicles'));
    }
}
