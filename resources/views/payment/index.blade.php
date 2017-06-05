@extends('layouts.master')
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
		<div class="class col-md-11">
			<div class="panel-heading">
				<h2>Payments</h2>
			</div>
			<div class="panel-body">

				<div id="search">
				    <form class="form-inline search-form" role="form" action="{{ route('search-payment') }}" method="post">
				      {{ csrf_field() }}
				        <div class="form-group">
				        		<input type="text" name="search_code" class="form-control" placeholder="Search here">
				        </div>
				        <button type="submit" class="btn btn-custom"><span class="glyphicon glyphicon-search custom-glyph-color"></span></button>
				    </form>
				 </div>

				<table class="table table-striped table-responsive">
					<thead>
						<th>#</th>
						<th>Booking ID</th>
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
								<td>{{ $payment->booking->booking_code }}</td>
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
	</div>
</body>
</html>
@stop