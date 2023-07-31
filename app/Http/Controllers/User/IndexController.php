<?php

namespace App\Http\Controllers\User;

use App\Actions\User\PostActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ContactFormRequest;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\View;

class IndexController extends Controller
{
    public function index()
    {
        $posts_politic = PostActions::index_category_posts("Политика", 2);
        $posts_world = PostActions::index_category_posts("В Мире", 6);
        $posts_science = PostActions::index_category_posts("Наука и техника", 3);
        $posts_community = PostActions::index_category_posts("Общество", 3);
        $posts_games = PostActions::index_category_posts("Игры", 3);
        $posts_incident = PostActions::index_category_posts("Происшествия", 3);

        $category_posts = [
            'posts_politic'  => $posts_politic,
            'posts_world'  => $posts_world,
            'posts_science'  => $posts_science,
            'posts_community'  => $posts_community,
            'posts_games'  => $posts_games,
            'posts_incident'  => $posts_incident,
        ];

        $last_view_post_ids = View::query()->orderByDesc('created_at')->select('post_id')->get()->unique('post_id')->take(5);

        $last_view_posts = [];
        foreach ($last_view_post_ids as $k){array_push($last_view_posts, $k['post_id']);}
        $last_view_posts = Post::whereIn('id', $last_view_posts)->get();

        return view('user.index', compact('category_posts', 'last_view_posts'));
    }

    public function license()
    {
        return 'license';
    }

    public function contacts()
    {
        return view('user.contact');
    }

    public function contact_form(ContactFormRequest $request)
    {
        $data = $request->validated();

        $fb = Feedback::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message']
        ]);

        return redirect()->back()->with('success', 'Благодарим вас за обратную связь!');
    }

}
