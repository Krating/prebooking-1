@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Category</title>
</head>
<body>
	<div class="container">
		<div class="row">
		<div class="col-md-11">
			<div class="panel-heading">
				<h2>Categories</h2>
				<div class="panel-body">

					@if (session('status'))
						<div class="alert alert-success">
						{{ session('status') }}
						</div>
					@endif

					<a class="btn btn-success" href="{{ route('category.create') }}">New</a>
					<table class="table table-striped table-responsive">
						<thead>
							<th>#</th>
							<th>Category</th>
							<th>Action</th>
						</thead>
						<tbody>
								@foreach($categories as $key=> $category)
								<tr>
									<td>{{ ++$key }}</td>
									<td>{{ $category->category_name }}</td>
									<td>
										{!! Form::open(['method'=>'DELETE', 'route'=>['category.destroy',$category->id]]) !!}
										<a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
										{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
										{!! Form::close() !!}
									</td>
								</tr>
								@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
	</div>
</body>
</html>
@stop