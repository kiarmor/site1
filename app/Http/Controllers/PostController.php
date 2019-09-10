<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 10.09.2019
 * Time: 13:36
 */

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function show($postId)
    {
         $post = Post::findOrFail($postId);
         return response()->json($post);
    }

    public function update($postId, Request $request)
    {
        $post = Post::findOrFail($postId);
        $post->name = $request->input('name', 'Unknown');
        $post->save();
        return response()->json($post);
    }

    public function store()
    {
        
    }

    public function destroy($postId, \Request $request)
    {
        
    }
}