<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title',
        'description',
        'text',
        'img',
        'like',
        'dislike',
        'view'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
