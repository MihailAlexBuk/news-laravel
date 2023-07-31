<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index()
    {

        $posts = Post::paginate(20);
        $sortedResult = $posts->getCollection()->sortByDesc(function ($invoice){
            return $invoice->likes();
        })->values();
        dd($posts);
        $posts->setCollection($sortedResult);


        return view('admin.likes.index', compact('posts'));
    }
}
