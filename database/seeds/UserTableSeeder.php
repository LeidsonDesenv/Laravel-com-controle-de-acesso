<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Leidson',
            'email' => 'leidson@teste.com',
            'password' =>  bcrypt('secret01')
        ]);
        DB::table('users')->insert([
            'name' => 'Usuario2',
            'email' => 'user2@teste.com',
            'password' =>  bcrypt('secret01')
        ]);
    }
}
