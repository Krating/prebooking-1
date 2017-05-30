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
		{!! Form::open(['class'=>'form-horizontal','route' => 'booking.store','method'=>'POST']) !!}
		@include('admin.booking._form',['submitButtonText' => 'OK'])
		{!! Form::close() !!}
	</div>
</body>
</html>
@stop