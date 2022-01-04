<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmarks';
    public function getUserBookmark($product_id, $user_id)
    {
        return $this->table->where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();
    }

    public function deleteBookmark($product_id , $user_id)
    {
        $this->table->where('product_id' , $product_id)->where('user_id' , $user_id)->delete();
    }

    public function bookmark($data , $user_id , $product_id)
    {
        $isChecked = $this->getUserBookmark($product_id , $user_id);

        if(!$isChecked){
            return $this->table->create($data);
        }else{
            return $this->table->deleteBookmark($product_id , $user_id);
        }


    }
}
