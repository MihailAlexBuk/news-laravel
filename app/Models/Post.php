<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function likes(){
        return $this->hasMany(LikeDislike::class, 'post_id')->sum('like');
    }

    public function dislikes(){
        return $this->hasMany(LikeDislike::class, 'post_id')->sum('dislike');
    }
}
