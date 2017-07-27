@extends('layouts.app')
@section('content')

    <div class="wrapper main-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
            <div class="login-container">
                <h1>Sign In to Your Account</h1>

                <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                <label for="login" class="form-field">
                    <span>Username or email address</span>
                    <input id="email" type="text" class="inp-full-width" name="login" value="{{ old('login') }}" required autofocus>
                    @if ($errors->has('login'))
                        <span class="help-block">
                            <strong>{{ $errors->first('login') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="form-field">
                    <span>Password</span>
                    <input id="password" type="password" class="inp-full-width" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </label>
                </div>

                <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-full-width">Sign In</button>
                </div>

                    <div class="login-other-choices">
                        <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                    </div>

            </div>
        </form>
    </div>
@stop
