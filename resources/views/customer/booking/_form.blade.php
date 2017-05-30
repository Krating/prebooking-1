<div class="form-group">
	{!! Form::label('product_id', 'Product Name', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{{$product->product_name}}
		{!! Form::hidden('product_id', $product->id) !!}
		{!! $errors->has('product_id')?$errors->first('product_id'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('product_price', 'Price', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{{$product->product_price}}
		{!! $errors->has('product_price')?$errors->first('product_price'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('number', 'Number', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{!! Form::number('number', null, [ 'min' => '1' , 'class' => 'form-control']) !!}
		{!! $errors->has('number')?$errors->first('number'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('coupon_id', 'Coupon', ['class'=>'control-label col-md-4']) !!}
	<div class="col-md-4">
		{!! Form::select('coupon_id', $coupons, null, ['placeholder' => 'None', 'class'=>'form-control']) !!}
			{!! $errors->has('coupon_id')?$errors->first('coupon_id'):'' !!}
	</div>
</div>

<!-- <div class="form-group">
	{!! Form::label('payment_date', 'Payment Date', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{!! Form::date('payment_date', null, ['class' => 'form-control']) !!}
		{!! $errors->has('payment_date')?$errors->first('payment_date'):'' !!}
	</div>
</div> -->

<div class="form-group">
	{!! Form::label('transmission_date', 'Transmission Date', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-4">
		{!! Form::date('transmission_date', null, ['class' => 'form-control']) !!}
		{!! $errors->has('transmission_date')?$errors->first('transmission_date'):'' !!}
	</div>
</div>

<div class="row">
<div class="col-md-2 col-md-offset-4">
	<a href="{{ route('products.index') }}" class="btn btn-primary form-control">Cancel</a>
	</div>
	<div class="col-md-2">
		{!! Form::button($submitButtonText, ['class' => 'btn-success form-control','type' => 'submit']) !!}
	</div>
</div>