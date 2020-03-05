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
                {{ Form::select('customer_id', array_merge(['' => 'Choose...'], $customer), (!empty($customer_id) ? $customer_id : null), ['class'=>'custom-select']) }}
                  <div class="div-form--link"> or <a href="javascript:;">Create new customer</a></div>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Campaign name:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <input type="text" name="campaign_name" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="advertiserSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser name:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                {{ Form::select('advertiser_id', array_merge(['' => 'Choose...'], $advertiser), (!empty($advertiser_id) ? $advertiser_id : null), ['class'=>'custom-select']) }}
                  <div class="div-form--link"> or <a href="javascript:;">Create new advertiser</a></div>
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
                  
                  <input type="hidden" name="web_name" value="" />
                  
                  <div class="content-tablist">
                    <div class="form-ad--detail">
                      <div class="bar-title">Facebook:</div>
                      <div class="form-group row">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_facebook_normal_post" type="checkbox" id="bp_fb1" value="Normal Post">
                            <label class="form-check-label" for="bp_fb1">Normal Post</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_facebook_boost_post" type="checkbox" id="bp_fb2" value="Facebook Boost Post">
                            <label class="form-check-label" for="bp_fb2">Facebook Boost Post</label>
                          </div>
                        </div>
                      </div>
                      <div class="bar-title mt-4">Website:</div>
                      <div class="form-group row">
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
                          <div class="box-ad--title">Ad 1 Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="bp_size_id[0]" class="custom-select" onchange="document.getElementById('bp_size_text0').value=this.options[this.selectedIndex].text">
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
                                  <option selected value="">Choose Position</option>
                                  <option value="1">Top</option>
                                  <option value="2">Middle</option>
                                  <option value="3">Bottom</option>
                                  <option value="4">Left</option>
                                  <option value="5">Right</option>
                                </select>
                                <input type="hidden" name="bp_position_text[0]" id="bp_position_text0" value="" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="bp_section_id[0]" class="custom-select" onchange="document.getElementById('bp_section_text0').value=this.options[this.selectedIndex].text">
                                  <option selected value="">Choose Section</option>
                                  <option value="1">Homepage</option>
                                  <option value="2">Business</option>
                                  <option value="3">Social</option>
                                  <option value="4">Sport</option>
                                  <option value="5">Car</option>
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
                              <label for="inputURL" class="col-md-4 col-lg-3 col-form-label label-normal">URL link banner:</label>
                              <div class="col-md-11 col-lg-12">
                                <input name="bp_banner_url[0]" type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload file:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="bp_ad_desc_file[0]" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel</div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-15 col-form-label label-normal">Impression: &nbsp; <a href="javascript:;" class="btn btn-click2">Click for booking inventory</a></div>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="box-btn--addmore"><a href="javascript:;" onclick="addBPAds();" class="btn btn-addmore">+ ADD MORE AD</a></div>

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
                      <div class="form-group row">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_facebook_normal_post" type="checkbox" id="ptd_fb1" value="Normal Post">
                            <label class="form-check-label" for="ptd_fb1">Normal Post</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_facebook_boost_post" type="checkbox" id="ptd_fb2" value="Facebook Boost Post">
                            <label class="form-check-label" for="ptd_fb2">Facebook Boost Post</label>
                          </div>
                        </div>
                      </div>
                      <div class="bar-title mt-4">Website:</div>
                      <div class="form-group row">
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
                          <div class="box-ad--title">Ad 1 Description:</div>
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
                              <label for="inputURL" class="col-md-4 col-lg-3 col-form-label label-normal">URL link banner:</label>
                              <div class="col-md-11 col-lg-12">
                                <input name="ptd_banner_url[0]" type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload file:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="ptd_ad_desc_file[0]" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel</div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-15 col-form-label label-normal">Impression: &nbsp; <a href="javascript:;" class="btn btn-click2">Click for booking inventory</a></div>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="box-btn--addmore"><a href="javascript:;" onclick="addPTDAds();" class="btn btn-addmore">+ ADD MORE AD</a></div>

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
            <button href="#" onclick="adDescriptionDropdownText();">TTTTTTTT</button>
        </div>
      </div>

