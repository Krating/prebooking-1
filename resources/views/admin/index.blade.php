@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3 col-md-offset-1 box">
			<div class="login-container smbox">Total bookings made today</div>
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
			<div class="login-container bigbox">
			<canvas id="myChart" width="630" height="230"></canvas>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
			<script src="{{asset('js/graph.js') }}"></script>
			</div>
		</div>
	</div>
</div>
@endsection