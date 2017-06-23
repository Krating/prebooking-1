@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Product</title>
</head>
<body>
	<div class="form-container">
		<h2>Edit Product</h2>
		{!! Form::model($product, ['class'=>'form-horizontal', 'files' => true, 'route' => ['product.update', $product->id], 'method'=>'PATCH']) !!}
		@include('admin.product._form',['submitButtonText' => 'Edit'])
		{!! Form::close() !!}
	</div>
</body>
</html>
@stop