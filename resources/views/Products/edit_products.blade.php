@extends('layout')

@section('title', 'Admin page')

@section('content')

    <a>EDIT_PRODUCTS.BLADE</a>
    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Product</th>
            <th>Price</th>
            <th>Edit product</th>
            <th > <a href="/categories">Categories</a></th>
            <th>Edit category</th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><a href="/products/{{$product->id}}">{{$product->name}}</a></td>
                    <td>{{$product->price}}</td>
                    <td><div><a href="/products/{{$product->id}}/edit">Edit product</a></div></td>
                    <td><a href="/categories/{{$categories[$product->category_id - 1]["id"]}}">{{$categories[$product->category_id - 1]['category_name']}}</a></td>
                    <td><a href="/categories/{{$categories[$product->category_id - 1]["id"]}}/edit">Edit category</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>

@endsection
