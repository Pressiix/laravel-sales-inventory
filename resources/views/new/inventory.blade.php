@extends('layouts.app')

@section('content')
<style>
  .custom-select {
    font-size: 14px;
    width: 100%;
    height: 30px;
}
.href-button{
    color: #fff;
    vertical-align: middle;
    border: none;
    outline: none;
    background: none;
    cursor: pointer;
    padding: 0;
}
</style>
      <div class="col-15 bg-fff">
        <div class="content-inventory--full">
          <div class="box-title">
            <h2>Inventory Dashboard</h2>
            <div class="btn-create"><a href="campaign_report_create.html">Create Inventory</a></div>
          </div>
          

            <div style="position: relative;">

              <div class="content-box--select">
                <div class="form-group row">
                  <div class="col-6">
                    <select class="custom-select">
                      <option selected>Month</option>
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
                  <div class="col-5">
                    <select class="custom-select">
                      <option selected>Year</option>
                      <option value="1">2020</option>
                      <option value="2">2019</option>
                      <option value="3">2018</option>
                    </select>
                  </div>
                  <div class="col-4"><a href="javascript:;" class="btn btn-click2">Apply</a></div>
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

                    <h3>Homepage</h3>
                    <div class="content-box--select2">
                      <div class="form-group row">
                        <div class="col-11 col-sm-9">
                          <select class="custom-select">
                            <option selected>Select</option>
                            <option value="1">Select 1</option>
                            <option value="2">Select 2</option>
                            <option value="3">Select 3</option>
                          </select>
                        </div>
                        <div class="col-4"><a href="javascript:;" class="btn btn-click2">Apply</a></div>
                      </div>
                    </div>
 
                    <div class="table-responsive table-dashboard inventory-dashboard">

                      <table class="table table-bordered text-center">
                        <thead class="thead-bkp">
                          <tr>
                            <th scope="col" rowspan="3" class="bar-header1">Campaign</th>
                            <th scope="col" colspan="32" class="bar-header2"><div class="div-barheader2">January 2019</div></th>
                          </tr>
                          <tr>
                            <th scope="col" colspan="8">Week 1</th>
                            <th scope="col" colspan="8">Week 2</th>
                            <th scope="col" colspan="8">Week 3</th>
                            <th scope="col" colspan="8">Week 4</th>
                          </tr>
                          <tr>
                            <th scope="col" width="60">1</th>
                            <th scope="col" width="60">2</th>
                            <th scope="col" width="60">3</th>
                            <th scope="col" width="60">4</th>
                            <th scope="col" width="60">5</th>
                            <th scope="col" width="60">6</th>
                            <th scope="col" width="60">7</th>
                            <th scope="col" width="60">(1-7)</th>
                            <th scope="col" width="60">1</th>
                            <th scope="col" width="60">2</th>
                            <th scope="col" width="60">3</th>
                            <th scope="col" width="60">4</th>
                            <th scope="col" width="60">5</th>
                            <th scope="col" width="60">6</th>
                            <th scope="col" width="60">7</th>
                            <th scope="col" width="50">(1-7)</th>
                            <th scope="col" width="60">1</th>
                            <th scope="col" width="60">2</th>
                            <th scope="col" width="60">3</th>
                            <th scope="col" width="60">4</th>
                            <th scope="col" width="60">5</th>
                            <th scope="col" width="60">6</th>
                            <th scope="col" width="60">7</th>
                            <th scope="col" width="50">(1-7)</th>
                            <th scope="col" width="60">1</th>
                            <th scope="col" width="60">2</th>
                            <th scope="col" width="60">3</th>
                            <th scope="col" width="60">4</th>
                            <th scope="col" width="60">5</th>
                            <th scope="col" width="60">6</th>
                            <th scope="col" width="60">7</th>
                            <th scope="col" width="50">(1-7)</th>
                          </tr>
                        </thead>
                        <tbody class="tbody-bkp">
                          <tr>
                            <td colspan="33" class="td-header">Leader Board</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail" data-toggle="modal" data-target="#bkpModal-1"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">Sticky</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">Hybrid</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">Multi</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">LEADER BOARD <span>(mobile)</span></td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">STICKY <span>(mobile)</span></td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">HYBRID <span>(mobile)</span></td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">MULTI <span>(mobile)</span></td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>


                  </div>

                  <div class="box-border--center">
                    <button data-target="<?php //echo "#myModal"; ?>" data-toggle="modal" type="submit" value="send" class="btn btn-submit">import inventory</button>
                    <button type="submit" value="send" class="btn btn-submit">download</button>
                  </div>

                </div>
                <div class="tab-pane fade" id="posttoday" role="tabpanel" aria-labelledby="posttoday-tab">
                  
                  <div class="content-tablist">

                    <h3>Homepage</h3>
                    <div class="content-box--select2">
                      <div class="form-group row">
                        <div class="col-11 col-sm-9">
                          <select class="custom-select">
                            <option selected>Select</option>
                            <option value="1">Select 1</option>
                            <option value="2">Select 2</option>
                            <option value="3">Select 3</option>
                          </select>
                        </div>
                        <div class="col-4"><a href="javascript:;" class="btn btn-click2">Apply</a></div>
                      </div>
                    </div>

                    <div class="table-responsive table-dashboard inventory-dashboard">

                      <table class="table table-bordered text-center">
                        <thead class="thead-ptd">
                          <tr>
                            <th scope="col" rowspan="3" class="bar-header1">Campaign</th>
                            <th scope="col" colspan="32" class="bar-header2"><div class="div-barheader2">January 2019</div></th>
                          </tr>
                          <tr>
                            <th scope="col" colspan="8">Week 1</th>
                            <th scope="col" colspan="8">Week 2</th>
                            <th scope="col" colspan="8">Week 3</th>
                            <th scope="col" colspan="8">Week 4</th>
                          </tr>
                          <tr>
                            <th scope="col" width="60">1</th>
                            <th scope="col" width="60">2</th>
                            <th scope="col" width="60">3</th>
                            <th scope="col" width="60">4</th>
                            <th scope="col" width="60">5</th>
                            <th scope="col" width="60">6</th>
                            <th scope="col" width="60">7</th>
                            <th scope="col" width="60">(1-7)</th>
                            <th scope="col" width="60">1</th>
                            <th scope="col" width="60">2</th>
                            <th scope="col" width="60">3</th>
                            <th scope="col" width="60">4</th>
                            <th scope="col" width="60">5</th>
                            <th scope="col" width="60">6</th>
                            <th scope="col" width="60">7</th>
                            <th scope="col" width="50">(1-7)</th>
                            <th scope="col" width="60">1</th>
                            <th scope="col" width="60">2</th>
                            <th scope="col" width="60">3</th>
                            <th scope="col" width="60">4</th>
                            <th scope="col" width="60">5</th>
                            <th scope="col" width="60">6</th>
                            <th scope="col" width="60">7</th>
                            <th scope="col" width="50">(1-7)</th>
                            <th scope="col" width="60">1</th>
                            <th scope="col" width="60">2</th>
                            <th scope="col" width="60">3</th>
                            <th scope="col" width="60">4</th>
                            <th scope="col" width="60">5</th>
                            <th scope="col" width="60">6</th>
                            <th scope="col" width="60">7</th>
                            <th scope="col" width="50">(1-7)</th>
                          </tr>
                        </thead>
                        <tbody class="tbody-ptd">
                          <tr>
                            <td colspan="33" class="td-header">Leader Board</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail" data-toggle="modal" data-target="#ptdModal-1"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">Sticky</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">Hybrid</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap">25,000</td>
                            <td class="text-nowrap"><strong>175,000</strong></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>


                  </div>

                  <div class="box-border--center">
                    <button data-target="<?php //echo "#myModal"; ?>" data-toggle="modal" type="submit" value="send" class="btn btn-submit">import inventory</button>
                    <button type="submit" value="send" class="btn btn-submit">download</button>
                  </div>

                </div>
              </div>

            </div>
            <!-- modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title"><b>Upload your excel file</b></h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                      <form action="{{ url('/inventory-import') }}" method="POST" enctype="multipart/form-data" runat="server">
                          {{ csrf_field() }}
                          {{ method_field('POST') }}
                          <input type='file' name="excel" />
                          <button class="btn btn-lg btn-success" type="submit">Upload</button>  
                      </form>
                    </div>
                    <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                 </div>
                </div>
        </div>
      </div>


