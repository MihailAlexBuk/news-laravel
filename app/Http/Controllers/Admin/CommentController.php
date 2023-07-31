<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'DESC')->paginate(20);

        return view('admin.comment.index', compact('comments'));
    }

    public function showUserComments(int $id)
    {
        $comments = Comment::whereHas('user', function($query) use ($id){
            return $query->where('id', $id);
        })->get();

        return view('admin.comment.show', compact('comments'));
    }

    public function delete(int $id)
    {
        Comment::where('id', $id)->delete();
        return redirect()->back();
    }
}
