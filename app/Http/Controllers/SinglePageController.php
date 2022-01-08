<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Product;
use App\Models\Score;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    public function index(Product $product)
    {
        $title = 'Single page';
        $productData = $product->where('id', $product->id)->first();
        Bookmark::getUserBookmark($product->id, auth()->user()->id);
        $likeCount = (new \App\Models\Like)->likeCount($product->id);
        $comments = Comment::groupCommentByParent($product->id)->get();


        return view('product.single.index', compact('title', 'productData', 'likeCount', 'comments'));
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

        $score->score($request, $user_id, $product_id);

        return back();

    }

    public function addComment(Request $request, Comment $comment, Product $product): \Illuminate\Http\RedirectResponse
    {
        $user_id = auth()->user()->id;
        $product_id = $product->id;
        $content = $request['content'];
        $parent_id = $request['parent_comment'];

        // insert data into user table
        $comment->comment($content, $user_id, $product_id , $parent_id);

        return back();

    }
}
