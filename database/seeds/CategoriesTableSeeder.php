<?php

use App\Categories;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
                'name' => 'PHP',
            ],
            [
                'name' => 'Ruby',
            ],
            [
                'name' => 'JavaScript',
            ],
            [
                'name' => 'Java',
            ],
            [
                'name' => 'Erlang',
            ],
            [
                'name' => 'Python',
            ],
        ];

        foreach ($categories as $key => $value) {
            Categories::create([
                'name' => $value['name']
            ]);
        }

    }
}
