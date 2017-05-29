@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Create Admin</title>
</head>
<body>
	<div class="form-container">
	<h2>Create Admin</h2>
						{!! Form::open(['class'=>'form-horizontal','route' => 'admin.store','method'=>'POST']) !!}
						@include('admin._form',['submitButtonText' => 'Create'])
						{!! Form::close() !!}
					</div>
</body>
</html>
@endsection
