<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedbigInteger('user_id')->unsigned();
            $table->UnsignedbigInteger('vehicle_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('state',100);
            $table->string('booking_price',20);
            $table->integer('age')->unsigned();
            $table->string('phone', 30);
            $table->string('address', 100);
            $table->string('driving_licence', 100);
            $table->string('cb_number',20);
            $table->string('cb_expire', 5);
            $table->string('cb_cvv', 4);

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicle')
                ->onDelete('cascade');

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
        Schema::dropIfExists('booking');
    }
}
