<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    public function index(Product $product)
    {
        $title = 'Single page';
        $productData = $product->where('id' , $product->id)->first();
        Bookmark::getUserBookmark($product->id , auth()->user()->id);

        $likeCount = (new \App\Models\Like)->likeCount($product->id);

        return view('product.single.index' , compact('title' , 'productData' , 'likeCount'));
    }



    public function addBookMark(Product $product , Bookmark $bookmark): \Illuminate\Http\RedirectResponse
    {
        $user_id =auth()->user()->id;
        $product_id = $product->id;
        $bookmark->bookmark($user_id , $product_id);

        return back();

    }

    public function addLike(Product $product , Like  $like): \Illuminate\Http\RedirectResponse
    {
        $user_id =auth()->user()->id;
        $product_id = $product->id;

        $like->like($user_id , $product_id);

        return back();
    }
}
