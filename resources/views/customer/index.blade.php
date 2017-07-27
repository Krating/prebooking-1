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
					        	<!-- <a class="btn btn-info btn-sm pull-right" href="{{ route('booking.addtocart',['id'=>$product->id]) }}">
                                	<i class="glyphicon glyphicon-shopping-cart"></i>
                            	</a> -->
                            	<a class="pull-right" data-toggle="modal" data-target="#myModal02-{{ $product->id }}">
                                    <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true" ></i>
                                </a>
						        <p>{{ $product->product_price }} THB.</p>
					      	</div>
					    </div>
					  	</div>
					  	<!-- Modal02 -->
			            <div class="modal fade" id="myModal02-{{ $product->id }}" role="dialog">
			                <div class="modal-dialog">
			                
			                  <!-- Modal02 content-->
			                  <div class="modal-content">
			                    <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal">&times;</button>
			                      <h4 class="modal-title">{{ $product->product_name }}</h4>
			                    </div>
			                    <div class="modal-body">
			                        <div class="container">
			                            <div class="row">
			                                <div class="col-md-6">

			                                <div class="cart-container">
			                                	<div class="order-detail">
					                                <form method="post" action="{{ route('booking.addtocart', $product->id) }}">
			                                		<div class="qty" style="display: inline-block;">
					                                    	<div class="input-group">
															    <span class="input-group-addon">QTY</span>
															    <input type="number" name="qty" value="1" min="1" class="form-control" style="width: 150px">
					                                            {{ csrf_field() }}
														    </div>
			                                    	</div>
			                                    	<div class="price" style="display: inline-block;">
			                                            {{ $product->product_price }} THB.
			                                    	</div>
			                                    	<div class="add" style="display: inline-block;">
			                                            <button type="submit" class="btn btn-info btn-sm">Add to Cart</button>
			                                    	</div>
													</form>
			                                	</div>
			                                        
			                                        <div style="text-align: center;">
			                                        	<img src="/photos/{{ $product->photo }}" style="width: 100%">
			                                        </div>
			                                        <div style="margin-top: 20px">{{ $product->description }}</div>
			                                </div>

			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="modal-footer">
			                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                    </div>
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

</body>
</html>
@stop