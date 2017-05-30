@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>createpayment</title>
</head>
<body>
	<div class="form-container">
		<h2>Payment</h2>
		{!! Form::open(['class'=>'form-horizontal','route' => 'customer.payment.store','method'=>'POST', 'files' => true]) !!}
		@include('payment._form',['submitButtonText' => 'Confirm'])
	</div>
</body>
</html>
@stop