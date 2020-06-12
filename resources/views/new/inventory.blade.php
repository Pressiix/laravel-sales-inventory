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

#tdHeader{
  text-align:left;
  font-size: 14px;
  padding-left: 10px;
}
</style>
      <div class="col-15 bg-fff">
        <div class="content-inventory--full">
          <div class="box-title">
            <h2>Inventory Dashboard</h2>
            <div class="btn-create"><a href="#">Create Inventory</a></div>
          </div>
          

            <div style="position: relative;">
            {{ Form::open(['route' => '/inventory', 'method' => 'GET'])}}
              <div class="content-box--select">
                <div class="form-group row">
                
                  <div class="col-6">
                    <select name="month" class="custom-select" required>
                      <option value="" selected="">Month</option>
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                  </div>
                  <div class="col-5">
                    <select name="year" class="custom-select" required>
                      <option value="" selected="">Year</option>
                      <option value="2020">2020</option>
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                    </select>
                  </div>
                  <div class="col-4"><button type="submit" class="btn btn-click2">Apply</button></div>
                  
                </div>
              </div>
              {{ Form::close() }}
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
                    {{ Form::open(['route' => '/inventory', 'method' => 'GET'])}}
                      <div class="form-group row">
                        <div class="col-11 col-sm-9">
                          <select name="section" class="custom-select">
                            <option value="" selected>Select</option>
                            <option value="Home">Home</option>
                            <option value="Business">Business</option>
                            <option value="Thailand">Thailand</option>
                            <option value="World">World</option>
                            <option value="Life">Life</option>
                            <option value="Opinion">Opinion</option>
                            <option value="Auto">Auto</option>
                            <option value="Learning">Learning</option>
                            <option value="Video">Video</option>
                            <option value="Sport">Sport</option>
                            <option value="Travel">Travel</option>
                            <option value="Tech">Tech</option>
                            <option value="Property">Property</option>
                            <option value="Photo">Photo</option>
                            <option value="Jobs">Jobs</option>
                          </select>
                        </div>
                        <div class="col-4"><a href="javascript:;" class="btn btn-click2">Apply</a></div>
                      </div>
                      {{ Form::close() }}
                    </div>
 
                    <div class="table-responsive table-dashboard inventory-dashboard">

                      <table id="bkp" class="table table-bordered text-center">
                        <thead class="thead-bkp">
                          <tr class="cannot-select">
                            <th scope="col" rowspan="3" class="bar-header1">Campaign</th>
                            <th scope="col" colspan="32" class="bar-header2"><div class="div-barheader2">January 2019</div></th>
                          </tr>
                          <tr class="cannot-select">
                            <th scope="col" colspan="8">Week 1</th>
                            <th scope="col" colspan="8">Week 2</th>
                            <th scope="col" colspan="8">Week 3</th>
                            <th scope="col" colspan="8">Week 4</th>
                          </tr>
                          <tr>
                            <th scope="col" index="Campaign" style="display:none;">Campaign</th>
                            <th scope="col" index="1" width="60">1</th>
                            <th scope="col" index="2" width="60">2</th>
                            <th scope="col" index="3" width="60">3</th>
                            <th scope="col" index="4" width="60">4</th>
                            <th scope="col" index="5" width="60">5</th>
                            <th scope="col" index="6" width="60">6</th>
                            <th scope="col" index="7" width="60">7</th>
                            <th scope="col" index="week1" width="60">(1-7)</th>
                            <th scope="col" index="8" width="60">1</th>
                            <th scope="col" index="9" width="60">2</th>
                            <th scope="col" index="10" width="60">3</th>
                            <th scope="col" index="11" width="60">4</th>
                            <th scope="col" index="12" width="60">5</th>
                            <th scope="col" index="13" width="60">6</th>
                            <th scope="col" index="14" width="60">7</th>
                            <th scope="col" index="week2" width="50">(1-7)</th>
                            <th scope="col" index="15" width="60">1</th>
                            <th scope="col" index="16" width="60">2</th>
                            <th scope="col" index="17" width="60">3</th>
                            <th scope="col" index="18" width="60">4</th>
                            <th scope="col" index="19" width="60">5</th>
                            <th scope="col" index="20" width="60">6</th>
                            <th scope="col" index="21" width="60">7</th>
                            <th scope="col" index="week3" width="50">(1-7)</th>
                            <th scope="col" index="22" width="60">1</th>
                            <th scope="col" index="23" width="60">2</th>
                            <th scope="col" index="24" width="60">3</th>
                            <th scope="col" index="25" width="60">4</th>
                            <th scope="col" index="26" width="60">5</th>
                            <th scope="col" index="27" width="60">6</th>
                            <th scope="col" index="28" width="60">7</th>
                            <th scope="col" index="week4" width="50">(1-7)</th>
                          </tr>
                        </thead>
                        <tbody class="tbody-bkp">
                          <tr>
                            <td colspan="33" class="td-header">Leader Board</td>
                          </tr>
                          <tr class="cannot-select">
                            <td id="tdHeader" scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail" data-toggle="modal" data-target="#bkpModal-1"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></td>
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
                            <td scope="row" id="tdHeader" class="text-nowrap">Inventory</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">175,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <td scope="row" id="tdHeader" class="text-nowrap">Available</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">Sticky</td>
                          </tr>
                          <tr class="cannot-select">
                            <td id="tdHeader" scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></td>
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
                            <td scope="row" id="tdHeader" class="text-nowrap">Inventory</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <td scope="row" id="tdHeader" class="text-nowrap">Available</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">Hybrid</td>
                          </tr>
                          <tr class="cannot-select">
                            <td id="tdHeader" scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></td>
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
                            <td scope="row" id="tdHeader" class="text-nowrap">Inventory</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <td scope="row" id="tdHeader" class="text-nowrap">Available</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">Multi</td>
                          </tr>
                          <tr class="cannot-select">
                            <td id="tdHeader" scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></td>
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
                            <td scope="row" id="tdHeader" class="text-nowrap">Inventory</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <td scope="row" id="tdHeader" class="text-nowrap">Available</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">LEADER BOARD <span>(mobile)</span></td>
                          </tr>
                          <tr class="cannot-select">
                            <td id="tdHeader" scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></td>
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
                            <td scope="row" id="tdHeader" class="text-nowrap">Inventory</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <td scope="row" id="tdHeader" class="text-nowrap">Available</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">STICKY <span>(mobile)</span></td>
                          </tr>
                          <tr class="cannot-select">
                            <td id="tdHeader" scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></td>
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
                            <td scope="row" id="tdHeader" class="text-nowrap">Inventory</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <td scope="row" id="tdHeader" class="text-nowrap">Available</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">HYBRID <span>(mobile)</span></td>
                          </tr>
                          <tr class="cannot-select">
                            <td id="tdHeader" scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></td>
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
                            <td scope="row" id="tdHeader" class="text-nowrap">Inventory</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <td scope="row" id="tdHeader" class="text-nowrap">Available</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">MULTI <span>(mobile)</span></td>
                          </tr>
                          <tr class="cannot-select">
                            <td id="tdHeader" scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></td>
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
                            <td scope="row" id="tdHeader" class="text-nowrap">Inventory</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <td scope="row" id="tdHeader" class="text-nowrap">Available</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>


                  </div>

                  <div class="box-border--center">
                    <button style="display:none;" data-target="#myModal" data-toggle="modal" type="submit" value="send" class="btn btn-submit">import inventory</button>
                    <button type="submit" value="send" class="btn btn-submit" onclick="downloadExcel('bkp');">download</button>
                  </div>

                </div>
                <div class="tab-pane fade" id="posttoday" role="tabpanel" aria-labelledby="posttoday-tab">
                  
                  <div class="content-tablist">

                    <h3>Homepage</h3>
                    <div class="content-box--select2">
                    {{ Form::open(['route' => '/inventory', 'method' => 'GET'])}}
                      <div class="form-group row">
                        <div class="col-11 col-sm-9">
                          <select class="custom-select">
                            <option value="" selected>Select</option>
                            <option value="Home">Home</option>
                            <option value="Politic">Politic</option>
                            <option value="World">World</option>
                            <option value="Finance">Finance</option>
                            <option value="Stock">Stock</option>
                            <option value="Economy">Economy</option>
                            <option value="Life">Life</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Property">Property</option>
                            <option value="Sport">Sport</option>
                            <option value="Social">Social</option>
                            <option value="Dhamma">Dhamma</option>
                            <option value="PR">PR</option>
                            <option value="Posttoday Exclusive">Posttoday Exclusive</option>
                            <option value="Podcast">Podcast</option>
                            <option value="Video">Video</option>
                          </select>
                        </div>
                        <div class="col-4"><a href="javascript:;" class="btn btn-click2">Apply</a></div>
                      </div>
                      {{ Form::close() }}
                    </div>

                    <div class="table-responsive table-dashboard inventory-dashboard">

                      <table id="ptd" class="table table-bordered text-center">
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
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">Sticky</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>


                          <tr>
                            <td colspan="33" class="td-header">Hybrid</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Booking (online) <a href="javascript:;" class="icn-detail"><img src="<?= url('/') ?>/assets/images/icon-svg/detail.svg"></a></th>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 1 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 2 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 3 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td> <!-- 4 -->
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                            <td class="text-nowrap" contenteditable="true">&nbsp;</td>
                          </tr>
                          <tr>
                            <th scope="row" class="text-nowrap">Inventory</th>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>
                          <tr style="color: #f00;">
                            <th scope="row" class="text-nowrap">Available</th>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true">25,000</td>
                            <td class="text-nowrap" contenteditable="true"><strong>175,000</strong></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>


                  </div>

                  <div class="box-border--center">
                    <button style="display:none;" data-target="#myModal" data-toggle="modal" type="submit" value="send" class="btn btn-submit">import inventory</button>
                    <button type="submit" value="send" class="btn btn-submit" onclick="downloadExcel('ptd');">download</button>
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
                <td class="text-nowrap" contenteditable="true">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap" contenteditable="true">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap" contenteditable="true">210,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Impact Exibition</td>
                <td class="text-nowrap" contenteditable="true">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap" contenteditable="true">25,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap" contenteditable="true">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap" contenteditable="true">165,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap" contenteditable="true">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap" contenteditable="true">210,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Impact Exibition</td>
                <td class="text-nowrap" contenteditable="true">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap" contenteditable="true">25,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap" contenteditable="true">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap" contenteditable="true">165,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap" contenteditable="true">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap" contenteditable="true">210,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Impact Exibition</td>
                <td class="text-nowrap" contenteditable="true">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap" contenteditable="true">25,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap" contenteditable="true">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap" contenteditable="true">165,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap" contenteditable="true">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap" contenteditable="true">210,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Impact Exibition</td>
                <td class="text-nowrap" contenteditable="true">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap" contenteditable="true">25,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap" contenteditable="true">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap" contenteditable="true">165,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
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
                <td class="text-nowrap" contenteditable="true">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap" contenteditable="true">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap" contenteditable="true">210,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Impact Exibition</td>
                <td class="text-nowrap" contenteditable="true">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap" contenteditable="true">25,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap" contenteditable="true">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap" contenteditable="true">165,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap" contenteditable="true">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap" contenteditable="true">210,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Impact Exibition</td>
                <td class="text-nowrap" contenteditable="true">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap" contenteditable="true">25,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap" contenteditable="true">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap" contenteditable="true">165,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap" contenteditable="true">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap" contenteditable="true">210,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Impact Exibition</td>
                <td class="text-nowrap" contenteditable="true">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap" contenteditable="true">25,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap" contenteditable="true">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap" contenteditable="true">165,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Exposis BP HP LB 15Jan’20-14Feb’20</td> 
                <td class="text-nowrap" contenteditable="true">Pornpimon Udomsukpornsiri</td>
                <td class="text-nowrap" contenteditable="true">210,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">Impact Exibition</td>
                <td class="text-nowrap" contenteditable="true">Sasinan Siripitipaisarn</td>
                <td class="text-nowrap" contenteditable="true">25,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>
              <tr>
                <td class="text-nowrap" contenteditable="true">EVA air  BP HP LB 3-31 Jan’20</td>
                <td class="text-nowrap" contenteditable="true">Natenapa Kumchaiyapoom</td>
                <td class="text-nowrap" contenteditable="true">165,000</td>
                <td class="text-nowrap" contenteditable="true">&nbsp;</td>
              </tr>

            </tbody>
          </table>
        </div>

      </div>

    </div>
  </div>
