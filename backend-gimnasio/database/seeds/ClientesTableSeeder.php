<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'id_usuario' => 3,
            'rut' => '18504489-0',
            'nombre' => 'Daniel',
            'apellidos' => 'Coronado Mendoza',
            'edad' => 24
        ]);

        DB::table('clientes')->insert([
            'id_usuario' => 4,
            'rut' => '19234456-5',
            'nombre' => 'Marcos',
            'apellidos' => 'Pinilla Martinez',
            'edad' => 20
        ]);
    }
}
