@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Request Form</h2>
          {!! Form::open(['action' => ['RequestFormController@review', 'method' => 'POST'],'name'=>'form','id'=>'form','enctype'=>'multipart/form-data', 'onsubmit'=>'return Validate(this);'])!!}
            <!-- get value from -->
            <?php if(isset($item['id'])){ ?>
              <input type="hidden" name='id' value="<?= $item['id'] ?>">
            <?php } 
            if(isset($item['ad_desc_id'])){ ?>
              <input type="hidden" name='ad_desc_id' value="<?= $item['ad_desc_id'] ?>">
            <?php }  
            if(isset($item['request_id'])){ ?>
              <input type="hidden" name='request_id' value="<?= $item['request_id'] ?>">
            <?php }if(isset($item['status'])){ ?>
              <input type="hidden" name='status' value="<?= $item['status'] ?>">
            <?php }?>
            <?php if(isset($item->old_bp_banner_file)){ ?>
                <input type="hidden" name="old_bp_banner_file" value="<?= $item->old_bp_banner_file ?>">
            <?php }if(isset($item->old_bp_quotation_file)){ ?>  
                <input type="hidden" name="old_bp_quotation_file" value="<?= $item->old_bp_quotation_file ?>">
            <?php  } if(isset($item->old_ptd_banner_file)){ ?>   
                <input type="hidden" name="old_ptd_banner_file" value="<?= $item->old_ptd_banner_file ?>">
            <?php  } if(isset($item->old_ptd_quotation_file)){ ?>  
                <input type="hidden" name="old_ptd_quotation_file" value="<?= $item->old_ptd_quotation_file ?>">
            <?php  } ?>
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
                    <input class="form-check-input" type="radio" name="sales_type" id="inlineRadio1" value="Direct" <?= (!empty($item['sales_type']) && $item['sales_type']=='Direct' || isset($item['sales_type']) ? 'checked' : '' ) ?>>
                    <label class="form-check-label" for="inlineRadio1">Direct</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sales_type" id="inlineRadio2" value="Agency" <?= (!empty($item['sales_type']) && $item['sales_type']=='Agency' ? 'checked' : '' ) ?>>
                    <label class="form-check-label" for="inlineRadio2">Agency</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Customer name:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                {{ Form::select('customer_id', (['0' => 'Choose...']+ $customer), (!empty($item['customer_id']) ? $item['customer_id'] : NULL), ['class'=>'custom-select','required'=>'required']) }}
                  <div class="div-form--link"> or <a href="/create_new_customer" target="_blank">Create new customer</a></div>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Campaign name:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <input type="text" name="campaign_name" value="<?= (!empty($item['campaign_name']) ? $item['campaign_name'] : '') ?>" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="advertiserSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser name:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                {{ Form::select('advertiser_id', (['0' => 'Choose...']+ $advertiser), (!empty($item['advertiser_id']) ? $item['advertiser_id'] : null), ['class'=>'custom-select','required'=>'required']) }}
                  <div class="div-form--link"> or <a href="/create_new_advertiser" target="_blank">Create new advertiser</a></div>
                </div>
              </div>
            </div>

            <div class="content-border">

              <ul class="nav nav-tabs nav-requestForm" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link <?= (isset($item['ptd_type']) || !empty($item['ptd_type']) ? '' : 'active')?>" id="bangkokpost-tab"  role="tab" aria-controls="bangkokpost" aria-selected="true">Bangkokpost</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= (!empty($item['ptd_type']) ? 'active' : '')?>" id="posttoday-tab"  role="tab" aria-controls="posttoday" aria-selected="true">Posttoday</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade <?= (!empty($item['ptd_type']) ? '' : 'show active')?>" id="bangkokpost" role="tabpanel" aria-labelledby="bangkokpost-tab">
                  
                  <div class="content-tablist">
                  <div id="bp-all-detail">
                  <div id="bp_detail--1">  <!-- default content (for copy)-->
                  <?php  if(!isset($item['bp_size_id'])){ ?>
                  <script> var bp_action = 'New';</script>
                    <div class="form-ad--detail">
                    <!-- TYPE -->
                      <div class="choose--type" id="bp-type-container">
                        <div class="row">
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="bp_type[0]" type="radio" id="bp_type1-1" value="Social" <?= (!empty($item['bp_type']) && $item['bp_type'] === 'Social' ? 'checked' : '') ?> onchange="showOption($(this),'bp')" >
                              <label class="form-check-label" for="bp_choose1">Social</label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="bp_type[0]" type="radio" id="bp_type2-1" value="Website" <?= (!empty($item['bp_type']) && $item['bp_type'] === 'Website' ? 'checked' : '') ?> onchange="showOption($(this),'bp')">
                              <label class="form-check-label" for="bp_choose2">Website</label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="bp_type[0]" type="radio" id="bp_type3-1" value="E-newsletter" <?= (!empty($item['bp_type']) && $item['bp_type'] === 'E-newsletter' ? 'checked' : '') ?> onchange="showOption($(this),'bp')">
                              <label class="form-check-label" for="bp_choose3">E-newsletter</label>
                            </div>
                          </div>
                        </div>
                      </div>

                  <!-- Social options -->
                  <div class="bp_type--choose div-choose--type" id="bp_type--1-1" style="display: none;">
                  
                      <div id="bp-facebook-tab" class="form-group border-title">
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="bp_social[0]" type="radio" id="bp_social1" value="Facebook" <?= (!empty($item['bp_social']) && $item['bp_social'] === 'Facebook' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="bp_fb1">Facebook</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="bp_social[0]" type="radio" id="bp_social2" value="Line" <?= (!empty($item['bp_social']) && $item['bp_social'] === 'Line' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="bp_fb2">Line</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="bp_social[0]" type="radio" id="bp_social3" value="Twitter" <?= (!empty($item['bp_social']) && $item['bp_social'] === 'Twitter' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="bp_fb3">Twitter</label>
                            </div>
                          </div>
                          </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2 col-md-2">
                          <div class="form-check form-check-inline">
                            <label class="form-check-label"><strong>Type:</strong></label>
                          </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                          <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bp_facebook[0]" type="radio" id="bp_fb1" value="Normal Post" <?= (!empty($item['bp_facebook']) && $item['bp_facebook'] === 'Normal Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="bp_type1">Normal Post</label>
                          </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                          <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bp_facebook[0]" type="radio" id="bp_fb2" value="Facebook Boost Post" <?= (!empty($item['bp_facebook']) && $item['bp_facebook'] === 'Facebook Boost Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="bp_type2">Boost Post</label>
                          </div>
                        </div>
                      </div>

                    </div>

                    <!-- Website options -->
                    <div class="bp_type--choose  div-choose--type" id="bp_type--2-1" style="display: none;">
                      <div class="bar-title mt-4">Website:</div>
                      <div class="form-group row" id="bp-tab-border">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[0][0]" <?= (!empty($item['bp_web'][0][0]) && $item['bp_web'][0][0] === 'Banner' ? 'checked' : '') ?> type="checkbox" id="bp_web1" value="Banner">
                            <label class="form-check-label" for="bp_web">Banner</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[0][1]" <?= (!empty($item['bp_web'][0][1]) && $item['bp_web'][0][1] === 'Nytive Ad' ? 'checked' : '') ?> type="checkbox" id="bp_web2" value="Nytive Ad">
                            <label class="form-check-label" for="bp_web">Nytive Ad</label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[0][2]" <?= (!empty($item['bp_web'][0][2]) && $item['bp_web'][0][2] === 'Premium Advertorial' ? 'checked' : '') ?> type="checkbox" id="bp_web3" value="Premium Advertorial">
                            <label class="form-check-label" for="bp_web">Premium Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[0][3]" <?= (!empty($item['bp_web'][0][3]) && $item['bp_web'][0][3] === 'Advertorial' ? 'checked' : '') ?> type="checkbox" id="bp_web4" value="Advertorial">
                            <label class="form-check-label" for="bp_web">Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[0][4]" <?= (!empty($item['bp_web'][0][4]) && $item['bp_web'][0][4] === 'Property Listing' ? 'checked' : '') ?> type="checkbox" id="bp_web5" value="Property Listing">
                            <label class="form-check-label" for="bp_web">Property Listing</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[0][5]" <?= (!empty($item['bp_web'][0][5]) && $item['bp_web'][0][5] === 'Special event' ? 'checked' : '') ?> type="checkbox" id="bp_web6" value="Special event">
                            <label class="form-check-label" for="bp_web">Special event</label>
                          </div>
                        </div>
                         <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input"  name="bp_web[0][6]" <?= (!empty($item['bp_web'][0][6]) && $item['bp_web'][0][6] === 'Sponsor Link' ? 'checked' : '') ?> type="checkbox" id="bp_web7" value="Sponsor Link">
                            <label class="form-check-label" for="bp_web">Sponsor Link</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[0][7]" <?= (!empty($item['bp_web'][0][7]) && $item['bp_web'][0][7] === 'Jobs' ? 'checked' : '') ?> type="checkbox" id="bp_web8" value="Jobs">
                            <label class="form-check-label" for="bp_web">Jobs</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[0][8]" <?= (!empty($item['bp_web'][0][8]) && $item['bp_web'][0][8] === 'PR' ? 'checked' : '') ?> type="checkbox" id="bp_web9" value="PR">
                            <label class="form-check-label" for="bp_web">PR</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- E-newsletter options -->
                    <!--div id="bp_option3" style="display:none;">CCC</!--div-->
                  </div>

                  <div class="row">
                      <div  class="col-15">
                        <div id="bp-ad-description">
                        <div id="bp-ad-card--1" class="box-ad--banner" style="display:none;">
                          <div id="bp-ad-title" class="box-ad--title">Ad 1 Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="bp_size_id[0]" class="custom-select" onchange="document.getElementById('bp_size_text0').value=this.options[this.selectedIndex].text" >
                                      <option value="">Choose Size</option>
                                      <optgroup label="Rectangle Desktop & Mobile">
                                          <option value="1" label="300x250">Rectangle Desktop &Mobile 300x250</option>
                                      </optgroup>
                                      <optgroup label="Double Rectangle Desktop">
                                        <option value="2" label="300x600">Double Rectangle Desktop 300x600</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Desktop">
                                        <option value="3" label="728x90">Leaderboard Desktop 728x90</option>
                                        <option value="4" label="970x90">Leaderboard Desktop 970x90</option>
                                        <option value="5" label="970x250">Leaderboard Desktop 970x250</option>
                                        <option value="6" label="1200x90">Leaderboard Desktop 1200x90</option>
                                        <option value="7" label="1200x250">Leaderboard Desktop 1200x250</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Mobile">
                                        <option value="8" label="320x100">Leaderboard Mobile 320x100</option>
                                        <option value="9" label="320x50">Leaderboard Mobile 320x50</option>
                                        <option value="10" label="300x100">Leaderboard Mobile 300x100</option>
                                        <option value="11" label="300x50">Leaderboard Mobile 300x50</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Desktop">
                                        <option value="12" label="800x500">Coverpage Desktop 800x500</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Mobile">
                                        <option value="13" label="300x250">Coverpage Mobile 300x250</option>
                                      </optgroup>
                                      <optgroup label="InRead">
                                        <option value="14" label="300x250">InRead300x250</option>
                                        <option value="15" label="640x360">InRead640x360</option>
                                      </optgroup>
                                      <optgroup label="Other">
                                        <option value="16" label="E-newsletter">E-newsletter</option>
                                        <option value="17" label="Facebook">Facebook</option>
                                        <option value="18" label="Line">Line</option>
                                        <option value="19" label="Twitter">Twitter</option>
                                      </optgroup>
                                </select>
                                <div class="invalid-feedback">
                                  Please select a valid state.
                                </div>
                                <input type="hidden" name="bp_size_text[0]" id="bp_size_text0" value="" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Position:</label>
                                <select name="bp_position_id[0]" class="custom-select"  onchange="document.getElementById('bp_position_text0').value=this.options[this.selectedIndex].text;changeOptionValue(this);">
                                    <option value="">Choose Position</option>
                                    <option value="1">Section</option>
                                    <option value="2">Article</option>
                                </select>
                                <input type="hidden" name="bp_position_text[0]" id="bp_position_text0" value="" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="bp_section_id[0]" class="custom-select" onchange="document.getElementById('bp_section_text0').value=this.options[this.selectedIndex].text">
                                  <option value="">Choose Section</option>
                                  <?php foreach($sectionArray['bp'] as $key=>$value){ ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                  <?php } ?>
                                </select>
                                <input type="hidden" name="bp_section_text[0]" id="bp_section_text0" value="" />
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="input-daterange datepicker">
                                <div class="input-group-inline"><span>Period:</span></div>
                                <div class="input-group-inline">
                                  <span>From</span>
                                  <input type="text" class="form-control form-input--date" name="bp_period_from[0]" autocomplete="off">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                                <div class="input-group-inline">
                                  <span>to</span>
                                  <input type="text" class="form-control form-input--date" name="bp_period_to[0]" autocomplete="off">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                              </div>
                            </div>
                            <div id="bp_device" class="form-group row">
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
                                  <input type="file" name="bp_banner_file[0]" class="custom-file-input" id="customFile" multiple onchange="showFileName(this.name);"/>
                                  <label id="bp_banner_file0" class="custom-file-label" for="customFile" >Choose file</label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel, Zip</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload quotation:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="bp_quotation_file[0]" class="custom-file-input" id="customFile"multiple onchange="showFileName(this.name);"/>
                                  <label id="bp_quotation_file0" class="custom-file-label" for="customFile">Choose file</label>
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
                                <div class="mt-2"><a href="/inventory" target="_blank" class="btn btn-click">View dashboard</a></div>
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
                        </div>
                    </div>
                  <?php  
                          }
                          else{ ?>
                          <script>
                            var bp_action = 'Edit';
                            var bp_position_count = [<?= count($item['bp_position_id'])  ?>];
                            var bp_section_count = [<?= count($item['bp_section_id']) ?>];
                          </script>
                        <?php for($i=0;$i<count($item['bp_type']);$i++){ ?>
                          <div class="form-ad--detail">
                    <!-- TYPE -->
                      <div class="choose--type" id="bp-type-container">
                        <div class="row">
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="bp_type[<?= $i ?>]" type="radio" id="bp_type1-<?= ($i+1) ?>" value="Social" <?= (!empty($item['bp_type'][$i]) && $item['bp_type'][$i] === 'Social' ? 'checked' : '') ?> onchange="showOption($(this),'bp')" >
                              <label class="form-check-label" for="bp_choose1">Social</label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="bp_type[<?=$i?>]" type="radio" id="bp_type2-<?= ($i+1) ?>" value="Website" <?= (!empty($item['bp_type'][$i]) && $item['bp_type'][$i] === 'Website' ? 'checked' : '') ?> onchange="showOption($(this),'bp')">
                              <label class="form-check-label" for="bp_choose2">Website</label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="bp_type[<?=$i?>]" type="radio" id="bp_type3-<?= ($i+1) ?>" value="E-newsletter" <?= (!empty($item['bp_type'][$i]) && $item['bp_type'][$i] === 'E-newsletter' ? 'checked' : '') ?> onchange="showOption($(this),'bp')">
                              <label class="form-check-label" for="bp_choose3">E-newsletter</label>
                            </div>
                          </div>
                        </div>
                      </div>

                  <!-- Social options -->
                  <div class="bp_type--choose div-choose--type" id="bp_type--1-<?= ($i+1) ?>" style="<?= (isset($item['bp_social'][$i]) ? '' : 'display: none;') ?>">
                  
                      <div id="bp-facebook-tab" class="form-group border-title">
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="bp_social[<?= $i ?>]" type="radio" id="bp_social1" value="Facebook" <?= (!empty($item['bp_social'][$i]) && $item['bp_social'][$i] === 'Facebook' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="bp_fb1">Facebook</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="bp_social[<?= $i ?>]" type="radio" id="bp_social2" value="Line" <?= (!empty($item['bp_social'][$i]) && $item['bp_social'][$i] === 'Line' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="bp_fb2">Line</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="bp_social[<?= $i ?>]" type="radio" id="bp_social3" value="Twitter" <?= (!empty($item['bp_social'][$i]) && $item['bp_social'][$i] === 'Twitter' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="bp_fb3">Twitter</label>
                            </div>
                          </div>
                          </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2 col-md-2">
                          <div class="form-check form-check-inline">
                            <label class="form-check-label"><strong>Type:</strong></label>
                          </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                          <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bp_facebook[<?= $i ?>]" type="radio" id="bp_fb1" value="Normal Post" <?= (!empty($item['bp_facebook'][$i]) && $item['bp_facebook'][$i] === 'Normal Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="bp_type1">Normal Post</label>
                          </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                          <div class="form-check form-check-inline">
                          <input class="form-check-input" name="bp_facebook[<?= $i ?>]" type="radio" id="bp_fb2" value="Facebook Boost Post" <?= (!empty($item['bp_facebook'][$i]) && $item['bp_facebook'][$i] === 'Facebook Boost Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="bp_type2">Boost Post</label>
                          </div>
                        </div>
                      </div>

                    </div>

                    <!-- Website options -->
                    <div class="bp_type--choose  div-choose--type" id="bp_type--2-<?= ($i+1) ?>" style="<?= (isset($item['bp_web'][$i]) ? '' : 'display: none;') ?>">
                      <div class="bar-title mt-4">Website:</div>
                      <div class="form-group row" id="bp-tab-border">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[<?= $i ?>][0]" <?= (!empty($item['bp_web'][$i][0]) && $item['bp_web'][$i][0] === 'Banner' ? 'checked' : '') ?> type="checkbox" id="bp_web1" value="Banner">
                            <label class="form-check-label" for="bp_web">Banner</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[<?= $i ?>][1]" <?= (!empty($item['bp_web'][$i][1]) && $item['bp_web'][$i][1] === 'Nytive Ad' ? 'checked' : '') ?> type="checkbox" id="bp_web2" value="Nytive Ad">
                            <label class="form-check-label" for="bp_web">Nytive Ad</label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[<?= $i ?>][2]" <?= (!empty($item['bp_web'][$i][2]) && $item['bp_web'][$i][2] === 'Premium Advertorial' ? 'checked' : '') ?> type="checkbox" id="bp_web3" value="Premium Advertorial">
                            <label class="form-check-label" for="bp_web">Premium Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[<?= $i ?>][3]" <?= (!empty($item['bp_web'][$i][3]) && $item['bp_web'][$i][3] === 'Advertorial' ? 'checked' : '') ?> type="checkbox" id="bp_web4" value="Advertorial">
                            <label class="form-check-label" for="bp_web">Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[<?= $i ?>][4]" <?= (!empty($item['bp_web'][$i][4]) && $item['bp_web'][$i][4] === 'Property Listing' ? 'checked' : '') ?> type="checkbox" id="bp_web5" value="Property Listing">
                            <label class="form-check-label" for="bp_web">Property Listing</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[<?= $i ?>][5]" <?= (!empty($item['bp_web'][$i][5]) && $item['bp_web'][$i][5] === 'Special event' ? 'checked' : '') ?> type="checkbox" id="bp_web6" value="Special event">
                            <label class="form-check-label" for="bp_web">Special event</label>
                          </div>
                        </div>
                         <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input"  name="bp_web[<?= $i ?>][6]" <?= (!empty($item['bp_web'][$i][6]) && $item['bp_web'][$i][6] === 'Sponsor Link' ? 'checked' : '') ?> type="checkbox" id="bp_web7" value="Sponsor Link">
                            <label class="form-check-label" for="bp_web">Sponsor Link</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[<?= $i ?>][7]" <?= (!empty($item['bp_web'][$i][7]) && $item['bp_web'][$i][7] === 'Jobs' ? 'checked' : '') ?> type="checkbox" id="bp_web8" value="Jobs">
                            <label class="form-check-label" for="bp_web">Jobs</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[<?= $i ?>][8]" <?= (!empty($item['bp_web'][$i][8]) && $item['bp_web'][$i][8] === 'PR' ? 'checked' : '') ?> type="checkbox" id="bp_web9" value="PR">
                            <label class="form-check-label" for="bp_web">PR</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- E-newsletter options -->
                    <!--div id="bp_option3" style="display:none;">CCC</!--div-->
                  </div>

                  <div class="row">
                      <div  class="col-15">
                        <div id="bp-ad-description">
                        
                        <div id="bp-ad-card--<?= ($i+1) ?>" class="box-ad--banner">
                          <div id="bp-ad-title" class="box-ad--title">Ad <?= ($i+1) ?> Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="bp_size_id[<?= $i ?>]" class="custom-select" onchange="document.getElementById('bp_size_text<?= $i ?>').value=this.options[this.selectedIndex].text" >
                                      <option value="" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '' ? 'selected' : '') ?>>Choose Size</option>
                                      <optgroup label="Rectangle Desktop & Mobile">
                                          <option value="1" label="300x250" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Rectangle Desktop &Mobile 300x250' ? 'selected' : '') ?>>Rectangle Desktop &Mobile 300x250</option>
                                      </optgroup>
                                      <optgroup label="Double Rectangle Desktop">
                                        <option value="2" label="300x600" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Double Rectangle Desktop 300x600' ? 'selected' : '') ?>>Double Rectangle Desktop 300x600</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Desktop">
                                        <option value="3" label="728x90" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Leaderboard Desktop 728x90' ? 'selected' : '') ?>>Leaderboard Desktop 728x90</option>
                                        <option value="4" label="970x90" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Leaderboard Desktop 970x250' ? 'selected' : '') ?>>Leaderboard Desktop 970x250</option>
                                        <option value="5" label="970x250" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Leaderboard Desktop 970x250' ? 'selected' : '') ?>>Leaderboard Desktop 970x250</option>
                                        <option value="6" label="1200x90" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Leaderboard Desktop 1200x90' ? 'selected' : '') ?>>Leaderboard Desktop 1200x90</option>
                                        <option value="7" label="1200x250" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Leaderboard Desktop 1200x250' ? 'selected' : '') ?>>Leaderboard Desktop 1200x250</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Mobile">
                                        <option value="8" label="320x100" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Leaderboard Mobile 320x100' ? 'selected' : '') ?>>Leaderboard Mobile 320x100</option>
                                        <option value="9" label="320x50" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Leaderboard Mobile 320x50' ? 'selected' : '') ?>>Leaderboard Mobile 320x50</option>
                                        <option value="10" label="300x100" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Leaderboard Mobile 300x100' ? 'selected' : '') ?>>Leaderboard Mobile 300x100</option>
                                        <option value="11" label="300x50" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Leaderboard Mobile 300x50' ? 'selected' : '') ?>>Leaderboard Mobile 300x50</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Desktop">
                                        <option value="12" label="800x500" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Coverpage Desktop 800x500' ? 'selected' : '') ?>>Coverpage Desktop 800x500</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Mobile">
                                        <option value="13" label="300x250" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Coverpage Mobile 300x250' ? 'selected' : '') ?>>Coverpage Mobile 300x250</option>
                                      </optgroup>
                                      <optgroup label="InRead">
                                        <option value="14" label="300x250" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'InRead300x250' ? 'selected' : '') ?>>InRead300x250</option>
                                        <option value="15" label="640x360" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'InRead640x360' ? 'selected' : '') ?>>InRead640x360</option>
                                      </optgroup>
                                      <optgroup label="Other">
                                        <option value="16" label="E-newsletter" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'E-newsletter' ? 'selected' : '') ?>>E-newsletter</option>
                                        <option value="17" label="Facebook" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Facebook' ? 'selected' : '') ?>>Facebook</option>
                                        <option value="18" label="Line" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Line' ? 'selected' : '') ?>>Line</option>
                                        <option value="19" label="Twitter" <?= (!empty($item['bp_size_text'][$i]) && $item['bp_size_text'][$i] == 'Twitter' ? 'selected' : '') ?>>Twitter</option>
                                      </optgroup>
                                </select>
                                <div class="invalid-feedback">
                                  Please select a valid state.
                                </div>
                                <input type="hidden" name="bp_size_text[<?= $i ?>]" id="bp_size_text<?= $i ?>" value="<?= (!empty($item['bp_size_text'][$i]) ? $item['bp_size_text'][$i] : '') ?>" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Position:</label>
                                
                                <select name="bp_position_id[<?= $i ?>]" class="custom-select"  onchange="document.getElementById('bp_position_text<?= $i ?>').value=this.options[this.selectedIndex].text;changeOptionValue(this);" <?= (isset($item['bp_position_text'][$i])&&!empty($item['bp_position_text'][$i]) ? '' : 'disabled') ?>>
                                  <option value="">Choose Position</option>
                                  <option value="1" <?= (!empty($item['bp_position_text'][$i]) && $item['bp_position_text'][$i] == 'Section' ? 'selected' : '') ?>>Section</option>
                                  <option value="2" <?= (!empty($item['bp_position_text'][$i]) && $item['bp_position_text'][$i] == 'Article' ? 'selected' : '') ?>>Article</option>
                                </select>
                                <input type="hidden" name="bp_position_text[<?= $i ?>]" id="bp_position_text<?= $i ?>" value="<?= (!empty($item['bp_position_text'][$i]) ? $item['bp_position_text'][$i] : '') ?>" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="bp_section_id[<?= $i ?>]" class="custom-select" onchange="document.getElementById('bp_section_text<?= $i ?>').value=this.options[this.selectedIndex].text" <?= (isset($item['bp_section_text'][$i])&&!empty($item['bp_section_text'][$i]) ? '' : 'disabled') ?>>
                                <option value="">Choose Section</option>
                                <?php 
                                  //if(!empty($item['bp_section_id'][$i])){
                                  //$position_key = $item['bp_position_id'][$i];
                                  foreach($sectionArray['bp'] as $key => $value){ 
                                    //if($key !== 'position'){
                                ?>
                                  <option value="<?= $key ?>" <?= (!empty($item['bp_section_text'][$i]) && $item['bp_section_text'][$i] == $value ? 'selected' : '') ?> ><?= $value ?></option>
                                    <?php }/*}}*/ ?>
                                </select>
                                <input type="hidden" name="bp_section_text[<?= $i ?>]" id="bp_section_text<?= $i ?>" value="<?= (!empty($item['bp_section_text'][$i]) ? $item['bp_section_text'][$i] : '') ?>" />
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="input-daterange datepicker">
                                <div class="input-group-inline"><span>Period:</span></div>
                                <div class="input-group-inline">
                                  <span>From</span>
                                  <input type="text" class="form-control form-input--date" name="bp_period_from[<?= $i ?>]" value="<?= (!empty($item['bp_period_from'][$i]) ? $item['bp_period_from'][$i] : '' ) ?>" autocomplete="off">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                                <div class="input-group-inline">
                                  <span>to</span>
                                  <input type="text" class="form-control form-input--date" name="bp_period_to[<?= $i ?>]" value="<?= (!empty($item['bp_period_to'][$i]) ? $item['bp_period_to'][$i] : '' ) ?>" autocomplete="off">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                              </div>
                            </div>
                            <div id="bp_device" class="form-group row" style="<?= (isset($item['bp_device'][$i]) ? '' : 'display:none;') ?>">
                              <label for="inputUsername" class="col-auto col-sm-4 col-md-4 col-lg-3 col-form-label label-normal pt-0">Device:</label>
                              <div class="col-auto col-sm-11 col-md-11 col-lg-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="bp_device[<?= $i ?>]" type="radio" id="inlineRadio11" value="Desktop" <?= (!empty($item['bp_device'][$i]) && $item['bp_device'][$i] === 'Desktop' ? 'checked' : '') ?> >
                                  <label class="form-check-label" for="inlineRadio11">Desktop</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="bp_device[<?= $i ?>]" type="radio" id="inlineRadio21" value="Mobile" <?= (!empty($item['bp_device'][$i]) && $item['bp_device'][$i] === 'Mobile' ? 'checked' : '') ?> >
                                  <label class="form-check-label" for="inlineRadio21">Mobile</label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-md-4 col-lg-3 col-form-label label-normal">URL link banner:</label>
                              <div class="col-md-11 col-lg-12">
                                <input name="bp_banner_url[<?= $i ?>]" type="text" class="form-control" value="<?= (!empty($item['bp_banner_url'][$i]) ? $item['bp_banner_url'][$i] : '' ) ?>">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload banner:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="bp_banner_file[<?= $i ?>]" class="custom-file-input" id="customFile" value="<?= (!empty($item['bp_banner_file'][$i]) ? $item['bp_banner_file'][$i] : '' ) ?>" onchange="showFileName(this.name);">
                                    <?php if(!empty($item['bp_banner_file'][$i])){ ?><input type="hidden" name="old_bp_banner_file[<?= $i ?>]" value="<?= $item['bp_banner_file'][$i] ?>" ><?php } ?>
                                  <label id="bp_banner_file<?= $i ?>" class="custom-file-label" for="customFile"><?= (!empty($item['bp_banner_file'][$i]) ? $item['bp_banner_file'][$i] : 'Choose file' ) ?></label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload quotation:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="bp_quotation_file[<?= $i ?>]" class="custom-file-input" id="customFile" value="<?= (!empty($item['bp_quotation_file'][$i]) ? $item['bp_quotation_file'][$i] : '' ) ?>" alt="" onchange="showFileName(this.name);" />
                                  <?php if(!empty($item['bp_quotation_file'][$i])){ ?><input type="hidden" name="old_bp_quotation_file[<?= $i ?>]" value="<?= $item['bp_quotation_file'][$i] ?>" ><?php } ?>
                                  <label id="bp_quotation_file<?= $i ?>" class="custom-file-label" for="customFile"><?= (!empty($item['bp_quotation_file'][$i]) ? $item['bp_quotation_file'][$i] : 'Choose file' ) ?></label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel, Zip</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Impression:</label>
                              <div class="col-sm-10 col-md-8">
                                <input type="text" name="bp_impression_need[<?= $i ?>]" class="form-control" value="<?= (!empty($item['bp_impression_need'][$i]) ? $item['bp_impression_need'][$i] : '' ) ?>">
                                <div class="text-ps--small">Impression is not enough.</div>
                              </div>
                              <div class="col-sm-3">
                                <div class="mt-2"><a href="/inventory" target="_blank" class="btn btn-click">View dashboard</a></div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Detail:</label>
                              <div class="col-md-11 col-lg-12">
                                <input type="text" name="bp_ad_detail[<?= $i ?>]" class="form-control" value="<?= (!empty($item['bp_ad_detail'][$i]) ? $item['bp_ad_detail'][$i] : '' ) ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        </div>
                        </div>
                    </div>
                        
                        <?php }
                          } 
                        ?>
                        
                    </div>
                  </div>
                        <div class="box-btn--addmore"><a href="javascript:;" onclick="addAds('bp');" class="btn btn-addmore">+ ADD MORE AD</a></div>

                      
                    
                    <div class="form-group row">
                      <label for="inputCampaign" class="col-sm-5 col-form-label">Campaign budget (THB):</label>
                      <div class="col-sm-10">
                        <input type="text" name="bp_campaign_budget" class="form-control" value="<?= (!empty($item['bp_campaign_budget']) ? $item['bp_campaign_budget'] : '' ) ?>">
                      </div>
                    </div>
                  </div>

                </div>

                <!-- POST TODAY TAB -->
                <div class="tab-pane fade <?= (!empty($item['ptd_type']) ? 'show active' : '')?>" id="posttoday" role="taptdanel" aria-labelledby="posttoday-tab">
                  
                <div class="content-tablist">
                <div id="ptd-all-detail">
                  <div id="ptd_detail--1">  <!-- default content (for copy)-->
                  <?php  if(!isset($item['ptd_size_id'])){ ?>
                  <script> var ptd_action = 'New';</script>
                    <div class="form-ad--detail">
                    <!-- TYPE -->
                      <div class="choose--type" id="ptd-type-container">
                        <div class="row">
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="ptd_type[0]" type="radio" id="ptd_type1-1" value="Social" <?= (!empty($item['ptd_type']) && $item['ptd_type'] === 'Social' ? 'checked' : '') ?> onchange="showOption($(this),'ptd')" >
                              <label class="form-check-label" for="ptd_choose1">Social</label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="ptd_type[0]" type="radio" id="ptd_type2-1" value="Website" <?= (!empty($item['ptd_type']) && $item['ptd_type'] === 'Website' ? 'checked' : '') ?> onchange="showOption($(this),'ptd')">
                              <label class="form-check-label" for="ptd_choose2">Website</label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="ptd_type[0]" type="radio" id="ptd_type3-1" value="E-newsletter" <?= (!empty($item['ptd_type']) && $item['ptd_type'] === 'E-newsletter' ? 'checked' : '') ?> onchange="showOption($(this),'ptd')">
                              <label class="form-check-label" for="ptd_choose3">E-newsletter</label>
                            </div>
                          </div>
                        </div>
                      </div>

                  <!-- Social options -->
                  <div class="ptd_type--choose div-choose--type" id="ptd_type--1-1" style="display: none;">
                  
                      <div id="ptd-facebook-tab" class="form-group border-title">
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="ptd_social[0]" type="radio" id="ptd_social1" value="Facebook" <?= (!empty($item['ptd_social']) && $item['ptd_social'] === 'Facebook' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="ptd_fb1">Facebook</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="ptd_social[0]" type="radio" id="ptd_social2" value="Line" <?= (!empty($item['ptd_social']) && $item['ptd_social'] === 'Line' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="ptd_fb2">Line</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="ptd_social[0]" type="radio" id="ptd_social3" value="Twitter" <?= (!empty($item['ptd_social']) && $item['ptd_social'] === 'Twitter' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="ptd_fb3">Twitter</label>
                            </div>
                          </div>
                          </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2 col-md-2">
                          <div class="form-check form-check-inline">
                            <label class="form-check-label"><strong>Type:</strong></label>
                          </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                          <div class="form-check form-check-inline">
                          <input class="form-check-input" name="ptd_facebook[0]" type="radio" id="ptd_fb1" value="Normal Post" <?= (!empty($item['ptd_facebook']) && $item['ptd_facebook'] === 'Normal Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="ptd_type1">Normal Post</label>
                          </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                          <div class="form-check form-check-inline">
                          <input class="form-check-input" name="ptd_facebook[0]" type="radio" id="ptd_fb2" value="Facebook Boost Post" <?= (!empty($item['ptd_facebook']) && $item['ptd_facebook'] === 'Facebook Boost Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="ptd_type2">Boost Post</label>
                          </div>
                        </div>
                      </div>

                    </div>

                    <!-- Website options -->
                    <div class="ptd_type--choose  div-choose--type" id="ptd_type--2-1" style="display: none;">
                      <div class="bar-title mt-4">Website:</div>
                      <div class="form-group row" id="ptd-tab-border">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[0][0]" <?= (!empty($item['ptd_web'][0][0]) && $item['ptd_web'][0][0] === 'Banner' ? 'checked' : '') ?> type="checkbox" id="ptd_web1" value="Banner">
                            <label class="form-check-label" for="ptd_web">Banner</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[0][1]" <?= (!empty($item['ptd_web'][0][1]) && $item['ptd_web'][0][1] === 'Nytive Ad' ? 'checked' : '') ?> type="checkbox" id="ptd_web2" value="Nytive Ad">
                            <label class="form-check-label" for="ptd_web">Nytive Ad</label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[0][2]" <?= (!empty($item['ptd_web'][0][2]) && $item['ptd_web'][0][2] === 'Premium Advertorial' ? 'checked' : '') ?> type="checkbox" id="ptd_web3" value="Premium Advertorial">
                            <label class="form-check-label" for="ptd_web">Premium Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[0][3]" <?= (!empty($item['ptd_web'][0][3]) && $item['ptd_web'][0][3] === 'Advertorial' ? 'checked' : '') ?> type="checkbox" id="ptd_web4" value="Advertorial">
                            <label class="form-check-label" for="ptd_web">Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[0][4]" <?= (!empty($item['ptd_web'][0][4]) && $item['ptd_web'][0][4] === 'Property Listing' ? 'checked' : '') ?> type="checkbox" id="ptd_web5" value="Property Listing">
                            <label class="form-check-label" for="ptd_web">Property Listing</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[0][5]" <?= (!empty($item['ptd_web'][0][5]) && $item['ptd_web'][0][5] === 'Special event' ? 'checked' : '') ?> type="checkbox" id="ptd_web6" value="Special event">
                            <label class="form-check-label" for="ptd_web">Special event</label>
                          </div>
                        </div>
                         <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input"  name="ptd_web[0][6]" <?= (!empty($item['ptd_web'][0][6]) && $item['ptd_web'][0][6] === 'Sponsor Link' ? 'checked' : '') ?> type="checkbox" id="ptd_web7" value="Sponsor Link">
                            <label class="form-check-label" for="ptd_web">Sponsor Link</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[0][7]" <?= (!empty($item['ptd_web'][0][7]) && $item['ptd_web'][0][7] === 'Jobs' ? 'checked' : '') ?> type="checkbox" id="ptd_web8" value="Jobs">
                            <label class="form-check-label" for="ptd_web">Jobs</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[0][8]" <?= (!empty($item['ptd_web'][0][8]) && $item['ptd_web'][0][8] === 'PR' ? 'checked' : '') ?> type="checkbox" id="ptd_web9" value="PR">
                            <label class="form-check-label" for="ptd_web">PR</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- E-newsletter options -->
                    <!--div id="ptd_option3" style="display:none;">CCC</!--div-->
                  </div>

                  <div class="row">
                      <div  class="col-15">
                        <div id="ptd-ad-description">
                        <div id="ptd-ad-card--1" class="box-ad--banner" style="display:none;">
                          <div id="ptd-ad-title" class="box-ad--title">Ad 1 Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="ptd_size_id[0]" class="custom-select" onchange="document.getElementById('ptd_size_text0').value=this.options[this.selectedIndex].text" >
                                      <option value="">Choose Size</option>
                                      <optgroup label="Rectangle Desktop & Mobile">
                                          <option value="1" label="300x250">Rectangle Desktop &Mobile 300x250</option>
                                      </optgroup>
                                      <optgroup label="Double Rectangle Desktop">
                                        <option value="2" label="300x600">Double Rectangle Desktop 300x600</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Desktop">
                                        <option value="3" label="728x90">Leaderboard Desktop 728x90</option>
                                        <option value="4" label="970x90">Leaderboard Desktop 970x90</option>
                                        <option value="5" label="970x250">Leaderboard Desktop 970x250</option>
                                        <option value="6" label="1200x90">Leaderboard Desktop 1200x90</option>
                                        <option value="7" label="1200x250">Leaderboard Desktop 1200x250</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Mobile">
                                        <option value="8" label="320x100">Leaderboard Mobile 320x100</option>
                                        <option value="9" label="320x50">Leaderboard Mobile 320x50</option>
                                        <option value="10" label="300x100">Leaderboard Mobile 300x100</option>
                                        <option value="11" label="300x50">Leaderboard Mobile 300x50</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Desktop">
                                        <option value="12" label="800x500">Coverpage Desktop 800x500</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Mobile">
                                        <option value="13" label="300x250">Coverpage Mobile 300x250</option>
                                      </optgroup>
                                      <optgroup label="InRead">
                                        <option value="14" label="300x250">InRead300x250</option>
                                        <option value="15" label="640x360">InRead640x360</option>
                                      </optgroup>
                                      <optgroup label="Other">
                                        <option value="16" label="E-newsletter">E-newsletter</option>
                                        <option value="17" label="Facebook">Facebook</option>
                                        <option value="18" label="Line">Line</option>
                                        <option value="19" label="Twitter">Twitter</option>
                                      </optgroup>
                                </select>
                                <div class="invalid-feedback">
                                  Please select a valid state.
                                </div>
                                <input type="hidden" name="ptd_size_text[0]" id="ptd_size_text0" value="" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Position:</label>
                                <select name="ptd_position_id[0]" class="custom-select"  onchange="document.getElementById('ptd_position_text0').value=this.options[this.selectedIndex].text;changeOptionValue(this);">
                                    <option value="">Choose Position</option>
                                    <option value="1">Section</option>
                                    <option value="2">Article</option>
                                </select>
                                <input type="hidden" name="ptd_position_text[0]" id="ptd_position_text0" value="" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="ptd_section_id[0]" class="custom-select" onchange="document.getElementById('ptd_section_text0').value=this.options[this.selectedIndex].text">
                                  <option value="">Choose Section</option>
                                  <?php foreach($sectionArray['ptd'] as $key=>$value){ ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                  <?php } ?>
                                </select>
                                <input type="hidden" name="ptd_section_text[0]" id="ptd_section_text0" value="" />
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="input-daterange datepicker">
                                <div class="input-group-inline"><span>Period:</span></div>
                                <div class="input-group-inline">
                                  <span>From</span>
                                  <input type="text" class="form-control form-input--date" name="ptd_period_from[0]" autocomplete="off">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                                <div class="input-group-inline">
                                  <span>to</span>
                                  <input type="text" class="form-control form-input--date" name="ptd_period_to[0]" autocomplete="off">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                              </div>
                            </div>
                            <div id="ptd_device" class="form-group row">
                              <label for="inputUsername" class="col-auto col-sm-4 col-md-4 col-lg-3 col-form-label label-normal pt-0">Device:</label>
                              <div class="col-auto col-sm-11 col-md-11 col-lg-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="ptd_device[0]" type="radio" id="inlineRadio11" value="Desktop">
                                  <label class="form-check-label" for="inlineRadio11">Desktop</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="ptd_device[0]" type="radio" id="inlineRadio21" value="Mobile">
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
                                  <input type="file" name="ptd_banner_file[0]" class="custom-file-input" id="customFile" multiple onchange="showFileName(this.name);"/>
                                  <label id="ptd_banner_file0" class="custom-file-label" for="customFile" >Choose file</label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel, Zip</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload quotation:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="ptd_quotation_file[0]" class="custom-file-input" id="customFile"multiple onchange="showFileName(this.name);"/>
                                  <label id="ptd_quotation_file0" class="custom-file-label" for="customFile">Choose file</label>
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
                                <div class="mt-2"><a href="/inventory" target="_blank" class="btn btn-click">View dashboard</a></div>
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
                        </div>
                    </div>
                  <?php  
                          }
                          else{ ?>
                          <script>
                            var ptd_action = 'Edit';
                            var ptd_position_count = [<?= count($item['ptd_position_id'])  ?>];
                            var ptd_section_count = [<?= count($item['ptd_section_id']) ?>];
                          </script>
                        <?php for($i=0;$i<count($item['ptd_type']);$i++){ ?>
                          <div class="form-ad--detail">
                    <!-- TYPE -->
                      <div class="choose--type" id="ptd-type-container">
                        <div class="row">
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="ptd_type[<?= $i ?>]" type="radio" id="ptd_type1-<?= ($i+1) ?>" value="Social" <?= (!empty($item['ptd_type'][$i]) && $item['ptd_type'][$i] === 'Social' ? 'checked' : '') ?> onchange="showOption($(this),'ptd')" >
                              <label class="form-check-label" for="ptd_choose1">Social</label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="ptd_type[<?=$i?>]" type="radio" id="ptd_type2-<?= ($i+1) ?>" value="Website" <?= (!empty($item['ptd_type'][$i]) && $item['ptd_type'][$i] === 'Website' ? 'checked' : '') ?> onchange="showOption($(this),'ptd')">
                              <label class="form-check-label" for="ptd_choose2">Website</label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline choose--type-form">
                              <input class="form-check-input" name="ptd_type[<?=$i?>]" type="radio" id="ptd_type3-<?= ($i+1) ?>" value="E-newsletter" <?= (!empty($item['ptd_type'][$i]) && $item['ptd_type'][$i] === 'E-newsletter' ? 'checked' : '') ?> onchange="showOption($(this),'ptd')">
                              <label class="form-check-label" for="ptd_choose3">E-newsletter</label>
                            </div>
                          </div>
                        </div>
                      </div>

                  <!-- Social options -->
                  <div class="ptd_type--choose div-choose--type" id="ptd_type--1-<?= ($i+1) ?>" style="<?= (isset($item['ptd_social'][$i]) ? '' : 'display: none;') ?>">
                  
                      <div id="ptd-facebook-tab" class="form-group border-title">
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="ptd_social[<?= $i ?>]" type="radio" id="ptd_social1" value="Facebook" <?= (!empty($item['ptd_social'][$i]) && $item['ptd_social'][$i] === 'Facebook' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="ptd_fb1">Facebook</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="ptd_social[<?= $i ?>]" type="radio" id="ptd_social2" value="Line" <?= (!empty($item['ptd_social'][$i]) && $item['ptd_social'][$i] === 'Line' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="ptd_fb2">Line</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="ptd_social[<?= $i ?>]" type="radio" id="ptd_social3" value="Twitter" <?= (!empty($item['ptd_social'][$i]) && $item['ptd_social'][$i] === 'Twitter' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="ptd_fb3">Twitter</label>
                            </div>
                          </div>
                          </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2 col-md-2">
                          <div class="form-check form-check-inline">
                            <label class="form-check-label"><strong>Type:</strong></label>
                          </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                          <div class="form-check form-check-inline">
                          <input class="form-check-input" name="ptd_facebook[<?= $i ?>]" type="radio" id="ptd_fb1" value="Normal Post" <?= (!empty($item['ptd_facebook'][$i]) && $item['ptd_facebook'][$i] === 'Normal Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="ptd_type1">Normal Post</label>
                          </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                          <div class="form-check form-check-inline">
                          <input class="form-check-input" name="ptd_facebook[<?= $i ?>]" type="radio" id="ptd_fb2" value="Facebook Boost Post" <?= (!empty($item['ptd_facebook'][$i]) && $item['ptd_facebook'][$i] === 'Facebook Boost Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="ptd_type2">Boost Post</label>
                          </div>
                        </div>
                      </div>

                    </div>

                    <!-- Website options -->
                    <div class="ptd_type--choose  div-choose--type" id="ptd_type--2-<?= ($i+1) ?>" style="<?= (isset($item['ptd_web'][$i]) ? '' : 'display: none;') ?>">
                      <div class="bar-title mt-4">Website:</div>
                      <div class="form-group row" id="ptd-tab-border">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[<?= $i ?>][0]" <?= (!empty($item['ptd_web'][$i][0]) && $item['ptd_web'][$i][0] === 'Banner' ? 'checked' : '') ?> type="checkbox" id="ptd_web1" value="Banner">
                            <label class="form-check-label" for="ptd_web">Banner</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[<?= $i ?>][1]" <?= (!empty($item['ptd_web'][$i][1]) && $item['ptd_web'][$i][1] === 'Nytive Ad' ? 'checked' : '') ?> type="checkbox" id="ptd_web2" value="Nytive Ad">
                            <label class="form-check-label" for="ptd_web">Nytive Ad</label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[<?= $i ?>][2]" <?= (!empty($item['ptd_web'][$i][2]) && $item['ptd_web'][$i][2] === 'Premium Advertorial' ? 'checked' : '') ?> type="checkbox" id="ptd_web3" value="Premium Advertorial">
                            <label class="form-check-label" for="ptd_web">Premium Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[<?= $i ?>][3]" <?= (!empty($item['ptd_web'][$i][3]) && $item['ptd_web'][$i][3] === 'Advertorial' ? 'checked' : '') ?> type="checkbox" id="ptd_web4" value="Advertorial">
                            <label class="form-check-label" for="ptd_web">Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[<?= $i ?>][4]" <?= (!empty($item['ptd_web'][$i][4]) && $item['ptd_web'][$i][4] === 'Property Listing' ? 'checked' : '') ?> type="checkbox" id="ptd_web5" value="Property Listing">
                            <label class="form-check-label" for="ptd_web">Property Listing</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[<?= $i ?>][5]" <?= (!empty($item['ptd_web'][$i][5]) && $item['ptd_web'][$i][5] === 'Special event' ? 'checked' : '') ?> type="checkbox" id="ptd_web6" value="Special event">
                            <label class="form-check-label" for="ptd_web">Special event</label>
                          </div>
                        </div>
                         <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input"  name="ptd_web[<?= $i ?>][6]" <?= (!empty($item['ptd_web'][$i][6]) && $item['ptd_web'][$i][6] === 'Sponsor Link' ? 'checked' : '') ?> type="checkbox" id="ptd_web7" value="Sponsor Link">
                            <label class="form-check-label" for="ptd_web">Sponsor Link</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[<?= $i ?>][7]" <?= (!empty($item['ptd_web'][$i][7]) && $item['ptd_web'][$i][7] === 'Jobs' ? 'checked' : '') ?> type="checkbox" id="ptd_web8" value="Jobs">
                            <label class="form-check-label" for="ptd_web">Jobs</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[<?= $i ?>][8]" <?= (!empty($item['ptd_web'][$i][8]) && $item['ptd_web'][$i][8] === 'PR' ? 'checked' : '') ?> type="checkbox" id="ptd_web9" value="PR">
                            <label class="form-check-label" for="ptd_web">PR</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- E-newsletter options -->
                    <!--div id="ptd_option3" style="display:none;">CCC</!--div-->
                  </div>

                  <div class="row">
                      <div  class="col-15">
                        <div id="ptd-ad-description">
                        
                        <div id="ptd-ad-card--<?= ($i+1) ?>" class="box-ad--banner">
                          <div id="ptd-ad-title" class="box-ad--title">Ad <?= ($i+1) ?> Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="ptd_size_id[<?= $i ?>]" class="custom-select" onchange="document.getElementById('ptd_size_text<?= $i ?>').value=this.options[this.selectedIndex].text" >
                                      <option value="" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '' ? 'selected' : '') ?>>Choose Size</option>
                                      <optgroup label="Rectangle Desktop & Mobile">
                                          <option value="1" label="300x250" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '1' ? 'selected' : '') ?>>Rectangle Desktop &Mobile 300x250</option>
                                      </optgroup>
                                      <optgroup label="Double Rectangle Desktop">
                                        <option value="2" label="300x600" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '2' ? 'selected' : '') ?>>Double Rectangle Desktop 300x600</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Desktop">
                                        <option value="3" label="728x90" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '3' ? 'selected' : '') ?>>Leaderboard Desktop 728x90</option>
                                        <option value="4" label="970x90" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '4' ? 'selected' : '') ?>>Leaderboard Desktop 970x90</option>
                                        <option value="5" label="970x250" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '5' ? 'selected' : '') ?>>Leaderboard Desktop 970x250</option>
                                        <option value="6" label="1200x90" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '6' ? 'selected' : '') ?>>Leaderboard Desktop 1200x90</option>
                                        <option value="7" label="1200x250" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '7' ? 'selected' : '') ?>>Leaderboard Desktop 1200x250</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Mobile">
                                        <option value="8" label="320x100" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '8' ? 'selected' : '') ?>>Leaderboard Mobile 320x100</option>
                                        <option value="9" label="320x50" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '9' ? 'selected' : '') ?>>Leaderboard Mobile 320x50</option>
                                        <option value="10" label="300x100" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '10' ? 'selected' : '') ?>>Leaderboard Mobile 300x100</option>
                                        <option value="11" label="300x50" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '11' ? 'selected' : '') ?>>Leaderboard Mobile 300x50</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Desktop">
                                        <option value="12" label="800x500" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '12' ? 'selected' : '') ?>>Coverpage Desktop 800x500</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Mobile">
                                        <option value="13" label="300x250" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '13' ? 'selected' : '') ?>>Coverpage Mobile 300x250</option>
                                      </optgroup>
                                      <optgroup label="InRead">
                                        <option value="14" label="300x250" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '14' ? 'selected' : '') ?>>InRead300x250</option>
                                        <option value="15" label="640x360" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '15' ? 'selected' : '') ?>>InRead640x360</option>
                                      </optgroup>
                                      <optgroup label="Other">
                                        <option value="16" label="E-newsletter" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '16' ? 'selected' : '') ?>>E-newsletter</option>
                                        <option value="17" label="Facebook" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '17' ? 'selected' : '') ?>>Facebook</option>
                                        <option value="18" label="Line" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '18' ? 'selected' : '') ?>>Line</option>
                                        <option value="19" label="Twitter" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '19' ? 'selected' : '') ?>>Twitter</option>
                                      </optgroup>
                                </select>
                                <div class="invalid-feedback">
                                  Please select a valid state.
                                </div>
                                <input type="hidden" name="ptd_size_text[<?= $i ?>]" id="ptd_size_text<?= $i ?>" value="<?= (!empty($item['ptd_size_text'][$i]) ? $item['ptd_size_text'][$i] : '') ?>" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Position:</label>
                                
                                <select name="ptd_position_id[<?= $i ?>]" class="custom-select"  onchange="document.getElementById('ptd_position_text<?= $i ?>').value=this.options[this.selectedIndex].text;changeOptionValue(this);" <?= (isset($item['ptd_position_id'][$i])&&!empty($item['ptd_position_id'][$i]) ? '' : 'disabled') ?>>
                                  <option value="">Choose Position</option>
                                  <option value="1" <?= (!empty($item['ptd_position_id'][$i]) && $item['ptd_position_id'][$i] == '1' ? 'selected' : '') ?>>Section</option>
                                  <option value="2" <?= (!empty($item['ptd_position_id'][$i]) && $item['ptd_position_id'][$i] == '2' ? 'selected' : '') ?>>Article</option>
                                </select>
                                <input type="hidden" name="ptd_position_text[<?= $i ?>]" id="ptd_position_text<?= $i ?>" value="<?= (!empty($item['ptd_position_text'][$i]) ? $item['ptd_position_text'][$i] : '') ?>" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="ptd_section_id[<?= $i ?>]" class="custom-select" onchange="document.getElementById('ptd_section_text<?= $i ?>').value=this.options[this.selectedIndex].text" <?= (isset($item['ptd_section_id'][$i])&&!empty($item['ptd_section_id'][$i]) ? '' : 'disabled') ?>>
                                <option value="">Choose Section</option>
                                <?php 
                                  //if(!empty($item['ptd_section_id'][$i])){
                                  //$position_key = $item['ptd_position_id'][$i];
                                  foreach($sectionArray['ptd'] as $key => $value){ 
                                    //if($key !== 'position'){
                                ?>
                                  <option value="<?= $key ?>" <?= (!empty($item['ptd_section_id'][$i]) && $item['ptd_section_id'][$i] == $key ? 'selected' : '') ?> ><?= $value ?></option>
                                    <?php }/*}}*/ ?>
                                </select>
                                <input type="hidden" name="ptd_section_text[<?= $i ?>]" id="ptd_section_text<?= $i ?>" value="<?= (!empty($item['ptd_section_text'][$i]) ? $item['ptd_section_text'][$i] : '') ?>" />
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="input-daterange datepicker">
                                <div class="input-group-inline"><span>Period:</span></div>
                                <div class="input-group-inline">
                                  <span>From</span>
                                  <input type="text" class="form-control form-input--date" name="ptd_period_from[<?= $i ?>]" value="<?= (!empty($item['ptd_period_from'][$i]) ? $item['ptd_period_from'][$i] : '' ) ?>" autocomplete="off">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                                <div class="input-group-inline">
                                  <span>to</span>
                                  <input type="text" class="form-control form-input--date" name="ptd_period_to[<?= $i ?>]" value="<?= (!empty($item['ptd_period_to'][$i]) ? $item['ptd_period_to'][$i] : '' ) ?>" autocomplete="off">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                              </div>
                            </div>
                            <div id="ptd_device" class="form-group row" style="<?= (isset($item['ptd_device'][$i]) ? '' : 'display:none;') ?>">
                              <label for="inputUsername" class="col-auto col-sm-4 col-md-4 col-lg-3 col-form-label label-normal pt-0">Device:</label>
                              <div class="col-auto col-sm-11 col-md-11 col-lg-12">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="ptd_device[<?= $i ?>]" type="radio" id="inlineRadio11" value="Desktop" <?= (!empty($item['ptd_device'][$i]) && $item['ptd_device'][$i] === 'Desktop' ? 'checked' : '') ?> >
                                  <label class="form-check-label" for="inlineRadio11">Desktop</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="ptd_device[<?= $i ?>]" type="radio" id="inlineRadio21" value="Mobile" <?= (!empty($item['ptd_device'][$i]) && $item['ptd_device'][$i] === 'Mobile' ? 'checked' : '') ?> >
                                  <label class="form-check-label" for="inlineRadio21">Mobile</label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-md-4 col-lg-3 col-form-label label-normal">URL link banner:</label>
                              <div class="col-md-11 col-lg-12">
                                <input name="ptd_banner_url[<?= $i ?>]" type="text" class="form-control" value="<?= (!empty($item['ptd_banner_url'][$i]) ? $item['ptd_banner_url'][$i] : '' ) ?>">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload banner:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="ptd_banner_file[<?= $i ?>]" class="custom-file-input" id="customFile" value="<?= (!empty($item['ptd_banner_file'][$i]) ? $item['ptd_banner_file'][$i] : '' ) ?>" onchange="showFileName(this.name);">
                                    <?php if(!empty($item['ptd_banner_file'][$i])){ ?><input type="hidden" name="old_ptd_banner_file[<?= $i ?>]" value="<?= $item['ptd_banner_file'][$i] ?>" ><?php } ?>
                                  <label id="ptd_banner_file<?= $i ?>" class="custom-file-label" for="customFile"><?= (!empty($item['ptd_banner_file'][$i]) ? $item['ptd_banner_file'][$i] : 'Choose file' ) ?></label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Upload quotation:</label>
                              <div class="col-md-11 col-lg-12">
                                <div class="custom-file">
                                  <input type="file" name="ptd_quotation_file[<?= $i ?>]" class="custom-file-input" id="customFile" value="<?= (!empty($item['ptd_quotation_file'][$i]) ? $item['ptd_quotation_file'][$i] : '' ) ?>" alt="" onchange="showFileName(this.name);" />
                                  <?php if(!empty($item['ptd_quotation_file'][$i])){ ?><input type="hidden" name="old_ptd_quotation_file[<?= $i ?>]" value="<?= $item['ptd_quotation_file'][$i] ?>" ><?php } ?>
                                  <label id="ptd_quotation_file<?= $i ?>" class="custom-file-label" for="customFile"><?= (!empty($item['ptd_quotation_file'][$i]) ? $item['ptd_quotation_file'][$i] : 'Choose file' ) ?></label>
                                </div>
                                <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel, Zip</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Impression:</label>
                              <div class="col-sm-10 col-md-8">
                                <input type="text" name="ptd_impression_need[<?= $i ?>]" class="form-control" value="<?= (!empty($item['ptd_impression_need'][$i]) ? $item['ptd_impression_need'][$i] : '' ) ?>">
                                <div class="text-ps--small">Impression is not enough.</div>
                              </div>
                              <div class="col-sm-3">
                                <div class="mt-2"><a href="/inventory" target="_blank" class="btn btn-click">View dashboard</a></div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-lg-3 col-form-label label-normal">Detail:</label>
                              <div class="col-md-11 col-lg-12">
                                <input type="text" name="ptd_ad_detail[<?= $i ?>]" class="form-control" value="<?= (!empty($item['ptd_ad_detail'][$i]) ? $item['ptd_ad_detail'][$i] : '' ) ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        </div>
                        </div>
                    </div>
                        
                        <?php }
                          } 
                        ?>
                        
                    </div>
                  </div>
                        <div class="box-btn--addmore"><a href="javascript:;" onclick="addAds('ptd');" class="btn btn-addmore">+ ADD MORE AD</a></div>

                      
                    
                    <div class="form-group row">
                      <label for="inputCampaign" class="col-sm-5 col-form-label">Campaign budget (THB):</label>
                      <div class="col-sm-10">
                        <input type="text" name="ptd_campaign_budget" class="form-control" value="<?= (!empty($item['ptd_campaign_budget']) ? $item['ptd_campaign_budget'] : '' ) ?>">
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            
            </div>

            <div class="text-center"><button type="submit" onclick="beforeSubmit();" value="send" class="btn btn-submit">CONFIRM</button></div>
            {!! Form::close() !!}
        </div>

        <!-- Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert--detail">
                            <div class="alert--img"><img src="assets/images/icon-svg/alert.svg"></div>
                            <div class="alert--text">คุณยังไม่ได้ submit ข้อมูลที่กรอกไว้จะหาย</div>
                            <div class="text-center"><button type="button" class="btn btn-submit" data-dismiss="modal">OK</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert--detail">
                            <div class="alert--img"><img src="assets/images/icon-svg/alert.svg"></div>
                            <div class="alert--text alert-type-required-text"></div>
                            <div class="text-center"><button type="button" class="btn btn-submit" data-dismiss="modal">OK</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
      </div>

      <script src="<?= url('/') ?>/assets/js/request-form.js" type="text/javascript"></script>
      <script>
        window.history.pushState('request-save', 'Title', '/request_form');
        var active_tab = ($('#bangkokpost-tab').hasClass("active") ? 'bangkokpost' : 'posttoday');
        var none_active_tab = ($('#bangkokpost-tab').hasClass("active") ? 'posttoday' : 'bangkokpost');
        var onSubmit = false;
        $('input[type="file"]').attr('title', window.webkitURL ? ' ' : '');

        $(document).ready(function() {
            //add required attribute to all input tag on default tab => Bangkokpost Tab *** 
            $("select[name*='bp_']").prop('required', ($('#bangkokpost-tab').hasClass("active") ? true : false));
            $("input[name*='bp_']").prop('required', ($('#bangkokpost-tab').hasClass("active") ? true : false));
        });

        //Date picker option for default ad description card
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true
        });

        $("body").on('focus', '.datepicker', function() {
            $(this).datepicker({
                autoclose: true,
                todayHighlight: true
            });
        });

        

        window.onbeforeunload = function(e) {
          if(!onSubmit)
          { 
            $('#confirmModal').modal();
            $('#confirmModal').delay(8000).fadeOut(1000);
            setTimeout(function(){
              $('#confirmModal').modal("hide");
            }, 9000);
          }
        };

        

      </script>
@endsection
