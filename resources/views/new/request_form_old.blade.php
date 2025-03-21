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
                    <div class="form-ad--detail">
                    <!-- TYPE -->
                    <div id="bp-type-container" style="<?= (isset($item['bp_type']) ? '' : 'display:none;')?>">
                      <div class="bar-title">Type:</div>
                      <div id="bp-facebook-tab" class="form-group row">
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="bp_type" type="radio" id="bp_type1" value="Social" <?= (!empty($item['bp_type']) && $item['bp_type'] === 'Social' ? 'checked' : '') ?> >
                              <label class="form-check-label" for="bp_type1">Social</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="bp_type" type="radio" id="bp_type2" value="Website" <?= (!empty($item['bp_type']) && $item['bp_type'] === 'Website' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="bp_type2">Website</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="bp_type" type="radio" id="bp_type3" value="E-newsletter" <?= (!empty($item['bp_type']) && $item['bp_type'] === 'E-newsletter' ? 'checked' : '') ?>>
                              <label class="form-check-label" for="bp_type3">E-newsletter</label>
                            </div>
                          </div>
                        </div>
                      </div>
                  <!-- Social options -->
                  <div id="bp_option1" style="<?= (isset($item['bp_social']) && !empty($item['bp_social']) ? '' :'display:none') ?>;">
                      <div class="bar-title">Social:</div>
                      <div id="bp-facebook-tab" class="form-group row">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_social[]" type="checkbox" id="bp_social1" value="Facebook" <?= (!empty($item['bp_social']) && $item['bp_social'] === 'Facebook' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="bp_fb1">Facebook</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_social[]" type="checkbox" id="bp_social2" value="Line" <?= (!empty($item['bp_social']) && $item['bp_social'] === 'Line' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="bp_fb2">Line</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_social[]" type="checkbox" id="bp_social3" value="Twitter" <?= (!empty($item['bp_social']) && $item['bp_social'] === 'Twitter' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="bp_fb3">Twitter</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="bp_facebook_option" style="display:none;">
                      <div class="bar-title">Facebook:</div>
                      <div id="bp-facebook-tab" class="form-group row">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_facebook" type="radio" id="bp_fb1" value="Normal Post" <?= (!empty($item['bp_facebook']) && $item['bp_facebook'] === 'Normal Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="bp_fb1">Normal Post</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_facebook" type="radio" id="bp_fb2" value="Facebook Boost Post" <?= (!empty($item['bp_facebook']) && $item['bp_facebook'] === 'Facebook Boost Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="bp_fb2">Facebook Boost Post</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Website options -->
                    <div id="bp_option2" style="display:none;">
                      <div class="bar-title mt-4">Website:</div>
                      <div class="form-group row" id="bp-tab-border">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[0]" <?= (!empty($item['bp_web'][0]) && $item['bp_web'][0] === 'Banner' ? 'checked' : '') ?> type="checkbox" id="bp_web1" value="Banner">
                            <label class="form-check-label" for="bp_web">Banner</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[1]" <?= (!empty($item['bp_web'][1]) && $item['bp_web'][1] === 'Nytive Ad' ? 'checked' : '') ?> type="checkbox" id="bp_web2" value="Nytive Ad">
                            <label class="form-check-label" for="bp_web">Nytive Ad</label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[2]" <?= (!empty($item['bp_web'][2]) && $item['bp_web'][2] === 'Premium Advertorial' ? 'checked' : '') ?> type="checkbox" id="bp_web3" value="Premium Advertorial">
                            <label class="form-check-label" for="bp_web">Premium Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[3]" <?= (!empty($item['bp_web'][3]) && $item['bp_web'][3] === 'Advertorial' ? 'checked' : '') ?> type="checkbox" id="bp_web4" value="Advertorial">
                            <label class="form-check-label" for="bp_web">Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[4]" <?= (!empty($item['bp_web'][4]) && $item['bp_web'][4] === 'Property Listing' ? 'checked' : '') ?> type="checkbox" id="bp_web5" value="Property Listing">
                            <label class="form-check-label" for="bp_web">Property Listing</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[5]" <?= (!empty($item['bp_web'][5]) && $item['bp_web'][5] === 'Special event' ? 'checked' : '') ?> type="checkbox" id="bp_web6" value="Special event">
                            <label class="form-check-label" for="bp_web">Special event</label>
                          </div>
                        </div>
                         <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input"  name="bp_web[6]" <?= (!empty($item['bp_web'][6]) && $item['bp_web'][6] === 'Sponsor Link' ? 'checked' : '') ?> type="checkbox" id="bp_web7" value="Sponsor Link">
                            <label class="form-check-label" for="bp_web">Sponsor Link</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[7]" <?= (!empty($item['bp_web'][7]) && $item['bp_web'][7] === 'Jobs' ? 'checked' : '') ?> type="checkbox" id="bp_web8" value="Jobs">
                            <label class="form-check-label" for="bp_web">Jobs</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="bp_web[8]" <?= (!empty($item['bp_web'][8]) && $item['bp_web'][8] === 'PR' ? 'checked' : '') ?> type="checkbox" id="bp_web9" value="PR">
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
                        <?php  if(!isset($item['bp_size_id'])){ ?>
                          <script>
                            var bp_action = 'New';
                            //console.log(bp_action);
                          </script>
                        <div id="bp-ad-card" class="box-ad--banner" style="display:none;">
                          <div id="bp-ad-title" class="box-ad--title">Ad 1 Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="bp_size_id[0]" class="custom-select" onchange="document.getElementById('bp_size_text0').value=this.options[this.selectedIndex].text" >
                                      <option value="">Choose Size</option>
                                      <optgroup label="Rectangle Desktop & Mobile">
                                          <option value="1">300x250</option>
                                      </optgroup>
                                      <optgroup label="Double Rectangle Desktop">
                                        <option value="2">300x600</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Desktop">
                                        <option value="3">728x90</option>
                                        <option value="4">970x90</option>
                                        <option value="5">970x250</option>
                                        <option value="6">1200x90</option>
                                        <option value="7">1200x250</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Mobile">
                                        <option value="8">320x100</option>
                                        <option value="9">320x50</option>
                                        <option value="10">300x100</option>
                                        <option value="11">300x50</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Desktop">
                                        <option value="12">800x500</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Mobile">
                                        <option value="13">300x250</option>
                                      </optgroup>
                                      <optgroup label="InRead">
                                        <option value="14">300x250</option>
                                        <option value="15">640x360</option>
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
                                  <?php foreach($sectionArray['bp_ad_section'] as $key => $item){ ?>
                                    <option value="<?= $key ?>"><?= $item['position'] ?></option>
                                  <?php } ?>
                                </select>
                                <input type="hidden" name="bp_position_text[0]" id="bp_position_text0" value="" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="bp_section_id[0]" class="custom-select" onchange="document.getElementById('bp_section_text0').value=this.options[this.selectedIndex].text">
                                  <option value="">Choose Section</option>
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
                        <?php  
                          }
                          else{ ?>
                          <script>
                            var bp_action = 'Edit';
                            console.log(bp_action);
                            var bp_position_count = [<?= count($item['bp_position_id'])  ?>];
                            var bp_section_count = [<?= count($item['bp_section_id']) ?>];
                          </script>
                        <?php for($i=0;$i<count($item['bp_size_id']);$i++){ ?>
                        
                        <div id="bp-ad-card" class="box-ad--banner">
                          <div id="bp-ad-title" class="box-ad--title">Ad <?= ($i+1) ?> Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="bp_size_id[<?= $i ?>]" class="custom-select" onchange="document.getElementById('bp_size_text<?= $i ?>').value=this.options[this.selectedIndex].text" >
                                      <option value="" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '' ? 'selected' : '') ?>>Choose Size</option>
                                      <optgroup label="Rectangle Desktop & Mobile">
                                          <option value="1" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '1' ? 'selected' : '') ?>>300x250</option>
                                      </optgroup>
                                      <optgroup label="Double Rectangle Desktop">
                                        <option value="2" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '2' ? 'selected' : '') ?>>300x600</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Desktop">
                                        <option value="3" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '3' ? 'selected' : '') ?>>728x90</option>
                                        <option value="4" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '4' ? 'selected' : '') ?>>970x90</option>
                                        <option value="5" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '5' ? 'selected' : '') ?>>970x250</option>
                                        <option value="6" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '6' ? 'selected' : '') ?>>1200x90</option>
                                        <option value="7" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '7' ? 'selected' : '') ?>>1200x250</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Mobile">
                                        <option value="8" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '8' ? 'selected' : '') ?>>320x100</option>
                                        <option value="9" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '9' ? 'selected' : '') ?>>320x50</option>
                                        <option value="10" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '10' ? 'selected' : '') ?>>300x100</option>
                                        <option value="11" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '11' ? 'selected' : '') ?>>300x50</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Desktop">
                                        <option value="12" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '12' ? 'selected' : '') ?>>800x500</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Mobile">
                                        <option value="13" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '13' ? 'selected' : '') ?>>300x250</option>
                                      </optgroup>
                                      <optgroup label="InRead">
                                        <option value="14" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '14' ? 'selected' : '') ?>>300x250</option>
                                        <option value="15" <?= (!empty($item['bp_size_id'][$i]) && $item['bp_size_id'][$i] == '15' ? 'selected' : '') ?>>640x360</option>
                                      </optgroup>
                                </select>
                                <div class="invalid-feedback">
                                  Please select a valid state.
                                </div>
                                <input type="hidden" name="bp_size_text[<?= $i ?>]" id="bp_size_text<?= $i ?>" value="<?= (!empty($item['bp_size_text'][$i]) ? $item['bp_size_text'][$i] : '') ?>" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Position:</label>
                                
                                <select name="bp_position_id[<?= $i ?>]" class="custom-select"  onchange="document.getElementById('bp_position_text<?= $i ?>').value=this.options[this.selectedIndex].text;changeOptionValue(this);">
                                  <option value="">Choose Position</option>
                                  <?php foreach($sectionArray['bp_ad_section'] as $key => $value){ ?>
                                    <option value="<?= $key ?>" <?= (!empty($item['bp_position_id'][$i]) && $item['bp_position_id'][$i] == $key ? 'selected' : '') ?>><?= $value['position'] ?></option>
                                  <?php } ?>
                                </select>
                                <input type="hidden" name="bp_position_text[<?= $i ?>]" id="bp_position_text<?= $i ?>" value="<?= (!empty($item['bp_position_text'][$i]) ? $item['bp_position_text'][$i] : '') ?>" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="bp_section_id[<?= $i ?>]" class="custom-select" onchange="document.getElementById('bp_section_text<?= $i ?>').value=this.options[this.selectedIndex].text">
                                <option value="">Choose Section</option>
                                <?php 
                                  if(!empty($item['bp_section_id'][$i])){
                                  $position_key = $item['bp_position_id'][$i];
                                  foreach($sectionArray['bp_ad_section'][$position_key] as $key => $value){ 
                                    if($key !== 'position'){
                                ?>
                                  <option value="<?= $key ?>" <?= (!empty($item['bp_section_id'][$i]) && $item['bp_section_id'][$i] == $key ? 'selected' : '') ?> ><?= $value ?></option>
                                <?php }}} ?>
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
                            <div class="form-group row">
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
                        <?php }
                          } 
                        ?>
                        </div>
                        <div class="box-btn--addmore"><a href="javascript:;" onclick="addAds('bp');" class="btn btn-addmore">+ ADD MORE AD</a></div>

                      </div>
                    </div>
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
                    <div class="form-ad--detail">

                    <!-- TYPE -->
                    <div id="ptd-type-container" style="<?= (isset($item['ptd_type']) ? '' : 'display:none;')?>">
                      <div class="bar-title">Type:</div>
                        <div id="bp-facebook-tab" class="form-group row">
                            <div class="col-sm-4">
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" name="ptd_type" type="radio" id="ptd_type1" value="Social" <?= (!empty($item['ptd_type']) && $item['ptd_type'] === 'Social' ? 'checked' : '') ?> >
                                <label class="form-check-label" for="ptd_type1">Social</label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" name="ptd_type" type="radio" id="ptd_type2" value="Website" <?= (!empty($item['ptd_type']) && $item['ptd_type'] === 'Website' ? 'checked' : '') ?>>
                                <label class="form-check-label" for="ptd_type2">Website</label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" name="ptd_type" type="radio" id="ptd_type3" value="E-newsletter" <?= (!empty($item['ptd_type']) && $item['ptd_type'] === 'E-newsletter' ? 'checked' : '') ?>>
                                <label class="form-check-label" for="ptd_type3">E-newsletter</label>
                              </div>
                          </div>
                        </div>
                      </div>

                    <!-- Social options -->
                    <div id="ptd_option1" style="<?= (isset($item['ptd_social']) && !empty($item['ptd_social']) ? '' :'display:none') ?>;">
                      <div class="bar-title">Social:</div>
                      <div id="ptd-facebook-tab" class="form-group row">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_social[0]" type="checkbox" id="ptd_social1" value="Facebook" <?= (!empty($item['ptd_social'][0]) && $item['ptd_social'][0] === 'Facebook' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="ptd_fb1">Facebook</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_social[1]" type="checkbox" id="ptd_social2" value="Line" <?= (!empty($item['ptd_social'][1]) && $item['ptd_social'][1] === 'Line' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="ptd_fb2">Line</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_social[2]" type="checkbox" id="ptd_social3" value="Twitter" <?= (!empty($item['ptd_social'][2]) && $item['ptd_social'][2] === 'Twitter' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="ptd_fb3">Twitter</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="ptd_facebook_option" style="<?= (isset($item['ptd_facebook']) && !empty($item['ptd_facebook']) ? '' :'display:none') ?>;">
                      <div class="bar-title">Facebook:</div>
                      <div id="ptd-facebook-tab" class="form-group row">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_facebook" type="radio" id="ptd_fb1" value="Normal Post" <?= (!empty($item['ptd_facebook']) && $item['ptd_facebook'] === 'Normal Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="ptd_fb1">Normal Post</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_facebook" type="radio" id="ptd_fb2" value="Facebook Boost Post" <?= (!empty($item['ptd_facebook']) && $item['ptd_facebook'] === 'Facebook Boost Post' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="ptd_fb2">Facebook Boost Post</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="ptd_option2" style="<?= (isset($item['ptd_web']) && !empty($item['ptd_web']) ? '' :'display:none') ?>;">
                      <div class="bar-title mt-4">Website:</div>
                      <div class="form-group row" id="ptd-tab-border">
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[0]" <?= (!empty($item['ptd_web'][0]) && $item['ptd_web'][0] === 'Banner' ? 'checked' : '') ?> type="checkbox" id="ptd_web1" value="Banner">
                            <label class="form-check-label" for="ptd_web">Banner</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[1]" <?= (!empty($item['ptd_web'][1]) && $item['ptd_web'][1] === 'Nytive Ad' ? 'checked' : '') ?> type="checkbox" id="ptd_web2" value="Nytive Ad">
                            <label class="form-check-label" for="ptd_web">Nytive Ad</label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[2]" <?= (!empty($item['ptd_web'][2]) && $item['ptd_web'][2] === 'Premium Advertorial' ? 'checked' : '') ?> type="checkbox" id="ptd_web3" value="Premium Advertorial">
                            <label class="form-check-label" for="ptd_web">Premium Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[3]" <?= (!empty($item['ptd_web'][3]) && $item['ptd_web'][3] === 'Advertorial' ? 'checked' : '') ?> type="checkbox" id="ptd_web4" value="Advertorial">
                            <label class="form-check-label" for="ptd_web">Advertorial</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[4]" <?= (!empty($item['ptd_web'][4]) && $item['ptd_web'][4] === 'Property Listing' ? 'checked' : '') ?> type="checkbox" id="ptd_web5" value="Property Listing">
                            <label class="form-check-label" for="ptd_web">Property Listing</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[5]" <?= (!empty($item['ptd_web'][5]) && $item['ptd_web'][5] === 'Special event' ? 'checked' : '') ?> type="checkbox" id="ptd_web6" value="Special event">
                            <label class="form-check-label" for="ptd_web">Special event</label>
                          </div>
                        </div>
                         <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input"  name="ptd_web[6]" <?= (!empty($item['ptd_web'][6]) && $item['ptd_web'][6] === 'Sponsor Link' ? 'checked' : '') ?> type="checkbox" id="ptd_web7" value="Sponsor Link">
                            <label class="form-check-label" for="ptd_web">Sponsor Link</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[7]" <?= (!empty($item['ptd_web'][7]) && $item['ptd_web'][7] === 'Jobs' ? 'checked' : '') ?> type="checkbox" id="ptd_web8" value="Jobs">
                            <label class="form-check-label" for="ptd_web">Jobs</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ptd_web[8]" <?= (!empty($item['ptd_web'][8]) && $item['ptd_web'][8] === 'PR' ? 'checked' : '') ?> type="checkbox" id="ptd_web9" value="PR">
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
                        <?php  if(!isset($item['ptd_size_id'])){ ?>
                          <script>
                            var ptd_action = 'New';
                            //console.log(ptd_action);
                          </script>
                        <div id="ptd-ad-card" class="box-ad--banner" style="display:none;">
                          <div id="ptd-ad-title" class="box-ad--title">Ad 1 Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="ptd_size_id[0]" class="custom-select" onchange="document.getElementById('ptd_size_text0').value=this.options[this.selectedIndex].text" >
                                <option value="">Choose Size</option>
                                      <optgroup label="Rectangle Desktop & Mobile">
                                          <option value="1">300x250</option>
                                      </optgroup>
                                      <optgroup label="Double Rectangle Desktop">
                                        <option value="2">300x600</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Desktop">
                                        <option value="3">728x90</option>
                                        <option value="4">970x90</option>
                                        <option value="5">970x250</option>
                                        <option value="6">1200x90</option>
                                        <option value="7">1200x250</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Mobile">
                                        <option value="8">320x100</option>
                                        <option value="9">320x50</option>
                                        <option value="10">300x100</option>
                                        <option value="11">300x50</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Desktop">
                                        <option value="12">800x500</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Mobile">
                                        <option value="13">300x250</option>
                                      </optgroup>
                                      <optgroup label="InRead">
                                        <option value="14">300x250</option>
                                        <option value="15">640x360</option>
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
                                  <?php foreach($sectionArray['ptd_ad_section'] as $key => $item){ ?>
                                    <option value="<?= $key ?>"><?= $item['position'] ?></option>
                                  <?php } ?>
                                </select>
                                <input type="hidden" name="ptd_position_text[0]" id="ptd_position_text0" value="" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="ptd_section_id[0]" class="custom-select" onchange="document.getElementById('ptd_section_text0').value=this.options[this.selectedIndex].text">
                                  <option value="">Choose Section</option>
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
                            <div class="form-group row" id="ptd_device">
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
                                  <label id="ptd_banner_file0" class="custom-file-label" for="customFile">Choose file</label>
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
                        <?php  
                          }
                          else{ ?>
                          <script>
                            var ptd_action = 'Edit';
                            //console.log(ptd_action);
                            
                            var ptd_position_count = [<?= count($item['ptd_position_id']) ?>];
                            var ptd_section_count = [<?= count($item['ptd_section_id']) ?>];
                          </script>
                        <?php for($i=0;$i<count($item['ptd_size_id']);$i++){ ?>
                        
                          <div id="ptd-ad-card" class="box-ad--banner">
                          <div id="ptd-ad-title" class="box-ad--title">Ad <?= ($i+1) ?> Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="ptd_size_id[<?= $i ?>]" class="custom-select" onchange="document.getElementById('ptd_size_text<?= $i ?>').value=this.options[this.selectedIndex].text" >
                                      <option value="" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '' ? 'selected' : '') ?>>Choose Size</option>
                                      <optgroup label="Rectangle Desktop & Mobile">
                                          <option value="1" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '1' ? 'selected' : '') ?>>300x250</option>
                                      </optgroup>
                                      <optgroup label="Double Rectangle Desktop">
                                        <option value="2" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '2' ? 'selected' : '') ?>>300x600</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Desktop">
                                        <option value="3" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '3' ? 'selected' : '') ?>>728x90</option>
                                        <option value="4" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '4' ? 'selected' : '') ?>>970x90</option>
                                        <option value="5" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '5' ? 'selected' : '') ?>>970x250</option>
                                        <option value="6" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '6' ? 'selected' : '') ?>>1200x90</option>
                                        <option value="7" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '7' ? 'selected' : '') ?>>1200x250</option>
                                      </optgroup>
                                      <optgroup label="Leaderboard Mobile">
                                        <option value="8" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '8' ? 'selected' : '') ?>>320x100</option>
                                        <option value="9" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '9' ? 'selected' : '') ?>>320x50</option>
                                        <option value="10" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '10' ? 'selected' : '') ?>>300x100</option>
                                        <option value="11" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '11' ? 'selected' : '') ?>>300x50</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Desktop">
                                        <option value="12" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '12' ? 'selected' : '') ?>>800x500</option>
                                      </optgroup>
                                      <optgroup label="Coverpage Mobile">
                                        <option value="13" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '13' ? 'selected' : '') ?>>300x250</option>
                                      </optgroup>
                                      <optgroup label="InRead">
                                        <option value="14" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '14' ? 'selected' : '') ?>>300x250</option>
                                        <option value="15" <?= (!empty($item['ptd_size_id'][$i]) && $item['ptd_size_id'][$i] == '15' ? 'selected' : '') ?>>640x360</option>
                                      </optgroup>
                                </select>
                                <div class="invalid-feedback">
                                  Please select a valid state.
                                </div>
                                <input type="hidden" name="ptd_size_text[<?= $i ?>]" id="ptd_size_text<?= $i ?>" value="<?= (!empty($item['ptd_size_text'][$i]) ? $item['ptd_size_text'][$i] : '') ?>" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Position:</label>
                                
                                <select name="ptd_position_id[<?= $i ?>]" class="custom-select"  onchange="document.getElementById('ptd_position_text<?= $i ?>').value=this.options[this.selectedIndex].text;changeOptionValue(this);" <?= ($item['ptd_type'] == 'Social' ? 'disabled' : '') ?>>
                                  <option value="">Choose Position</option>
                                  <?php foreach($sectionArray['ptd_ad_section'] as $key => $value){ ?>
                                    <option value="<?= $key ?>" <?= (!empty($item['ptd_position_id'][$i]) && $item['ptd_position_id'][$i] == $key ? 'selected' : '') ?>><?= $value['position'] ?></option>
                                  <?php } ?>
                                </select>
                                <input type="hidden" name="ptd_position_text[<?= $i ?>]" id="ptd_position_text<?= $i ?>" value="<?= (!empty($item['ptd_position_text'][$i]) ? $item['ptd_position_text'][$i] : '') ?>" />
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="ptd_section_id[<?= $i ?>]" class="custom-select" onchange="document.getElementById('ptd_section_text<?= $i ?>').value=this.options[this.selectedIndex].text" <?= ($item['ptd_type'] == 'Social' ? 'disabled' : '') ?>>
                                <option value="">Choose Section</option>
                                <?php 
                                if(!empty($item['ptd_section_id'][$i])){
                                  $position_key = $item['ptd_position_id'][$i];
                                  foreach($sectionArray['ptd_ad_section'][$position_key] as $key => $value){ 
                                    if($key !== 'position'){
                                ?>
                                  <option value="<?= $key ?>" <?= (!empty($item['ptd_section_id'][$i]) && $item['ptd_section_id'][$i] == $key ? 'selected' : '') ?> ><?= $value ?></option>
                                <?php }}} ?>
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
                            <div id="ptd_device" class="form-group row" style="<?= (!empty($item['ptd_device'][$i]) ? '' : 'display:none') ?>;">
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
                                  <input type="file" name="ptd_quotation_file[<?= $i ?>]" class="custom-file-input" id="customFile" value="<?= (!empty($item['ptd_quotation_file'][$i]) ? $item['ptd_quotation_file'][$i] : '' ) ?>" alt="" onchange="showFileName(this.name);"/>
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
                        <?php } 
                          } 
                        ?>
                        </div>
                        <div class="box-btn--addmore"><a href="javascript:;" onclick="addAds('ptd');" class="btn btn-addmore">+ ADD MORE AD</a></div>

                      </div>
                    </div>
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

            <div class="text-center"><button type="submit" onclick="beforeSubmit();" value="send" class="btn btn-submit">submit</button></div>
            {!! Form::close() !!}
        </div>

        <div class="modal fade" id="bpModal" role="dialog">
           <div class="modal-dialog">
           
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body text-center">
                    คุณยังไม่ได้Submit ข้อมูลที่กรอกไว้จะหาย
               </div>
               <div class="modal-footer">
               <button id="bp-modal-submit" type="button" class="btn btn-default close" data-dismiss="modal">OK</button>
               </div>
           </div>
           
           </div>
       </div>

        <div class="modal fade" id="ptdModal" role="dialog">
           <div class="modal-dialog">
           
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body text-center">
                    คุณยังไม่ได้Submit ข้อมูลที่กรอกไว้จะหาย
               </div>
               <div class="modal-footer">
               <button id="ptd-modal-submit" type="button" class="btn btn-default close" data-dismiss="modal">OK</button>
               </div>
           </div>
           
           </div>
       </div>
       
      </div>

      <script src="<?= url('/') ?>/assets/js/request-form.js" type="text/javascript"></script>
@endsection
