<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 10.09.2019
 * Time: 13:36
 */

namespace App\Http\Controllers;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\GetPostRequest;
use App\Http\Services\PostService;
use App\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;


class PostController
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    
    public function index(GetPostRequest $request, Post $post)
    {
        try {
            $users = User::all();
            $auth = Auth::user();
            $posts = $this->postService->getPostsList($request);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB',

            ]);
        }

            return view('posts.posts', [
                'posts' => $posts,
                'users' => $users,
                'auth' => $auth,
            ]);
    }

    public function show($postId)
    {
        try {
            $post = $this->postService->getPost($postId);
            $users = User::all();
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

        return view('posts.post', [
            'post' => $post,
            'users' => $users,
        ]);
    }

    public function update($postId, Request $request)
    {
        try {
            $post = $this->postService->updatePost($request, $postId);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

        return $post;
    }

    public function store(CreatePostRequest $request)
    {
        try {
            $this->postService->createPost($request);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

        return redirect('/posts');
    }

    public function destroy($postId, \Request $request)
    {
        try {
            $this->postService->deletePost($postId);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

        return redirect('/posts');
    }
}