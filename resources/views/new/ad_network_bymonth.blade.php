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
          <li><a href="javascript:;">Revenue</a></li>
          <li><a href="javascript:;">Campaign Report</a></li>
          <li><a href="javascript:;" class="actived">Ad Network</a></li>
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
          <div class="box-title">
            <h2>AD Network Revenue Dashboard</h2>
            <div class="btn-create"><a href="campaign_report_create.html">Create AD Network</a></div>
          </div>
          <form>

            <div style="position: relative;">

              <div class="content-box--select">
                <div class="form-group row">
                  <div class="col-50">
                    <select class="custom-select s-ad">
                      <option selected>Select Month</option>
                      <option value="1">January</option>
                      <option value="2">February</option>
                      <option value="3">March</option>
                      <option value="4">April</option>
                      <option value="5">May</option>
                      <option value="6">June</option>
                      <option value="7">July</option>
                      <option value="8">August</option>
                      <option value="9">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                  </div>
                  <div class="col-50">
                    <select class="custom-select s-ad">
                      <option selected>Select Year</option>
                      <option value="1">2020</option>
                      <option value="2">2019</option>
                      <option value="3">2018</option>
                    </select>
                  </div>
                </div>
              </div>

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

                    <h3>September 2019</h3>
 
                    <div class="table-responsive table-dashboard">

                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-bkp">
                          <tr>
                            <th scope="col" class="bar-header" width="143">Date</th>
                            <th scope="col" colspan="4" class="bar-header">1-7 September 2019</th>
                            <th scope="col" colspan="4" class="bar-header">8-14 September 2019</th>
                          </tr>
                          <tr>
                            <th scope="col">Ad Network</th>
                            <th scope="col" width="110">Pageview</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                            <th scope="col" width="110">Pageview</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">AdAsia</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Outbrain</th>
                            <td class="text-nowrap">47,370</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap text-right">47,370</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">ADOP</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">AppNexus</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Prebid Facebook Audience Network</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Geniee</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Geniee</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          

                          <tr class="sum--bg-bkp">
                            <th scope="row" class="text-center">Total</th>
                            <td class="text-nowrap">15,632,822</td>
                            <td class="text-nowrap">$ 0.74</td>
                            <td class="text-nowrap">$ 11,501.07</td>
                            <td class="text-nowrap">107.56%</td>
                            <td class="text-nowrap">15,632,822</td>
                            <td class="text-nowrap">$ 0.74</td>
                            <td class="text-nowrap">$ 11,501.07</td>
                            <td class="text-nowrap">107.56%</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="table-responsive table-dashboard" style="padding-top: 20px;">

                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-bkp">
                          <tr>
                            <th scope="col" class="bar-header" width="143">Date</th>
                            <th scope="col" colspan="4" class="bar-header">15-21 September 2019</th>
                            <th scope="col" colspan="4" class="bar-header">22-31 September 2019</th>
                          </tr>
                          <tr>
                            <th scope="col">Ad Network</th>
                            <th scope="col" width="110">Pageview</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                            <th scope="col" width="110">Pageview</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">AdAsia</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Outbrain</th>
                            <td class="text-nowrap">47,370</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap text-right">47,370</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">ADOP</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">AppNexus</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Prebid Facebook Audience Network</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Geniee</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Geniee</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          

                          <tr class="sum--bg-bkp">
                            <th scope="row" class="text-center">Total</th>
                            <td class="text-nowrap">15,632,822</td>
                            <td class="text-nowrap">$ 0.74</td>
                            <td class="text-nowrap">$ 11,501.07</td>
                            <td class="text-nowrap">107.56%</td>
                            <td class="text-nowrap">15,632,822</td>
                            <td class="text-nowrap">$ 0.74</td>
                            <td class="text-nowrap">$ 11,501.07</td>
                            <td class="text-nowrap">107.56%</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    


                  </div>

                </div>
                <div class="tab-pane fade" id="posttoday" role="tabpanel" aria-labelledby="posttoday-tab">
                  
                  <div class="content-tablist">

                    <h3>September 2019</h3>

                    <div class="table-responsive table-dashboard">
                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-ptd">
                          <tr>
                            <th scope="col" class="bar-header" width="143">Date</th>
                            <th scope="col" colspan="4" class="bar-header">1-7 September 2019</th>
                            <th scope="col" colspan="4" class="bar-header">8-14 September 2019</th>
                          </tr>
                          <tr>
                            <th scope="col">Ad Network</th>
                            <th scope="col" width="110">Pageview</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                            <th scope="col" width="110">Pageview</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">AdAsia</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Outbrain</th>
                            <td class="text-nowrap">47,370</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap text-right">47,370</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">ADOP</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">AppNexus</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Prebid Facebook Audience Network</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Geniee</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Geniee</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          

                          <tr class="sum--bg-ptd">
                            <th scope="row" class="text-center">Total</th>
                            <td class="text-nowrap">15,632,822</td>
                            <td class="text-nowrap">$ 0.74</td>
                            <td class="text-nowrap">$ 11,501.07</td>
                            <td class="text-nowrap">107.56%</td>
                            <td class="text-nowrap">15,632,822</td>
                            <td class="text-nowrap">$ 0.74</td>
                            <td class="text-nowrap">$ 11,501.07</td>
                            <td class="text-nowrap">107.56%</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="table-responsive table-dashboard" style="padding-top: 20px;">
                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-ptd">
                          <tr>
                            <th scope="col" class="bar-header" width="143">Date</th>
                            <th scope="col" colspan="4" class="bar-header">1-7 September 2019</th>
                            <th scope="col" colspan="4" class="bar-header">8-14 September 2019</th>
                          </tr>
                          <tr>
                            <th scope="col">Ad Network</th>
                            <th scope="col" width="110">Pageview</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                            <th scope="col" width="110">Pageview</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">AdAsia</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Outbrain</th>
                            <td class="text-nowrap">47,370</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap text-right">47,370</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">ADOP</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">AppNexus</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Prebid Facebook Audience Network</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Geniee</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Geniee</th>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                          </tr>
                          

                          <tr class="sum--bg-ptd">
                            <th scope="row" class="text-center">Total</th>
                            <td class="text-nowrap">15,632,822</td>
                            <td class="text-nowrap">$ 0.74</td>
                            <td class="text-nowrap">$ 11,501.07</td>
                            <td class="text-nowrap">107.56%</td>
                            <td class="text-nowrap">15,632,822</td>
                            <td class="text-nowrap">$ 0.74</td>
                            <td class="text-nowrap">$ 11,501.07</td>
                            <td class="text-nowrap">107.56%</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>

                </div>
              </div>

            </div>


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
