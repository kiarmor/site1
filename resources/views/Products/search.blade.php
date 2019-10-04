
@extends('layout')

@section('title', 'Products')

@section('content')
    <p>Searchable</p>

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
                <td><a href="/products/{{$q->id}}">{{$q->name}}</a></td>
                <td><a>{{$q->description}}</a></td>
                <td>{{$q->price}}</td>
                <td>{{$categories[$q->category_id - 1]['category_name']}}</td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>

@endsection





