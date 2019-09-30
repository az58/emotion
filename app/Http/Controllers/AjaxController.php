<?php

namespace App\Http\Controllers;

use http\Client\Response;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    protected $_categories  = [
        'car',
        'scooter',
    ];
    /*
    protected $_aCities     = [];
    protected $_aCountries  = [];

    public function getPlaces(Request $request) {
        $apiCities                              = file_get_contents('https://pkgstore.datahub.io/core/world-cities/world-cities_json/data/5b3dd46ad10990bca47b04b4739a02ba/world-cities_json.json');
        $aCites                                 = json_decode($apiCities);


        foreach ($aCites as $row){
            if (!array_key_exists($row->country, $this->_aCities)) {
                $this->_aCities[]               = $row->country;
                $this->_aCountries[]            = $row->country;
            }

            $this->_aCities[$row->country][]    = $row->name;
        }


        $sCountry                               = ucfirst('france');

        $aCountries                                 = $this->_aCountries;

        $aCites                                 = array_reverse($this->_aCities[$sCountry]);

    }
    */

	public function ajax(Request $request)
	{
		if (!empty($request->all()) && array_key_exists("cities", $request->all()) ) {
			$sPlace								= strip_tags($request->cities);
			$sCategory                          = strip_tags($request->category);
            $sCat                               = in_array($sCategory, $this->_categories) ;

            $iMinPrice                          = (is_numeric($request->minPrice) ? $request->minPrice : null) ;
            $iMaxPrice                          = (is_numeric($request->maxPrice) ? $request->maxPrice : null) ;

			if (!$sCat) {
                $vehicle 						= Vehicle::where('current_place', htmlentities($sPlace))->whereBetween('day_price', [$iMinPrice, $iMaxPrice])->get();
            }

			if ($sCat) {
                $vehicle 						= Vehicle::where('current_place', htmlentities($sPlace))->where('category', $sCategory)->whereBetween('day_price', [$iMinPrice, $iMaxPrice])->get();
            }

			if (!$vehicle->isEmpty()){

				return response(['vehicle' => $vehicle], 200);
			}
		}

		return response(['vehicle' => []], 200);
	}
}
