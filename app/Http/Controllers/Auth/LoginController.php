<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController
{
    public function get()
    {
        $title = 'login page';
        return view('auth.login', compact('title'));
    }

    public function post(LoginRequest $request)
    {
        $user = User::where('email', $request['email'])->first();

        if ($user && Hash::check($request['password'], $user->password)) {
            auth()->login($user);
            return redirect('/');
        }

        return redirect('/login')->withErrors([
            'password' => 'email or password is incorrect. please try again.'
        ])->withInput();

    }
}