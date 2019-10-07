
@extends('layout')

@section('title', 'Products')

@section('content')
    <p>This is our products.</p>

    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Product</th>
            <th></th>
            <th>Price</th>
            <th > <a href="/categories">Categories</a></th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><a href="/products/{{$product->id}}">{{$product->name}}</a></td>
                    <td>
                        @if(isset($auth))
                            @if($auth->role == 1)
                                <a href="/products/{{$product->id}}/edit">Edit </a>
                            @endif
                        @endif

                    </td>
                    <td>{{$product->price}}</td>
                    <td><a href="/categories/{{$categories[$product->category_id - 1]["id"]}}">{{$categories[$product->category_id - 1]['category_name']}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>

    {{--@foreach($products as $product)
    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title" href="/products/{{$product->id}}">{{$product->name}}</h5>
            <p class="card-text" href="/categories/{{$categories[$product->category_id - 1]["id"]}}">{{$categories[$product->category_id - 1]['category_name']}}</p>
            <p>{{$product->price}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    @endforeach--}}

@endsection

