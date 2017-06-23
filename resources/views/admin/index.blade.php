@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3 col-md-offset-1 box">
			<div class="login-container smbox">
			Today's Booking<br>
			<h1>{{$booking_today}}</h1>
			</div>
		</div>
		<div class="col-md-3 box">
			<div class="login-container smbox">
			Total booking made today<br>
			<h1>{{$total}} THB.</h1>
			</div>
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
			<script>
				var cg = document.getElementById("myChart");
				var chart = new Chart(cg, {
				    type: 'line',
				    data: {
				    	labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				    	datasets: [{
				            label: "This Year",
				            fill: false,
				            lineTension: 0.1,
				            backgroundColor:'rgba(255, 99, 132, 0.2)',
				            borderColor:'rgba(255,99,132,1)',
				            borderCapStyle: 'butt',
				            borderDash: [],
				            borderDashOffset: 0.0,
				            borderJoinStyle: 'miter',
				            data: [{{$now[0]}}, {{$now[1]}}, {{$now[2]}}, {{$now[3]}}, {{$now[4]}}, {{$now[5]}}, {{$now[6]}}, {{$now[7]}}, {{$now[8]}}, {{$now[9]}}, {{$now[10]}}, {{$now[11]}}],
				        },
				        {
				            label: "Last Year",
				            fill: true,
				            backgroundColor:'rgba(54, 162, 235, 0.2)',
				            borderColor:'rgba(54, 162, 235, 1)',
				            borderCapStyle: 'butt',
				            borderDash: [],
				            borderDashOffset: 0.0,
				            borderJoinStyle: 'miter',
				            data: [{{$last[0]}}, {{$last[1]}}, {{$last[2]}}, {{$last[3]}}, {{$last[4]}}, {{$last[5]}}, {{$last[6]}}, {{$last[7]}}, {{$last[8]}}, {{$last[9]}}, {{$last[10]}}, {{$last[11]}}],
				        }
				        ]
					},
					options: {
				        scales: {
				            yAxes: [{
				                ticks: {
				                    beginAtZero:true,
				                    stepSize: 20
				                }
				            }]
				        }
				    }
				});
			</script>
			</div>
		</div>
	</div>
</div>
@endsection