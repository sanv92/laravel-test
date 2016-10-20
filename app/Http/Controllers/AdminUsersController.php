<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with([
            'roles' => function ($query) {
                $query->select(['id', 'name', 'created_at', 'updated_at']);
            }
        ])
        ->select(['id', 'name', 'role_id', 'email', 'is_active', 'created_at', 'updated_at'])
        ->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UsersRequest $request)
    {
        if ($file = $request->file('file')) {

            $name = $file->getClientOriginalName();
            $file->move('images', $name);

            $input = $request->all();
            $input['password'] = Hash::make($request->password);
        }

        User::create($input);

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UsersEditRequest $request, $id)
    {
        $user  = User::findOrFail($id);

        $input = $request->all();

        $user->update($input);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        User::findOrFail($id)->delete();

        $request->session()->flash('DELETED_USER', 'User with ID: ' . $id . ' was been deleted!');

        //Session::set('DELETED_USER', 'User with ID: ' . $id . ' was been deleted!');

        return redirect()->route('admin.users.index');
    }

}
