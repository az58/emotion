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
            $table->string('brand', 100)->nullable(); // brand = marque
            $table->string('type', 100)->nullable(); // type = modèle
            $table->string('color', 20)->nullable(); // color =  couleur
            $table->string('licence_plate', 100)->nullable();// licence_plate = plaque d'immatriculation
            $table->string('distance', 255)->nullable() ;// distance = nombre de kilomètres
            $table->dateTime('date_purchase')->nullable();// date_purchase =  date d'achat
            $table->integer('buying_price')->unsigned();// buying_prie =  prix d'achat
            $table->integer('fuel_level')->unsigned(); // fuel_level =  niveau de carburant
            $table->enum('fuel_brand', ['diesel','essence98','essence95']);// fuel_brand = type de carburant
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
