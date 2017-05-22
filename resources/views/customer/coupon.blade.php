@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Coupons</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel-heading">
				<h2>Coupons</h2>
				<div class="panel-body">
					<table class="table table-striped table-responsive">
						<thead>
							<th>#</th>
							<th>Coupon</th>
							<th>Description</th>
						</thead>
						<tbody>
							@foreach($coupons as $key=> $coupon)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $coupon->coupon_name }}</td>
								<td>{{ $coupon->promotion->description }}</td>
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