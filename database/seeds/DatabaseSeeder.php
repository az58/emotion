<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
#use Illuminate\Support\Str;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();
		foreach (range(1,20) as $index) {
			DB::table('users')->insert([
				'firstname' => $faker->firstName,
				'lastname' 	=> $faker->lastName,
				'email'		=> $faker->email,
				'password' 	=> bcrypt('secret'),
			]);
		}

		DB::table('vehicle')->insert([

			'category' 		    => 'car',
			'brand' 		    => 'renault',
			'type'			    => 'zoé',
			'color' 		    => 'blue',
			'current_place'     => 'paris',
			'available'         => '1',
            'licence_plate'     => 'RF-464-RD',
			'kilometer' 		=> '30000',
            'serial_number'     => 'VF7SBHMZ0EW554823',
			'date_purchase'     => $faker->date('Y-m-d','now'),
			'buying_price' 	    => '19750',
			'day_price' 	    => '20',
			'battery_level' 	=> 100,
			'battery_brand' 	=> 'Cadmium nickel',
			'picture' 	        => 'http://vrent.fr/img/nui_n1s.png'
        ]);

		foreach (range(1,20) as $index) {
			DB::table('booking')->insert([
				'user_id' 			=> $faker->numberBetween(1,20),
				'vehicle_id' 		=> 1,
				'start_date'		=> $faker->date('Y-m-d','now'),
				'end_date' 			=> $faker->date('Y-m-d','now'),
				'start_hour'		=> $faker->time('H:i','19:00'),
				'end_hour' 			=> $faker->time('H:i','19:00'),
				'status' 			=> 'finished',
				'place' 			=> $faker->city,
				'price' 			=> $faker->numberBetween(1,100),
				'age' 				=> $faker->numberBetween(18,65),
				'phone' 			=> $faker->phoneNumber,
				'address' 			=> $faker->randomNumber(3).' rue '.$faker->name.' '.$faker->randomNumber(5).' '.$faker->city,
				'driving_licence' 	=> $faker->randomNumber(5),
				'cb_number' 		=> $faker->creditCardNumber,
				'cb_expire' 		=> $faker->randomNumber(4),
				'cb_cvv' 			=> $faker->randomNumber(3),
			]);
		}
    }
}
