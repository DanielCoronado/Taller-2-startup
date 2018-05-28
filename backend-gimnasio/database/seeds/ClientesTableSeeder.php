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
        /**DB::table('clientes')->insert([
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
            'edad' => 21
        ]);*/

        DB::table('clientes')->insert([
            'id_usuario' => 2,
            'rut' => '19389833-5',
            'nombre' => 'Felipe',
            'apellidos' => 'Acuña Figueroa',
            'edad' => 21
        ]);
        
        DB::table('clientes')->insert([
            'id_usuario' => 1,
            'rut' => '19743329-6',
            'nombre' => 'Matias',
            'apellidos' => 'Gutierrez Lucó',
            'edad' => 21
        ]);
    }
}
