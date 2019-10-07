@extends('layout')

@section('title', 'create category ')

@section('content')

    <h1 class="h1">Create category</h1>

    @if(isset($_REQUEST['error']))
        <span style="color: red">{{$_REQUEST['error']}}</span>
    @endif

    <form method="POST" action="/categories">
        @csrf

        <div class="field">
            <label class="label" for="category_name">Category name</label>

            <div class="control">
                <input type="text" class="input" name="category_name" placeholder="category_name" >
            </div>
        </div>

        <div class="field">

            <div class="control">
                <button type="submit" class="button is-link">Create </button>
            </div>
        </div>


    </form>

@endsection
