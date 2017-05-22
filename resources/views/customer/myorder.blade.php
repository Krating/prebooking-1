@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>My Orders</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel-heading">
				<h2>My Orders</h2>
				<div class="panel-body">
					<table class="table table-striped table-responsive">
						<thead>
							<th>#</th>
							<th>Product Name</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<tbody>
							@foreach($bookings as $key=> $booking)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $booking->product->product_name }}</td>
								<td>{{ $booking->status }}</td>
								<td>
									<a class="btn btn-info" href="{{ route('booking.show',$booking->id) }}">Show</a>
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