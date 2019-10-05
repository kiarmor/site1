@extends('layout')

@section('title', 'Admin page')

@section('content')
    <p>WELCOME TO ADMIN ROUTE</p>

    <a href="/products">Edit products</a><br>
    <a href="/categories">Edit categories</a><br>
    <a href="/posts">Edit posts</a><br>
    <a href="/products/create">Create product</a><br>
    <a href="/categories/create">Create  category</a><br>


@endsection
