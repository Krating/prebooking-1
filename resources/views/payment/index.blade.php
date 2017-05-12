@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Payment</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel-heading">
				<h2>Payment List</h2>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-responsive">
					<thead>
						<th>#</th>
						<th>Product</th>
						<th>Customer</th>
						<th>Deposit (THB.)</th>
						<th>Date</th>
						<th>Time</th>
						<th>Status</th>
						<th>Information</th>
					</thead>
					<tbody>
						@foreach($payments as $key=> $payment)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $payment->booking->product->product_name }}</td>
								<td>{{ $payment->booking->user->first_name }}</td>
								<td>{{ $payment->amount }}</td>
								<td>{{ $payment->date }}</td>
								<td>{{ $payment->time }}</td>
								<td>{{ $payment->status }}</td>
								<td>
									<a class="btn btn-info" href="{{ route('payment.show',$payment->id) }}">Show</a>
								</td>
							</tr>
							@endforeach
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</body>
</html>
@stop