@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Booking</title>
</head>
<body>
	<div class="container">
		<div class="row">
		<div class="class col-md-11">
			<div class="panel-heading">
				<h2>Booking</h2>
			</div>
			<div class-="panel-body">
				
				<div id="search">
				    <form class="form-inline search-form" role="form" action="{{ route('search-booking') }}" method="post">
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
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($bookings as $key=> $booking)
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $booking->booking_code }}</td>
							<td>{{ $booking->status }}</td>
							<td>
								<a class="btn btn-info" href="{{ route('booking.show', $booking->id) }}">Show</a>
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
