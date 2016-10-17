<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'name' => 'Sander',
                'role_id' => 1,
                'is_active' => true,
                'email' => 'sander@gmail.com',
                'password' => '111'
            ],
            [
                'name' => 'Alex',
                'role_id' => 1,
                'is_active' => false,
                'email' => 'alex@gmail.com',
                'password' => '222'
            ],
            [
                'name' => 'Oliver',
                'role_id' => 2,
                'is_active' => true,
                'email' => 'oliver@gmail.com',
                'password' => '333'
            ],
            [
                'name' => 'Jon',
                'role_id' => 1,
                'is_active' => true,
                'email' => 'jon@gmail.com',
                'password' => '444'
            ],
            [
                'name' => 'Sara',
                'role_id' => 1,
                'is_active' => true,
                'email' => 'sara@gmail.com',
                'password' => '555'
            ]
        ];

        foreach ($categories as $key => $value) {
            User::create([
                'name'      => $value['name'],
                'role_id'   => $value['role_id'],
                'is_active' => $value['is_active'],
                'email'     => $value['email'],
                'password'  => Hash::make($value['password'])
            ]);
        }

    }
}
