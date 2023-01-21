<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,5) as $index) {
            DB::table('restaurants')->insert([	        
                'name' => $faker->name,
                'phone' =>  $faker->numberBetween(60000000,79999999),
                'email' => $faker->freeEmail,
                'address'=>$faker->address,
                'open_daytime' => $faker->randomElement(['lunes a viernes','sabado']),
                'close_daytime' => $faker->randomElement(['9AM','14PM','20PM','23PM']),
                'user_id'=> $faker->randomElement([1,2]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }            
    }
}
