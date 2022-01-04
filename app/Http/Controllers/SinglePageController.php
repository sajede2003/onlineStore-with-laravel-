<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Product;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    public function index(Bookmark $bookmark , Request $request ,Product $product)
    {
        $title = 'Single page';
        $productData = $product->where('id' , $product->id)->first();
        Bookmark::getUserBookmark($product->id , auth()->user()->id);

        return view('product.single.index' , compact('title' , 'productData'));
    }

    public function addBookMark(Product $product , Bookmark $bookmark)
    {
        $user_id =auth()->user()->id;
        $product_id = $product->id;
        $result = $bookmark->bookmark($user_id , $product_id);

        if (!$result){
            return back();
        }
        return back();

    }
}
