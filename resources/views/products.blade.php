
@extends('layout')

@section('title', 'Products')

@section('content')
    <p>This is our products.</p>

    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Product</th>
            <th > <a href="http://localhost:8000/categories">Categories</a></th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><a href="http://localhost:8000/products/{{$product->id}}">{{$product->name}}</a></td>
                    <td><a href="http://localhost:8000/categories/{{$categories[$product->category_id - 1]["id"]}}">{{$categories[$product->category_id - 1]['category_name']}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
@endsection
