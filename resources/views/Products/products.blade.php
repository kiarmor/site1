
@extends('layout')

@section('title', 'Products')

@section('content')
    <p>This is our products.</p>

    <form method="GET" action="/search">
        <div class="field">

            <label class="label" for="search">Search</label>

            <div class="control">
                <input type="text" class="search" name="search" placeholder="search product">
            </div>
        </div>
        <div class="field">

            <div class="control">
                <button type="submit" class="button">Search product</button>
            </div>
        </div>
    </form>


    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Product</th>
            <th>Price</th>
            <th > <a href="/categories">Categories</a></th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><a href="/products/{{$product->id}}">{{$product->name}}</a></td>
                    <td>{{$product->price}}</td>
                    <td><a href="/categories/{{$categories[$product->category_id - 1]["id"]}}">{{$categories[$product->category_id - 1]['category_name']}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
@endsection

