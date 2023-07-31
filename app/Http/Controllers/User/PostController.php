<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Components\VisitorsActions;
use App\Actions\User\PostActions;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\View;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->with('comments.replies', 'comments.user:id,name', 'comments.replies.user:id,name')->first();

        VisitorsActions::checkVisitor();
        VisitorsActions::visitorView($post->id);
        $views_count = View::query()->where('post_id', $post->id)->count();

        return view('user.single', compact('post', 'views_count'));
    }

    public function save_likedislike(Request $request){
        $resp = PostActions::save_likedislike($request);
        return $resp;
    }

    public function check_likedislike(Request $request){

        $resp = PostActions::check_likedislike($request);
        return $resp;
    }

}
