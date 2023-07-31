<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SubscribeRequest;
use App\Models\Subscribe;
use Illuminate\Validation\ValidationException;

class SubscribeController extends Controller
{
    public function subscribe(SubscribeRequest $request)
    {
        $data = $request->validated();
        Subscribe::firstOrCreate(['email' => $data['email']]);

        return redirect()->route('user.index');
    }
}
