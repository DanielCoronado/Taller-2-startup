<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RolTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TipoRutinaTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(RutinaTableSeeder::class);
        $this->call(RegistroProgresoTableSeeder::class);
        $this->call(ReservaHoraTableSeeder::class);
    }
}
