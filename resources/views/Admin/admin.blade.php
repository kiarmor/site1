@extends('layout')

@section('title', 'Admin page')

@section('content')
    <p>WELCOME TO ADMIN ROUTE</p>

    <a href="/products">Edit products</a><br>
    <a href="/create_products">Create product</a><br>
    <br>
    <a href="/categories">Edit categories</a><br>
    <a href="/create_category">Create  category</a><br>
    <br>
    <a href="/posts">Edit posts</a><br>
    <br>
    <a href="/edit_main_page">Edit main page</a>


@endsection
