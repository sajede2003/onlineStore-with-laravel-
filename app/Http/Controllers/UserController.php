<?php

namespace App\Http\Controllers;

use App\Http\Requests\Validation;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Nette\Utils\Validators;

class UserController extends Controller
{
    public function registerGet()
    {
        $title = 'register page';
        return view('auth.register' , compact('title'));
    }

    public function registerPost(Validation $request)
    {

        User::create([
           'name'=>$validate_data['name'],
           'phone_number'=>$validate_data['phone_number'],
            'email'=>$validate_data['email'],
            'password'=>$validate_data['password']
        ]);

    }

    public function loginGet(){
        $title = 'login page';

        return view('auth.login' , compact('title'));
    }
}
