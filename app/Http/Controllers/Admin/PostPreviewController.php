<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Parsers\RIA\RIA;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\SearchRequest;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdatePostPreviewRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostPreview;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostPreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PostPreview::orderByDesc("created_at")->paginate(10);
        return view('admin.post_preview.index', compact('posts'));

//        RIA::index();
    }

    public function search(SearchRequest $request)
    {
        $posts = PostPreview::where('title', 'LIKE', "%{$request['search']}%")
            ->get();
        return view('admin.post_preview.search_list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param PostPreview $post
     * @return \Illuminate\Http\Response
     */
    public function show(PostPreview $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PostPreview $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = PostPreview::where('id', $id)->first();
        return view('admin.post_preview.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostPreviewRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostPreviewRequest $request, $id)
    {
        $data = $request->validated();
        $post_preview = PostPreview::where('id', $id)->first();

        $category = Category::where('title', $data['category'])->first('id');

//        PREVIEW IMAGE
        if(isset($data['preview_image'])){
            $postImage = Storage::disk('public')->put('/images', $data['preview_image']);
        }else{
            $image = $post_preview['preview_image'];
            $postImage = 'images/'.time().basename($image);
            Storage::disk('public')->put($postImage, file_get_contents($image));
        }

//        TAGS
        $tagIds = [];
        $tags_name = json_decode($post_preview['tags']);
        foreach ($tags_name as $tag_name){
            if(!Tag::query()->where('title', $tag_name)->exists()){
                $tag = Tag::create(['title' => $tag_name]);
                $tag = $tag['id'];
            }else{
                $tag = Tag::where('title', $tag_name)->first('id');
                $tag = $tag['id'];
            }
            array_push($tagIds, $tag);
        }

        $post = Post::query()->create([
            'title' => $data['title'],
            'desc' => $data['desc'],
            'preview_image' => $postImage,
            'category_id' => $category['id'],
            'redaction' => $post_preview['redaction'],
        ]);
        $post->tags()->attach($tagIds);

        $post_preview->delete();

        $posts = PostPreview::paginate(10);
        return view('admin.post_preview.index', compact('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostPreview::where('id', $id)->delete();
        return redirect()->route('posts_preview.index');
    }
}
