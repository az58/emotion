<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('category', ['car','scooter']); // category = type de la véhicule
            $table->string('brand', 100); // brand = marque
            $table->string('type', 100); // type = modèle
            $table->string('color', 20); // color =  couleur
            $table->string('current_place', 100); // current_place =  emplacement actuel du véhicule
            $table->string('licence_plate', 100);// licence_plate = plaque d'immatriculation
            $table->string('kilometer', 255);// kilometer = nombre de kilomètres
            $table->string('serial_number', 17); // serial_number =  numéro de série
            $table->dateTime('date_purchase');// date_purchase =  date d'achat
            $table->integer('buying_price')->unsigned();// buying_prie =  prix d'achat
            $table->integer('day_price')->unsigned();// day_price =  prix à la journée
            $table->integer('battery_level')->unsigned(); // battery_level =  niveau de batterie
            $table->enum('battery_brand', ['Cadmium nickel', 'Nickel métal hydrure', 'Lithium', 'Lithium-ion']);// battery_brand = type de batterie
            $table->string('picture', 255)->nullable();// battery_brand = type de batterie
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle');
    }
}
