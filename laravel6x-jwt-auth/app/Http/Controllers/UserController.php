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

    public function store(Request $request) {

        $user = User::create($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]));
        return response()->json(['status' => true, 'users' => $user], 201);
    }
}
