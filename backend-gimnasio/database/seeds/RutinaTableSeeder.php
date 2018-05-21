<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RutinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rutina')->insert([
            'id_tipo_rutina' => 1,
            'id_cliente' => 1,
            'nombre_rutina' => 'Flexiones',
            'descripcion' => '20 flexiones, 5 repeticiones',
            'fecha_inicio' => Carbon::now(),
            'fecha_termino' => Carbon::now()->addDays(14)
        ]);

        DB::table('rutina')->insert([
            'id_tipo_rutina' => 1,
            'id_cliente' => 2,
            'nombre_rutina' => 'Flexiones',
            'descripcion' => '30 flexiones, 4 repeticiones',
            'fecha_inicio' => Carbon::now(),
            'fecha_termino' => Carbon::now()->addDays(14)
        ]);
    }
}
