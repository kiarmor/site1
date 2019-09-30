@extends('layout')

@section('title', 'edit page')

@section('content')

    <h1 class="h1">Edit product</h1>

    <form>
        <div class="field">
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title" value="{{$product->name}}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>

            <div class="control">
                <textarea name="description" class="textarea">{{$product->description}}</textarea>
            </div>
        </div>

        <div class="field">

            <div class="control">
                <button type="submit" class="button is-link">Update product</button>
            </div>
        </div>
    </form>

@endsection
