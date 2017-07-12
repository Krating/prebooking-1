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
					@foreach($products as $product)
					 	<div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      	<img src="/photos/{{ $product->photo }}">
					      	<div class="caption">
						      	<h4>{{ $product->product_name }}</h4>
					        	<p>
					        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, soluta, eligendi doloribus sunt minus amet sit debitis repellat. Consectetur, culpa itaque odio similique suscipit
					        	</p>
					        	<a href="{{ route('products.show',$product->id) }}">Read more</a>
						        <p class="pull-right">{{ $product->product_price }} THB.</p>
					      	</div>
					    </div>
					  	</div>
					@endforeach
					</div>

					<div class="row paginate">
					{{$products->links()}}
					</div>

				</div>
			</div>
	</div>
</div>
</body>
</html>
@stop