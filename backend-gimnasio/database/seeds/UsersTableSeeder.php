<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Felipe Acuña',
            'email' => 'f.acuna08@ufromail.cl',
            'password' => bcrypt('1234'),
        ]);

        DB::table('users')->insert([
            'name' => 'Daniel Coronado',
            'email' => 'd.coronado01@ufromail.cl',
            'password' => bcrypt('1234'),
        ]);
    }
}
