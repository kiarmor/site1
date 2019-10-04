@extends('layout')

@section('title', 'Category')

@section('content')

    <div class="container">

        <p>Category.blade</p>

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Product</th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product['id']}}</td>
                    <td><a href="/products/{{$product['id']}}">{{$product['name']}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection