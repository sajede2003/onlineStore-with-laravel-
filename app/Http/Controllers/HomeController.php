<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $title='home page';
        return view('index' , compact('title'));
    }

    public function logOut()
    {
        session()->flush();
        return redirect('/');
    }

}
