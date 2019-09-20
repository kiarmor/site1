
@extends('layout')

@section('title', 'Products')

@section('content')
    <p>This is our products.</p>

    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Product</th>
            <th>Category</th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td><a href="http://localhost:8000/posts/{{$product['id']}}">{{$product['id']}}</a></td>
                    <td>{{$product['name']}}</td>
                    <td>{{$product['category_id']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
