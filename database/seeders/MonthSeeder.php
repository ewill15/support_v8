<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('months')->insert([
            'name' => 'Enero',
            'short_name' => 'ENE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('months')->insert([
            'name' => 'Febrero',
            'short_name'=>'FEB',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('months')->insert([
            'name' => 'Marzo',
            'short_name'=>'MAR',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('months')->insert([
            'name' => 'ABRIL',
            'short_name'=>'ABR',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('months')->insert([
            'name' => 'MAYO',
            'short_name'=>'MAY',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('months')->insert([
            'name' => 'Junio',
            'short_name'=>'JUN',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('months')->insert([
            'name' => 'Julio',
            'short_name'=>'JUL',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('months')->insert([
            'name' => 'Agosto',
            'short_name'=>'AGO',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('months')->insert([
            'name' => 'Septiembre',
            'short_name'=>'SEP',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('months')->insert([
            'name' => 'Octubre',
            'short_name'=>'OCT',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('months')->insert([
            'name' => 'Noviembre',
            'short_name'=>'NOV',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('months')->insert([
            'name' => 'Diciembre',
            'short_name'=>'DIC',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
