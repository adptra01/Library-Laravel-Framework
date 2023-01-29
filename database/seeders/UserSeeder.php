<?php

namespace Database\Seeders;

use App\models\User;
use Illuminate\Support\Str;
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
        $data = [
            [
                'noId' => '1234567890',
                'name' => 'testing',
                'email' => 'testing@testing.com',
                'password' => bcrypt('testing'),
                'isAdmin' => true,
                'birthday' => now(),
                'gender' => 1,
                'address' => 'Jln. Testing',
                'telp' => '08978301766',
            ],
            [
                'noId' => '1234567897',
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => bcrypt('password'),
                'isAdmin' => false,
                'birthday' => now(),
                'gender' => 1,
                'address' => 'Jln. user',
                'telp' => '08978301766',
            ]
        ];
        User::insert($data);

        User::factory(10)->create();
    }
}
