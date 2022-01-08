<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Like;
use App\Models\Product;
use App\Models\Score;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    public function index(Product $product)
    {
        $title = 'Single page';

        //for like
        $likeCount = $product->loadCount('likes');

        // for comment
        $comments = $product->comments()->with('user')->get();

        return view('product.single.index', compact('title', 'product', 'likeCount', 'comments'));
    }

    public function addBookMark(Product $product, Bookmark $bookmark): \Illuminate\Http\RedirectResponse
    {
        $user_id = auth()->user()->id;
        $product_id = $product->id;
        $bookmark->bookmark($user_id, $product_id);

        return back();
    }

    public function addLike(Product $product, Like $like): \Illuminate\Http\RedirectResponse
    {
        $user_id = auth()->user()->id;
        $product_id = $product->id;

        $like->like($user_id, $product_id);

        return back();
    }

    public function addScore(Request $request, Product $product, Score $score)
    {
        $user_id = auth()->user()->id;
        $product_id = $product->id;

        $score->setScore($request, $user_id, $product_id);

        return back();
    }

    public function addComment(Request $request, Product $product): \Illuminate\Http\RedirectResponse
    {
        $user_id = auth()->user()->id;
        $content = $request['content'];
        $parent_id = $request['parent_comment'];

        // insert data into user table
        $product->comments()->create([
            'content' => $content,
            'user_id' => $user_id,
            'comment_parent' => $parent_id
        ]);

        return back();
    }
}
