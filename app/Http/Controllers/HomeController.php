<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Providers\Tools\Tools;
use App\User;

class HomeController extends Controller
{


    //---------------------------------------------------------------------------------------

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    //---------------------------------------------------------------------------------------

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users                                  = User::all();

        $aCities                                = Tools::getCountry();

        return view('home',compact( 'aCities', 'users') );
    }

    //---------------------------------------------------------------------------------------


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cgu() {
        return view('layouts/cgu');
    }

    //---------------------------------------------------------------------------------------

}
