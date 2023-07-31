<?php

namespace App\Actions\User\Components;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentActions
{
    public static function add_comment($data){
        $comment = new Comment();

        $comment->user_id = Auth::id();

        $comment->post_id = $data['post_id'];
        $comment->comment = $data['comment'];
        if(isset($data['parent_id'])){
            $comment->parent_id = $data['parent_id'];
        }
        $comment->save();
    }


}
