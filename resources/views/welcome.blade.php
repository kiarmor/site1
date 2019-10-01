@extends('layout')

@section('title', 'Laracast')

        @section('content')
            <h1>My first laravel project</h1>

            @foreach($tasks as $task)
            <li>{{$task}}</li>
            @endforeach

            {{--TODO: hide link admin--}}
            <div class="panel-body">
                <a href="{{url('admin')}}">Admin</a>
            </div>
        @endsection

