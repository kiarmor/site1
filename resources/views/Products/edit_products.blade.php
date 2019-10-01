@extends('layout')

@section('title', 'Admin page')

@section('content')

    <a>EDIT_PRODUCTS.BLADE</a>
    @foreach($products as $product)
        {{$product}}
    @endforeach

@endsection
