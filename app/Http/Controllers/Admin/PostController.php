<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\SearchRequest;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query()->orderByDesc("created_at")->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    public function search(SearchRequest $request)
    {
        $posts = Post::where('title', 'LIKE', "%{$request['search']}%")
            ->paginate(10);
        return view('admin.post.search_list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

//    public function preview(StoreRequest $request)
//    {
//        $img = Storage::disk('public')->put('/images', $data['preview_image']);
//
//
//        return view('admin.post.preview', compact('data', 'img'));
//    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $tagIds = $data['tag_ids'];
        $postImage = Storage::disk('public')->put('/images', $data['preview_image']);
        unset($data['tags'], $data['preview_image']);

        $post = Post::query()->create([
            'title' => $data['title'],
            'desc' => $data['desc'],
            'preview_image' => $postImage,
            'category_id' => $data['category_id'],
        ]);
        $post->tags()->attach($tagIds);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $tagIds = $data['tag_ids'] ?? '';

        if(isset($tagIds)){
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            $post->tags()->sync($tagIds);
        }
        $post->update($data);

        return view('admin.post.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->route('posts.index');
    }
}
