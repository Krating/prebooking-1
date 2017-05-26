<div class="form-group">
	{!! Form::label('promotion_name', 'Promotion Name', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-6">
		{!! Form::text('promotion_name', null, ['class' => 'form-control','placeholder'=>'Enter promotion name']) !!}
		{!! $errors->has('promotion_name')?$errors->first('promotion_name'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('number', 'Number', ['class'=>'control-label col-md-4']) !!}
	<div class="col-md-6">
		{!! Form::number('number' , null, ['min' => '1','class'=>'form-control','placeholder'=>'Enter number of promotion']) !!}
		{!! $errors->has('number')?$errors->first('number'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('discount', 'Discount', ['class'=>'control-label col-md-4']) !!}
	<div class="col-md-6">
		{!! Form::number('discount' , null, ['min' => '1','class'=>'form-control','placeholder'=>'Enter name of discount']) !!}
		{!! $errors->has('discount')?$errors->first('discount'):'' !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('description', 'Description', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-6">
		{!! Form::textarea('description', null, ['class' => 'form-control','placeholder'=>'Enter description of promotion']) !!}
		{!! $errors->has('description')?$errors->first('description'):'' !!}
	</div>
</div>

<div class="row">
	<div class="col-md-1 col-md-offset-7">
	<a href="{{ route('promotion.index') }}" class="btn btn-primary">Back</a>
	</div>
	<div class="col-md-2 col-md-offset-0 mbtn">
		{!! Form::button($submitButtonText, ['class' => 'btn-success form-control','type' => 'submit']) !!}
	</div>
</div>
