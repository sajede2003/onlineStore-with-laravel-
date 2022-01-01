<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController
{
    public function loginGet(){
        $title = 'login page';
        return view('auth.login' , compact('title'));
    }

    public function loginPost(LoginValidation $request)
    {
        $user = User::where('email', $request['email'])->first();
        if(!$user){
            return redirect('/login')->withErrors([
                'password'=>'email or password is incorrect. please try again.'
            ]);
        }
        $hashedPassword = $user->password;
        if (Hash::check($request['password'] , $hashedPassword)) {
            auth()->login($user);
            return redirect('/');
        }
    }
}