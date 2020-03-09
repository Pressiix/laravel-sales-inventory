@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Request Form</h2>
          {!! Form::open(['action' => ['AppController@review', 'method' => 'POST'],'name'=>'form','id'=>'form'])!!}

            <div class="content-pdb">
              <div class="form-group row">
                <label for="staticName"  class="col-auto col-sm-4 col-md-4 col-lg-3 col-form-label">Sales name:</label>
                <div class="col-auto col-sm-11 col-md-11 col-lg-12">
                  <div class="form-control-plaintext">{{ $sales_name }}</div>
                  {{ Form::hidden('sales_name', $sales_name) }}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputUsername" class="col-auto col-sm-4 col-md-4 col-lg-3 col-form-label pt-0">Sales Type:</label>
                <div class="col-auto col-sm-11 col-md-11 col-lg-12">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sales_type" id="inlineRadio1" value="Direct" checked>
                    <label class="form-check-label" for="inlineRadio1">Direct</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sales_type" id="inlineRadio2" value="Agency">
                    <label class="form-check-label" for="inlineRadio2">Agency</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Customer name:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                {{ Form::select('customer_id', array_merge(['' => 'Choose...'], $customer), (!empty($customer_id) ? $customer_id : null), ['class'=>'custom-select','required'=>'required']) }}
                  <div class="div-form--link"> or <a href="javascript:;">Create new customer</a></div>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Campaign name:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <input type="text" name="campaign_name" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="advertiserSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser name:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                {{ Form::select('advertiser_id', array_merge(['' => 'Choose...'], $advertiser), (!empty($advertiser_id) ? $advertiser_id : null), ['class'=>'custom-select','required'=>'required']) }}
                  <div class="div-form--link"> or <a href="javascript:;">Create new advertiser</a></div>
                </div>
              </div>
            </div>

            <div class="content-border">

              <ul class="nav nav-tabs nav-requestForm" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="bangkokpost-tab" data-toggle="tab" href="#bangkokpost" role="tab" aria-controls="bangkokpost" aria-selected="false">Bangkokpost</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="posttoday-tab" data-toggle="tab" href="#posttoday" role="tab" aria-controls="posttoday" aria-selected="true">Posttoday</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="bangkokpost" role="tabpanel" aria-labelledby="bangkokpost-tab">
                  
                  <div class="content-tablist">
                    <div class="form-ad--detail">
                      <div class="bar-title">Facebook:</div>
                      <div id="bp-facebook-tab" class="form-group row">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_facebook" type="radio" id="bp_fb1" value="Normal Post" <?= (!empty($bp_facebook) && $bp_facebook === 'Normal Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="bp_fb1">Normal Post</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_facebook" type="radio" id="bp_fb2" value="Facebook Boost Post" <?= (!empty($bp_facebook) && $bp_facebook === 'Facebook Boost Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="bp_fb2">Facebook Boost Post</label>
                          </div>
                        </div>
                      </div>
                      <div class="bar-title mt-4">Website:</div>
                      <div class="form-group row" id="bp-tab-border">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[0]" <?= (!empty($bp_web[0]) && $bp_web[0] === 'Banner' ? 'checked' : '') ?> type="checkbox" id="bp_web1" value="Banner">
                            <label class="form-check-label" for="bp_web">Banner</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[1]" <?= (!empty($bp_web[1]) && $bp_web[1] === 'Nytive Ad' ? 'checked' : '') ?> type="checkbox" id="bp_web2" value="Nytive Ad">
                            <label class="form-check-label" for="bp_web">Nytive Ad</label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[2]" <?= (!empty($bp_web[2]) && $bp_web[2] === 'Premium Advertorial' ? 'checked' : '') ?> type="checkbox" id="bp_web3" value="Premium Advertorial">
                            <label class="form-check-label" for="bp_web">Premium Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[3]" <?= (!empty($bp_web[3]) && $bp_web[3] === 'Advertorial' ? 'checked' : '') ?> type="checkbox" id="bp_web4" value="Advertorial">
                            <label class="form-check-label" for="bp_web">Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[4]" <?= (!empty($bp_web[4]) && $bp_web[4] === 'Property Listing' ? 'checked' : '') ?> type="checkbox" id="bp_web5" value="Property Listing">
                            <label class="form-check-label" for="bp_web">Property Listing</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[5]" <?= (!empty($bp_web[5]) && $bp_web[5] === 'Special event' ? 'checked' : '') ?> type="checkbox" id="bp_web6" value="Special event">
                            <label class="form-check-label" for="bp_web">Special event</label>
                          </div>
                        </div>
                         <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input"  name="bp_web[6]" <?= (!empty($bp_web[6]) && $bp_web[6] === 'Sponsor Link' ? 'checked' : '') ?> type="checkbox" id="bp_web7" value="Sponsor Link">
                            <label class="form-check-label" for="bp_web">Sponsor Link</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[7]" <?= (!empty($bp_web[7]) && $bp_web[7] === 'Jobs' ? 'checked' : '') ?> type="checkbox" id="bp_web8" value="Jobs">
                            <label class="form-check-label" for="bp_web">Jobs</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[8]" <?= (!empty($bp_web[8]) && $bp_web[8] === 'PR' ? 'checked' : '') ?> type="checkbox" id="bp_web9" value="PR">
                            <label class="form-check-label" for="bp_web">PR</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div  class="col-15">
                        <div id="bp-ad-description">
                        <div id="bp-ad-card" class="box-ad--banner">
                          <div id="bp-ad-title" class="box-ad--title">Ad 1 Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="bp_size_id[0]" class="custom-select" onchange="document.getElementById('bp_size_text0').value=this.options[this.selectedIndex].text" >
                                  <option selected value="">Choose Size</option>
                                  <option value="1">Billboard</option>
                                  <option value="2">Rectangle</option>
                                  <option value="3">Double-Rectangle</option>
                                  <option value="4">Boombox</option>
                                  <option value="5">Fullwidth</option>
                                  <option value="6">Leaderboard</option>
                                </select>
                                <div class="invalid-feedback">
                                  Please select a valid state.
                                </div>
                                <input type="hidden" name="bp_size_text[0]" id="bp_size_text0" value="" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Position:</label>
                                <select name="bp_position_id[0]" class="custom-select" onchange="document.getElementById('bp_position_text0').value=this.options[this.selectedIndex].text">
                                  <option selected>Choose Position</option>
                                  <option value="1">Home</option>
                                  <option value="2">Business -Section</option>
                                  <option value="3">Business -Article</option>
                                  <option value="4">Thailand-Section</option>
                                  <option value="5">Thailand-Article</option>
                                  <option value="6">World-Section</option>
                                  <option value="7">World -Article</option>
                                  <option value="8">Life-Section</option>
                                  <option value="9">Life -Article</option>
                                  <option value="10">Opinion-Section</option>
                                  <option value="11">Opinion -Article</option>
                                  <option value="12">Auto -Section</option>
                                  <option value="13">Auto -Article</option>
                                  <option value="14">Learning -Section</option>
                                  <option value="15">Learning -Article</option>
                                  <option value="16">Video -Section</option>
                                  <option value="17">Video -Article</option>
                                  <option value="18">Sport -Section</option>
                                  <option value="19">Sport -Article</option>
                                  <option value="20">Travel -Section</option>
                                  <option value="21">Travel -Article</option>
                                  <option value="22">Tech -Section</option>
                                  <option value="23">Tech -Article</option>
                                  <option value="24">Property -Section</option>
                                  <option value="25">Property -Article</option>
                                  <option value="26">Photo -Section</option>
                                  <option value="27">Photo -Article</option>
                                  <option value="28">Jobs</option>
                                </select>
                                <input type="hidden" name="bp_position_text[0]" id="bp_position_text0" value="" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="bp_section_id[0]" class="custom-select" onchange="document.getElementById('bp_section_text0').value=this.options[this.selectedIndex].text">
                                  <option selected value="">Choose Section</option>
                                </select>
                                <input type="hidden" name="bp_section_text[0]" id="bp_section_text0" value="" />
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="input-daterange datepicker">
                                <div class="input-group-inline"><span>Period:</span></div>
                                <div class="input-group-inline">
                                  <span>From</span>
                                  <input type="text" class="form-control form-input--date" name="bp_date_from[0]">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                                <div class="input-group-inline">
                                  <span>to</span>
                                  <input type="text" class="form-control form-input--date" name="bp_date_to[0]">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputUsername" class="col-auto col-sm-4 col-md-4 col-lg-3 col-form-label label-normal pt-0">Device:</label>
                              <div class="col-auto col-sm-11 col-md-11 col-lg-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="bp_device[0]" type="radio" id="inlineRadio11" value="Desktop">
                                  <label class="form-check-label" for="inlineRadio11">Desktop</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="bp_device[0]" type="radio" id="inlineRadio21" value="Mobile">
                                  <label class="form-check-label" for="inlineRadio21">Mobile</label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-md-4 col-lg-3 col-form-label label-normal">URL link banner:</label>
                              <div class="col-md-11 col-lg-12">
                                <input name="bp_banner_url[0]" type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload banner:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="bp_ad_desc_file[0]" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload quotation:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="bp_quotation[0]" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel, Zip</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Impression:</label>
                              <div class="col-sm-10 col-md-8">
                                <input type="text" name="bp_impression_need[0]" class="form-control">
                                <div class="text-ps--small">Impression is not enough.</div>
                              </div>
                              <div class="col-sm-3">
                                <div class="mt-2"><a href="javascript:;" class="btn btn-click">View dashboard</a></div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Detail:</label>
                              <div class="col-md-11 col-lg-12">
                                <input type="text" name="bp_ad_detail[0]" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="box-btn--addmore"><a href="javascript:;" onclick="addAds('bp');" class="btn btn-addmore">+ ADD MORE AD</a></div>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputCampaign" class="col-sm-5 col-form-label">Campaign budget (THB):</label>
                      <div class="col-sm-10">
                        <input type="text" name="bp_campaign_budget" class="form-control">
                      </div>
                    </div>
                  </div>

                </div>

                <!-- POST TODAY TAB -->
                <div class="tab-pane fade" id="posttoday" role="tabpanel" aria-labelledby="posttoday-tab">
                  
                  <div class="content-tablist">
                    <div class="form-ad--detail">
                      <div class="bar-title">Facebook:</div>
                      <div id="ptd-facebook-tab" class="form-group row">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_facebook" type="radio" id="ptd_fb1" value="Normal Post" <?= (!empty($ptd_facebook) && $ptd_facebook === 'Normal Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="ptd_fb1">Normal Post</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_facebook" type="radio" id="ptd_fb2" value="Facebook Boost Post" <?= (!empty($ptd_facebook) && $ptd_facebook === 'Facebook Boost Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="ptd_fb2">Facebook Boost Post</label>
                          </div>
                        </div>
                      </div>
                      <div class="bar-title mt-4">Website:</div>
                      <div class="form-group row" id="ptd-tab-border">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[0]" <?= (!empty($ptd_web[0]) && $ptd_web[0] === 'Banner' ? 'checked' : '') ?> type="checkbox" id="ptd_web1" value="Banner">
                            <label class="form-check-label" for="ptd_web">Banner</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[1]" <?= (!empty($ptd_web[1]) && $ptd_web[1] === 'Nytive Ad' ? 'checked' : '') ?> type="checkbox" id="ptd_web2" value="Nytive Ad">
                            <label class="form-check-label" for="ptd_web2">Nytive Ad</label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[2]" <?= (!empty($ptd_web[2]) && $ptd_web[2] === 'Premium Advertorial' ? 'checked' : '') ?> type="checkbox" id="ptd_web3" value="Premium Advertorial">
                            <label class="form-check-label" for="ptd_web3">Premium Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[3]" <?= (!empty($ptd_web[3]) && $ptd_web[3] === 'Advertorial' ? 'checked' : '') ?> type="checkbox" id="ptd_web4" value="Advertorial">
                            <label class="form-check-label" for="ptd_web4">Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[4]" <?= (!empty($ptd_web[4]) && $ptd_web[4] === 'Property Listing' ? 'checked' : '') ?> type="checkbox" id="ptd_web5" value="Property Listing">
                            <label class="form-check-label" for="ptd_web5">Property Listing</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[5]" <?= (!empty($ptd_web[5]) && $ptd_web[5] === 'Special event' ? 'checked' : '') ?> type="checkbox" id="ptd_web6" value="Special event">
                            <label class="form-check-label" for="ptd_web6">Special event</label>
                          </div>
                        </div>
                         <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[6]" <?= (!empty($ptd_web[6]) && $ptd_web[6] === 'Sponsor Link' ? 'checked' : '') ?> type="checkbox" id="ptd_web7" value="Sponsor Link">
                            <label class="form-check-label" for="ptd_web7">Sponsor Link</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[7]" <?= (!empty($ptd_web[7]) && $ptd_web[7] === 'Jobs' ? 'checked' : '') ?> type="checkbox" id="ptd_web8" value="Jobs">
                            <label class="form-check-label" for="ptd_web8">Jobs</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[8]" <?= (!empty($ptd_web[8]) && $ptd_web[8] === 'PR' ? 'checked' : '') ?> type="checkbox" id="ptd_web9" value="PR">
                            <label class="form-check-label" for="ptd_web9">PR</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div  class="col-15">
                        <div id="ptd-ad-description">
                        <div id="ptd-ad-card" class="box-ad--banner">
                          <div id="ptd-ad-title" class="box-ad--title">Ad 1 Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="ptd_size_id[0]" class="custom-select" onchange="document.getElementById('ptd_size_text0').value=this.options[this.selectedIndex].text">
                                  <option selected value="">Choose Size</option>
                                  <option value="1">Billboard</option>
                                  <option value="2">Rectangle</option>
                                  <option value="3">Double-Rectangle</option>
                                  <option value="4">Boombox</option>
                                  <option value="5">Fullwidth</option>
                                  <option value="6">Leaderboard</option>
                                </select>
                                <div class="invalid-feedback">
                                  Please select a valid state.
                                </div>
                                <input type="hidden" name="ptd_size_text[0]" id="ptd_size_text0" value="" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Position:</label>
                                <select name="ptd_position_id[0]" class="custom-select" onchange="document.getElementById('ptd_position_text0').value=this.options[this.selectedIndex].text">
                                  <option selected value="">Choose Position</option>
                                  <option value="1">Top</option>
                                  <option value="2">Middle</option>
                                  <option value="3">Bottom</option>
                                  <option value="4">Left</option>
                                  <option value="5">Right</option>
                                </select>
                                <input type="hidden" name="ptd_position_text[0]" id="ptd_position_text0" value="" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="ptd_section_id[0]" class="custom-select" onchange="document.getElementById('ptd_section_text0').value=this.options[this.selectedIndex].text">
                                  <option selected value="">Choose Section</option>
                                  <option value="1">Homepage</option>
                                  <option value="2">Business</option>
                                  <option value="3">Social</option>
                                  <option value="4">Sport</option>
                                  <option value="5">Car</option>
                                </select>
                                <input type="hidden" name="ptd_section_text[0]" id="ptd_section_text0" value="" />
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="input-daterange datepicker">
                                <div class="input-group-inline"><span>Period:</span></div>
                                <div class="input-group-inline">
                                  <span>From</span>
                                  <input type="text" class="form-control form-input--date" name="ptd_date_from[0]">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                                <div class="input-group-inline">
                                  <span>to</span>
                                  <input type="text" class="form-control form-input--date" name="ptd_date_to[0]">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputUsername" class="col-auto col-sm-4 col-md-4 col-lg-3 col-form-label label-normal pt-0">Device:</label>
                              <div class="col-auto col-sm-11 col-md-11 col-lg-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="ptd_device[0]" type="radio" name="inlineRadioOptions1" id="inlineRadio11" value="option1">
                                  <label class="form-check-label" for="inlineRadio11">Desktop</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="ptd_device[0]" type="radio" name="inlineRadioOptions1" id="inlineRadio21" value="option2">
                                  <label class="form-check-label" for="inlineRadio21">Mobile</label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-md-4 col-lg-3 col-form-label label-normal">URL link banner:</label>
                              <div class="col-md-11 col-lg-12">
                                <input name="ptd_banner_url[0]" type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload banner:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="ptd_ad_desc_file[0]" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload quotation:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="ptd_quotation[0]" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel, Zip</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Impression:</label>
                              <div class="col-sm-10 col-md-8">
                                <input type="text" name="ptd_impression_need[0]" class="form-control">
                                <div class="text-ps--small">Impression is not enough.</div>
                              </div>
                              <div class="col-sm-3">
                                <div class="mt-2"><a href="javascript:;" class="btn btn-click">View dashboard</a></div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Detail:</label>
                              <div class="col-md-11 col-lg-12">
                                <input type="text" name="ptd_ad_detail[0]" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="box-btn--addmore"><a href="javascript:;" onclick="addAds('ptd');" class="btn btn-addmore">+ ADD MORE AD</a></div>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Campaign budget (THB):</label>
                      <div class="col-sm-10">
                        <input type="text" name="ptd_campaign_budget" class="form-control">
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            
            </div>

            <div class="text-center"><button type="submit" onclick="createHiddenField();" value="send" class="btn btn-submit">submit</button></div>
            {!! Form::close() !!}
        </div>
      </div>

<script>
    //Replace URL after user click to save request form
    window.history.pushState('request-save', 'Title', '/request_form');
    var active_tab = 'bangkokpost';
    var none_active_tab = 'posttoday';

    $(document).ready(function () {
        var options="";
        $("select[name*='bp_position_id']").on('change',function(){
            var value=$(this).val();
            alert(value);
            if(value=="1")
            {
                options="<option>Choose Section</option>"
                      +"<option value='Male1'>Male 1</option>"
                    +"<option value='Male2'>Male 2</option>";
                $("select[name*='bp_section_id']").html(options);
            }
            /*else if(value=="2")
            else if(value=="3")
            else if(value=="4")
            else if(value=="5")
            else if(value=="6")
            else if(value=="7")
            else if(value=="8")
            else if(value=="9")
            else if(value=="10")
            else if(value=="11")
            else if(value=="12")
            else if(value=="13")
            else if(value=="14")
            else if(value=="15")
            else if(value=="16")
            else if(value=="17")
            else if(value=="18")
            else if(value=="19")
            else if(value=="20")
            else if(value=="21")
            else if(value=="22")
            else if(value=="23")
            else if(value=="24")
            else if(value=="25")*/
            else{
                options='<option>Choose...</option>'
                      +'<option value="female1">Female 1</option>'
                    +'<option value="female2">Female 2</option>';
                $("#name").html(options);
            }
        });
    });

    function requireFieldOnCard(tab_name,value)
    {
      $("select[name*='"+tab_name+"_size_id']").prop('required',true);
      $("select[name*='"+tab_name+"_position_id']").prop('required',true);
      $("select[name*='"+tab_name+"_section_id']").prop('required',true);
      $("input[name*='"+tab_name+"_date_from']").prop('required',true);
      $("input[name*='"+tab_name+"_date_to']").prop('required',true);
      $("input[name*='"+tab_name+"_device']").prop('required',true);
      $("input[name*='"+tab_name+"_banner_url']").prop('required',true);
      $("input[name*='"+tab_name+"_ad_desc_file']").prop('required',true);
      $("input[name*='"+tab_name+"_quotation']").prop('required',true);
      $("input[name*='"+tab_name+"_impression_need']").prop('required',true);
    }

    //if user checked on bangkok post facebook checkbox
    $("input[name*='bp_facebook']").click(function(){
      requireFieldOnCard('bp',($("input[name*='bp_facebook']:checked").length ? 'true' : 'false'));
    });
    //if user checked on post today facebook checkbox
    $("input[name*='ptd_facebook']").click(function(){
      requireFieldOnCard('ptd',($("input[name*='ptd_facebook']:checked").length ? 'true' : 'false'));
    });

    //Create input field before user click submit button
    function createHiddenField(){
        hiddenField();
        validateCheckbox(active_tab,none_active_tab);
    }
    
    $('#posttoday-tab').click(function() {
            active_tab = 'posttoday';
            none_active_tab = 'bangkokpost';
            addTabClass(active_tab,none_active_tab);
    });

    $('#bangkokpost-tab').click(function() {
            active_tab = 'bangkokpost';
            none_active_tab = 'posttoday';
            addTabClass(active_tab,none_active_tab);
    });

    function addTabClass(active_tab,none_active_tab)
    {
      $("#"+active_tab).addClass('show');
      $("#"+active_tab).addClass('active');
      $("#"+none_active_tab+"-tab").css("background-color", "#F2F2F2");
      $("#"+none_active_tab).removeClass('show');
      $("#"+none_active_tab).removeClass('active');
      if(active_tab == 'posttoday'){
        $("#"+active_tab+"-tab").css("background-color", "#D13E3E");
        $("#myTab").css("border-bottom", "5px solid #D13E3E");
      }
      else{
        $("#"+active_tab+"-tab").css("background-color", "#396EB5");
        $("#myTab").css("border-bottom", "5px solid #396EB5");
      } 
    }

    //validate checkbox on bangkokpost and posttoday tab
    function validateCheckbox(active_tab,none_active_tab)
    {
      if(!$("input[name*='bp_facebook']:checked").length && !$("input[name*='ptd_facebook']:checked").length){
            event.preventDefault();
            $("#bp-facebook-tab").css("border", "1px solid #D13E3E ");
            $("#ptd-facebook-tab").css("border", "1px solid #D13E3E ");
            $("#bp-tab-border").css("border", "1px solid #fff ");
            $("#ptd-tab-border").css("border", "1px solid #fff ");
      }
      else if(!$("input[name*='bp_facebook']:checked").length && $("input[name*='bp_web']:checked").length){
              event.preventDefault();
              $("#bp-facebook-tab").css("border", "1px solid #D13E3E");
              $("#bp-tab-border").css("border", "1px solid #fff ");
              if($("input[name*='ptd_facebook']:checked").length || $("input[name*='ptd_facebook']:checked").length)
              {
                $("#ptd-facebook-tab").css("border", "1px solid #fff");
              }
              else{
                $("#ptd-facebook-tab").css("border", "1px solid #D13E3E");
              }
              if($("input[name*='ptd_web']:checked").length)
              {
                $("#ptd-tab-border").css("border", "1px solid #fff ");
              }else{
                $("#ptd-tab-border").css("border", "1px solid #D13E3E ");
              }
      }
      else if(!$("input[name*='ptd_facebook']:checked").length && $("input[name*='ptd_web']:checked").length){
              event.preventDefault();
              $("#ptd-facebook-tab").css("border", "1px solid #D13E3E");
              $("#ptd-tab-border").css("border", "1px solid #fff ");
              if($("input[name*='bp_facebook']:checked").length)
              {
                $("#bp-facebook-tab").css("border", "1px solid #fff");
              }
              else{
                $("#bp-facebook-tab").css("border", "1px solid #D13E3E");
              }
              if($("input[name*='bp_web']:checked").length)
              {
                $("#bp-tab-border").css("border", "1px solid #fff ");
              }else{
                $("#bp-tab-border").css("border", "1px solid #D13E3E ");
                }
      }
      else{
        if($("input[name*='bp_facebook']:checked").length)
        {
          $("#bp-facebook-tab").css("border", "1px solid #fff");
          $("#bp-tab-border").css("border", "1px solid #fff ");
          if(!$("input[name*='bp_web']:checked").length){
            event.preventDefault();
            $("#bp-tab-border").css("border", "1px solid #D13E3E ");
          }
        }
        if($("input[name*='ptd_facebook']:checked").length)
        {
          $("#ptd-facebook-tab").css("border", "1px solid #fff");
          $("#ptd-tab-border").css("border", "1px solid #fff ");
          if(!$("input[name*='ptd_web']:checked").length){
            event.preventDefault();
            $("#ptd-tab-border").css("border", "1px solid #D13E3E ");
          }
        }
      }
      location.href = (active_tab == 'bangkokpost' ? "#bangkokpost" : "#posttoday" );
    }
    
    //create a new input field for posting a customer and advertiser name before user clicked a submit button
    function hiddenField() {
        for(i=0;i<2;i++)
        {
          switch(i){
            case 0: //for customer name
                    var selIndex = document.form.customer_id.selectedIndex;
                    var selText = document.form.customer_id.options[selIndex].text;
                    var input_name = 'customer_name';
                    break;
            case 1:  //for advertiser name
                    var selIndex = document.form.advertiser_id.selectedIndex;
                    var selText = document.form.advertiser_id.options[selIndex].text;
                    var input_name = 'advertiser_name';
                    break;
          }
          var input = document.createElement("input");
          input.setAttribute("type", "hidden");
          input.setAttribute("name", input_name);
          input.setAttribute("value", selText);
          //append to form element that you want .
          document.getElementById("form").appendChild(input);
        }
        $('form').append("<input type='hidden' name='total_bp_web' value='"+$("input[name*='bp_web']").length+"' />");
        $('form').append("<input type='hidden' name='total_ptd_web' value='"+$("input[name*='ptd_web']").length+"' />");
    }

    //generate a new ad description box when user click Add more ad button
    function addAds(web_name){
        var count = $("div[id*='"+web_name+"-ad-card']").length;
        var Html= $("div[id*='"+web_name+"-ad-card']").eq(0).clone();
            Html.find('input').each(function() {  //Replace input name
                this.name= this.name.replace('[0]', '['+count+']');
            });
            Html.find('select').each(function() {   //Replace dropdown name
                this.name= this.name.replace('[0]', '['+count+']');
                var id = this.name.split('_id['+count+']')[0]; //set hidden input id for posting dropdown text
                this.setAttribute('onchange', 'document.getElementById(\"'+id+'_text['+count+']\").value=this.options[this.selectedIndex].text');
            });
            Html.find("div[id*='"+web_name+"-ad-title']").each(function() { //Replace box title
                this.textContent = this.textContent.replace('Ad 1 Description:','Ad '+(count+1)+' Description:');
            });
            //var newOnChange = '';
            $('#'+web_name+'-ad-description').append(Html);
            count++;
    }

    //Date picker option for default ad description card
    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    //Date picker option if user create ad description card
    $("body").on('focus', '.datepicker', function() {
      $(this).datepicker({
        autoclose: true,
        todayHighlight: true
      });
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
@endsection
