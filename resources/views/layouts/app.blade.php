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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <style>
        
        span {
            left:0;
            text-align:center;
            width:100%;
            background:rgba(255,255,255,0.5);
            bottom:0;
            padding:20px 0;
        }
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

        a.active{
            color: #295FCA;
            font-weight:bold;
        }
    </style>
    <script type="text/javascript">
    $( document ).ready(function() {
        /** Preview image before upload */
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
            }

            $("#imgInp").change(function() {
                readURL(this);
            });
            /******************************************* */

    });
    </script>
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
                    <!--<img src="image/avatar.png" alt="Avatar" style="display:block;margin: 0 auto;width:100px;height:100px;border-radius: 50%;">-->
                    <div class="img-thumbnail img-circle">
                        <div style="position: relative; padding: 0; cursor: pointer;display:block;margin: 0 auto;" type="file">
                        <img src="{{ url('/').$user->profile_picture }}" class="rounded-circle" width="120px" height="120px"> 
                            <a style="{{ Request::is('profile') ? '' : 'display:none;' }}" data-target="#myModal" data-toggle="modal"><span style="position: absolute; color: #000; "><i class="fa fa-camera"></i></span></a>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><b>Upload your profile picture</b></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                            
                            <form action="{{ url('/upload-image') }}" method="POST" enctype="multipart/form-data" runat="server">
                                <img id="blah" src="{{ url('/').$user->profile_picture }}" alt="your image" width="140px" height="140px"/>
                                <br/><br/>
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <input type='file' name="image" id="imgInp" />
                                <br/><br/>
                                <button class="btn btn-lg btn-success" type="submit">Submit</button>  
                            </form>

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <h4><b>{{ $user->name }}</b></h4>
                    </div>
                    <hr>
                    <a class="{{ Request::is('profile') ? 'active' : '' }}" href="profile">MY ACCOUNT</a><br/>
                    <a class="{{ Request::is('pending-list') ? 'active' : '' }}" href="pending-list">INBOX</a><br/>
                    <a class="{{ Request::is('my-activity') ? 'active' : '' }}" href="my-activity">MY ACTIVITIES</a>
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
