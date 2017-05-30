@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Booking</title>
</head>
<body>
	<div class="form-container">
		<h2>Booking</h2>
		{!! Form::open(['class'=>'form-horizontal','route' => 'myorder.store','method'=>'POST']) !!}
		@include('customer.booking._form',['submitButtonText' => 'OK'])
		{!! Form::close() !!}
	</div>
</body>
</html>
@stop