<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    public function editMainPageForm(Request $request)
    {
        $content = Content::query()->findOrFail(1);
        if (!$request['content']) {
            return view('admin.mainPage_form', [
                'title' => $content->title,
                'content' => $content->content,
            ]);
        }
        $content->title = request('title');
        $content->content = request('content');
        $content->save();


        view('/welcome', [
            'title' => $content->title,
            'content' => $content->content,
        ]);
        return redirect('/');
    }

}
