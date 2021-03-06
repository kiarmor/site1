<?php

namespace App\Http\Services;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\GetPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;


class PostService
{
    public function getPostsList(GetPostRequest $request)
    {
        $data = $request->validated();// in $data array only that key, that we define in GetPostRequest class in method rules
        $queryBuilder = DB::table('posts')->orderByDesc('id')->paginate(10);

       /* if($user_id = array_get($data, 'user_id')){
            $queryBuilder->where('user_id', '=', $user_id);
        }

        if ($searchString = array_get($data, 'q')){
            $queryBuilder->where('name', 'LIKE', "%$searchString%");
        }*/

        return $queryBuilder;
    }

    public function createPost(CreatePostRequest $request): Post
    {
        $post = new Post();
        if ($user = $request->user()) {
            $post->name = $request->input('name', $request->name);
            $post->user_id = $request->user()->id;
            $post->save();
            return $post;
        }
        $post->name = $request->input('name', $request->name);
        $post->user_id = '3';
        $post->save();

        return $post;
    }

    public function updatePost(Request $request, int $postId): Post
    {
        $post = Post::query()->find($postId)->get();
        $post->name = $request->input('name', $request->name);
        $post->user_id = $request->user()->id;
        $post->save();

        return $post;
    }

    public function getPost(int $postId)//: ?Post
    {
        $post = Post::query()->findOrFail($postId);

        return $post;
    }

    public function deletePost(int $postId)
    {
        Post::query()->find($postId)->delete();
    }

}