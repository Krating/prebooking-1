<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
	<label for="first_name" class="col-md-4 control-label">Firstname</label>

	<div class="col-md-6">
		<input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="Enter first name" required autofocus>

		@if ($errors->has('first_name'))
		<span class="help-block">
			<strong>{{ $errors->first('first_name') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
	<label for="last_name" class="col-md-4 control-label">Lastname</label>

	<div class="col-md-6">
		<input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Enter last name" required>

		@if ($errors->has('last_name'))
		<span class="help-block">
			<strong>{{ $errors->first('last_name') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
	<label for="gender" class="col-md-4 control-label">Gender</label>

	<div class="col-md-6">
		<input id="gender" type="radio" name="gender" value="Male">Male
		<input id="gender" type="radio" name="gender" value="Female">Female

		@if ($errors->has('gender'))
		<span class="help-block">
			<strong>{{ $errors->first('gender') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
	<label for="birthday" class="col-md-4 control-label">Birth Date</label>

	<div class="col-md-6">
		<input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" required>

		@if ($errors->has('birthday'))
		<span class="help-block">
			<strong>{{ $errors->first('birthday') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
	<label for="address" class="col-md-4 control-label">Address</label>

	<div class="col-md-6">
		<input id="address" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter address"  required>

		@if ($errors->has('address'))
		<span class="help-block">
			<strong>{{ $errors->first('address') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
	<label for="username" class="col-md-4 control-label">Username</label>

	<div class="col-md-6">
		<input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Enter user name"  required>

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
		<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email"  required>

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
