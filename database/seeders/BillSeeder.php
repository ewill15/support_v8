<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            'invoice_number' => 8053,
            'control_code' => '8C-60-A8-CD-E1',
            'date' => '2018-06-30',
            'description' => 'Productos varios',
            'price' => '30',
            'company_id' => '3',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>5241,
            'control_code' => '55-DF-30-C4',
            'date' => '2018-05-29',
            'description' => 'Pollo economico',
            'price' => '17',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>9631,
            'control_code' => '59-4F-BD-43',
            'date' => '2018-07-28',
            'description' => 'Yogurt soya x5',
            'price' => '30',
            'company_id' => '3',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>4214,
            'control_code' => 'A7-67-1E-64',
            'date' => '2018-04-28',
            'description' => 'yogurt frutado x5',
            'price' => '19',
            'company_id' => '3',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>36310,
            'control_code' => 'E5-90-8E-A5',
            'date' => '2018-07-27',
            'description' => '1/4 Pollo',
            'price' => '23',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>52680,
            'control_code' => 'B1-F4-4D-F8',
            'date' => '2018-08-26',
            'description' => '1/4 Pollo',
            'price' => '23',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>47445,
            'control_code' => 'E5-E0-D8-F1-66',
            'date' => '2018-05-26',
            'description' => 'Queen menu + papa extra',
            'price' => '37',
            'company_id' => '5',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>13027,
            'control_code' => '95-AC-BF-C9-F4',
            'date' => '2018-04-26',
            'description' => 'Productos varios',
            'price' => '219.60',
            'company_id' => '6',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>5414,
            'control_code' => 'E7-10-42-67-81',
            'date' => '2018-11-24',
            'description' => 'Pollo economico',
            'price' => '17',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>11578,
            'control_code' => 'EF-AC-DC-A6',
            'date' => '2018-12-23',
            'description' => '1/4 Pollo',
            'price' => '22',
            'company_id' => '7',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>2049,
            'control_code' => '1B-54-02-49',
            'date' => '2018-05-23',
            'description' => 'Pollo economico',
            'price' => '17',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>2035,
            'control_code' => '0C-AB-DA-4C-BD',
            'date' => '2018-08-22',
            'description' => 'Pollo economico x2',
            'price' => '34',
            'company_id' => '7',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>5241,
            'control_code' => 'B2-66-7C-4A',
            'date' => '2018-07-21',
            'description' => 'Combo X2',
            'price' => '59',
            'company_id' => '8',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>2045,
            'control_code' => '24-BD-5A-10-A4',
            'date' => '2018-11-18',
            'description' => '1/4 Pollo',
            'price' => '23',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>10998,
            'control_code' => 'E9-D5-92-3F',
            'date' => '2018-12-16',
            'description' => '1/4 Pollo',
            'price' => '22',
            'company_id' => '7',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>1901,
            'control_code' => '32-B8-0F-2A-73',
            'date' => '2018-12-15',
            'description' => 'Zapato Ferracini',
            'price' => '504',
            'company_id' => '9',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>216,
            'control_code' => '64-AF-4C-BD',
            'date' => '2018-10-14',
            'description' => '1/4 Pollo + vaso mocochinchi',
            'price' => '27',
            'company_id' => '10',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>90365,
            'control_code' => 'D2-0D-30-09-F0',
            'date' => '2018-09-14',
            'description' => 'Entrada cine x2',
            'price' => '80',
            'company_id' => '11',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>19036,
            'control_code' => 'BC-CA-AB-97',
            'date' => '2018-11-11',
            'description' => 'Shampoo Tio Nacho',
            'price' => '43',
            'company_id' => '6',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>29267,
            'control_code' => 'A1-79-9D-96',
            'date' => '2018-10-11',
            'description' => 'Productos varios',
            'price' => '110.20',
            'company_id' => '6',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>4618,
            'control_code' => 'CB-1F-06-20-AF',
            'date' => '2018-09-12',
            'description' => '1/4 Pollo + guarnicion',
            'price' => '24',
            'company_id' => '10',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>12764,
            'control_code' => '46-0B-61-E8-44',
            'date' => '2018-08-10',
            'description' => 'Milanesa carne + jugo durazno',
            'price' => '27',
            'company_id' => '12',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>21355,
            'control_code' => 'D5-CE-97-C2-78',
            'date' => '2018-08-10',
            'description' => 'Mixto',
            'price' => '43',
            'company_id' => '13',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>5556,
            'control_code' => '5F-19-08-6A-02',
            'date' => '2018-08-07',
            'description' => 'Productos varios',
            'price' => '152.20',
            'company_id' => '6',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>90755,
            'control_code' => 'CB-9B-FA-B1-99',
            'date' => '2018-08-05',
            'description' => 'Pollo economico',
            'price' => '17',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>12495,
            'control_code' => '1A-06-77-AF',
            'date' => '2018-07-10',
            'description' => 'Pollo plancha + jugo durazno',
            'price' => '27',
            'company_id' => '12',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>144800,
            'control_code' => 'C8-AE-13-54',
            'date' => '2018-07-10',
            'description' => 'Pasaje cbba-lpz',
            'price' => '50',
            'company_id' => '14',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>409,
            'control_code' => '5C-E9-8A-07-CD',
            'date' => '2018-07-09',
            'description' => 'Productos varios',
            'price' => '13.5',
            'company_id' => '3',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>42300,
            'control_code' => '17-47-78-3F',
            'date' => '2018-07-08',
            'description' => 'Pollo eco + 1/4 Pollo',
            'price' => '40',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>58826,
            'control_code' => '82-0E-E7-C8-D4',
            'date' => '2018-07-07',
            'description' => 'Domper digest x6',
            'price' => '15.36',
            'company_id' => '15',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>3011,
            'control_code' => 'F7-CC-2C-86-F6',
            'date' => '2018-07-07',
            'description' => 'Domper digest x4',
            'price' => '10.24',
            'company_id' => '10.24',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>18589,
            'control_code' => '10-EA-DF-2A-0C',
            'date' => '2018-06-05',
            'description' => 'Productos varios',
            'price' => '25',
            'company_id' => '6',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>7141,
            'control_code' => '9C-C1-93-19',
            'date' => '2018-02-06',
            'description' => 'Varios',
            'price' => '89',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>4580,
            'control_code' => '45-CD-CD-2B-1C',
            'date' => '2018-01-12',
            'description' => '1/4 Pollo',
            'price' => '24',
            'company_id' => '16',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>14305,
            'control_code' => 'C3-81-BC-F9',
            'date' => '2018-01-09',
            'description' => 'Productos varios',
            'price' => '80.30',
            'company_id' => '15',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>1110,
            'control_code' => '2F-10-17-D1-F9',
            'date' => '2018-01-09',
            'description' => 'Pollo X2 + chicha morada',
            'price' => '49',
            'company_id' => '16',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>34103,
            'control_code' => '3E-10-5A-29-7C',
            'date' => '2019-01-19',
            'description' => '1/4 Pollo',
            'price' => '23',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>13105,
            'control_code' => 'B8-E5-86-C5',
            'date' => '2019-01-12',
            'description' => '1/4 Pollo',
            'price' => '22',
            'company_id' => '7',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>580,
            'control_code' => '44-73-3A-49-70',
            'date' => '2019-01-25',
            'description' => 'Leche de soya saborizada x3, agua 5L, yogurt x6',
            'price' => '32.5',
            'company_id' => '3',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>14433,
            'control_code' => '0B-BD-CF-3E-0C',
            'date' => '2019-01-27',
            'description' => '1/4 Pollo',
            'price' => '22',
            'company_id' => '7',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>16772,
            'control_code' => '00-00-00-00',
            'date' => '2019-02-02',
            'description' => 'Salteñas x3',
            'price' => '21',
            'company_id' => '16',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>4376,
            'control_code' => '36-FF-1A-8C-E8',
            'date' => '2019-06-09',
            'description' => 'Duo Spiedo + vaso limonada',
            'price' => '20.50',
            'company_id' => '19',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>931,
            'control_code' => 'A5-EB-AE-14',
            'date' => '2019-02-15',
            'description' => 'Chicolac x10 + Leche en polveo + agua + yogurt',
            'price' => '64.70',
            'company_id' => '17',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>1855,
            'control_code' => '01-B5-03-49',
            'date' => '2019-02-17',
            'description' => '1/4 Pollo',
            'price' => '22',
            'company_id' => '7',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>29967,
            'control_code' => 'AF-AO-2D-77-BC',
            'date' => '2019-03-12',
            'description' => 'Agua VITAL',
            'price' => '15',
            'company_id' => '6',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>64923,
            'control_code' => '01-B8-B3-66-D2',
            'date' => '2019-03-29',
            'description' => '1/4 Pollo',
            'price' => '23',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>52654,
            'control_code' => 'CB-97-FF-62',
            'date' => '2019-02-26',
            'description' => '1/4 Pollo',
            'price' => '23',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>14433,
            'control_code' => '0B-BD-CF-3E-0C',
            'date' => '2019-01-07',
            'description' => '1/4 Pollo',
            'price' => '22',
            'company_id' => '7',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>16086,
            'control_code' => '00-00-00-00',
            'date' => '2019-03-30',
            'description' => 'Salteñas x3',
            'price' => '21',
            'company_id' => '18',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>23561,
            'control_code' => '00-00-00-00',
            'date' => '2019-03-30',
            'description' => 'Salteñas x3',
            'price' => '18',
            'company_id' => '20',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>8002,
            'control_code' => '7C-15-50-74',
            'date' => '2019-06-09',
            'description' => 'Helado de frutilla, papaya y melon',
            'price' => '30',
            'company_id' => '21',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>4127,
            'control_code' => '1C-F8-79-1A',
            'date' => '2019-03-16',
            'description' => '1/4 Pollo',
            'price' => '22',
            'company_id' => '7',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>29311,
            'control_code' => '3F-95-68-EA',
            'date' => '2019-06-09',
            'description' => 'Propoleo extracto 20 ml',
            'price' => '18.4',
            'company_id' => '22',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>64923,
            'control_code' => '01-B8-B3-66-D2',
            'date' => '2019-03-24',
            'description' => '1/4 Pollo',
            'price' => '23',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>31902,
            'control_code' => '5D-79-2C-A5-27',
            'date' => '2019-03-24',
            'description' => 'Domper digest 500mg x4',
            'price' => '10',
            'company_id' => '22',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>3654,
            'control_code' => 'B2-EF-A5-DA',
            'date' => '2019-03-10',
            'description' => '1/4 Pollo',
            'price' => '22',
            'company_id' => '7',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>4720,
            'control_code' => 'D7-02-B9-FF',
            'date' => '2019-05-26',
            'description' => 'Silpancho + sopa mani',
            'price' => '27',
            'company_id' => '24',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>48445,
            'control_code' => 'B7-9A-4C-D7-02',
            'date' => '2019-05-06',
            'description' => 'HEPAGON 150mg x2 + dexamino x2',
            'price' => '87',
            'company_id' => '22',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>5085,
            'control_code' => 'D0-4D-52-FD',
            'date' => '2019-06-08',
            'description' => '1/4 Pollo',
            'price' => '26',
            'company_id' => '16',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>7358,
            'control_code' => '23-F2-2A-B3',
            'date' => '2019-06-09',
            'description' => 'Silpancho mediano + sopa de mani',
            'price' => '24',
            'company_id' => '24',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>17935,
            'control_code' => '42-85-65-0D-55',
            'date' => '2019-06-10',
            'description' => '1/4 Pollo',
            'price' => '23',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>609,
            'control_code' => '42-F0-82-86',
            'date' => '2019-06-08',
            'description' => 'Zapatilla NIKE',
            'price' => '650',
            'company_id' => '13',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>7152,
            'control_code' => '2E-A0-2B-E8-F7',
            'date' => '2019-06-17',
            'description' => '1/4 Pollo',
            'price' => '23',
            'company_id' => '25',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>12681,
            'control_code' => 'F0-50-80-80-5E',
            'date' => '2019-05-25',
            'description' => '1/4 Pollo',
            'price' => '22',
            'company_id' => '7',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>15082,
            'control_code' => 'FF-BB-7C-53-75',
            'date' => '2019-06-15',
            'description' => '1/4 Pollo',
            'price' => '22',
            'company_id' => '7',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>21347,
            'control_code' => '06-17-A1-39',
            'date' => '2019-06-18',
            'description' => 'Tio Nacho x1 + yogurt PIL x2',
            'price' => '57',
            'company_id' => '6',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>23070,
            'control_code' => 'FF-2B-14-72-C1',
            'date' => '2019-06-29',
            'description' => 'Pan arabe X2',
            'price' => '11.6',
            'company_id' => '6',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>40609,
            'control_code' => 'E2-D9-44-4B-CA',
            'date' => '2019-06-29',
            'description' => 'Economico Duo',
            'price' => '18',
            'company_id' => '26',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>23744,
            'control_code' => '3C-19-CD-17-31',
            'date' => '2019-07-06',
            'description' => 'Pollo economico x2(34) + del valle litro(12)',
            'price' => '46',
            'company_id' => '27',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>5660,
            'control_code' => '61-32-BC-E3',
            'date' => '2019-07-02',
            'description' => 'Dolo neurobion x10',
            'price' => '26.5',
            'company_id' => '1',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>12745,
            'control_code' => '5F-5C-01-5E',
            'date' => '2019-07-07',
            'description' => 'Cabañitas de Pollo 5 Pzas',
            'price' => '27',
            'company_id' => '24',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>19086,
            'control_code' => '00-00-00-00',
            'date' => '2019-07-07',
            'description' => 'salteñas x3',
            'price' => '21',
            'company_id' => '18',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>9018,
            'control_code' => '57-A7-4B-B9-F0',
            'date' => '2019-07-13',
            'description' => '1/4 Pollo',
            'price' => '24',
            'company_id' => '10',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>37680,
            'control_code' => '1E-B-72-56',
            'date' => '2019-07-20',
            'description' => '1/4 Pollo',
            'price' => '23',
            'company_id' => '4',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bills')->insert([
            'invoice_number' =>21619,
            'control_code' => 'CB-19-B8-C0',
            'date' => '2019-06-26',
            'description' => '1/4 Pollo + Pollo ECO + DEL VALLE 1L',
            'price' => '52',
            'company_id' => '27',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
