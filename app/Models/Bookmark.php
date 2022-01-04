<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\isNull;

class Bookmark extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function scopeGetUserBookmark($query , $product_id, $user_id)
    {
        return $query->where('product_id' , $product_id)->where('user_id' , $user_id);
    }

    public static function deleteBookmark($product_id , $user_id)
    {
        Bookmark::where('product_id' , $product_id)->where('user_id' , $user_id)->delete();
    }

    public function bookmark($user_id , $product_id)
    {
        $isChecked = Bookmark::getUserBookmark($product_id , $user_id)->first();

        if(!$isChecked){
            return Bookmark::create([
                'user_id'=>$user_id ,
                'product_id'=>$product_id
            ]);
        }else{
            return Bookmark::deleteBookmark($product_id , $user_id);
        }


    }
}
