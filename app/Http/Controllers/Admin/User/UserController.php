<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\User;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	/**
	 * Récupère toutes les réservations dans la variable $users
	 * et envoie la variable $users dans la vue show de dossier user @path /ressources/views/admin/user/
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function show()
    {
    	/** @var Object $users */
        $users                  = User::where('role', 'buyer')->get();

        return view('admin/user/show', compact('users'));
    }
}
