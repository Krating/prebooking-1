@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Product</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel-heading">
				<h2>Products</h2>
				<div class="panel-body">

					@if (session('status'))
						<div class="alert alert-success">
						{{ session('status') }}
						</div>
					@endif

					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default"><a href="{{ route('category.index') }}">Category</a></button>
						<button type="button" class="btn btn-default"><a href="{{ route('promotion.index') }}">Promotion</a></button>
						<button type="button" class="btn btn-default"><a href="{{ route('product.index') }}">Product</a></button>
					</div>

					<a class="btn btn-success" href="{{ route('product.create') }}">New</a>
					<table class="table table-striped table-responsive">
						<thead>
							<th>#</th>
							<th>Product Name</th>
							<th>Price (THB.)</th>
							<th>Number</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<tbody>
							@foreach($products as $key=> $product)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $product->product_name }}</td>
								<td>{{ $product->product_price }}</td>
								<td>{{ $product->product_number }}</td>
								<td>
									@if($product->status == 'close')
								  		<span class="text-danger">{{ $product->status }}</span>
								  	@else
								  		<span class="text-success">{{ $product->status }}</span>
								  	@endif
								 </td>
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