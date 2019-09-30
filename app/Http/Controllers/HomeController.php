<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    protected $_aCities         = [];
    protected $_aCountries      = [];
    protected $_localCountry    = 'France';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $apiCities                              = file_get_contents('https://pkgstore.datahub.io/core/world-cities/world-cities_json/data/5b3dd46ad10990bca47b04b4739a02ba/world-cities_json.json');
        $aCites                                 = json_decode($apiCities);

        foreach ($aCites as $row){
            if (!array_key_exists($row->country, $this->_aCities)) {
                $this->_aCities[]               = $row->country;
            }

            $this->_aCities[$row->country][]    = $row->name;
        }

        $aCities                                 = array_reverse($this->_aCities[$this->_localCountry]);

        return view('home',compact( 'aCities') );
    }
}
