@extends('layouts.app')
@section('content')

    <div class="wrapper main-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

            <div class="login-container">
                <h1>Registration</h1>

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="form-field">
                    <span>Username</span>
                    <input id="username" type="text" class="inp-full-width" name="username" value="{{ old('username') }}" placeholder="Enter your username" required autofocus>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="form-field">
                    <span>E-mail</span>
                    <input id="email" type="email" class="inp-full-width" name="email" value="{{ old('email') }}" placeholder="Enter E-mail Address" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="form-field">
                    <span>Password</span>
                    <input id="password" type="password" class="inp-full-width" name="password" placeholder="Enter your password" required>
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
                    <input id="password-confirm" type="password" class="inp-full-width" name="password_confirmation" placeholder="Confirm your password" required>
                    </label>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-full-width">Register</button>
                </div>

            </div>
        </form>
    </div>
@stop
