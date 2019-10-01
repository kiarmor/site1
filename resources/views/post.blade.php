
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
                    <td><a href="http://localhost:8000/posts/{{$post['id']}}">{{$post['id']}}</a></td>
                    <td>{{$post['name']}}</td>
                    <td>{{$post['user_id']}}</td>
                    <a>Post.blade.php</a>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
