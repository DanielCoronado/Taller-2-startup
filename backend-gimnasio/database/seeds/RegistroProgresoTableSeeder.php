<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RegistroProgresoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registro_progreso')->insert([
            'id_cliente' => 1,
            'altura' => 1.75,
            'peso' => 85.5,
            'imc' => 27.9183,
            'fecha_registro' => Carbon::now()
        ]);

        DB::table('registro_progreso')->insert([
            'id_cliente' => 2,
            'altura' => 1.73,
            'peso' => 87,
            'imc' => 29.0687,
            'fecha_registro' => Carbon::now()
        ]);
    }
}
