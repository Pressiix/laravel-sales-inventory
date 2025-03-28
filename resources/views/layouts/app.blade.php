<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!--meta name="csrf-token" content="{{ csrf_token() }}" /-->
  <meta name="_token" content="{{csrf_token()}}" />
  <!-- HTML5 Shim for IE -->
  <!--[if IE]>
    <script src="assets/js/html5.js"></script>
  <![endif]-->
	
<title>Bangkok Post - Inventory</title>
<link rel="shortcut icon" href="<?= url('/') ?>/image/bkp-title-logo.png" />
	
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>

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
  
  <?php if(Request::is('backend/users-display')){ ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <?php } ?>
    

    <script type="text/javascript">
    

    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

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
    });
    </script>
</head>
<body>
    <script>
        var _des_page = '';

        //Confirm dialog for request form unload
        function showConfirmPopUp()
        {
            var _path = '<?= url('/') ?>'+window.location.pathname;
            if (_path.indexOf("request_form") >= 0)
            {
                event.preventDefault();
                    $('#confirmModal').modal();
            }
        }
        
    </script>
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
                    <h1><a href="/"><img src="<?= url('/') ?>/assets/images/postgroup-logo_blue.svg" class="img-fluid" alt=""></a></h1>
                </div>
                <div class="nav-inventory">
                    <ul>
                    <?php if(Auth::user()->hasRole('admin') && Auth::user()->username == "admin" ){ ?>
                        <li><a href="<?= URL::to('/') ?>/backend/users-display" class="{{ Request::is('backend/users-display') || Request::is('backend/roles-display') || Request::is('backend/permissions-display') ? 'actived' : '' }}">Backend</a></li>
                    <?php } ?>
                    <li><a href="<?= URL::to('/') ?>/profile" class="{{ Request::is('profile') ? 'actived' : '' }}" onclick="_des_page='<?= URL::to('/') ?>/profile';showConfirmPopUp();">Profile</a></li>
                    <li><a href="<?= URL::to('/') ?>/request_form" class="{{ Request::is('request_form') ? 'actived' : '' }}" onclick="_des_page='<?= URL::to('/') ?>/request_form';showConfirmPopUp();">Request Form</a></li>
                    <li><a href="<?= URL::to('/') ?>/inventory" class="{{ Request::is('inventory') ? 'actived' : '' }}" onclick="_des_page='<?= URL::to('/') ?>/inventory';showConfirmPopUp();">Booking Inventory</a></li>
                    <li><a href="<?= URL::to('/') ?>/revenue" class="{{ Request::is('revenue') ? 'actived' : '' }}" onclick="_des_page='<?= URL::to('/') ?>/revenue';showConfirmPopUp();">Revenue</a></li>
                    <li><a href="<?= URL::to('/') ?>/campaign_report" class="{{ Request::is('campaign_report') ? 'actived' : '' }}" onclick="_des_page='<?= URL::to('/') ?>/campaign_report';showConfirmPopUp();">Campaign Report</a></li>
                    <li><a href="<?= URL::to('/') ?>/ad_network" class="{{ Request::is('ad_network') ? 'actived' : '' }}" onclick="_des_page='<?= URL::to('/') ?>/ad_network';showConfirmPopUp();">Ad Network</a></li>
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
            <?php if(Request::is('profile') || Request::is('profile2') || Request::is('profile3') || Request::is('/')|| Request::is('home')){ ?>
                <div class="col-auto div-profile--left bg-fff">
                    <div class="content-profile--left">
                        <div class="pofile-info">

                        <a data-target="#myModal" data-toggle="modal">
                            <div class="profile-avatar">
                                <span>Change</span>
                                <img src="<?= ($user->profile_picture && file_exists(public_path().$user->profile_picture) ? url('/').$user->profile_picture : "/assets/images/icon-svg/avatar.svg") ?> " class="img-fluid">
                            </div>
                        </a>
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
                                    <img id="blah" src="{{ ($user->profile_picture!=='' ? url('/').$user->profile_picture : '') }}" alt="your image" width="140px" height="140px"/>
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

                        <div class="profile-name">{{ $user->firstname.' '.$user->lastname }}</div>
                        </div>
                        <div class="nav-profile">
                        <ul>
                            <li><a href="<?= URL::to('/') ?>/profile" class="{{ Request::is('profile') ? 'actived' : '' }}">My Account</a></li>
                            <li><a href="<?= URL::to('/') ?>/profile2" class="{{ Request::is('profile2') ? 'actived' : '' }}">Inbox</a></li>
                            <li><a href="<?= URL::to('/') ?>/profile3" class="{{ Request::is('profile3') ? 'actived' : '' }}">My Activities</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            <?php } 
            else{
                 if(Auth::user()->hasRole('admin') && strpos(Request::url(),"backend")){ ?>
                <div class="col-auto div-profile--left bg-fff">
                    <div class="content-profile--left">
                        <div class="pofile-info">
                            <div class="profile-name">Menu</div>
                        </div>
                        <div class="nav-profile">
                        <ul>
                            <li><a href="<?= URL::to('/') ?>/backend/users-display" class="{{ Request::is('backend/users-display') ? 'actived' : '' }}">User</a></li>
                            <li><a href="<?= URL::to('/') ?>/backend/roles-display" class="{{ Request::is('backend/roles-display') ? 'actived' : '' }}">Role</a></li>
                            <li><a href="<?= URL::to('/') ?>/backend/permissions-display" class="{{ Request::is('backend/permissions-display') ? 'actived' : '' }}">Permission</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            <?php }
                }
             ?>
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
