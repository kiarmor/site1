
@extends('layout')

@section('title', 'Buy form')


@section('content')
    <form>

            <div class="col">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" placeholder="First name" required>
            </div>

            <div class="col">
                <label for="soname">Last name</label>
                <input type="text" class="form-control" placeholder="Last name" required>
            </div>

            <div class="col">
                <label for="phone">Phone number</label>
                <input type="text" class="form-control" placeholder="Your phone number" required>
            </div>

        <div class="col">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
        </div>
        <hr>

        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <a href="/success" type="button" class="btn btn-success">Buy</a>
        </div>
    </form>
@endsection