@extends('layouts.app')
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
			<div class="panel-heading">
				<h2>Categories</h2>
				<div class="panel-body">

					@if (session('status'))
						<div class="alert alert-success">
						{{ session('status') }}
						</div>
					@endif

					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Category <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="{{ route('product.index') }}">Product</a></li>
						</ul>
					</div>

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