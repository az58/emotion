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
     //$nowHour							= date("H:i:s");

     $vehicleBookedQueryBuilder         = Booking::join('vehicle', 'booking.vehicle_id', '=', 'vehicle.id')
         ->select('vehicle_id')
         ->where('booking.end_date', '>=', $nowDay)
         ->distinct('vehicle_id')->get();

     if (!empty($vehicleBookedQueryBuilder)) {

         $aVehicleBooked                = $vehicleBookedQueryBuilder->toArray();
         foreach ($aVehicleBooked as $key => $row) {
             $aIds    [] = $row['vehicle_id'];
         }
     }

     return $aIds;
 }

}