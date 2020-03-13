<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
	
  <!-- HTML5 Shim for IE -->
  <!--[if IE]>
    <script src="assets/js/html5.js"></script>
  <![endif]-->
	
<title>Bangkok Post</title>
<link rel="shortcut icon" href="image/bkp-title-logo.png" />
	
  <script type="text/javascript" src="<?= url('/') ?>/assets/js/jquery.min.js"></script>

  <link rel="stylesheet" href="<?= url('/') ?>/assets/bootstrap/css/bootstrap.css">
  <script src="<?= url('/') ?>/assets/bootstrap/js/bootstrap.min.js"></script>
  <link href="<?= url('/') ?>/assets/fontawesome-5.6.3/css/all.css" rel="stylesheet">
  <link href="<?= url('/') ?>/assets/css/animate.min.css" rel="stylesheet">
  
  <link href="<?= url('/') ?>/assets/css/custom.css" rel="stylesheet" type="text/css">
  <link href="<?= url('/') ?>/assets/css/style.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="<?= url('/') ?>/assets/js/scripts.js"></script>


    <script src="<?= url('/') ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <link href="<?= url('/') ?>/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= url('/') ?>/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css" rel="stylesheet" type="text/css" />
  
    

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
<body>

    <div id="app" class="contentStatic-pageBody">
    @guest <!--action if auth = guest-->
    @else <!--action if auth = user-->
        <header>
            <div id="ham-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="header-panel">
                <div class="container">
                <div class="postgroup-logo">
                    <h1><a href="/"><img src="assets/images/postgroup-logo_blue.svg" class="img-fluid" alt=""></a></h1>
                </div>
                <div class="nav-inventory">
                    <ul>
                    <li><a href="/profile" class="{{ Request::is('profile') ? 'actived' : '' }}">Profile</a></li>
                    <li><a href="/request_form" class="{{ Request::is('request_form') ? 'actived' : '' }}">Request Form</a></li>
                    <li><a href="/booking_inventory" class="{{ Request::is('booking_inventory') ? 'actived' : '' }}">Booking Inventory</a></li>
                    <li><a href="/revenue" class="{{ Request::is('revenue') ? 'actived' : '' }}">Revenue</a></li>
                    <li><a href="/campaign_report" class="{{ Request::is('campaign_report') ? 'actived' : '' }}">Campaign Report</a></li>
                    <li><a href="/ad_network" class="{{ Request::is('ad_network') ? 'actived' : '' }}">Ad Network</a></li>
                    </ul>
                    <div class="box-logout"><a href="{{ url('/logout') }}">logout</a></div>
                </div>
                </div>
            </div>
        </header>

        <div class="content-pd"></div>
        <div class="contentStatic-pageBody">
        <section class="contentStatic-pageContent">
            <div class="container">
                <!-- Flash Message -->
                @include('flash-message')
            <div class="row container--inventory">
            <!-- left sidebar -->
            <?php if(Request::is('profile') || Request::is('profile2') || Request::is('profile3') || Request::is('/') || Request::is('home')){ ?>
                <div class="col-auto div-profile--left bg-fff">
                    <div class="content-profile--left">
                        <div class="pofile-info">
                        
                        <div class="profile-avatar">
                            <a data-target="#myModal" data-toggle="modal"><span>Change</span></a>
                                <img src="<?= url('/').$user->profile_picture ?> " class="img-fluid">
                            </div>
                            <!-- modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
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
                                    <button class="btn btn-lg btn-success" type="submit">Upload</button>  
                                </form>

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            
                            </div>
                        </div>

                        <div class="profile-name">{{ $user->name }}</div>
                        </div>
                        <div class="nav-profile">
                        <ul>
                            <li><a href="/profile" class="{{ Request::is('profile') ? 'actived' : '' }}">My Account</a></li>
                            <li><a href="/profile2" class="{{ Request::is('profile2') ? 'actived' : '' }}">Inbox</a></li>
                            <li><a href="/profile3" class="{{ Request::is('profile3') ? 'actived' : '' }}">My Activities</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            <?php } ?> 
            @endguest
            
            <!-- content -->
            @yield('content')
            
            
            
        @guest <!--action if auth = guest-->
    @else <!--action if auth = user-->
                </div>
            </div>
        </section>
        <?php if(!Request::is('login')){ ?>
            <footer>
                <div class="footer-panel">Copyright &copy; 2020 Bangkok Post Public Company Limited - All rights reserved.</div>
            </footer>
        <?php } ?>
        </div>
    @endguest
</body>
</html>