</div>

<button style="display:none;" class="btn btn-warning" onclick="saveData('bkp');">SAVE</button>
<div id="showJson"></div>

<script src="/assets/js/jquery.table2excel.js"></script>
<script>
    var current_tab = "bkp";

    $('#myTab a#posttoday-tab').on('click', function (e) {
      e.preventDefault()
      $('.nav-requestForm').addClass('tabs--ptd');
      current_tab = "ptd";
    })
    $('#myTab a#bangkokpost-tab').on('click', function (e) {
      e.preventDefault()
      $('.nav-requestForm').removeClass('tabs--ptd');
      current_tab = "bkp";
    })


    function downloadExcel(table_name) {
            
            $("#"+table_name).table2excel({
              exclude: ".noExl",
                name: "Inventory"
            }); 
            
      }

       // A few jQuery helpers for exporting only
      jQuery.fn.pop = [].pop;
      jQuery.fn.shift = [].shift;

      function saveData(table_name) {

        //const $rows = $("#"+table_name).find('tr:not(:hidden)');
        const $rows = $("#"+table_name).find('tr').not(".cannot-select");
        const headers = [];
        const data = [];

        // Get the headers (add special header logic here)
        //$($rows.shift()).find('th:not(:empty)').each(function () {
        $($rows.shift()).find('th').each(function () {
          headers.push($(this).attr('index').toLowerCase());
          //console.log(index);
        });

        // Turn all existing rows into a loopable array
        $rows.each(function () {
          const $td = $(this).find('td');
          const h = {};

          // Use the headers from earlier to name our hash keys
          headers.forEach((header, i) => {

            h[header] = $td.eq(i).text();
          });

          data.push(h);
        });

        // Output the result
        $("#showJson").text(JSON.stringify(data));
      }
        
    
</script>
@endsection
