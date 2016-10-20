<?php

use App\Posts;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'user_id'     => 1,
                'category_id' => 1,
                //'photo_id'    => 1,
                'title'       => 'Post number #1',
                'content'     => '#1 Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test'
            ],
            [
                'user_id'     => 1,
                'category_id' => 1,
                //'photo_id'    => 2,
                'title'       => 'Post number #2',
                'content'     => '#2 Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test'
            ],
            [
                'user_id'     => 1,
                'category_id' => 2,
                //'photo_id'    => 3,
                'title'       => 'Post number #3',
                'content'     => '#3 Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test'
            ],
            [
                'user_id'     => 1,
                'category_id' => 2,
                //'photo_id'    => 4,
                'title'       => 'Post number #4',
                'content'     => '#4 Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test'
            ],
            [
                'user_id'     => 1,
                'category_id' => 2,
                //'photo_id'    => 5,
                'title'       => 'Post number #5',
                'content'     => '#5 Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test'
            ],
            [
                'user_id'     => 2,
                'category_id' => 1,
                //'photo_id'    => 6,
                'title'       => 'Post number #6',
                'content'     => '#6 Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test'
            ],
            [
                'user_id'     => 2,
                'category_id' => 1,
                //'photo_id'    => 7,
                'title'       => 'Post number #7',
                'content'     => '#7 Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test'
            ],
            [
                'user_id'     => 3,
                'category_id' => 1,
                //'photo_id'    => 8,
                'title'       => 'Post number #8',
                'content'     => '#8 Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test'
            ],
            [
                'user_id'     => 4,
                'category_id' => 1,
                //'photo_id'    => 9,
                'title'       => 'Post number #9',
                'content'     => '#9 Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test'
            ],

        ];

        foreach ($posts as $key => $value) {
            Posts::create([
                'user_id'     => $value['user_id'],
                'category_id' => $value['category_id'],
                //'photo_id'    => $value['photo_id'],
                'title'       => $value['title'],
                'content'     => $value['content']
            ]);
        }

    }
}
