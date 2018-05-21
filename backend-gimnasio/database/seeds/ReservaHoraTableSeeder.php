<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReservaHoraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reserva_horas')->insert([
            'id_cliente' => 1,
            'hora_inicio' => '13:00:00',
            'hora_termino' => '14:00:00',
            'fecha_reserva' => Carbon::now(),
            'descripcion' => 'reserva de piscina xd'
        ]);

        DB::table('reserva_horas')->insert([
            'id_cliente' => 2,
            'hora_inicio' => '13:00:00',
            'hora_termino' => '14:00:00',
            'fecha_reserva' => Carbon::now(),
            'descripcion' => 'reserva de piscina xd'
        ]);
    }
}
