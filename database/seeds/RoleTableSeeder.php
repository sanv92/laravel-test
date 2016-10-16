<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
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
                'name' => 'administrator',
            ],
            [
                'name' => 'moderator'
            ],
            [
                'name' => 'vip'
            ],
            [
                'name' => 'user'
            ],
            [
                'name' => 'guest'
            ],
        ];

        foreach ($categories as $key => $value) {
            Role::create([
                'name'      => $value['name']
            ]);
        }

    }
}
