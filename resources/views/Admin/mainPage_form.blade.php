@extends('layout')

@section('title', 'Edit main page')

@section('content')

    <form>
        <div class="field">
            <label class="label" for="content">Page title</label>

            <div class="control">
                <textarea rows="2" cols="30" name="title" class="textarea" placeholder="title" >{{$title}}</textarea>
            </div>
        </div>

        <div class="field">
            <label class="label" for="content">Page content</label>

            <div class="control">
                <textarea rows="20" cols="80" name="content" class="textarea" placeholder="content" >{{$content}}</textarea>
            </div>
        </div>

        <form method="post" >

            <div class="field">

                <div class="control">
                    <button type="submit" class="button">Save</button>
                </div>
            </div>
        </form>
    </form>

@endsection
