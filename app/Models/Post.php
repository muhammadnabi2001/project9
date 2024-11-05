<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = [
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
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
    public function likeCount()
    {
        return $this->hasMany(LikeOrDislike::class)
            ->where('value', true);
    }
    public function likeOrDislike()
    {
        return $this->hasOne(LikeOrDislike::class)->where('users_id', Auth::id());
    }
    
}
