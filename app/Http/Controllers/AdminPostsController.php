<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Categories;

//use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
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
        ->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostsCreateRequest $request)
    {
        $input = $request->all();

        $user  = Auth::user();

        //var_dump('$input: ', $input);
        //exit;

        $user->posts()->create($input);

/*        $user->posts()->create([
            'title'   => '',
            'user_id' => '',
            'category_id' => '',
            'title' => '',
            'content' => ''
        ]);*/

        //User::create($input);

        return redirect()->route('admin.posts.index');

        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post       = Posts::findOrFail($id);
        $categories = Categories::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $user  = Auth::user();

        $user->posts()->where('id', $id)->first()->update($input);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Posts::findOrFail($id)->delete();

        $request->session()->flash('DELETED_POST', 'Post with ID: ' . $id . ' was been deleted!');

        return redirect()->route('admin.posts.index');
    }
}
