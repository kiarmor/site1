
@extends('layout')

@section('title', 'Product')

@section('content')
    <p>Product</p>

    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Product</th>
            <th>Category</th>
            </thead>
            <tbody>
            <tr>
                <td><a href="http://localhost:8000/products/{{$product['id']}}">{{$product['id']}}</a></td>
                <td>{{$product['name']}}</td>
                {{--<td>{{$product['']}}</td>--}}
                <a>bla</a>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
