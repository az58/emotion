<?php

declare(strict_types=1);

namespace App\Providers\Tools;

class Tools
{

	/**
	 * Vérifie si une date est bien valide
	 * @param $date / la date passé par l'utilisateur
	 * @param string $format le format de date nécessaire à la validation au test
	 * @return bool
	 */
    public static function validateDate(string $date, string $format = 'm/d/Y')
    {
        $d = \DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }

    //----------------------------------------------------------------------------------------------

	/**
	 * Vérifie si l'heure est bien valide
	 * @param $hour / l'heure passée par l'utilisateur
	 * @return bool
	 */
	public static function validateHour(string $hour)
	{
		$time = preg_match("/^(?:2[0-4]|[01][1-9]|10):([0-5][0-9])$/", $hour);

		return $time;
	}

    //----------------------------------------------------------------------------------------------

    /**
	 * @param string $sStartDate
	 * @param string $sEndDate
	 * @return float|int
	 */
    public static function days(string $sStartDate,string $sEndDate) {
		$iNoAbsoluteDay                 = round((strtotime($sStartDate) - strtotime($sEndDate)) / (60 * 60 * 24));
		$iDays                          = abs($iNoAbsoluteDay) == 0 ? 1 : abs($iNoAbsoluteDay) ;

		return $iDays;
	}

    //----------------------------------------------------------------------------------------------

    /**
	 * @param string $sDate
	 * @return string
	 */
	public static function formateDate(string $sDate) {
    	$y = substr($sDate,6);
    	$m = substr($sDate,0, 2);
    	$d = substr($sDate, 3, 2);

    	return  $y.'-'.$m.'-'.$d;
	}


    //----------------------------------------------------------------------------------------------

    public static function getCountry() {
        $apiCities                            	= file_get_contents('https://pkgstore.datahub.io/core/world-cities/world-cities_json/data/5b3dd46ad10990bca47b04b4739a02ba/world-cities_json.json');
        $aCites                                 = json_decode($apiCities);

        $_aCities         = [];
        $_aCountries      = [];
        $_localCountry    = 'France';

        foreach ($aCites as $row){
            if (!array_key_exists($row->country, $_aCities)) {

                $_aCities[]               = $row->country;
            }

            $_aCities[$row->country][]    = $row->name;
        }



        if(isset($_aCities[$_localCountry])) {

            $cleanArray                          = self::cleanMarseille($_aCities[$_localCountry]);
        }

       return  $aCities                                = array_reverse($cleanArray);
    }

    //----------------------------------------------------------------------------------------------

    /**
     * Supprime les doublons pour la ville de Marseille
     * @return array
     */
    public static function cleanMarseille(array $_aCities) {
        $finalArray = [];

        foreach ($_aCities as $k) {
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
