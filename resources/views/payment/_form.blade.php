<div class="form-group">
	{!! Form::label('product_id', 'Product Name', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{{$booking->product->product_name}}
		{!! Form::hidden('booking_id', $booking->id) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('amount', 'Deposit', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{!! Form::number('amount', null, ['min' => '1' , 'max' => $booking->debt , 'class' => 'form-control']) !!}
		{!! $errors->has('amount')?$errors->first('amount'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('date', 'Date', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{!! Form::date('date', null, ['class' => 'form-control']) !!}
		{!! $errors->has('date')?$errors->first('date'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('time', 'Time', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{!! Form::time('time', null, ['class' => 'form-control']) !!}
		{!! $errors->has('time')?$errors->first('time'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('slip', 'Upload Slip Image', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		<input type="file" name="slip">
		{!! $errors->has('slip')?$errors->first('slip'):'' !!}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</div>
</div>

<div class="row">
	<div class="col-md-2 col-md-offset-4">
	<a href="{{ route('myorder.index') }}" class="btn btn-primary form-control">Cancel</a>
	</div>
	<div class="col-md-2 col-md-offset-0">
		{!! Form::button($submitButtonText, ['class' => 'btn-success form-control','type' => 'submit']) !!}
	</div>
</div>