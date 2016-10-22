<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Posts;
use App\Comment;

//use App\Categories;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::with([
            'user' => function ($query) {
                $query->select(['id', 'name']);
            },
            'categories' => function ($query) {
                $query->select(['id', 'name']);
            }
        ])
        ->select(['id', 'user_id', 'category_id', 'title', 'content', 'created_at', 'updated_at'])
        ->paginate(2);

        return view('posts.index', compact('posts'));
    }

    public function show($id) {

        $post = Posts::with([
            'comments' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'comments.user'  => function ($query) {
                //$query->select('*');
            }
        ])
        //->select('*')
        ->where('id', $id)
        ->firstOrFail();

        return view('posts.show', compact('post'));
    }
}


/*


                $query::with([
                    'user' => function ($query) {
                        $query->select('*');
                    }
                ])->select('*')->orderBy('created_at', 'desc');


$query::with([
    'user' => function ($query) {
        $query->select('*');
    }
])->select(['id', 'name']);

*/
