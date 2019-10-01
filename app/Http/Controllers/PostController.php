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


class PostController
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    
    public function index(GetPostRequest $request, Post $post)
    {
        $users = User::all();

        return view('posts.posts', [
            'posts' => $this->postService->getPostsList($request),
            'users' => $users
        ]);
    }

    public function show($postId)
    {
        $post = $this->postService->getPost($postId)->toArray();
        $post = $post[$postId - 1];

        return view('posts.post', [
            'post' => $post
        ]);
    }

    public function update($postId, Request $request)
    {
        $post = $this->postService->updatePost($request, $postId);

        return $post;
    }

    public function store(CreatePostRequest $request)
    {
        $this->postService->createPost($request);

        return redirect('/posts');
    }

    public function destroy($postId, \Request $request)
    {
        $this->postService->deletePost($postId);
    }
}