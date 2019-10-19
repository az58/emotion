<?php
/**
 * Created by PhpStorm.
 * User: loryleticee
 * Date: 2019-10-19
 * Time: 16:00
 */

namespace App\Providers\Vehicle;

use App\Booking;

class VehicleProvider
{

    /**
     * REtourne tous les ids des vehicule qui ne sont pas en location
     * @return array
     */
 public static function checkIfHide() {
     $aIds                              = [];
     $nowDay							= date("Y-m-d");
     $nowHour							= date("H:i:s");

     $aVehicleBooked                    = Booking::join('vehicle', 'booking.vehicle_id', '=', 'vehicle.id')
         ->select('vehicle_id')
         ->where([['end_date', '>=', $nowDay], ['end_hour', '>=', $nowHour]])
         ->distinct('vehicle_id')->get();

     if (!empty($aVehicleBooked)) {

         foreach ($aVehicleBooked as $key => $row) {
             $aIds    [] = $row['vehicle_id'];
         }
     }

     return $aIds;
 }
}