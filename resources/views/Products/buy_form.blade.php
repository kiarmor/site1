
@extends('layout')

@section('title', 'Buy form')


@section('content')
    <form method="post" action="{{ route('postAct') }}">
            <div class="col">
                <label for="name">Name</label>
                <input name="user_name" type="text" class="form-control" placeholder="Enter your name" required>
            </div>

            <div class="col">
                <label for="phone">Phone number</label>
                <input name="phone_number" type="text" class="form-control" placeholder="Your phone number" required>
            </div>

        <div class="col">
            <label for="inputAddress">Address</label>
            <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
        </div>
        <hr>

        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <button  type="submit" class="btn btn-success" >Buy</button>
        </div>
    </form>
@endsection