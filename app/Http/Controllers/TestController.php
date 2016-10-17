<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {

        $user = null;

        try {

            $statusCode = 200;

            //$user = User::find(3)->role;

            $user = User::with(['role' => function ($query) {
                $query->select(['id', 'name', 'created_at', 'updated_at']);
            }])
            ->select(['id', 'name', 'role_id', 'is_active', 'email'])
            ->where('id', 3)->get();

        } catch (Exception $e) {

            $statusCode = 404;

        } finally {

            return [
                'user'   => $user,
                'status' => $statusCode
            ];

        }

    }

    public function indexRole()
    {
        $role = Role::find(2)->user;

        return $role;
    }

    public function one_to_many_users() {
        $users = Role::find(4)->one_to_many_users;

        return $users;
    }

    public function one_to_many_roles() {
        $roles = User::find(4)->one_to_many_roles;

        return $roles;
    }
}
