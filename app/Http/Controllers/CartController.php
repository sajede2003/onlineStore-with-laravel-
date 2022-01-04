<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Dotenv\Validator;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * cart page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function cart()
    {
        $title = 'Cart page';
        $cartData = (session()->get('cart')) ? session()->get('cart') : [];
        return view('product.cart', compact('cartData', 'title'));
    }

    /**
     * add product to cart function
     *
     * @param [type] $product
     * @return void
     */

    public function addToCart(Product $product)
    {


        (session()->has('cart')) ? $cart = session()->get('cart') : $cart = [];


        if (isset($cart[$product->id])) {
            $cart[$product->id]['count'] += 1;
            $cart[$product->id]['sum'] = $cart[$product->id]['count'] * $cart[$product->id]['price'];
        } else {
            $cart[$product->id] = [
                'product_id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'count' => 1,
                'sum' => $product->price,
            ];
        }

        session(['cart' => $cart]);
        return redirect('/cart');
    }



    public static function removeFromCart(Product $product)
    {
        (session()->has('cart')) ? $cart = session()->get('cart') : $cart = [];

        $cart[$product->id]['count'] -= 1;
        $cart[$product->id]['sum'] = $cart[$product->id]['count'] * $cart[$product->id]['price'];

        if ($cart[$product->id]['count']  <= 0) {
            unset( $cart[$product->id]);
        }
        session(['cart' => $cart]);
        return back();

    }

}
