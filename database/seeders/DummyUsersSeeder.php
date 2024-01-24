<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Bang Admin',
                'email'=>'admin@admin.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'Bang User',
                'email'=>'user@user.com',
                'role'=>'user',
                'password'=>bcrypt('123456')
            ]
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
