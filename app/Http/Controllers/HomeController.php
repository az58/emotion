<?php

declare(strict_types=1);

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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $apiCities                            	= file_get_contents('https://pkgstore.datahub.io/core/world-cities/world-cities_json/data/5b3dd46ad10990bca47b04b4739a02ba/world-cities_json.json');
        $aCites                                 = json_decode($apiCities);

        foreach ($aCites as $row){
            if (!array_key_exists($row->country, $this->_aCities)) {

                $this->_aCities[]               = $row->country;
            }

            $this->_aCities[$row->country][]    = $row->name;
        }



        if(isset($this->_aCities[$this->_localCountry])) {

           $cleanArray                          = $this->_cleanMarseille($this->_aCities[$this->_localCountry]);
        }

        $aCities                                = array_reverse($cleanArray);


        return view('home',compact( 'aCities') );
    }

    /**
     * Supprime les doublons pour la ville de Marseille
     * @return array
     */
    protected function _cleanMarseille() {
        $finalArray = [];

        foreach ($this->_aCities[$this->_localCountry] as $k) {
            if ('Marseille' === substr($k,0,9)) {
                if (array_key_exists('Marseille', $finalArray)) {

                    continue;
                }
            }
            $finalArray [$k]= $k;
        }

        return $finalArray;
    }
}
