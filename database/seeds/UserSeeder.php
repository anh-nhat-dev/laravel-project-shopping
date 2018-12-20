<?php

use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'Admin',
            'password' => bcrypt('123456'),
            'email' => 'admin@gmail.com',
            'address' => 'Ha Noi',
            'phone' => '123456',
            'level' => 1
        ]);
    }
}
