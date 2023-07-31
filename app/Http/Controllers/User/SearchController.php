<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Components\SearchBarActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\SearchRequest;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class SearchController extends Controller
{
    public function site_search(SearchRequest $request){

        $data = $request->validated();

        $search = $data['search'];

        $posts = Post::where('title', 'LIKE', "%{$data['search']}%")->paginate(12);

        $recent_posts = Post::orderByDesc('created_at')->take(3)->get();
        $popular_posts = Post::orderByDesc('created_at')->take(3)->get();

        return view('user.search', compact('posts', 'search', 'recent_posts', 'popular_posts'));
    }

    public function search_by_tag($id)
    {
        $search = Tag::where('id', $id)->first();
        $search = $search['title'];

        $post = PostTag::where('tag_id', $id)->select('post_id')->get();
        $posts = Post::whereIn('id', $post)->paginate(12);
        $recent_posts = Post::orderByDesc('created_at')->take(3)->get();
        $popular_posts = Post::orderByDesc('created_at')->take(3)->get();
        return view('user.search', compact('posts', 'search', 'recent_posts', 'popular_posts'));
    }
}
