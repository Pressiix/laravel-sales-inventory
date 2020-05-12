@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-inventory--full">
          <div class="box-title">
            <h2>AD Network Revenue Dashboard</h2>
            <div class="btn-create">
            <?php if($userRole == "ad-operation" || $userRole =="admin"){ ?>
              <a href="/ad_network_create">Create AD Network</a>
            <?php } ?>
            </div>
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

                    <h3><?= $month." ".$year ?></h3>
 
                    <div class="table-responsive table-dashboard">

                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-bkp">
                          <tr>
                            <th scope="col" class="bar-header" width="143">Date</th>
                            <th scope="col" colspan="4" class="bar-header">1-7 <?= $month." ".$year ?></th>
                            <th scope="col" colspan="4" class="bar-header">8-14 <?= $month." ".$year ?></th>
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
                        <?php if(!empty($item)){
                        foreach($item[0] as $value){ ?>
                          <tr>
                            <th scope="row"><?= $value['advertiser'] ?></th>
                            <td class="text-nowrap"><?= (isset($value['pageview']) ? $value['pageview'] : "0") ?></td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: <?= (isset($value['impression']) ? "75" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['impression']) ? $value['impression'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: <?= (isset($value['ecpm']) ? "60" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['ecpm']) ? $value['ecpm'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: <?= (isset($value['revenue']) ? "80" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['revenue']) ? $value['revenue'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap"><?= (isset($value['pageview2']) ? $value['pageview2'] : "0") ?></td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['impression2']) ? $value['impression2'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['ecpm2']) ? $value['ecpm2'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: <?= (isset($value['revenue2']) ? "55" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['revenue2']) ? $value['revenue2'] : "0") ?></span>
                              </div>
                            </td>
                          </tr>
                          <?php } ?>

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
                           <?php }else{ ?>
                          <tr>
                            <td colspan="9">No Data</td>
                          </tr>
                          <tr class="sum--bg-bkp">
                            <th scope="row" class="text-center">Total</th>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                          </tr>
                          <?php } ?>
                        </tbody>
                        </tbody>
                      </table>
                    </div>

                    <div class="table-responsive table-dashboard" style="padding-top: 20px;">

                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-bkp">
                          <tr>
                            <th scope="col" class="bar-header" width="143">Date</th>
                            <th scope="col" colspan="4" class="bar-header">15-21 <?= $month." ".$year ?></th>
                            <th scope="col" colspan="4" class="bar-header">22-31 <?= $month." ".$year ?></th>
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
                        <?php if(!empty($item)){
                        foreach($item[1] as $value){ ?>
                          <tr>
                            <th scope="row"><?= $value['advertiser'] ?></th>
                            <td class="text-nowrap"><?= (isset($value['pageview']) ? $value['pageview'] : "0") ?></td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: <?= (isset($value['impression']) ? "75" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['impression']) ? $value['impression'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: <?= (isset($value['ecpm']) ? "60" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['ecpm']) ? $value['ecpm'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: <?= (isset($value['revenue']) ? "80" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['revenue']) ? $value['revenue'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap"><?= (isset($value['pageview2']) ? $value['pageview2'] : "0") ?></td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: <?= (isset($value['impression2']) ? "90" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['impression2']) ? $value['impression2'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: <?= (isset($value['ecpm2']) ? "45" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['ecpm2']) ? $value['ecpm2'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: <?= (isset($value['revenue2']) ? "55" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['revenue2']) ? $value['revenue2'] : "0") ?></span>
                              </div>
                            </td>
                          </tr>
                          <?php } ?>

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
                          <?php }else{ ?>
                          <tr>
                            <td colspan="9">No Data</td>
                          </tr>
                          <tr class="sum--bg-bkp">
                            <th scope="row" class="text-center">Total</th>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                          </tr>
                          <?php } ?>
                        </tbody>
                        </tbody>
                      </table>
                    </div>
                    


                  </div>

                </div>
                <div class="tab-pane fade" id="posttoday" role="tabpanel" aria-labelledby="posttoday-tab">
                  
                  <div class="content-tablist">

                    <h3><?= $month." ".$year ?></h3>

                    <div class="table-responsive table-dashboard">
                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-ptd">
                        <tr>
                            <th scope="col" class="bar-header" width="143">Date</th>
                            <th scope="col" colspan="4" class="bar-header">1-7 <?= $month." ".$year ?></th>
                            <th scope="col" colspan="4" class="bar-header">8-14 <?= $month." ".$year ?></th>
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
                        <?php if(!empty($item)){
                        foreach($item[0] as $value){ ?>
                          <tr>
                            <th scope="row"><?= $value['advertiser'] ?></th>
                            <td class="text-nowrap"><?= (isset($value['pageview']) ? $value['pageview'] : "0") ?></td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: <?= (isset($value['impression']) ? "75" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['impression']) ? $value['impression'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: <?= (isset($value['ecpm']) ? "60" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['ecpm']) ? $value['ecpm'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: <?= (isset($value['revenue']) ? "80" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['revenue']) ? $value['revenue'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap"><?= (isset($value['pageview2']) ? $value['pageview2'] : "0") ?></td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: <?= (isset($value['impression2']) ? "90" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['impression2']) ? $value['impression2'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: <?= (isset($value['ecpm2']) ? "45" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['ecpm2']) ? $value['ecpm2'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: <?= (isset($value['revenue2']) ? "55" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['revenue2']) ? $value['revenue2'] : "0") ?></span>
                              </div>
                            </td>
                          </tr>
                          <?php } ?>
                          

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
                          <?php }else{ ?>
                          <tr>
                            <td colspan="9">No Data</td>
                          </tr>
                          <tr class="sum--bg-ptd">
                            <th scope="row" class="text-center">Total</th>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                          </tr>
                          <?php } ?>
                        </tbody>
                        </tbody>
                      </table>
                    </div>

                    <div class="table-responsive table-dashboard" style="padding-top: 20px;">
                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-ptd">
                          <tr>
                            <th scope="col" class="bar-header" width="143">Date</th>
                            <th scope="col" colspan="4" class="bar-header">15-21 <?= $month." ".$year ?></th>
                            <th scope="col" colspan="4" class="bar-header">22-31 <?= $month." ".$year ?></th>
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
                        <?php if(!empty($item)){
                        foreach($item[1] as $value){ ?>
                          <tr>
                            <th scope="row"><?= $value['advertiser'] ?></th>
                            <td class="text-nowrap"><?= (isset($value['pageview']) ? $value['pageview'] : "0") ?></td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: <?= (isset($value['impression']) ? "75" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['impression']) ? $value['impression'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: <?= (isset($value['ecpm']) ? "60" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['ecpm']) ? $value['ecpm'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: <?= (isset($value['revenue']) ? "80" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['revenue']) ? $value['revenue'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap"><?= (isset($value['pageview2']) ? $value['pageview2'] : "0") ?></td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: <?= (isset($value['impression2']) ? "90" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['impression2']) ? $value['impression2'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: <?= (isset($value['ecpm2']) ? "45" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['ecpm2']) ? $value['ecpm2'] : "0") ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: <?= (isset($value['revenue2']) ? "55" : "0") ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['revenue2']) ? $value['revenue2'] : "0") ?></span>
                              </div>
                            </td>
                          </tr>
                          <?php } ?>
                          

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
                        <?php }else{ ?>
                          <tr>
                            <td colspan="9">No Data</td>
                          </tr>
                          <tr class="sum--bg-ptd">
                            <th scope="row" class="text-center">Total</th>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                            <td class="text-nowrap">-</td>
                          </tr>
                          <?php } ?>
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