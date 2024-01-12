<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loggedInfo(Request $request)
    {
        return $request->user();
    }

    public function userList(Request $request)
    {
        // return $request->user()->role->permission;
    }

    public function userCreate(Request $request)
    {
        User::create([
            'name' => $request->name,
            "email"  => $request->email,
            "password" => bcrypt('password'),
            'role_id' => 1
        ]);

        return response(['message' => 'User created successfully!']);
    }
}
