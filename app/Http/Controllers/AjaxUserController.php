<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class AjaxUserController extends Controller
{
    public function editUser(Request $request) {
        $request-> id_user;
        $request-> lastename;
        $request-> firstname;
        $request-> email;
        $request-> role;

        User::where('id',  $request-> id_user)
            ->update([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'role' => $request->role,
            ]);
        return \response('ok' ,200);
    }
}
