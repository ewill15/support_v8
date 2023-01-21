<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishSeeder extends Seeder
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
            DB::table('dishes')->insert([	        
                'name' => $faker->name,
                'picture' =>  $faker->imageUrl(640, 800, 'cats') ,
                'description' => $faker->freeEmail,
                'price'=>$faker->numberBetween(12,30),
                'available' => $faker->randomElement([true,false]),
                'restaurant_id'=> $faker->numberBetween(1,5),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }  
    }
}
