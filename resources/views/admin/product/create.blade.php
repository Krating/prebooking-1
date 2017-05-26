@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Create Product</title>
</head>
<body>
	<div class="container">
		<div class="row">
        <div class="class col-md-11 box">
			<div class="col-md-9 col-md-offset-1">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h2>Create Product</h2>
					</div>
					<div class="panel-body">
						{!! Form::open(['class'=>'form-horizontal','route' => 'product.store','method'=>'POST']) !!}
						@include('admin.product._form',['submitButtonText' => 'Create'])
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</body>
</html>
@stop