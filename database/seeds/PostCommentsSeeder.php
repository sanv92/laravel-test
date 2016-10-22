<?php

use App\Comment;
use Illuminate\Database\Seeder;

class PostCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $comments = [
            [
                'post_id'     => 1,
                'user_id'     => 1,
                'is_active'   => true,
                'content'     => '#1 Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment'
            ],
            [
                'post_id'     => 1,
                'user_id'     => 2,
                'is_active'   => true,
                'content'     => '#2 Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment'
            ],
            [
                'post_id'     => 1,
                'user_id'     => 1,
                'is_active'   => true,
                'content'     => '#3 Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment'
            ],

            [
                'post_id'     => 2,
                'user_id'     => 3,
                'is_active'   => true,
                'content'     => '#1 Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment'
            ],
            [
                'post_id'     => 2,
                'user_id'     => 2,
                'is_active'   => true,
                'content'     => '#2 Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment'
            ],
            [
                'post_id'     => 2,
                'user_id'     => 3,
                'is_active'   => true,
                'content'     => '#3 Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment Comment'
            ],
        ];

        foreach ($comments as $key => $value) {
            Comment::create([
                'post_id'     => $value['post_id'],
                'user_id'     => $value['user_id'],
                'is_active'   => $value['is_active'],
                'content'     => $value['content']
            ]);
        }

    }
}
