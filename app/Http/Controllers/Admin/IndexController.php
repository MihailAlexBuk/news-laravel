<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\View;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::count();
        $register_user = User::count();
        $views = View::count();
        return view('admin.main.index', compact('posts', 'register_user', 'views'));
    }
}
