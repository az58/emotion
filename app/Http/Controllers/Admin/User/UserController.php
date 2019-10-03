<?php

namespace App\Http\Controllers\Admin\User;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show()

    {
        $users                  = User::where('role', 'buyer')->get();
        return view('Admin/User/show', compact('users'));
    }
}
