<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supervisors')->insert([

            'username' => 'usuario4z',
            'password' => Hash::make('Z123sn*'),
            'status' => 'activo',
            'type' => 'SUP',
            'code' => 'SUP-4-ABC123',
            'attemps' => '0',
            'name' => 'Tara',
            'lastname' => 'Romero',
            'position' => 'supervisor',

        ]);

        DB::table('operators')->insert([

            'username' => 'usuario5z',
            'password' => Hash::make('Z123sn*'),
            'status' => 'activo',
            'type' => 'OPE',
            'code' => 'OPE-4-ABC123',
            'attemps' => '0',
            'name' => 'Dan',
            'lastname' => 'Romero',
            'position' => 'operador',

        ]);
    }
}
