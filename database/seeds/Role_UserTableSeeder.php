<?php

use Illuminate\Database\Seeder;

class Role_UserTableSeeder extends Seeder
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
                'role_id' => 1,
                'user_id' => 1
            ],
            [
                'role_id' => 2,
                'user_id' => 5
            ],
            [
                'role_id' => 3,
                'user_id' => 4
            ],
            [
                'role_id' => 4,
                'user_id' => 3
            ],
            [
                'role_id' => 5,
                'user_id' => 2
            ],
        ];

        foreach ($categories as $key => $value) {
            $role_user = [
                'role_id' => $value['role_id'],
                'user_id' => $value['user_id']
            ];

            DB::table('role_user')->insert($role_user);
        }
    }
}
