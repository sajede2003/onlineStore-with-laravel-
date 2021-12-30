<?php

namespace App\Http\Controllers;

class ProductController extends  Controller
{
    public function index()
    {
        $title = 'Product List';
        return view('product.product' , compact('title'));
    }
}