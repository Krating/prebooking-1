@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Management</title>
</head>
<body>
	<div class="container">
		<div class="row">
		<div class="col-md-11">
			<div class="panel-heading">
				<h2>User Management</h2>
			</div>
			<div class="panel-body">

				<table class="table table-striped table-responsive">
					<thead>
						<th>#</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($customers as $key=> $customer)
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $customer->first_name }}</td>
							<td>{{ $customer->last_name }}</td>
							<td>
								<a class="btn btn-info" href="{{ route('admin.show',$customer->id) }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
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
@endsection