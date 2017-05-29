@extends('layouts.app')
@section('content')

    <div class="wrapper main-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

            <div class="login-container">
                <h1>Registration</h1>

                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="form-field">
                    <span>Firstname</span>
                    <input id="first_name" type="text" class="inp-full-width" name="first_name" value="{{ old('first_name') }}" placeholder="Enter your first name" required autofocus>
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="form-field">
                    <span>Lastname</span>
                    <input id="last_name" type="text" class="inp-full-width" name="last_name" value="{{ old('last_name') }}" placeholder="Enter your last name" required autofocus>
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                <label for="gender" class="form-field">
                    <span>Gender</span>
                    <input id="gender" type="radio" name="gender" value="Male">Male
                    <input id="gender" type="radio" name="gender" value="Female">Female
                    @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                <label for="birthday" class="form-field">
                    <span>Date of Birth</span>
                    <input id="birthday" type="date" class="inp-full-width" name="birthday" value="{{ old('birthday') }}" required autofocus>
                    @if ($errors->has('birthday'))
                        <span class="help-block">
                            <strong>{{ $errors->first('birthday') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="form-field">
                    <span>Address</span>
                    <textarea id="address" type="text" class="inp-full-width" name="address" value="{{ old('address') }}" placeholder="Enter your address"required autofocus></textarea>
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="form-field">
                    <span>E-mail</span>
                    <input id="email" type="email" class="inp-full-width" name="email" value="{{ old('email') }}"placeholder="Enter your email" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="form-field">
                    <span>Username</span>
                    <input id="username" type="text" class="inp-full-width" name="username" value="{{ old('username') }}"placeholder="Enter your user name" required autofocus>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="form-field">
                    <span>Password</span>
                    <input id="password" type="password" class="inp-full-width" name="password" placeholder="Enter your user password"required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="form-field">
                    <span>Confirm Password</span>
                    <input id="password-confirm" type="password" class="inp-full-width" name="password_confirmation"placeholder="Confirm your password" required>
                    </label>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-full-width">Register</button>
                </div>

            </div>
        </form>
    </div>
@stop
