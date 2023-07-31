<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SearchRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get_category($id)
    {
        $category = Category::where('id', $id)->first();
        $posts = Post::query()->where('category_id', $category['id'])->paginate(12);
        return view('user.category', compact('posts', 'category'));
    }

    public function search_by_category(SearchRequest $request, $id)
    {
        $data = $request->validated();
        $category = Category::where('id', $id)->first();
        $posts = Post::query()
            ->where('category_id', $category['id'])
            ->where('title', 'LIKE', "%{$data['search']}%")
            ->where('desc', 'LIKE', "%{$data['search']}%")
            ->paginate(12);
        return view('user.category', compact('posts', 'category'));
    }
}
