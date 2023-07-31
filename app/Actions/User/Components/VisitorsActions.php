<?php

namespace App\Actions\User\Components;

use App\Models\Comment;
use App\Models\Movie;
use App\Models\View;
use App\Models\Visitors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;

class VisitorsActions
{
    public static function checkVisitor()
    {

        if(!Visitors::query()
            ->where('ip', Request::getClientIp())->exists()
        ){
            Visitors::query()->create([
                'ip' => Request::getClientIp(),
                'agent' => Request::header('User-Agent')
            ]);
        }
    }

    public static function visitorView($post_id)
    {
        $user_id = Visitors::query()->where('ip', Request::getClientIp())->first('id');

        if($user_id){
            if(!View::query()
                ->where('user_id', $user_id['id'])
                ->where('post_id', $post_id)->exists()
            ){
                View::query()->create([
                    'user_id' => $user_id['id'],
                    'post_id' => $post_id
                ]);
            }
        }
    }

    public function visitorLike()
    {

    }

}
