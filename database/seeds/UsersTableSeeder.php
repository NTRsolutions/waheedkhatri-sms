<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
            [
            'name' => 'Amir Shahzad',
            'type' => 'admin',
            'email' => 'officezam@gmail.com',
            'address' => 'Al-madin Electric Store Bata Choke Gulgasht colony Multan',
            'phone' => '+923007272332',
            'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Admin',
                'type' => 'admin',
                'email' => 'admin@gmail.com',
                'address' => 'USA',
                'phone' => '+923007272332',
                'password' => bcrypt('pass2word'),
            ]
        ]);
    }
}
