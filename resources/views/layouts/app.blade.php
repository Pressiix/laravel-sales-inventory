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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?v=0.10" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="display: block; margin: 0 auto;width:200px; height:40px;" src="image/bkp-logo.png">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.edit') }}">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="request-form">Request Form</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="booking-inventory">Booking Inventory</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Revenue</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Campaign Report</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Ad Network</a>
                            </li>

                            <li class="nav-item">
                                <button class="btn btn-primary " onclick="window.location.href = '{{ url('/logout') }}';">Logout</button>
                                <!--<a class="nav-link" href="{{ url('/logout') }}"> logout </a>-->
                            </li>

                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <br/>
        <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="row col-md-12">
        <?php if(!empty($user)){ ?>
            <div class="card col-md-3">
                <div class="card-body">
                    <img src="image/avatar.png" alt="Avatar" style="display:block;margin: 0 auto;width:150px;height:150px;border-radius: 50%;">
                    
                    <div class="text-center">
                        <h4><b>{{ $user->name }}</b></h4>
                    </div>
                    <hr>
                    <a href="/profile">MY ACCOUNT</a><br/>
                    <a href="/pending-list">INBOX</a><br/>
                    <a href="#">MY ACTIVITIES</a>
                </div>
            </div><div class="col-md-1-custom"></div>
        <?php } ?>
        
            @yield('content')
        </div>
    </div>
    </div>
</body>
</html>
