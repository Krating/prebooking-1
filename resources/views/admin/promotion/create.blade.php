@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Promotion</title>
</head>
<body>
	<div class="form-container">
		<h2>Create Promotion</h2>
		{!! Form::open(['class'=>'form-horizontal','route' => 'promotion.store','method'=>'POST']) !!}
		@include('admin.promotion._form',['submitButtonText' => 'Create'])
		{!! Form::close() !!}
	</div>
</body>
</html>
@stop
