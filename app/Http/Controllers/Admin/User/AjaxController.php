<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUser;
use App\User;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
	/**
	 * Récupere les datas passées par la fonction ajax et execute une requete update sur la ligne corespondant à la clé primaire $idUser
	 * @param Request $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
    public function edit(EditUser $request) {
        if ($request->validated()) {
            $iUser      = $request->id_user;
            $sLastname  = $request->lastname;
            $sFirstname = $request->firstname;
            $sEmail     = $request->email;
            $sRole      = $request->role;

            // var_dump($request);exit;

            User::where('id', $iUser)
                ->update([
                    'lastname'  => $sLastname,
                    'firstname' => $sFirstname,
                    'email'     => $sEmail,
                    'role'      => $sRole,
                ]);
            return response('ok', 200);
        }

        return response('access denied', 501);
    }

	//--------------------------------------------------------------------------------------

	/**
	 * Supprime la ligne ayant comme clé étrangère $iUser dans la table User
	 * @param Request $request
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
    public function delete(Request $request){
        $iUser             = $request->id_user;

        if(!is_numeric($iUser)) {
            return response("$iUser n'est pas un identifiant valide",200);
        }

        User::where('id', $iUser)
          ->delete();

          return response($iUser,200);
    }
    
}
