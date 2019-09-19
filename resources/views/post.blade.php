
@extends('layout')

@section('title', 'Post')

@section('content')
    <p>All posts</p>

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
                </tr>
            </tbody>
        </table>
    </div>
@endsection
