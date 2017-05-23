@extends('layouts.master')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3 col-md-offset-1 box">
			<div class="login-container smbox">${{ $totals }}<br>Total bookings made today</div>
		</div>
		<div class="col-md-3 box">
			<div class="login-container smbox">Today's Booking</div>
		</div>
		<div class="col-md-3 box">
			<div class="login-container smbox">?</div>
		</div>
	</div>
	<div class="row box">
		<div class="col-md-9 col-md-offset-1">
			<div class="login-container bigbox">Graph</div>
		</div>
	</div>
</div>

@endsection