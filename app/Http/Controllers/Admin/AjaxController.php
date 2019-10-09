<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
	/**
	 * Modifie la page profil de l'administrateur connecté
	 * @todo Tester les variables avant de les passées à la requette update
	 * @param Request $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
    public function edit(Request $request) {
        $iUser              = $request->id_user;
        $sLastname          = $request->lastname;
        $sFirstname         = $request->firstname;
        $sEmail             = $request->email;
        $sRole              = $request->role;
		/**
		 * Cette fonction édit est appelée par plusieur page admin (user/show.blade.php et profile.blade.php)
		 * La variable <role> n'etant pas necessaire à la fonction ajax de la page profil mais obligatoire dans la fonction php
		 * On lui attribut de force dans la page profile la valeur 1
		 *	Ici on test si la valeur de la @var $sRole est égale à 1 (Cela voudrais donc
		 * dire qu'on arrive sur cette fonction php suite à l'appel de la fonction ajax de la page profil )
		 * Si elle vaut bien 1 on lui attribut alors par default la valeur "admin"
		 */
        if($sRole === 1)
        {
         $sRole = 'admin';
        }


        User::where('id',  $iUser)
            ->update([
                'lastname'  => $sLastname,
                'firstname' => $sFirstname,
                'email'     => $sEmail,
                'role'      => $sRole,
            ]);

        return response("L\'utlisateur $iUser à été modidié", 200);
    }
}
