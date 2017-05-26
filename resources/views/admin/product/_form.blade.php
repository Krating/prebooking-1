<div class="form-group">
	{!! Form::label('category_id', 'Category', ['class'=>'control-label col-md-4']) !!}
	<div class="col-md-6">
		{!! Form::select('category_id', $category, null, ['placeholder' => 'Select Category', 'class'=>'form-control']) !!}
			{!! $errors->has('category_id')?$errors->first('category_id'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('product_name', 'Product Name', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-6">
		{!! Form::text('product_name', null, ['class' => 'form-control']) !!}
		{!! $errors->has('product_name')?$errors->first('product_name'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('product_price', 'Price', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-6">
		{!! Form::text('product_price', null, ['class' => 'form-control']) !!}
		{!! $errors->has('product_price')?$errors->first('product_price'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('product_number', 'Number', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-6">
		{!! Form::text('product_number', null, ['class' => 'form-control']) !!}
		{!! $errors->has('product_number')?$errors->first('product_number'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('promotion_id', 'Promotion', ['class'=>'control-label col-md-4']) !!}
	<div class="col-md-6">
		{!! Form::select('promotion_id', $promotion, null, ['placeholder' => 'None', 'class'=>'form-control']) !!}
			{!! $errors->has('promotion_id')?$errors->first('promotion_id'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('description', 'Description', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-6">
		{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		{!! $errors->has('description')?$errors->first('description'):'' !!}
	</div>
</div>

<div class="row">
	<div class="col-md-1 col-md-offset-7">
	<a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
	</div>
	<div class="col-md-2 col-md-offset-0 mbtn">
		{!! Form::button($submitButtonText, ['class' => 'btn-success form-control','type' => 'submit']) !!}
	</div>
</div>