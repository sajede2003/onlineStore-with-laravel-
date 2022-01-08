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


    public function setScore($data ,$user_id , $product_id)
    {
        $isScore = $this->where('user_id', $user_id)->where('product_id', $product_id)->first();

        if (!$isScore) {

            return Score::create([
                'score' => $data->score,
                'user_id'=>$user_id ,
                'product_id'=>$product_id
            ]);

        } else {

            return $this->where('user_id', $user_id)->where('product_id', $product_id)->update([
                'score' => $data->score
            ]);

        }
    }
}
