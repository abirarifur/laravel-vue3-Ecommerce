<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return ['status' => true, 'massege' => 'login sucessfull'];
        }

        return ['status' => false, 'message' => 'login faild'];
    }
    public function logout(Request $request)
        {
            Session::flush();
            // Auth::logout();
            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return ['logout' => true, 'message' => 'logout sucessfull'];
        }
}
