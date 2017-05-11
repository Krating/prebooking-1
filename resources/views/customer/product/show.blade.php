@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Information</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>Information</h2>
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
                            <strong>Description:</strong>
                            {{ $product->description }}
                        </div>

                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('index.index') }}">Back</a>
                            <a class="btn btn-success" href="#">Book</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@stop