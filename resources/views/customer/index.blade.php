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

			<div class="panel-heading">
				<h2>Product List</h2>
				<div class="panel-body">

					@if (session('status'))
						<div class="alert alert-success">
						{{ session('status') }}
						</div>
					@endif

					<div id="search">
				      <form class="form-inline search-form" role="form" action="{{ route('search-autocomplete') }}" method="post">
				      {{ csrf_field() }}
				        <div class="form-group">
				        		<input type="text" name="search_code" class="form-control" placeholder="Search here">
				        </div>
				        <button type="submit" class="btn btn-custom"><span class="glyphicon glyphicon-search custom-glyph-color"></span></button>
				      </form>
				    </div>


					
					<div class="row box">
					 	<div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      	<img src="..." alt="...">
					      	<div class="caption">
					        	<h3>Thumbnail label</h3>
					        	<p>...</p>
					        	<p><a href="#">Read more</a></p>
					      	</div>
					    </div>
					  	</div>
					</div>

					<div>
					<table class="table table-striped table-responsive">
						<thead>
						<tr>
							<th>#</th>
							<th>Category</th>
							<th>Product Name</th>
							<th>Price (THB.)</th>
							<th>Number</th>
							<th>Action</th>
						</tr>
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
									<a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
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