@extends('layout')

@section('title', 'create product')

@section('content')

    <h1 class="h1">Create product</h1>

    @if(isset($_REQUEST['error']))
        <span style="color: red">{{$_REQUEST['error']}}</span>
    @endif

    <form method="POST" action="/products" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label class="label" for="name">Name</label>
            <div class="control">
                <input type="text" class="input" name="name" placeholder="Add products name">
            </div>
        </div>

        <div class="field">
            <label class="label" for="category_id">Choose category</label>
            <div class="control">
                <select  name="category_id">
                    @foreach($categories as $category)
                        <option name="category_id" value="{{$category->id}}" >{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>
            <div class="control">
                <textarea name="description" class="textarea" placeholder="Add description"></textarea>
            </div>
        </div>

        <div class="field">
            <label class="label" for="price">Price</label>
            <div class="control">
                <input type="number" class="input" name="price" placeholder="price" >
            </div>
        </div>

        <div class="form-group">
            <label for="pr_img">Select image to upload:</label>
            <input type="file"  name="img">
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button btn-primary">Create product</button>
            </div>
        </div>
    </form>

@endsection
