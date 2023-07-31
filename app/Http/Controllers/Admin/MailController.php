<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Mail\StoreRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function mails()
    {
        $mails = Feedback::orderBy('read', 'ASC')->orderBy('updated_at', 'ASC')->paginate(10);

        // Feedback::create([
        //     'name' => 'name1',
        //     'email' => 'name1@mail.ru',
        //     'message' => 'asd asd asd',
        //     'read' => 0
        // ]);

        // Feedback::create([
        //     'name' => 'name2',
        //     'email' => 'name2@mail.ru',
        //     'message' => 'readreadreadreadreadreadreadreadread',
        //     'read' => 1
        // ]);

        // Feedback::create([
        //     'name' => 'name3',
        //     'email' => 'name3@mail.ru',
        //     'message' => 'spamspamspamspamspamspamspamspamspam',
        //     'spam' => 1,
        //     'read' => 1

        // ]);

        return view('admin.mails.index', compact('mails'));
    }

    public function show(int $id)
    {
        $mail = Feedback::where('id', $id)->first();
        return view('admin.mails.show', compact('mail'));
    }

    public function answer(StoreRequest $request, int $id)
    {
        $data = $request->validated();
        Feedback::where('id', $id)->update([
            'answer' => $data['answer'],
            'read' => 1
        ]);

        return redirect()->route('admin.mail');
    }

    public function read(int $id)
    {
        Feedback::where('id', $id)->update([
            'read' => 1,
        ]);
        return redirect()->route('admin.mail');
    }

    public function spam(int $id)
    {
        Feedback::where('id', $id)->update([
            'spam' => 1,
            'read' => 1
        ]);

        return redirect()->route('admin.mail');
    }

    public function return_from_spam(int $id)
    {
        Feedback::where('id', $id)->update([
            'spam' => 0,
            'read' => 0
        ]);

        return redirect()->route('admin.mail');
    }


}
