@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Create Admin</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-1">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h2>Create Admin</h2>
					</div>
					<div class="panel-body">
						{!! Form::open(['class'=>'form-horizontal','route' => 'admin.store','method'=>'POST']) !!}
						@include('admin._form',['submitButtonText' => 'Create'])
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@endsection