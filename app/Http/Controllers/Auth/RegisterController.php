<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController
{
    public function get()
    {
        $title = 'register page';
        return view('auth.register' , compact('title'));
    }

    public function post(RegisterRequest $request)
    {
        User::create([
            'name'=>$request->name,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'password'=> bcrypt($request->password)
        ]);

        return redirect('/login');
    }
}