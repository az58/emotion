<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
			'category' 		=> $faker->randomElement(['car', 'scooter']),
			'brand' 		=> $faker->lastName,
			'type'			=> $faker->randomAscii,
			'color' 		=> $faker->colorName,
			'current_place' => $faker->city,
			'serial_number' => $faker->randomAscii,
			'licence_plate' => $faker->randomAscii,
			'distance' 		=> $faker->numberBetween(5,800),
			'date_purchase' => $faker->date('Y-m-d','now'),
			'buying_price' 	=> $faker->randomNumber(4),
			'fuel_level' 	=> $faker->randomNumber(2),
			'fuel_brand' 	=> $faker->randomElement(['diesel', 'essence98', 'essence95']),
		]);

		foreach (range(1,20) as $index) {
			DB::table('booking')->insert([

				'user_id' 			=> $faker->numberBetween(1,20),
				'vehicle_id' 		=> 1,
				'start_date'		=> $faker->date('Y-m-d','now'),
				'end_date' 			=> $faker->date('Y-m-d','now'),
				'state' 			=> $faker->city,
				'booking_price' 	=> $faker->numberBetween(1,100),
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
