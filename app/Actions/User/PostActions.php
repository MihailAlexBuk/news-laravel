<?php


namespace App\Actions\User;


use App\Models\Category;
use App\Models\LikeDislike;
use App\Models\Post;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostActions
{
    public static function recent_posts()
    {
        $recent_posts = Post::orderByDesc('created_at')->take(3)->get();
        return $recent_posts;
    }

    public static function index_category_posts($category, $count)
    {
        $posts = Post::query()->whereHas('category', function ($query) use ($category){
            $query->where('title', $category);
        })->orderByDesc('created_at')->get()->take($count);
        $category = Category::where('title', $category)->first();
        return ['posts' => $posts, 'category' => $category];
    }

    public static function popular_posts()
    {
        $popular_post = LikeDislike::query()
            ->groupBy('post_id')
            ->selectRaw('sum(`like`) as total_likes, post_id')
            ->orderByDesc('total_likes')
            ->pluck('total_likes', 'post_id')
            ->take(3);

        $popular_posts = [];
        foreach ($popular_post as $k => $v){array_push($popular_posts, $k);}
        $popular_posts = Post::whereIn('id', $popular_posts)->get();
        return $popular_posts;
    }

    public static function most_view_posts()
    {
        $most_view_post = View::query()
            ->groupBy('post_id')
            ->selectRaw('sum(`post_id`) as total_view, post_id')
            ->orderByDesc('total_view')
            ->pluck('total_view', 'post_id')
            ->take(3);

        $most_view_posts = [];
        foreach ($most_view_post as $k => $v){array_push($most_view_posts, $k);}
        $most_view_posts = Post::whereIn('id', $most_view_posts)->get();
        return $most_view_posts;
    }

    public static function save_likedislike(Request $request){

        if(LikeDislike::query()
            ->where('user_id', Auth::id())
            ->where('post_id', $request->post)
            ->exists())
        {
            return response()->json([
                'bool' => false
            ]);
        }else{
            $data = new LikeDislike();
            $data->post_id = $request->post;
            if($request->type == 'like'){
                $data->like = 1;
            }else{
                $data->dislike = 1;
            }
            $data->user_id = Auth::id();
            $data->save();
            return response()->json([
                'bool' => true
            ]);
        }
    }

    public static function check_likedislike(Request $request){

        $check = LikeDislike::query()->where('user_id', Auth::id())->where('post_id', $request->post);
        if($check->exists())
        {
            if($check->first()->like === 1){
                return response()->json(['result' => 'like']);
            }else{
                return response()->json(['result' => 'dislike']);
            }
        }
    }

}
