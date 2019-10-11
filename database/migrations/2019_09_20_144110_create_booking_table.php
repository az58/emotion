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
            $table->time('start_hour');
            $table->time('end_hour');
            $table->enum('status',['waiting_payment','payed','running','finished']);
            $table->string('place',100)->nullable();
            $table->string('price',20)->nullable();
            $table->integer('age')->unsigned()->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('driving_licence', 100)->nullable();
            $table->string('cb_number',20)->nullable();
            $table->string('cb_expire', 5)->nullable();
            $table->string('cb_cvv', 4)->nullable();

            $table->unique(['vehicle_id','start_date', 'end_date']);

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
