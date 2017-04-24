@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Product List</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel-heading">
				<h2>Product List</h2>
				<div class="panel-body">

					@if (session('status'))
						<div class="alert alert-success">
						{{ session('status') }}
						</div>
					@endif

					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Product <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="{{ route('category.index') }}">Category</a></li>
						</ul>
					</div>

					<a class="btn btn-success" href="{{ route('product.create') }}">New</a>
					<table class="table table-striped table-responsive">
						<thead>
							<th>#</th>
							<th>Category</th>
							<th>Product Name</th>
							<th>Price (THB.)</th>
							<th>Number</th>
							<th>Action</th>
						</thead>
						<tbody>
							@foreach($products as $key=> $product)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $product->category->category_name }}</td>
								<td>{{ $product->product_name }}</td>
								<td>{{ $product->product_price }}</td>
								<td>{{ $product->product_number }}</td>
								<td>
									{!! Form::open(['method'=>'DELETE', 'route'=>['product.destroy',$product->id]]) !!}
									<a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>
									<a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
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