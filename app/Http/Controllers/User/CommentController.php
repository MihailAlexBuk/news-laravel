<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Components\CommentActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CommentRequest;

class CommentController extends Controller
{
    public function add_comment(CommentRequest $request){
        $data = $request->validated();

        CommentActions::add_comment($data);
        return back();
    }
}
