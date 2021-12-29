<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerGet()
    {
        $title = 'register page';
        return view('auth.register' , compact('title'));
    }
}
