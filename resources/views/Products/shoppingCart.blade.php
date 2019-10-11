
@extends('layout')

@section('title', 'Shopping cart')


@section('content')
    <h3>Shopping cart</h3>

    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-9 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <strong>{{ $product['item']['name'] }}</strong>
                            <span class="label label-success">{{ $product['item']['price'] }}</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Remove item</a></li>
                                    <li><a href="#">Remove all</a></li>
                                </ul>
                            </div>
                            <span  class="" >In cart {{ $product['qty'] }} products of this type</span>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total price: {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="/buy_form" type="button" class="btn btn-success">Buy now</a>
            </div>
        </div>

    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>No items in cart</strong>
            </div>
        </div>
    @endif


@endsection