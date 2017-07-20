@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
		@if(Session::has('cart'))
		<div class="cart-container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product['item']['product_name'] }}</td>
                        <td>{{ $product['qty'] }}</td>
                        <td>{{ $product['item']['product_price'] }}</td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="{{ route('booking.removeitem',['id'=>$product['item']['id']]) }}">
                            	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <table class="table">
                    <tr>
                        <td>Items on Cart:</td>
                        <td>{{ $num_items }}</td>
                    </tr>
                    <tr>
                        <td>Total Price:</td>
                        <td>{{ $totalPrice }}</td>
                    </tr>
                </table>
        </div>
        @else
        <h2>No Item in Cart!</h2>
        @endif
        </div>
    </div>
</div>

@stop