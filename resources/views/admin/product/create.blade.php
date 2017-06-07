@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Create Product</title>
</head>
<body>
	<div class="form-container">
		<h2>Create Product</h2>
		{!! Form::open(['class'=>'form-horizontal','route' => 'product.store','method'=>'POST', 'files' => true]) !!}
		@include('admin.product._form',['submitButtonText' => 'Create'])
		{!! Form::close() !!}
	</div>
</body>
</html>
@stop
