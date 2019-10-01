@extends('layout')

@section('title', 'catregory edit page')

@section('content')

    <h1 class="h1">Edit category</h1>

    <form method="POST" action="/categories/{{$category->id}}">
        @method('PATCH')
        @csrf

        <div class="field">
            <label class="label" for="category_name">Category name</label>

            <div class="control">
                <input type="text" class="input" name="category_name" placeholder="category_name" value="{{$category->category_name}}">
            </div>
        </div>

        <div class="field">

            <div class="control">
                <button type="submit" class="button is-link">Update </button>
            </div>
        </div>


    </form>

    <form method="POST" action="/products/{{$category->id}}">
    @method('DELETE')
    @csrf

        <div class="field">

            <div class="control">
                <button type="submit" class="button">Delete </button>
            </div>
        </div>
    </form>

@endsection