<script>
    var bp
    //Replace URL after user click to save request form
    window.history.pushState('request-save', 'Title', '/request_form');
    
    //Create input field for post a customer name and advertiser name before user click submit button
    function createHiddenField(){
        customerField();
        advertiserField();
    }
    //get customer name from customer dropdown and create a new input field for posting a customer name
    function customerField() {
        var selIndex = document.form.customer_id.selectedIndex;
		    var selText = document.form.customer_id.options[selIndex].text;
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "customer_name");
        input.setAttribute("value", selText);
        //append to form element that you want .
        document.getElementById("form").appendChild(input);
    };
    //get advertiser name from advertiser dropdown and create a new input field for posting an advertiser name
    function advertiserField() {
        var selIndex = document.form.advertiser_id.selectedIndex;
		    var selText = document.form.advertiser_id.options[selIndex].text;
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "advertiser_name");
        input.setAttribute("value", selText);
        //append to form element that you want .
        document.getElementById("form").appendChild(input);
    };

    //insert ad description card when user click add more ad+ button on Bangkok Post tab
    function addBPAds(){
        var count = $("div[id*='bp-ad-card']").length;
        var cardHeader = "<div class=\"box-ad--title\">Ad "+(count+1)+" Description:</div>";
        var size_form = "<div class=\"col-md-5 mb-3\"><label>Size:</label><select name=\"bp_size_id["+count+"]\" class=\"custom-select\" onchange=\"document.getElementById('bp_size_text"+count+"').value=this.options[this.selectedIndex].text\"><option selected value=\"\">Choose Size</option><option value=\"1\">Billboard</option><option value=\"2\">Rectangle</option><option value=\"3\">Double-Rectangle</option><option value=\"4\">Boombox</option><option value=\"5\">Fullwidth</option><option value=\"6\">Leaderboard</option></select><div class=\"invalid-feedback\">Please select a valid state.</div><input type=\"hidden\" name=\"bp_size_text["+count+"]\" id=\"bp_size_text"+count+"\" value=\"\" /></div>";
        var position_form = "<div class=\"col-md-5 mb-3\"><label>Position:</label><select name=\"bp_position_id["+count+"]\" class=\"custom-select\" onchange=\"document.getElementById('bp_position_text"+count+"').value=this.options[this.selectedIndex].text\"><option selected value=\"\">Choose Position</option><option value=\"1\">Top</option><option value=\"2\">Middle</option><option value=\"3\">Bottom</option><option value=\"4\">Left</option><option value=\"5\">Right</option></select><input type=\"hidden\" name=\"bp_position_text["+count+"]\" id=\"bp_position_text"+count+"\" value=\"\" /></div>";
        var section_form = "<div class=\"col-md-5 mb-3\"><label>Section:</label><select name=\"bp_section_id["+count+"]\" class=\"custom-select\" onchange=\"document.getElementById('bp_section_text"+count+"').value=this.options[this.selectedIndex].text\"><option selected value=\"\">Choose Section</option><option value=\"1\">Homepage</option><option value=\"2\">Business</option><option value=\"3\">Social</option><option value=\"4\">Sport</option><option value=\"5\">Car</option></select><input type=\"hidden\" name=\"bp_section_text["+count+"]\" id=\"bp_section_text"+count+"\" value=\"\" /></div>";
        var date_form = "<div class=\"form-group\"><div class=\"input-daterange datepicker\"><div class=\"input-group-inline\"><span>Period:</span></div><div class=\"input-group-inline\"><span>From</span>&nbsp<input type=\"text\" class=\"form-control form-input--date\" name=\"bp_date_from["+count+"]\">&nbsp<span><img src=\"assets/images/icon-svg/calendar.svg\" width=\"20\"></span></div><div class=\"input-group-inline\"><span>to</span>&nbsp<input type=\"text\" class=\"form-control form-input--date\" name=\"bp_date_to["+count+"]\">&nbsp<span><img src=\"assets/images/icon-svg/calendar.svg\" width=\"20\"></span></div></div></div>";
        var banner_url = "<div class=\"form-group row\"><label for=\"inputURL\" class=\"col-md-4 col-lg-3 col-form-label label-normal\">URL link banner:</label><div class=\"col-md-11 col-lg-12\"><input name=\"bp_banner_url["+count+"]\" type=\"text\" class=\"form-control\"></div></div>";
        var booking_link = "<div class=\"row\"><div class=\"col-15 col-form-label label-normal\">Impression: &nbsp; <a href=\"javascript:;\" class=\"btn btn-click2\">Click for booking inventory</a></div></div>";
        var dropdown = size_form+position_form+section_form;
        var upload = "<div class=\"form-group row\"><label class=\"col-md-4 col-lg-3 col-form-label label-normal\">Upload file:</label><div class=\"col-md-11 col-lg-12\"><div class=\"custom-file\"><input type=\"file\" name=\"bp_ad_desc_file["+count+"]\" class=\"custom-file-input\" id=\"customFile\"><label class=\"custom-file-label\" for=\"customFile\">Choose file</label></div><div class=\"text-ps--small\">Please choose only .JPG, GIF, AI, PSD, txt, Excel</div></div></div>";
                           
        var Html = "<div id=\"bp-ad-card\" class=\"box-ad--banner\">"+cardHeader+"<div class=\"box-ad--container\"><div class=\"form-row\">"+dropdown+"</div>"+date_form+banner_url+upload+booking_link+"</div></div>";
        $('#bp-ad-description').append(Html);
        count++;
    };

    //insert ad description card when user click add more ad+ button on Post Today tab
    function addPTDAds(){
        var count = $("div[id*='ptd-ad-card']").length;
        var cardHeader = "<div class=\"box-ad--title\">Ad "+(count+1)+" Description:</div>";
        var size_form = "<div class=\"col-md-5 mb-3\"><label>Size:</label><select name=\"ptd_size_id["+count+"]\" class=\"custom-select\" onchange=\"document.getElementById('ptd_size_text"+count+"').value=this.options[this.selectedIndex].text\"><option selected value=\"\">Choose Size</option><option value=\"1\">Billboard</option><option value=\"2\">Rectangle</option><option value=\"3\">Double-Rectangle</option><option value=\"4\">Boombox</option><option value=\"5\">Fullwidth</option><option value=\"6\">Leaderboard</option></select><div class=\"invalid-feedback\">Please select a valid state.</div><input type=\"hidden\" name=\"ptd_size_text["+count+"]\" id=\"ptd_size_text"+count+"\" value=\"\" /></div>";
        var position_form = "<div class=\"col-md-5 mb-3\"><label>Position:</label><select name=\"ptd_position_id["+count+"]\" class=\"custom-select\" onchange=\"document.getElementById('ptd_position_text"+count+"').value=this.options[this.selectedIndex].text\"><option selected value=\"\">Choose Position</option><option value=\"1\">Top</option><option value=\"2\">Middle</option><option value=\"3\">Bottom</option><option value=\"4\">Left</option><option value=\"5\">Right</option></select><input type=\"hidden\" name=\"ptd_position_text["+count+"]\" id=\"ptd_position_text"+count+"\" value=\"\" /></div>";
        var section_form = "<div class=\"col-md-5 mb-3\"><label>Section:</label><select name=\"ptd_section_id["+count+"]\" class=\"custom-select\" onchange=\"document.getElementById('ptd_section_text"+count+"').value=this.options[this.selectedIndex].text\"><option selected value=\"\">Choose Section</option><option value=\"1\">Homepage</option><option value=\"2\">Business</option><option value=\"3\">Social</option><option value=\"4\">Sport</option><option value=\"5\">Car</option></select><input type=\"hidden\" name=\"ptd_section_text["+count+"]\" id=\"ptd_section_text"+count+"\" value=\"\" /></div>";
        var date_form = "<div class=\"form-group\"><div class=\"input-daterange datepicker\"><div class=\"input-group-inline\"><span>Period:</span></div><div class=\"input-group-inline\"><span>From</span>&nbsp<input type=\"text\" class=\"form-control form-input--date\" name=\"ptd_date_from["+count+"]\">&nbsp<span><img src=\"assets/images/icon-svg/calendar.svg\" width=\"20\"></span></div><div class=\"input-group-inline\"><span>to</span>&nbsp<input type=\"text\" class=\"form-control form-input--date\" name=\"ptd_date_to["+count+"]\">&nbsp<span><img src=\"assets/images/icon-svg/calendar.svg\" width=\"20\"></span></div></div></div>";
        var banner_url = "<div class=\"form-group row\"><label for=\"inputURL\" class=\"col-md-4 col-lg-3 col-form-label label-normal\">URL link banner:</label><div class=\"col-md-11 col-lg-12\"><input name=\"ptd_banner_url["+count+"]\" type=\"text\" class=\"form-control\"></div></div>";
        var booking_link = "<div class=\"row\"><div class=\"col-15 col-form-label label-normal\">Impression: &nbsp; <a href=\"javascript:;\" class=\"btn btn-click2\">Click for booking inventory</a></div></div>";
        var dropdown = size_form+position_form+section_form;
        var upload = "<div class=\"form-group row\"><label class=\"col-md-4 col-lg-3 col-form-label label-normal\">Upload file:</label><div class=\"col-md-11 col-lg-12\"><div class=\"custom-file\"><input type=\"file\" name=\"ptd_ad_desc_file["+count+"]\" class=\"custom-file-input\" id=\"customFile\"><label class=\"custom-file-label\" for=\"customFile\">Choose file</label></div><div class=\"text-ps--small\">Please choose only .JPG, GIF, AI, PSD, txt, Excel</div></div></div>";
                           
        var Html = "<div id=\"ptd-ad-card\" class=\"box-ad--banner\">"+cardHeader+"<div class=\"box-ad--container\"><div class=\"form-row\">"+dropdown+"</div>"+date_form+banner_url+upload+booking_link+"</div></div>";
        $('#ptd-ad-description').append(Html);
        count++;
    };

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
