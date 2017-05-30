@extends('layouts.master')
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
        <div class="class col-md-11 box">
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
                            <strong>Number:</strong>
                            {{ $product->product_number }}
                        </div>
                        <div class="form-group">
                            <strong>Promotion:</strong>
                            @if($product->promotion_id != NULL)
                            {{ $product->promotion->description }}
                            @else
                            -
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $product->description }}
                        </div>

                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('product.index') }}">Back</a>
                            @if($product->status == 'close')
                            <a class="btn btn-success" href="{{ route('product.openbooking',$product->id) }}" >Open Booking</a>
                            @else
                            <a class="btn btn-danger" href="{{ route('product.closebooking',$product->id) }}" >Close Booking</a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
@stop