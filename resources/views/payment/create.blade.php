@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>createpayment</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h2>Payment</h2>
					</div>
					<div class="panel-body">
						{!! Form::open(['class'=>'form-horizontal','route' => 'customer.payment.store','method'=>'POST', 'files' => true]) !!}
						@include('payment._form',['submitButtonText' => 'Confirm'])
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@stop