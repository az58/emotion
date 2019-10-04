<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
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

    public function delete(Request $request){
        $iUser             = $request->id_user;

        User::where('id', $iUser)
          ->delete();
          return response($iUser,200);
    }
}
