<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'product_id',
        'comment_parent'
    ];

    public function comment($content, $user_id , $product_id , $parent_id)
    {
        Comment::create([
            'content' => $content,
            'user_id'=>$user_id ,
            'product_id'=>$product_id,
            'comment_parent'=>$parent_id
            ]);
    }

    /**
     * this function grouping comment by parents
     *
     * @param [type] $productId
     * @return $array
     */
    public function scopeGroupCommentByParent( $query ,$product_id)
    {
//        $comments = User::rightJoin('comments', 'users.id', '=', 'comments.user_id')
//            ->where('comments.product_id' , $product_id)
//            ->get();

        $comments = $query->where('product_id' , $product_id)->with('user');


        return $comments;

    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
