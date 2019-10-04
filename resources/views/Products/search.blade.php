
@extends('layout')

@section('title', 'Products')

@section('content')
    <p>Searcheble</p>

    <div class="container">
        <table class="table">
            <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th > <a href="/categories">Categories</a></th>
            </thead>
            <tbody>
        @foreach($qq as $q)
            <tr>
                <td>{{$q->name}}</td>
                <td><a{{-- href="/products/{{$product->id}}"--}}>{{$q->description}}</a></td>
                <td><a{{-- href="/categories/{{$categories[$product->category_id - 1]["id"]}}"--}}>{{$q->price}}</a></td>
                <td>{{$q->category_id}}</td>
            </tr>
        @endforeach
            </tbody>
        </table>

    </div>


@endsection





