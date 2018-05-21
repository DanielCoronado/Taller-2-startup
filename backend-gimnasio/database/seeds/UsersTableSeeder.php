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
            'email' => 'm.gutierrez06@ufromail.cl',
            'password' => bcrypt('1234'),
            'id_rol' => 1
        ]);

        DB::table('users')->insert([
            'email' => 'f.acuna08@ufromail.cl',
            'password' => bcrypt('1234'),
            'id_rol' => 2
        ]);

        DB::table('users')->insert([
            'email' => 'd.coronado01@ufromail.cl',
            'password' => bcrypt('1234'),
            'id_rol' => 3
        ]);

        DB::table('users')->insert([
            'email' => 'm.pinilla03@ufromail.cl',
            'password' => bcrypt('1234'),
            'id_rol' => 3
        ]);
    }
}
