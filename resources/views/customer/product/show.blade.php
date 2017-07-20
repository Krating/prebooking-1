@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Product Detail</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Product Detail</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <strong>Category:</strong>
                            {{ $product->category->category_name }}
                        </div>
                        <div class="form-group">
                            <strong>Product Name:</strong>
                            {{ $product->product_name }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $product->product_price }}
                        </div>
                        <div class="form-group">
                            <strong>Promotion:</strong>
                            @if($product->promotion == NULL)
                            -
                            @else
                            {{ $product->promotion->description }}
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $product->description }}
                        </div>
                        <div class="form-group">
                            <img src="/photos/{{ $product->photo }}">
                        </div>

                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
                            <a class="btn btn-success" href="{{ route('booking.addtocart',$product->id) }}">
                                <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                            </a>
                            <!-- <a class="btn btn-success" onclick="location.reload()" href="{{ route('myorder.create', $product->id)}}">Book</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@stop