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

    public function user(){
        return $this->belongsTo(User::class);
    }
}