<!-- The Modal -- bangkokpost -->
<div class="modal" id="bkpModal-1">
  <div class="modal-dialog modal-dialog-scrollable inventory-model">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">BangkokPost - Homepage</h3>
        <div class="invent-title">Leader Board</div>
        <button type="button" class="close" data-dismiss="modal"><img src="assets/images/icon-svg/close.svg"></button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">

        <div class="table-responsive table-dashboard--popup">

          <table class="table table-bordered table-striped">
            <thead class="thead-bkp">
              <tr>
                <th scope="col">Campaign</th>
                <th scope="col">Sale Name</th>
                <th scope="col">Impression</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            
            <tbody>
              <tr>
                <td class="text-nowrap">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap">210,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Impact Exibition</td>
                <td class="text-nowrap">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap">25,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap">165,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap">210,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Impact Exibition</td>
                <td class="text-nowrap">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap">25,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap">165,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap">210,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Impact Exibition</td>
                <td class="text-nowrap">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap">25,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap">165,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap">210,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Impact Exibition</td>
                <td class="text-nowrap">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap">25,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap">165,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>

            </tbody>
          </table>
        </div>

      </div>

    </div>
  </div>
</div>




<!-- The Modal -- posttoday -->
<div class="modal modal-ptd" id="ptdModal-1">
  <div class="modal-dialog modal-dialog-scrollable inventory-model">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">Posttoday - Homepage</h3>
        <div class="invent-title">Leader Board</div>
        <button type="button" class="close" data-dismiss="modal"><img src="assets/images/icon-svg/close.svg"></button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">

        <div class="table-responsive table-dashboard--popup">

          <table class="table table-bordered table-striped">
            <thead class="thead-ptd">
              <tr>
                <th scope="col">Campaign</th>
                <th scope="col">Sale Name</th>
                <th scope="col">Impression</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-nowrap">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap">210,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Impact Exibition</td>
                <td class="text-nowrap">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap">25,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap">165,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap">210,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Impact Exibition</td>
                <td class="text-nowrap">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap">25,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap">165,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap">210,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Impact Exibition</td>
                <td class="text-nowrap">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap">25,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap">165,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap">210,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">Impact Exibition</td>
                <td class="text-nowrap">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap">25,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap">165,000</td>
                <td class="text-nowrap">&nbsp;</td>
              </tr>

            </tbody>
          </table>
        </div>

      </div>

    </div>
  </div>
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
@endsection
