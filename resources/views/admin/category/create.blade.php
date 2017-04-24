@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Category</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h2>Create Category</h2>
					</div>
					<div class="panel-body">
						{!! Form::open(['class'=>'form-horizontal','route' => 'category.store','method'=>'POST']) !!}
						@include('admin.category._form',['submitButtonText' => 'Create'])
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@stop