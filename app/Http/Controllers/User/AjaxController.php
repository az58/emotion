<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function edit(Request $request) {
        $request-> id_user;
        $request-> lastname;
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
