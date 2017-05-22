@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Booking</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h2>Booking</h2>
					</div>
					<div class="panel-body">
						{!! Form::open(['class'=>'form-horizontal','route' => 'booking.store','method'=>'POST']) !!}
						@include('booking._form',['submitButtonText' => 'OK'])
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@stop