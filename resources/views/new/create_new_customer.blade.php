<!doctype html>
<html>
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
	
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>

  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <link href="assets/fontawesome-5.6.3/css/all.css" rel="stylesheet">
  <link href="assets/css/animate.min.css" rel="stylesheet">

  <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
  <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css" rel="stylesheet" type="text/css" />

  <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
  <link href="assets/css/style.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="assets/js/scripts.js"></script>
	
</head>

<body>
<div class="contentStatic-pageBody">

<header>
  <div id="ham-menu">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <div class="header-panel">
    <div class="container">
      <div class="postgroup-logo">
        <h1><a href="javascript:;"><img src="assets/images/postgroup-logo_blue.svg" class="img-fluid" alt=""></a></h1>
      </div>
      <div class="nav-inventory">
        <ul>
          <li><a href="javascript:;">Profile</a></li>
          <li><a href="javascript:;" class="actived">Request Form</a></li>
          <li><a href="javascript:;">Booking Inventory</a></li>
          <li><a href="javascript:;">Revenue</a></li>
          <li><a href="javascript:;">Campaign Report</a></li>
          <li><a href="javascript:;">Ad Network</a></li>
        </ul>
        <div class="box-logout"><a href="javascript:;">logout</a></div>
      </div>
    </div>
  </div>
</header>
<!-- nav -->
<div class="content-pd"></div>


<section class="contentStatic-pageContent">
  <div class="container">
    <div class="row container--inventory">
      <div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Create New Customer</h2>
          <form>

            <div class="content-pdb2">
              <div class="form-group row">
                <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Company name:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-auto col-sm-5 col-md-4 col-lg-3 col-form-label pt-0">Company Type:</label>
                <div class="col-auto col-sm-10 col-md-11 col-lg-12">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                    <label class="form-check-label" for="inlineRadio1">Direct</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Agency</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Company product:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Company tel no:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Company email:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <input type="text" class="form-control">
                </div>
              </div>
            </div>

            <div>
              <div class="bar-title"><strong>Contact person</strong></div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Full name:</label>
                <div class="col-sm-6 mb-sm-0 mb-3">
                  <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="Surname">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nickname:</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tel no:</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">E-mail:</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control">
                </div>
              </div>
            </div>

            <div class="text-center"><button type="submit" value="send" class="btn btn-submit">Confirm</button></div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>


<footer>
  <div class="footer-panel">Copyright &copy; 2020 Bangkok Post Public Company Limited - All rights reserved.</div>
</footer>

</div>

<script>


    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    });

</script>
</body>
</html>
