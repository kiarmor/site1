@extends('layout')

@section('title', 'edit page')

@section('content')

    <h1 class="h1">Edit product</h1>

    <form method="POST" action="/products/{{$product->id}}">
        @method('PATCH')
        @csrf

        <div class="field">
            <label class="label" for="name">Name</label>

            <div class="control">
                <input type="text" class="input" name="name" placeholder="name" value="{{$product->name}}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="category_id">Category</label>

            <div class="control">

                <input type="number" min="1" max="7" class="input" name="category_id" placeholder="Category_id" value="{{$product->category_id}}">

            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>

            <div class="control">
                <textarea name="description" class="textarea">{{$product->description}}</textarea>
            </div>
        </div>

        <div class="field">

            <label class="label" for="price">Price</label>

            <div class="control">
                <input type="number" class="input" name="price" placeholder="price" value="{{$product->price}}">
            </div>
        </div>

        <div class="field">

            <div class="control">
                <button type="submit" class="button is-link">Update product</button>
            </div>
        </div>


    </form>

    <form method="POST" action="/products/{{$product->id}}">
    @method('DELETE')
    @csrf

        <div class="field">

            <div class="control">
                <button type="submit" class="button">Delete product</button>
            </div>
        </div>
    </form>

@endsection
