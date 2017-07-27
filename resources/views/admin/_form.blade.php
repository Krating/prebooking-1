<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
	<label for="username" class="col-md-4 control-label">Username</label>

	<div class="col-md-6">
		<input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

		@if ($errors->has('username'))
		<span class="help-block">
			<strong>{{ $errors->first('username') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	<label for="email" class="col-md-4 control-label">E-Mail</label>

	<div class="col-md-6">
		<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

		@if ($errors->has('email'))
		<span class="help-block">
			<strong>{{ $errors->first('email') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-md-1 col-md-offset-7">
	<a href="{{ route('user-management.admin') }}" class="btn btn-primary">Back</a>
	</div>
	<div class="col-md-2 col-md-offset-0 mbtn">
		{!! Form::button($submitButtonText, ['class' => 'btn-success form-control','type' => 'submit']) !!}
	</div>
</div>
