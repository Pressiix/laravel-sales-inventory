<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" href="image/avatar.png"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #FFFFFF;
            color: grey;
            text-align: center;
        }

        li.nav-item{
            font-weight:bold;
        }

        .navbar-light .navbar-nav .active>.nav-link, 
        .navbar-light .navbar-nav .nav-link.active, 
        .navbar-light .navbar-nav .nav-link.show, 
        .navbar-light .navbar-nav .show>.nav-link {
            color: #295FCA;
        }
    </style>
</head>
<body style="background-color:#F5F5F6">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="display: block; margin: 0 auto;width:200px; height:40px;" src="/image/bkp-logo.png">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item {{ Request::is('profile') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('users.edit') }}">Profile</a>
                            </li>

                            <li class="nav-item {{ Request::is('request-form') ? 'active' : '' }}">
                                <a class="nav-link" href="/request-form">Request Form</a>
                            </li>

                            <li class="nav-item {{ Request::is('booking-inventory') ? 'active' : '' }}">
                                <a class="nav-link" href="/booking-inventory">Booking Inventory</a>
                            </li>

                            <li class="nav-item {{ Request::is('revenue/1') ? 'active' : '' }}">
                                <a class="nav-link" href="/revenue/1">Revenue</a>
                            </li>

                            <li class="nav-item {{ Request::is('campaign-report') ? 'active' : '' }}">
                                <a class="nav-link" href="/campaign-report">Campaign Report</a>
                            </li>

                            <li class="nav-item {{ Request::is('ad-network') ? 'active' : '' }}">
                                <a class="nav-link" href="/ad-network">Ad Network</a>
                            </li>

                            <li class="nav-item">
                                <button class="btn btn-primary btn-lg" onclick="window.location.href = '{{ url('/logout') }}';">Logout</button>
                                <!--<a class="nav-link" href="{{ url('/logout') }}"> logout </a>-->
                            </li>

                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <br/>
        <div class="container">
        <div class="row justify-content-center">
        <div class="row col-md-12">
        <?php if(!empty($user)){ ?>
            <div class="card col-md-2">
                <div class="card-body">
                    <img src="image/avatar.png" alt="Avatar" style="display:block;margin: 0 auto;width:100px;height:100px;border-radius: 50%;">
                    
                    <div class="text-center">
                        <h4><b>{{ $user->name }}</b></h4>
                    </div>
                    <hr>
                    <a href="profile">MY ACCOUNT</a><br/>
                    <a href="pending-list">INBOX</a><br/>
                    <a href="my-activity">MY ACTIVITIES</a>
                </div>
            </div>
            <div style="padding-left: 40px;"></div>
        <?php } ?>
        
            @yield('content')
        </div>
    </div>
    </div>
    <div style="padding-top: 100px;padding-bottom: 20px;"></div>
    <div class="footer" style="padding-top: 20px;padding-bottom: 15px;">
        <p>Copyright &copy; 2020 Bangkok Post Public Company Limited - All rights reserved.</p>
    </div>
</body>
</html>
