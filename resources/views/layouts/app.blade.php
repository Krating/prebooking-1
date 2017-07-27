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
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
        @if(Session::has('cart'))
        @php
            $items = Session::get('cart')->items;
            $totalPrice = Session::get('cart')->totalPrice;
            $num_items = count($items);
        @endphp
        @endif
    <div id="app">
        <nav class="navbar navbar-custom navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li>
                                <a href="#" data-toggle="modal" data-target="#myModal01">
                                    <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true" ></i> Shopping Cart
                                    <span class="badge">{{ Session::has('cart') ? $num_items != 0 ? $num_items : '' : '' }}</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
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

        <!-- Modal01 -->
            <div class="modal fade" id="myModal01" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal01 content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                @if(Session::has('cart'))
                                <div class="cart-container">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($items as $item)
                                            <tr>
                                                <td>{{ $item['item']['product_name'] }}</td>
                                                <td>{{ $item['qty'] }}</td>
                                                <td>{{ $item['price'] }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger" href="{{ route('booking.removeitem',['id'=>$item['item']['id']]) }}">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <tr>
                                                <td>Items on Cart:</td>
                                                <td>{{ $num_items }}</td>
                                            </tr>
                                            <tr>
                                                <td>Total Price:</td>
                                                <td>{{ $totalPrice }}</td>
                                            </tr>
                                        </table>
                                </div>
                                @else
                                <h2>No Item in Cart!</h2>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                
                </div>
            </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
