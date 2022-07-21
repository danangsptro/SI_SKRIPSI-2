<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'jenis_kelamin' => 'laki-laki',
            'username' => '123456',
            'user_role' => 'admin',
            'kode_user' => '1234',
            'password' => Hash::make('qwerty'),
        ]);
    }
}
