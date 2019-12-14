<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $credentials = $this->credentials($request);

        $token = auth()->attempt($credentials);
        return $this->responseToken($token);
    }

    public function responseToken($token)
    {
        return $token ? ['access_token' => $token] :
            response()->json([
            'error' => Lang::get('auth.failed')
        ], 400);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([], 204);
    }

}
