<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'score',
        'product_id',
        'user_id',
    ];

    public function scopeGetProductScore($query , $user_id, $product_id)
    {
        return $query->where('user_id', $user_id)->where('product_id', $product_id);
    }

    public function scopeEdit($query, $user_id , $product_id)
    {
        $query->where('user_id', $user_id)->where('product_id', $product_id);
    }

    public function score($data ,$user_id , $product_id)
    {
        $isScore = $this->getProductScore($user_id , $product_id)->first();
        if (!$isScore) {
            return Score::create([
                'score' => $data->score,
                'user_id'=>$user_id ,
                'product_id'=>$product_id
            ]);
        } else {
            return $this->edit($user_id , $product_id)->update([
                'score' => $data->score
            ]);
        }
    }
}
