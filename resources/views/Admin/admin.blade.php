@extends('layout')

@section('title', 'Admin page')

@section('content')
    <p>WELCOME TO ADMIN ROUTE</p>

    <a href="/admin/edit_products">Edit products</a><br>
    <a href="/admin/edit_categories">Edit categories</a><br>
    <a href="/admin/edit_posts">Edit posts</a><br>

@endsection
