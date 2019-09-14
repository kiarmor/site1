
@extends('layout')

@section('title', 'Posts')

@section('content')
    <p>All posts</p>

    <div class="container">
        @if(isset($_REQUEST['error']))
            <span style="color: red">{{$_REQUEST['error']}}</span>
        @endif
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Post</th>
                <th>User name</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post['id']}}</td>
                        <td>{{$post['name']}}</td>
                        <td>{{$post['user_id']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="/posts" method="POST">
            <input type="text" name="name" class="form-control">
            <input type="submit" class="btn btn-success" value="Create">
        </form>
    </div>
@endsection
