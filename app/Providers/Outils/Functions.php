<?php

namespace App\Providers\Outils;

class Functions
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
}
