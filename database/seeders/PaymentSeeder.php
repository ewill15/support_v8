<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
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
            DB::table('payments')->insert([
                'service_id' => $faker->numberBetween(1,4),
                'month_id' =>  $faker->numberBetween(1,12),
                'year' => 2022,
                'amount'=>$faker->numberBetween(50,500),
                'user_id'=> $faker->randomElement([1,2]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }  
    }
}
