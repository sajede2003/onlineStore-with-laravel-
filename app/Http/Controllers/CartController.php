<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;


class CartController extends Controller
{
    /**
     * cart page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|RedirectResponse|\Illuminate\Routing\Redirector
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
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     *
     */

    public function addToCart(Product $product)
    {
        $cart = self::hasCartSession();

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

    /**
     * @param Product $product
     * @return RedirectResponse
     */

    public static function removeFromCart(Product $product)
    {
        $cart = self::hasCartSession();

        $cart[$product->id]['count'] -= 1;
        $cart[$product->id]['sum'] = $cart[$product->id]['count'] * $cart[$product->id]['price'];

        if ($cart[$product->id]['count']  <= 0) {
            unset( $cart[$product->id]);
        }
        session(['cart' => $cart]);
        return back();

    }

    public static function hasCartSession()
    {
        return (session()->has('cart')) ? session()->get('cart') : [];
    }
}
