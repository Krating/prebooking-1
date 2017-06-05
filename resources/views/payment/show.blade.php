@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Payment Detail</title>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="class col-md-11 box">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Payment Detail</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <strong>Boooking ID:</strong>
                            {{ $payment->booking->booking_code }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $payment->booking->user->first_name }} &nbsp {{ $payment->booking->user->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Product Name:</strong>
                            {{ $payment->booking->product->product_name }}
                        </div>
                        <div class="form-group">
                            <strong>Product Price:</strong>
                            {{ $payment->booking->product->product_price }} THB.
                        </div>
                        <div class="form-group">
                            <strong>Number:</strong>
                            {{ $payment->booking->number }}
                        </div>
                        <div class="form-group">
                            <strong>Total Price:</strong>
                            {{ $payment->booking->total_price }} THB.
                        </div>
                        <div class="form-group">
                            <strong>Total Deposit:</strong>
                            {{ $payment->booking->deposit }} THB.
                        </div>
                        <div class="form-group">
                            <strong>Debts:</strong>
                            {{ $payment->booking->debt }} THB.
                        </div>
                        <div class="form-group">
                            <strong>Deposit:</strong>
                            {{ $payment->amount }} THB.
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $payment->date }}
                        </div>
                        <div class="form-group">
                            <strong>Time:</strong>
                            {{ $payment->time }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $payment->booking->user->address }}
                        </div>
                        <div class="form-group">
                            <strong>Slip:</strong><br>
                            <img src="/slips/{{ $payment->slip }}">
                        </div>

                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('payment.index') }}">Back</a>
                                @if($payment->status != "Approved")
                                    <a class="btn btn-success" href=" {{ route('payment.approve', [$payment->id, $payment->booking]) }}">Approve</a>
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