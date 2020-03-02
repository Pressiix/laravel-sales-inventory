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
          <li><a href="javascript:;">Request Form</a></li>
          <li><a href="javascript:;">Booking Inventory</a></li>
          <li><a href="javascript:;" class="actived">Revenue</a></li>
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
        <div class="content-inventory--full">
          <h2>Revenue Report</h2>
          <form>

            <div class="content-pdb2">
              <div class="form-group">
                 <div class="input-daterange datepicker">
                  <div class="input-group-inline"><span><strong>Period:</strong></span></div>
                  <div class="input-group-inline">
                    <span>From</span>
                    <input type="text" class="form-control form-input--date" name="start">
                    <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                  </div>
                  <div class="input-group-inline">
                    <span>to</span>
                    <input type="text" class="form-control form-input--date" name="end">
                    <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="content-border">

              <ul class="nav nav-tabs nav-requestForm" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="bangkokpost-tab" data-toggle="tab" href="#bangkokpost" role="tab" aria-controls="bangkokpost" aria-selected="true">Bangkokpost</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="posttoday-tab" data-toggle="tab" href="#posttoday" role="tab" aria-controls="posttoday" aria-selected="false">Posttoday</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="bangkokpost" role="tabpanel" aria-labelledby="bangkokpost-tab">
                  
                  <div class="content-tablist">
 
                    <div class="table-responsive table-inventory">
                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-bkp">
                          <tr>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Date</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Sale name</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>PT/BP</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Section</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Position</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Campaign type</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Impression</span></th>
                            <th scope="col" class="text-nowrap"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Campaign<br>Budget (THB)</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Detail</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Start Date</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>End Date</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Event</span></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1/11/2019</th>
                            <td class="text-left text-nowrap">Sasiwimon Maneekun</td>
                            <td>BP</td>
                            <td class="text-nowrap">Thailand</td>
                            <td class="text-nowrap">Coverpage+Leaderboard</td>
                            <td class="text-nowrap">UK Government</td>
                            <td class="text-right">9,250,000</td>
                            <td class="text-right">95,000</td>
                            <td class="text-nowrap">ไม่มี Quotation</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">1-30 Nov 19</td>
                          </tr>
                          <tr>
                            <th scope="row">28/2/2020</th>
                            <td class="text-left text-nowrap">Pimprai Panyalakshana</td>
                            <td>PT</td>
                            <td class="text-nowrap">Business</td>
                            <td class="text-nowrap">LB</td>
                            <td class="text-nowrap">SCB</td>
                            <td class="text-right">45,000</td>
                            <td class="text-right">1,800,000</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">11 Nov - 15 Dec 19</td>
                          </tr>
                          <tr>
                            <th scope="row">1/11/2019</th>
                            <td class="text-left text-nowrap">Sasiwimon Maneekun</td>
                            <td>BP</td>
                            <td class="text-nowrap">Thailand</td>
                            <td class="text-nowrap">Coverpage+Leaderboard</td>
                            <td class="text-nowrap">UK Government</td>
                            <td class="text-right">9,250,000</td>
                            <td class="text-right">95,000</td>
                            <td class="text-nowrap">ไม่มี Quotation</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">1-30 Nov 19</td>
                          </tr>
                          <tr>
                            <th scope="row">28/2/2020</th>
                            <td class="text-left text-nowrap">Pimprai Panyalakshana</td>
                            <td>PT</td>
                            <td class="text-nowrap">Business</td>
                            <td class="text-nowrap">LB</td>
                            <td class="text-nowrap">SCB</td>
                            <td class="text-right">45,000</td>
                            <td class="text-right">1,800,000</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">11 Nov - 15 Dec 19</td>
                          </tr>
                          <tr>
                            <th scope="row">1/11/2019</th>
                            <td class="text-left text-nowrap">Sasiwimon Maneekun</td>
                            <td>BP</td>
                            <td class="text-nowrap">Thailand</td>
                            <td class="text-nowrap">Coverpage+Leaderboard</td>
                            <td class="text-nowrap">UK Government</td>
                            <td class="text-right">9,250,000</td>
                            <td class="text-right">95,000</td>
                            <td class="text-nowrap">ไม่มี Quotation</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">1-30 Nov 19</td>
                          </tr>
                          <tr>
                            <th scope="row">28/2/2020</th>
                            <td class="text-left text-nowrap">Pimprai Panyalakshana</td>
                            <td>PT</td>
                            <td class="text-nowrap">Business</td>
                            <td class="text-nowrap">LB</td>
                            <td class="text-nowrap">SCB</td>
                            <td class="text-right">45,000</td>
                            <td class="text-right">1,800,000</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">11 Nov - 15 Dec 19</td>
                          </tr>
                          <tr>
                            <th scope="row">1/11/2019</th>
                            <td class="text-left text-nowrap">Sasiwimon Maneekun</td>
                            <td>BP</td>
                            <td class="text-nowrap">Thailand</td>
                            <td class="text-nowrap">Coverpage+Leaderboard</td>
                            <td class="text-nowrap">UK Government</td>
                            <td class="text-right">9,250,000</td>
                            <td class="text-right">95,000</td>
                            <td class="text-nowrap">ไม่มี Quotation</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">1-30 Nov 19</td>
                          </tr>
                          <tr>
                            <th scope="row">28/2/2020</th>
                            <td class="text-left text-nowrap">Pimprai Panyalakshana</td>
                            <td>PT</td>
                            <td class="text-nowrap">Business</td>
                            <td class="text-nowrap">LB</td>
                            <td class="text-nowrap">SCB</td>
                            <td class="text-right">45,000</td>
                            <td class="text-right">1,800,000</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">11 Nov - 15 Dec 19</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>

                </div>
                <div class="tab-pane fade" id="posttoday" role="tabpanel" aria-labelledby="posttoday-tab">
                  
                  <div class="content-tablist">

                    <div class="table-responsive table-inventory">
                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-ptd">
                          <tr>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Date</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Sale name</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>PT/BP</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Section</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Position</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Campaign type</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Impression</span></th>
                            <th scope="col" class="text-nowrap"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Campaign<br>Budget (THB)</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Detail</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Start Date</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>End Date</span></th>
                            <th scope="col"><a href="javascript:;" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Event</span></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1/11/2019</th>
                            <td class="text-left text-nowrap">Sasiwimon Maneekun</td>
                            <td>BP</td>
                            <td class="text-nowrap">Thailand</td>
                            <td class="text-nowrap">Coverpage+Leaderboard</td>
                            <td class="text-nowrap">UK Government</td>
                            <td class="text-right">9,250,000</td>
                            <td class="text-right">95,000</td>
                            <td class="text-nowrap">ไม่มี Quotation</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">1-30 Nov 19</td>
                          </tr>
                          <tr>
                            <th scope="row">28/2/2020</th>
                            <td class="text-left text-nowrap">Pimprai Panyalakshana</td>
                            <td>PT</td>
                            <td class="text-nowrap">Business</td>
                            <td class="text-nowrap">LB</td>
                            <td class="text-nowrap">SCB</td>
                            <td class="text-right">45,000</td>
                            <td class="text-right">1,800,000</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">11 Nov - 15 Dec 19</td>
                          </tr>
                          <tr>
                            <th scope="row">1/11/2019</th>
                            <td class="text-left text-nowrap">Sasiwimon Maneekun</td>
                            <td>BP</td>
                            <td class="text-nowrap">Thailand</td>
                            <td class="text-nowrap">Coverpage+Leaderboard</td>
                            <td class="text-nowrap">UK Government</td>
                            <td class="text-right">9,250,000</td>
                            <td class="text-right">95,000</td>
                            <td class="text-nowrap">ไม่มี Quotation</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">1-30 Nov 19</td>
                          </tr>
                          <tr>
                            <th scope="row">28/2/2020</th>
                            <td class="text-left text-nowrap">Pimprai Panyalakshana</td>
                            <td>PT</td>
                            <td class="text-nowrap">Business</td>
                            <td class="text-nowrap">LB</td>
                            <td class="text-nowrap">SCB</td>
                            <td class="text-right">45,000</td>
                            <td class="text-right">1,800,000</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">11 Nov - 15 Dec 19</td>
                          </tr>
                          <tr>
                            <th scope="row">1/11/2019</th>
                            <td class="text-left text-nowrap">Sasiwimon Maneekun</td>
                            <td>BP</td>
                            <td class="text-nowrap">Thailand</td>
                            <td class="text-nowrap">Coverpage+Leaderboard</td>
                            <td class="text-nowrap">UK Government</td>
                            <td class="text-right">9,250,000</td>
                            <td class="text-right">95,000</td>
                            <td class="text-nowrap">ไม่มี Quotation</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">1-30 Nov 19</td>
                          </tr>
                          <tr>
                            <th scope="row">28/2/2020</th>
                            <td class="text-left text-nowrap">Pimprai Panyalakshana</td>
                            <td>PT</td>
                            <td class="text-nowrap">Business</td>
                            <td class="text-nowrap">LB</td>
                            <td class="text-nowrap">SCB</td>
                            <td class="text-right">45,000</td>
                            <td class="text-right">1,800,000</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">11 Nov - 15 Dec 19</td>
                          </tr>
                          <tr>
                            <th scope="row">1/11/2019</th>
                            <td class="text-left text-nowrap">Sasiwimon Maneekun</td>
                            <td>BP</td>
                            <td class="text-nowrap">Thailand</td>
                            <td class="text-nowrap">Coverpage+Leaderboard</td>
                            <td class="text-nowrap">UK Government</td>
                            <td class="text-right">9,250,000</td>
                            <td class="text-right">95,000</td>
                            <td class="text-nowrap">ไม่มี Quotation</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">1-30 Nov 19</td>
                          </tr>
                          <tr>
                            <th scope="row">28/2/2020</th>
                            <td class="text-left text-nowrap">Pimprai Panyalakshana</td>
                            <td>PT</td>
                            <td class="text-nowrap">Business</td>
                            <td class="text-nowrap">LB</td>
                            <td class="text-nowrap">SCB</td>
                            <td class="text-right">45,000</td>
                            <td class="text-right">1,800,000</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td>1/11/2019</td>
                            <td>1/11/2019</td>
                            <td class="text-nowrap">11 Nov - 15 Dec 19</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>

                </div>
              </div>

            </div>

            <div class="text-center"><button type="submit" value="send" class="btn btn-submit">download</button></div>

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

    $('#myTab a#posttoday-tab').on('click', function (e) {
      e.preventDefault()
      $('.nav-requestForm').addClass('tabs--ptd');
    })
    $('#myTab a#bangkokpost-tab').on('click', function (e) {
      e.preventDefault()
      $('.nav-requestForm').removeClass('tabs--ptd');
    })


</script>
</body>
</html>
