@extends('layouts.app')
@section('content')

	<a class="btn btn-info" href="{{ route('product.index') }}">Stock</a>
	<a class="btn btn-info" href="{{ route('booking.index') }}">Booking</a>
	<a class="btn btn-info" href="{{ route('payment.index') }}">Payment</a>

@endsection