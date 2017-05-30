@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Booking</title>
</head>
<body>
	<div class="form-container">
		<h2>Booking</h2>
		{!! Form::model($booking, ['class'=>'form-horizontal', 'route' => ['booking.update', $booking->id], 'method'=>'PATCH']) !!}
		@include('admin.booking._form',['submitButtonText' => 'Confirm'])
		{!! Form::close() !!}
	</div>
</body>
</html>
@stop