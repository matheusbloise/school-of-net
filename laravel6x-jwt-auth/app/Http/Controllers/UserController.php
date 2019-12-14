<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id) {
        return response()->json(['status' => true, 'user' => User::find($id)], 200);
    }

    public function index() {
        return response()->json(['status' => true, 'users' => User::get()], 200);
    }
}
