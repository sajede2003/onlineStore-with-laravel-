<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        if (auth()->user()){
            $cartData = (session()->get('cart'))?session()->get('cart'):[];
            return view('product.cart' , compact('cartData'));
        }
        return redirect('/login');
    }
}
