<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            'title'=>'Dime Como Donde Y Cuando',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Como Yo Nunca Te He Amado',
            'author'=>'Bon Jovi',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'El Gran Varon',
            'author'=>'Willie Colon',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Tango Del Pecado',
            'author'=>'Calle',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Yo No Se Mañana',
            'author'=>'Luis Enrique',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Tony Dize&Chris Ailer',
            'author'=>'El Doctorado',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'La Guitarra',
            'author'=>'Los Cadillacs',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Sirena',
            'author'=>'Sin Bandera',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'La Vecinita',
            'author'=>'Vico C.',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Que Ganas De No Verte Nunca Mas',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'La Maldita Primavera',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'El Chofer',
            'author'=>'Vicente Fernandez',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Mi Persona Ideal',
            'author'=>'Los Adolescentes',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'No hable mal de ella',
            'author'=>'El Polaco',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Si No Te Hubieras Ido',
            'author'=>'M. Antonio Solis',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Inventame',
            'author'=>'M. Antonio Solis',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);        
        DB::table('songs')->insert([
            'title'=>'Nada hara cambiar mi amor por ti',
            'author'=>'Sergio Deus',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Entre el amor y el odio',
            'author'=>'Americo',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Beso Frances',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Llegamos a La Disco',
            'author'=>'Dady Yanky',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Ser Mejor',
            'author'=>'Robbie Williams',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Ahora Quien',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Se fue mi amor',
            'author'=>'Cumbia King',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'En un corazon viviras',
            'author'=>'Bill Collins',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'El Rey De Los Cielos',
            'author'=>'El Vampiro',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Eres',
            'author'=>'Miriam Hernandez',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Un siglo sin ti',
            'author'=>'Chayanne',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Que levante la mano',
            'author'=>'Americo',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'El amor que perdimos',
            'author'=>'Prince Roy',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Me enamore otra vez',
            'author'=>'Cumbia King',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Mamá Mamá',
            'author'=>'Los Nocheros',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Tortura',
            'author'=>'Shakira - A. Sanz',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Bidi Bidi Bom Bom',
            'author'=>'Selena',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Arrancame la vida',
            'author'=>'Bronco',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Sueño contigo',
            'author'=>'Ilegales',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'El amor',
            'author'=>'La noche',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'No me arrepiento de este amor',
            'author'=>'Gilda',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Hay otro hombre en mi vida',
            'author'=>'Angela Leiva',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Una rosa lo sabe',
            'author'=>'Hermanos Yaipen',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Sere un buen perdedor',
            'author'=>'Franco de vita',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Amiga mi enemiga',
            'author'=>'Banda cañon',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'El amor',
            'author'=>'Tito el bambino',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Cucurucucú',
            'author'=>'Rocio Roncal',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Sin ella',
            'author'=>'Kjarkas',
            'gender'=>'folklore',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Lo que mas',
            'author'=>'Shakira',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Porque te demoras',
            'author'=>'Plan B',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Flor dormida',
            'author'=>'Plan B',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Sobrevivire',
            'author'=>'Celia Cruz',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);        
        DB::table('songs')->insert([
            'title'=>'Como yo te ame',
            'author'=>'Alejandro Fernandez',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Nunca te voy a olvidar',
            'author'=>'Cumbia King',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Recuerdos de amor',
            'author'=>'Victor y Leo',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Muchacha triste',
            'author'=>'Fantasmas del caribe',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Mi pobre corazon',
            'author'=>'Marco Antonio Solis',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'La negra tiene tumbao',
            'author'=>'Celia Cruz',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Sobre las olas',
            'author'=>'The Latin Brothers',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Tu cariñito',
            'author'=>'Puerto ric and power',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Tu Hipocresia',
            'author'=>'Americo',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Hoy tengo ganas de ti',
            'author'=>'Ricardo Montaner',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'La mujer que amas',
            'author'=>'Pedro Fernandez',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Como duelen los labios',
            'author'=>'Mana',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Creo en ti',
            'author'=>'Rei',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Quizas, quizas, quizas',
            'author'=>'Los Panchos',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Amores como el nuestro',
            'author'=>'Jerry Rivera',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Amigo',
            'author'=>'Roberto Carlos',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);       
        DB::table('songs')->insert([
            'title'=>'Por que te vas',
            'author'=>'Jeannet',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Hoy tengo ganas de ti',
            'gender'=>'Clasico',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Perdoname',
            'author'=>'Pepe Aguilar',
            'gender'=>'Mexicana',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Lagrimas',
            'author'=>'Ande Sur',
            'gender'=>'folklore',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Soltero',
            'author'=>'Los verduleros',
            'gender'=>'Cumbia',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Voy a vivir',
            'author'=>'Marc Anthony',
            'gender'=>'Salsa',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Hello',
            'author'=>'Lionel Richie',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Quise',
            'author'=>'Ana Barbara',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Dominao',
            'author'=>'Azul Azul',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Te quiero',
            'author'=>'Andres Calamaro',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'40 y 20',
            'author'=>'Jose Jose',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Anda y ve',
            'author'=>'Jose Jose',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'El amar y el querer',
            'author'=>'Jose Jose',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Volcan',
            'author'=>'Jose Jose',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Gavilan o paloma',
            'author'=>'Jose Jose',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Buenos dias amor',
            'author'=>'Jose Jose',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Tu primera vez',
            'author'=>'Jose Jose',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Piel de azucar',
            'author'=>'Jose Jose',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Yo soy aquel',
            'author'=>'Jose Jose',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Cuidado',
            'author'=>'Jose Jose',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Insaciable amante',
            'author'=>'Jose Jose',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Lo mejor de mi vida',
            'author'=>'Ricardo Montaner',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Volverte a ver',
            'author'=>'Dyango',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Las reglas del juego',
            'author'=>'Dyango',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Corazon Magico',
            'author'=>'Dyango',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Por amor-Hombre feliz',
            'author'=>'Dyango',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'One direction',
            'author'=>'One Way',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Carreteras Mojadas',
            'author'=>'Christian Meyer',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Quiero besarte',
            'author'=>'Prince Royce',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Vivir mi vida',
            'author'=>'Marc Anthony',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Donde vas amor',
            'author'=>'Dyango',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Tu mujer',
            'author'=>'Dyango',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Antes de ti',
            'author'=>'Dyango',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Buenos dias corazon',
            'author'=>'Dyango',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'En este mundo frio',
            'author'=>'Dyango',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Nadie como tu',
            'author'=>'Oreja de Van Gogh',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Chuqiago Marka',
            'author'=>'Kjarkas',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('songs')->insert([
            'title'=>'Adios amor',
            'author'=>'Sartawi',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
