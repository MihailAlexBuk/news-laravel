<?php

namespace App\Actions\User\Components;


use App\Models\Post;

class SearchBarActions
{
    public function search_result($data, $count){
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$data['search']}%")
            ->orWhere('desc', 'LIKE', "%{$data['search']}%")
            ->take($count)
            ->get();

        return $posts;
    }
}
