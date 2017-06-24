<div class="form-group">
	{!! Form::label('product_id', 'Product Name', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{{$booking->product->product_name}}
		{!! Form::hidden('product_id', $booking->product->id) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('product_price', 'Price', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{{$booking->product->product_price}}
	</div>
</div>

<div class="form-group">
	{!! Form::label('number', 'Number', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{{$booking->number}}
	</div>
</div>

<div class="form-group">
	{!! Form::label('total_price', 'Total Price', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{{$booking->total_price}}
	</div>
</div>

<div class="form-group">
	{!! Form::label('address', 'Address', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{{$booking->user->address}}
	</div>
</div>

<div class="form-group">
	{!! Form::label('transmission_date', 'Transmission Date', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{{$booking->transmission_date}}
	</div>
</div>

<div class="form-group">
	{!! Form::label('payment_date', 'Payment Date', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{!! Form::date('payment_date', null, ['class' => 'form-control']) !!}
		{!! $errors->has('payment_date')?$errors->first('payment_date'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('transmission_date', 'Transmission Date', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{!! Form::date('transmission_date', null, ['class' => 'form-control']) !!}
		{!! $errors->has('transmission_date')?$errors->first('transmission_date'):'' !!}
	</div>
</div>

<div class="row">
<div class="col-md-2 col-md-offset-4">
	<a href="{{ route('booking.index') }}" class="btn btn-primary form-control">Cancel</a>
	</div>
	<div class="col-md-2">
		{!! Form::button($submitButtonText, ['class' => 'btn-success form-control','type' => 'submit']) !!}
	</div>
</div>