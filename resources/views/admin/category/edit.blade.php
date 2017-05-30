@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Category</title>
</head>
<body>
	<div class="form-container">
		<h2>Edit Category</h2>
		{!! Form::model($category, ['class'=>'form-horizontal', 'route' => ['category.update', $category->id], 'method'=>'PATCH']) !!}
		@include('admin.category._form',['submitButtonText' => 'Edit'])
		{!! Form::close() !!}
	</div>
</body>
</html>
@stop