
@extends('layout')

@section('title', 'Post')

@section('content')
    <p>post</p>

    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Post</th>
            <th>User name</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$users[($post->user_id) - 1]->name}}</td>
                    <a>Post.blade.php</a>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
