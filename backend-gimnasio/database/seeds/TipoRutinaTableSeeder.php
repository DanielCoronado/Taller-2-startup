<?php

use Illuminate\Database\Seeder;

class TipoRutinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_rutina')->insert([
            'nombre_tipo' => 'Brazo'
        ]);

        DB::table('tipo_rutina')->insert([
            'nombre_tipo' => 'Pierna'
        ]);

        DB::table('tipo_rutina')->insert([
            'nombre_tipo' => 'Abdomen'
        ]);
    }
}
