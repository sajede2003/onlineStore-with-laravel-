<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function getUserLiked($userId, $productId)
    {
        return Like::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
    }

    public function disLike($userId, $productId)
    {
        Like::where('user_id', $userId)->where('product_id', $productId)->delete();
    }

    public function like($user_id, $product_id)
    {

        // is user like
        $isLike = $this->getUserLiked($user_id, $product_id);

        // check for is user like the product
        if (! $isLike) {
            return $this->create([
                'user_id' => $user_id,
                'product_id' => $product_id
            ]);
        } else {
            return $this->disLike($user_id, $product_id);
        }

    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
