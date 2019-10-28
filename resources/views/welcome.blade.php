@extends('layout')

@section('title', 'Laracast')

        @section('content')


            @if(isset($content))
                <h1>{{ $content->title }}</h1>
                {{ $content->content }}
            @endif
@endsection