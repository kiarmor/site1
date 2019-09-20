@extends('layout')

@section('title', 'Categories')

@section('content')

    <div class="container">

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Category</th>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category['id']}}</td>
                    <td><a href="http://localhost:8000/category/{{$category['id']}}">{{$category['category_name']}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
