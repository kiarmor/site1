@extends('layout')

@section('title', 'Categories')

@section('content')

    <div class="container">
        <a>Categories.blade</a>

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Category</th>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category['id']}}</td>
                    <td><a href="http://localhost:8000/categories/{{$category['id']}}">{{$category['category_name']}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection
