@extends('layouts.app')
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
			<div class="panel-heading">
				<h2>User Management</h2>
			</div>
			<div class="panel-body">

				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Customer <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="{{ route('admin.user-management') }}">Admin</a></li>
					</ul>
				</div>

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
							<td></td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</body>
</html>
@endsection