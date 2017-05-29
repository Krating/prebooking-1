@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Category</title>
</head>
<body>
	<div class="form-container">


						<h2>Create Category</h2>
						{!! Form::open(['class'=>'form-horizontal','route' => 'category.store','method'=>'POST']) !!}
						@include('admin.category._form',['submitButtonText' => 'Create'])
						{!! Form::close() !!}

		</div>

</body>
</html>
@stop
