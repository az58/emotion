<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function edit(Request $request) {
        $iUser              = $request->id_user;
        $sLastname          = $request->lastname;
        $sFirstname         = $request->firstname;
        $sEmail             = $request->email;
        $sRole              = $request->role;

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
        return response('ok', 200);
    }
}
