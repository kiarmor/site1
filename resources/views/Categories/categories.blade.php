@extends('layout')

@section('title', 'Categories')

@section('content')

    <div class="container">
        <a>Categories.blade</a>

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Category</th>
            <th></th>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category['id']}}</td>
                    <td><a href="/categories/{{$category['id']}}">{{$category['category_name']}}</a></td>
                    <td>
                        @if(isset($auth))
                            @if($auth->role == 1)
                                <a href="/categories/{{$category->id}}/edit">Edit category</a>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection
