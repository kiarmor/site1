@extends('layout')

@section('title', 'Laracast')

        @section('content')
            @if(isset($auth))
                @if($auth->role == 1)
                    <a href="/admin">Admin</a>
                @endif
            @endif
            <h1>My first laravel project</h1>

            @foreach($tasks as $task)
            <li>{{$task}}</li>
            @endforeach

        @endsection

