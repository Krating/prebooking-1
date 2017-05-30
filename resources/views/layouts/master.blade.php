<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">



    <!-- Scripts -->
    <script>
        window.Laravel = {
        !!json_encode([
                'csrfToken' = > csrf_token(),
        ])
        !!
        }
        ;
    </script>
</head>
<body class="main-bodsy">
<nav class="navbar navbar-custom navbar-fixed-top">
    <!-- Collapsed Hamburger -->
    <div class="container-fluid">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}

        </a>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if(Auth::guest())
                <li><a href="{{route('login') }}">Login</a></li>
                <li><a href="{{route('register') }}">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{Auth::user()->username}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            @if(Auth::user()->role_id === 1)
                                @php
                                $admin = Auth::user();
                                @endphp
                                <a href="{{ route('admin.edit', $admin->id) }}">Change Password</a>
                            @else
                                <a href="{{ route('customer.profile') }}">Profile</a>
                                <a href="{{ route('myorder.index') }}">My Orders</a>
                                <a href="{{ route('customer.coupon') }}">Coupons</a>
                            @endif
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                </form>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!--    side nav-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <!-- <div class="sidebar-toolbar text-center">
                    <img src="https://www.booknpay.net/secure/admin/assets/img/userb.png" class="img-circle" alt="User Image">
                <div class="sidebar-content">
                    <h3>Image</h3>
                </div>
            </div> -->
            <ul class="nav nav-sidebar navbar-fixed-left">

                <li><a href="{{ route('admin.index') }}">Dashboard<span class="sr-only">(current)</span></a></li>
                <li><a data-toggle="collapse" href="#collapse1">User Management</a></li>
                    <div id="collapse1" class="panel-collapse collapse">
                        <ul class="list-group">
                            <a class="list-group-item" href="{{ route('user-management.admin') }}">Admin</a>
                            <a class="list-group-item" href="{{ route('user-management.customer') }}">Customer</a>
                            <a class="list-group-item" href="{{ route('admin.blacklists') }}">Blacklist</a>
                        </ul>
                    </div>
                <li><a data-toggle="collapse" href="#collapse2">Stock Management</a></li>
                    <div id="collapse2" class="panel-collapse collapse">
                        <ul class="list-group">
                            <a class="list-group-item" href="{{ route('category.index') }}">Category</a>
                            <a class="list-group-item" href="{{ route('product.index') }}">Product</a>
                            <a class="list-group-item" href="{{ route('promotion.index') }}">Promotion</a>
                        </ul>
                    </div>
                <li><a href="{{ route('booking.index') }}">Booking</a></li>
                <li><a href="{{ route('payment.index') }}">Payment</a></li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 content-index">
            @yield('content')
        </div>
    </div>
</div>
<!--footer    -->
<nav class="navbar navbar-footer navbar-fixed-bottom">
    <div class="container-fluid">
        <div class="main-footer">
            © 2017, Tecmove, All rights reserved
        </div>
    </div>
</nav>

<!-- Scripts -->
<script src="{{asset('js/app.js') }}"></script>
</body>
</html>
