<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterValidation;
use App\Models\User;

class RegisterController
{
    public function registerGet()
    {
        $title = 'register page';
        return view('auth.register' , compact('title'));
    }

    public function registerPost(RegisterValidation $request)
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