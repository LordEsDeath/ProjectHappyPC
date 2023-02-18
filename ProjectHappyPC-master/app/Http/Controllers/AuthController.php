<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


use Auth;//сервис аутентификации

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('start');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        return redirect('login')->with('error', 'Упс! Вы ввели неверные учётные данные');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
