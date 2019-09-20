
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
                    <td>{{$product['id']}}</td>
                    <td><a href="http://localhost:8000/products/{{$product['id']}}">{{$product['name']}}</a></td>
                    <td>{{$product['category_id']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
