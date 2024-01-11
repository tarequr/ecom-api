<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loggedInfo(Request $request)
    {
        return $request->user();
    }

    public function userList(Request $request)
    {
        return "Hello";
    }
}
