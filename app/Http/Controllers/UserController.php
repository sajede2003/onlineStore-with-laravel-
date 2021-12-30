<?php

namespace App\Http\Controllers;

use App\Http\Requests\Validation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerGet()
    {
        $title = 'register page';
        return view('auth.register' , compact('title'));
    }

    public function registerPost(Validation $request)
    {
        $hashed = Hash::make('password', [
            'memory' => 1024,
            'time' => 2,
            'threads' => 2,
        ]);

        User::create([
           'name'=>$request['name'],
           'phone_number'=>$request['phone_number'],
            'email'=>$request['email'],
            'password'=>$hashed
        ]);

        return redirect('/login');
    }

    public function loginGet(){
        $title = 'login page';
        return view('auth.login' , compact('title'));
    }

    public function loginPost(Request $request)
    {

        $user = User::where('email', $request['email'])->first();
        $hashedPassword = $user -> password;

        if (Hash::check($request['password'] , $hashedPassword)) {
            session()->put('user_name' , $user->name);
            session()->put('user' , $user->id);
            session()->put('is_login' , true);
            return redirect('/');
        }else{
            return redirect('/login');
        }

    }
}
