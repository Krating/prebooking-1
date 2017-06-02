<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Booking Detail</title>
	<style>
		.test{
			background-color:red;
		}
	</style>
</head>
<body>
	<div class="test">.</div>
	<h3> Booking Detail </h3>
	<div>
    Product Name: {{ $booking->product->product_name }}
	</div>
	<div>
    Price: {{ $booking->product->product_price }}
	</div>
	<div>
    Number: {{ $booking->number }}
	</div>
	<div>
    Total Price: {{ $booking->total_price }}
	</div>
	<div>
    Deposit: {{ $booking->deposite }}
	</div>
	<div>
    Debts: {{ $booking->debt }}
	</div>
	<div>
    Payment Date: {{ $booking->payment_date }}
	</div>
	<div>
    Transmission Date: {{ $booking->transmission_date }}
	</div>
</body>
</html>