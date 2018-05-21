<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol')->insert([
            'descripcion' => 'Secretaria'
        ]);

        DB::table('rol')->insert([
            'descripcion' => 'Entrenador'
        ]);

        DB::table('rol')->insert([
            'descripcion' => 'Cliente'
        ]);
    }
}
