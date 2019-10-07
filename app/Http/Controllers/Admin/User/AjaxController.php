<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
	/**
	 * Récupere les datas passées par la fonction ajax et execute une requete update sur la ligne corespondant à la clé primaire $idUser
	 * @todo Tester les variables avant de les envoyées à la requete
	 * @param Request $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
    public function edit(Request $request) {
        $iUser              = $request->id_user;
        $sLastname          = $request->lastname;
        $sFirstname         = $request->firstname;
        $sEmail             = $request->email;
        $sRole              = $request->role;

        // var_dump($request);exit;

        User::where('id',  $iUser)
            ->update([
                'lastname'  => $sLastname,
                'firstname' => $sFirstname,
                'email'     => $sEmail,
                'role'      => $sRole,
            ]);
        return response('ok', 200);
    }

	//--------------------------------------------------------------------------------------

	/**
	 * Supprime la ligne ayant comme clé étrangère $iUser dans la table User
	 * @todo Tester la variable $iUser
	 * @param Request $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
    public function delete(Request $request){
        $iUser             = $request->id_user;

        User::where('id', $iUser)
          ->delete();
          return response($iUser,200);
    }
    
}
