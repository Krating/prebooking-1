
<div class="form-group">
	{!! Form::label('category_name', 'Category Name', ['class'=>'control-label col-md-4']) !!}
	<div class="col-md-6">
		{!! Form::text('category_name' , null, ['class'=>'form-control', 'placeholder'=>'Enter your category name.']) !!}
		{!! $errors->has('category_name')?$errors->first('category_name'):'' !!}
	</div>
</div>

<div class="row">
	<div class="col-md-1 col-md-offset-7">
	<a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
	</div>
	<div class="col-md-2 col-md-offset-0 ">
		{!! Form::button($submitButtonText, ['class' => 'btn-success form-control','type' => 'submit']) !!}
	</div>
</div>
