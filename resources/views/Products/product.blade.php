
@extends('layout')

@section('title', 'Product')

@section('content')

    <a>Product.blade</a>
    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Product</th>
            <th>Description</th>
            <th>Image</th>
            <th>Price</th>

            </thead>
            <tbody>
            <tr>
                <td>{{$product['id']}}</td>
                <td>{{$product['name']}}</td>
                <td><a>{{$product['description']}}</a></td>
                <td> <img src="{{asset("storage/$product->img_path")}}" height="300" width="300"></td>
                <td>{{$product->price}}</td>


            </tr>
            </tbody>
        </table>

        <a href="{{route('product.addToCart', ['id' => $product->id])}}" class="btn btn-success pull-right">Add</a>

        @if(isset($auth))
        @if($auth->role == 1)
            <a href="/products/{{$product->id}}/edit">Edit </a>
        @endif
        @endif
    </div>

@endsection
