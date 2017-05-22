@extends('layouts.master')
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
                            <strong>Name:</strong>
                            {{ $booking->user->first_name }} &nbsp {{ $booking->user->last_name }} 
                        </div>
                        <div class="form-group">
                            <strong>Product Name:</strong>
                            {{ $booking->product->product_name }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $booking->product->product_price }} THB.
                        </div>
                        <div class="form-group">
                            <strong>Number:</strong>
                            {{ $booking->number }}
                        </div>
                        <div class="form-group">
                            <strong>Total Price:</strong>
                            {{ $booking->total_price }} THB.
                        </div>
                        <div class="form-group">
                            <strong>Deposit:</strong>
                            {{ $booking->deposit }} THB.
                        </div>
                        <div class="form-group">
                            <strong>Debts:</strong>
                            {{ $booking->debt }} THB.
                        </div>
                        <div class="form-group">
                            <strong>Payment Date:</strong>
                            {{ $booking->payment_date }}
                        </div>
                        <div class="form-group">
                            <strong>Transmission Date:</strong>
                            {{ $booking->transmission_date }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $booking->user->address }}
                        </div>

                        <div class="pull-right">
                            @if(Auth::user()->role_id === 1)
                                <a class="btn btn-primary" href="{{ route('booking.index') }}">Back</a>
                            @else
                                <a class="btn btn-primary" href="{{ route('customer.myorder') }}">Back</a>
                                @if($booking->status == 'Fully Paid')
                                @else
                                    <a class="btn btn-success" onclick="location.reload()" href="{{ route('customer.payment.create', $booking->id) }}" >Payment</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@stop