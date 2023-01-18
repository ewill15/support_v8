<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'Fabrica de chocolates Para Ti',
            'address' => 'Calle Monteagudo s/n',
            'NIT' => '1000063020',
            'phone' => '6455689',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);        
        DB::table('companies')->insert([
            'name' => 'SOLAR Supermercados',
            'address' => 'Camargo #120',
            'NIT'=>'1234567890',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'AGENCIA PIL',
            'address' => 'Av. America esq. Av. G. Rene Moreno',
            'NIT'=>'4294967295',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Rosticeria LUCHO',
            'address' => 'Av. America',
            'NIT'=>'4294967295',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'CHICKEN KINDOM',
            'address' => '',
            'NIT'=>'1009311029',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Hipermaxi',
            'address' => 'Av. Juan de la Rosa - Av. Ballivian',
            'NIT'=>'1028627025',
            'phone' => '',            
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Pollos VIKMAR',
            'address' => 'Av. America',
            'NIT'=>'850160015',
            'phone' => '',            
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'POLLOS CHUY',
            'address' => '',
            'phone' => '',
            'NIT'=>'310864028',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'COURO MODA',
            'address' => 'plazuela colon',
            'NIT'=>'290072021',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Pollos SANTA LUCIA',
            'address' => 'Av. America',
            'NIT'=>'4294967295',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'CINE CENTER',
            'address' => '',
            'NIT'=>'356582025',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'BIMBOM',
            'address' => '',
            'NIT'=>'2669505019',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Las Rieles',
            'address' => '',
            'NIT'=>'2682631015',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'FLOTA BOLIVAR',
            'address' => 'Terminal Cbba',
            'NIT'=>'139241023',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Farmacorp',
            'address' => 'Av. Melchor Perez 1282',
            'type' => 'Sucursal 56',
            'NIT'=>'1015447026',
            'phone' => '4401085',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Pollos WILLYS',
            'address' => '',
            'NIT'=>'294490023',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Agencia PIL Juan de la Rosa',
            'address' => 'Av. Juan de la Rosa 963',
            'NIT'=>'662524811',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Rincon Potosino suc.1',
            'address' => 'Av. America 459',
            'NIT'=>'937910017',
            'phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'KOKO Pollo',
            'address' => 'Av. San Martin 2531',
            'NIT'=>'8019137019',
            'phone' => '4315390',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'SUCREMANTA',
            'address' => 'Espana 654',
            'NIT'=>'3780462018',
            'phone' => '4529722',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Yogen Fruz',
            'address' => 'Ramon Rivero S/N',
            'NIT'=>'224504026',
            'phone' => '4235657',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'FARMAELIAS',
            'address' => 'Av. Libertador Simon Bolivar S/N',
            'type' => 'Sucursal: Tarija',
            'NIT'=>'246828025',
            'phone' => '4253522',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Frankffurt',
            'address' => 'Av. America 407',
            'NIT'=>'305076020',
            'phone' => '4038613',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'PANCHITA',
            'address' => 'Av. San Martin 465',
            'type' => 'Sucursal 3',
            'NIT'=>'206256029',
            'phone' => '4661014',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Fair Play',
            'address' => '25 de Mayo #128',
            'type'=>'Sucursal:25 Mayo',
            'NIT'=>'1024389029',
            'phone' => '4510631',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'KOKO Pollo',
            'address' => 'Av. San Martin 579 casa matriz',
            'NIT'=>'8019137019',
            'phone' => '4315390',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Pollos Shofar',
            'address' => 'Jordan 170',
            'type' => 'Sucursal',
            'NIT'=>'2050307013',
            'phone' => '4510722',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Farmacorp',
            'address' => 'Av. America esq. A. Zamudio',
            'type'=>'Sucursal 42',
            'NIT'=>'1015447026',
            'phone' => '4243256',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('companies')->insert([
            'name' => 'Xanthops',
            'address' => 'Av. Ayacucho esq. Mayor Rocha',
            'phone' => '',
            'area'=>'desarrollo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
