
@extends('layout')

@section('title', 'Posts')

@section('content')
    <p>All posts</p>

    <div class="container">{{--что здесь делает этот риквест???--}}
        @if(isset($_REQUEST['error']))
            <span style="color: red">{{$_REQUEST['error']}}</span>
        @endif
        <table class="table">
            <thead>
                <th>Post</th>
                <th>User name</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><a href="/posts/{{$post->id}}">{{$post->name}}</a></td>
                        <td>{{$users[$post->user_id - 1]->name}}</td>
                        <td>
                            @if(isset($auth))
                            @if($auth->role == 1)

                                <form method="POST" action="/posts/{{$post->id}}">
                                    @method('DELETE')
                                    @csrf

                                    <div class="field">

                                        <div class="control">
                                            <button type="submit" class="button">Delete</button>
                                        </div>
                                    </div>
                                </form>

                            @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

            {{$posts->links()}}

        <form action="/posts" method="POST">
            @csrf
            <input type="text" name="name" class="form-control">
            <input type="submit" class="btn btn-success" value="Create">
        </form>
    </div>
@endsection
