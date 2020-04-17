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
            <h2>AD Network Revenue Dashboard</h2>
            <div class="btn-create"><a href="/ad_network_create">Create AD Network</a></div>
          </div>
            <div style="position: relative;">
            {{ Form::open(['route' => '/ad_network', 'method' => 'GET'])}}
              <div class="content-box--select">
                <div class="form-group row">
                  <div class="col-6">
                    <select class="custom-select" name="month" required>
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
                    <select class="custom-select" name="year" required>
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
 
                    <div class="table-responsive table-dashboard">
                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-bkp">
                          <tr>
                            <th scope="col" class="bar-header" width="143">Monthly</th>
                            {{ Form::open(['route' => '/ad_network_bymonth', 'method' => 'POST'])}}<input type="hidden" name="last_month" value="<?= $last_month ?>"><input type="hidden" name="last_year" value="<?= $last_year ?>"><th scope="col" colspan="4" class="bar-header"><button class="href-button" type="submit"><?= $last_month." ".$last_year ?> <img src="assets/images/icon-svg/arrow-detail.svg"></button></th>{{ Form::close() }}
                            {{ Form::open(['route' => '/ad_network_bymonth', 'method' => 'POST'])}}<input type="hidden" name="current_month" value="<?= $current_month ?>"><input type="hidden" name="current_year" value="<?= $current_year ?>"><th scope="col" colspan="4" class="bar-header"><button class="href-button" type="submit"><?= $current_month." ".$current_year ?> <img src="assets/images/icon-svg/arrow-detail.svg"></button></th>{{ Form::close() }}
                          </tr>
                          <tr>
                            <th scope="col">Ad Network</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                            <th scope="col" width="110">%</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                            <th scope="col" width="110">%</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($item as $key=>$value){ ?>
                          <tr>
                            <th scope="row"><?= (isset($value['advertiser']) ? $value['advertiser'] : '') ?></th>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['impression'][0]) ? number_format((float) $value['impression'][0]) : '0') ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ <?= (isset($value['ecpm'][0]) ? $value['ecpm'][0] : '0') ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ <?= (isset($value['revenue'][0]) ? number_format((float) $value['revenue'][0]) : '0') ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span><?= (isset($value['impression'][1]) ? number_format((float) $value['impression'][1]) : '0') ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ <?= (isset($value['ecpm'][1]) ? $value['ecpm'][1] : '0') ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ <?= (isset($value['revenue'][1]) ? number_format((float) $value['revenue'][1]) : '0') ?></span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>

                          <tr class="sum--bg-gray">
                            <th scope="row" class="text-center">House</th>
                            <td class="text-nowrap">219,931</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">219,931</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr class="sum--bg-gray">
                            <th scope="row" class="text-center">Direct Sales</th>
                            <td class="text-nowrap">2,846,045</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">8,219,931</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
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

                  <div class="box-border--center"><button type="submit" value="send" class="btn btn-submit">download</button></div>

                </div>
                <div class="tab-pane fade" id="posttoday" role="tabpanel" aria-labelledby="posttoday-tab">
                  
                  <div class="content-tablist">

                    <div class="table-responsive table-dashboard">
                      <table class="table table-striped table-bordered text-center">
                        <thead class="thead-ptd">
                          <tr>
                            <th scope="col" class="bar-header" width="143">Monthly</th>
                            <th scope="col" colspan="4" class="bar-header"><a href="javascript:;">September 2019</a> <img src="assets/images/icon-svg/arrow-detail.svg"></th>
                            <th scope="col" colspan="4" class="bar-header"><a href="javascript:;">October 2019</a> <img src="assets/images/icon-svg/arrow-detail.svg"></th>
                          </tr>
                          <tr>
                            <th scope="col">Ad Network</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                            <th scope="col" width="110">%</th>
                            <th scope="col" width="140">IMP</th>
                            <th scope="col" width="130">eCPM</th>
                            <th scope="col" width="140">Revenue (USD)</th>
                            <th scope="col" width="110">%</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">AdAsia</th>
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
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
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
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Outbrain</th>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 5%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>219,931</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">AdAsia</th>
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
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
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
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Outbrain</th>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 5%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>219,931</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">AdAsia</th>
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
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
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
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Outbrain</th>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 5%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>219,931</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">AdAsia</th>
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
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
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
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Outbrain</th>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 5%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>219,931</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-orange" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>2,846,045</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-sky" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 0.18</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>$ 2,221.78</span>
                              </div>
                            </td>
                            <td class="text-nowrap">
                              <div class="row-progress">
                                <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>266%</span>
                              </div>
                            </td>
                          </tr>

                          <tr class="sum--bg-gray">
                            <th scope="row" class="text-center">House Ad PPN</th>
                            <td class="text-nowrap">219,931</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">219,931</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                          </tr>
                          <tr class="sum--bg-gray">
                            <th scope="row" class="text-center">Direct Sales</th>
                            <td class="text-nowrap">2,846,045</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">8,219,931</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
                            <td class="text-nowrap">&nbsp;</td>
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

                  <div class="box-border--center"><button type="submit" value="send" class="btn btn-submit">download</button></div>

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
