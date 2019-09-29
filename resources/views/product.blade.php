
@extends('layout')

@section('title', 'Product')

@section('content')
    <p>Product</p>

    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Product</th>
            <th>Description</th>
            </thead>
            <tbody>
            <tr>
                <td>{{$product['id']}}</td>
                <td>{{$product['name']}}</td>
                <td><a>{{$product['description']}}</a></td>
                <a>Product.blade</a>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
