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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Information</h3>
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
                        
                        <strong>Payment History:</strong>
                        @if($booking->deposit == 0)
                        There are no data
                        @else
                        <table class="table table-bordered table-responsive" >
                            <thead class="thead">
                                <tr>
                                    <th class="th">#</th>
                                    <th class="th">Transaction Date</th>
                                    <th class="th">Amount</th>
                                    <th class="th">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $key=> $payment)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $payment->date }} &nbsp {{ $payment->time }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif

                        <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('myorder.index') }}">Back</a>
                                @if($booking->status == 'Fully Paid')
                                @else
                                    <a class="btn btn-success" onclick="location.reload()" href="{{ route('customer.payment.create', $booking->id) }}" >Payment</a>
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