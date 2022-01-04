<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinglePageContrller extends Controller
{
    public function index()
    {
        $title = 'Single page';
        return view('product.single.index' , compact('title'));
    }
}
