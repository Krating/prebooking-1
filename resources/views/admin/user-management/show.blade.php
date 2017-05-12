@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>Profile</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <strong>Username:</strong>
                            {{ $user->username }}
                        </div>
                        <div class="form-group">
                            <strong>Firstname:</strong>
                            {{ $user->first_name }}
                        </div>
                        <div class="form-group">
                            <strong>Lastname:</strong>
                            {{ $user->last_name }}
                        </div>
						<div class="form-group">
                            <strong>Gender:</strong>
                            {{ $user->gender }}
                        </div>
                        <div class="form-group">
                            <strong>Date of Birth:</strong>
                            {{ $user->birthday }}
                        </div>
                        <div class="form-group">
                            <strong>E-mail:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $user->address }}
                        </div>

                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('user-management.customer') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@stop