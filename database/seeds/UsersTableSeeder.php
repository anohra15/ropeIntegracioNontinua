<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        'username'=>'cate27',
        'password'=>Hash::make('12345678'),
        'status'=> 'activo',
        'type'=>'OPE',
        'code'=> 'ABC123',
        'attemps' => '0'

       ]);
    }


}