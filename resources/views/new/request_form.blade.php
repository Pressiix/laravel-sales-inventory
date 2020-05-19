@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Request Form</h2>
          {!! Form::open(['action' => ['RequestFormController@review', 'method' => 'POST'],'name'=>'form','id'=>'form','enctype'=>'multipart/form-data', 'onsubmit'=>'return Validate(this);'])!!}
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
                    <!-- TYPE -->
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
                    <div id="bp_option3" style="display:none;">CCC</div>
                  </div>

                    <div class="row">
                      <div  class="col-15">
                        <div id="bp-ad-description">
                        <?php  if(!isset($item['bp_size_id'])){ ?>
                          <script>
                            var bp_action = 'New';
                            console.log(bp_action);
                          </script>
                        <div id="bp-ad-card" class="box-ad--banner">
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
                <div class="tab-pane fade" id="posttoday" role="taptdanel" aria-labelledby="posttoday-tab">
                  
                  <div class="content-tablist">
                    <div class="form-ad--detail">

                    <!-- TYPE -->
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

                    <div id="ptd_option2" style="display:none;">
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
                    <div id="ptd_option3" style="display:none;">CCC</div>

                    </div>

                    <div class="row">
                      <div  class="col-15">
                        <div id="ptd-ad-description">
                        <?php  if(!isset($item['ptd_size_id'])){ ?>
                          <script>
                            var ptd_action = 'New';
                            console.log(ptd_action);
                          </script>
                        <div id="ptd-ad-card" class="box-ad--banner">
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
                            <div class="form-group row">
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

            <div class="text-center"><button type="submit" onclick="createHiddenField();" value="send" class="btn btn-submit">submit</button></div>
            {!! Form::close() !!}
        </div>
      </div>

<script>
    //Replace URL after user click to save request form
    window.history.pushState('request-save', 'Title', '/request_form');
    var active_tab = 'bangkokpost';
    var none_active_tab = 'posttoday';
    var options="";
    $('input[type="file"]').attr('title', window.webkitURL ? ' ' : '');

    //***------- DOCUMENT READY ------------****
    $( document ).ready(function() {
        $("select[name*='bp_']").prop('required',true);
        $("input[name*='bp_']").prop('required',true);
    });

    function changeTabOption(element,tab_name)
    {
      var checkbox = element;
          var checkboxIndex = String(checkbox.attr('id')).match(/\d+/)[0];
          if( checkbox.is(':checked') ) { 
            switch(checkboxIndex) {
              case '1':  //Social
                      
                      $('#'+tab_name+'_option1').show();
                      $('#'+tab_name+'_option2').hide();
                      $('#'+tab_name+'_option2 :input').prop('required', false);
                      $('#'+tab_name+'_option3').hide();

                      $('div[id*="'+tab_name+'_device"]').each(function() {
                        $(this).hide();
                        $(this).find('input').prop('disabled', true);
                        $(this).find('input').prop('required', false);
                      });
                      $('select[name*="'+tab_name+'_position_id"]').each(function() {
                        $(this).prop('disabled', true);
                        $(this).prop('required', false);
                        $(this).find('option').prop('selected', false);
                      });
                      $('input[name*="'+tab_name+'_position_text"]').each(function() {
                        $(this).prop('disabled', true);
                        $(this).prop('required', false);
                      });
                      $('select[name*="'+tab_name+'_section_id"]').each(function() {
                        $(this).prop('disabled', true);
                        $(this).prop('required', false);
                        $(this).prop('selected', false);
                      });
                      $('input[name*="'+tab_name+'_section_text"]').each(function() {
                        $(this).prop('disabled', true);
                        $(this).prop('required', false);
                      });
                      break;
              case '2':   //Website
                      $('#'+tab_name+'_option1').hide();
                      $('#'+tab_name+'_option2').show();
                      $('#'+tab_name+'_option2 :input').prop('required', true);
                      $('#'+tab_name+'_option3').hide();
                      $('div[id*="'+tab_name+'_device"]').each(function() {
                        $(this).show();
                        $(this).find('input').prop('disabled', false);
                        $(this).find('input').prop('required', true);
                      });
                      $('select[name*="'+tab_name+'_position_id"]').each(function() {
                        $(this).prop('disabled', false);
                        $(this).prop('required', true);
                      });
                      $('input[name*="'+tab_name+'_position_text"]').each(function() {
                        $(this).prop('disabled', false);
                        $(this).prop('required', true);
                      });
                      $('select[name*="'+tab_name+'_section_id"]').each(function() {
                        $(this).prop('disabled', false);
                        $(this).prop('required', true);
                      });
                      $('input[name*="'+tab_name+'_section_text"]').each(function() {
                        $(this).prop('disabled', false);
                        $(this).prop('required', true);
                      });
                      break;
              case '3':   //E-newsletter
                      $('#'+tab_name+'_option1').hide();
                      $('#'+tab_name+'_option2').hide();
                      $('#'+tab_name+'_option2 :input').prop('required', false);
                      $('#'+tab_name+'_option3').show();
                      $('div[id*="'+tab_name+'_device"]').each(function() {
                        $(this).show();
                        $(this).find('input').prop('disabled', false);
                        $(this).find('input').prop('required', true);
                      });
                      $('select[name*="'+tab_name+'_position_id"]').each(function() {
                        $(this).prop('disabled', false);
                        $(this).prop('required', true);
                      });
                      $('input[name*="'+tab_name+'_position_text"]').each(function() {
                        $(this).prop('disabled', false);
                        $(this).prop('required', true);
                      });
                      $('select[name*="'+tab_name+'_section_id"]').each(function() {
                        $(this).prop('disabled', false);
                        $(this).prop('required', true);
                      });
                      $('input[name*="'+tab_name+'_section_text"]').each(function() {
                        $(this).prop('disabled', false);
                        $(this).prop('required', true);
                      });
                      break;
            }
                      $('#'+tab_name+'_facebook_option').hide();
                      $('input[id="'+tab_name+'_social1"]').prop('checked', false);
                      $('#'+tab_name+'_option1 :input').prop('checked', false);
                      $('#'+tab_name+'_option2 :input').prop('checked', false);
                      $('#'+tab_name+'_facebook_option :input').prop('checked', false);
                      $('#'+tab_name+'_facebook_option :input').prop('disabled', true);
                      $('div[id*="'+tab_name+'_device"]').each(function() {
                        $(this).find('input').prop('checked', false);
                      });
          } 
    }

    function facebookCheckBoxOption(element,tab_name)
    {
      var checkbox = element;
          var checkboxIndex = String(checkbox.attr('id')).match(/\d+/)[0];
          if( checkbox.is(':checked') && checkboxIndex == "1") {  //if user checked on facebook option (ID = 1)
            $('#'+tab_name+'_facebook_option').show();
            $('#'+tab_name+'_facebook_option :input').prop('disabled', false);
          } else if(!checkbox.is(':checked') && checkboxIndex == "1"){
            $('#'+tab_name+'_facebook_option').hide();
            $('#'+tab_name+'_facebook_option :input').prop('checked', false);
          } 
    }

    //Show Bangkokpost campaign option by value from option type 
    $('input[id*="bp_type"]').each(function() {
        $(this).on("change", function(){
          changeTabOption($(this),'bp');   
        });
    });

    $('input[id*="bp_social"]').each(function() {
        $(this).on("change", function(){
          facebookCheckBoxOption($(this),'bp');
        });
    });

    //Show Posttoday campaign option by value from option type
    $('input[id*="ptd_type"]').each(function() {
        $(this).on("change", function(){
          changeTabOption($(this),'ptd');    
        });
    });

    $('input[id*="ptd_social"]').each(function() {
        $(this).on("change", function(){
          facebookCheckBoxOption($(this),'ptd'); 
        });
    });

    function changeOptionValue(a){
     
      var elementIndex =a.name.substring(
        a.name.lastIndexOf("[") + 1, 
        a.name.lastIndexOf("]")
      );
      var web_name = a.name.substr(0, a.name.indexOf('_'));
      //console.log(web_name);
      var value=$(a).val();
          var jArray = <?php echo json_encode($sectionArray); ?>[web_name+'_ad_section'];

          if(Object.keys(jArray[value]).length == 1){
            options="<option value='1'>-</option>";
          }else{
            options="<option value=''>Choose Section</option>";
          }
          
          for(j=1;j<Object.keys(jArray[value]).length;j++){
              options+="<option value='"+j+"'>"+jArray[value][j]+"</option>";
          }
          $("select[name*='"+web_name+"_section_id["+elementIndex+"]']").html(options);
    }

    function requireFieldOnCard(tab_name,value)
    {
      if(value)
      {
        var require_status = true;
        for(i=0;i<2;i++){
          if(i==1){
            tab_name = (tab_name == 'bp' ? 'ptd' : (tab_name == 'ptd' ? 'bp' : ''));
            require_status = false;
          } 
          $("select[name*='"+tab_name+"_']").prop('required',require_status);
          $("input[name*='"+tab_name+"_']").prop('required',require_status);
        }
      }
    }

    //Create input field before user click submit button
    function createHiddenField(){
        hiddenField();
        //validateCheckbox(active_tab,none_active_tab);
        
        if($('div[id*="bp_option1"] :input').is(':checked') || $('div[id*="ptd_option1"] :input').is(':checked'))   //remove required property on social option if user checked on social option (at least 1)
        {
                $('input[name*="bp_social"]').each(function() {
                  $(this).prop("required",false);
                });
                $('input[name*="ptd_social"]').each(function() {
                  $(this).prop("required",false);
                });
        }
    }

    function clearPreviousTab(active_tab)
    {
        previous_tab_name = (active_tab == "bangkokpost" ? "ptd" : "bp");
        //clear all input value on previous tab
        //1. Hiding checkbox option (Type/Social/Facebook)
        $('#'+previous_tab_name+'_option1').hide();
        $('#'+previous_tab_name+'_option2').hide();
        $('#'+previous_tab_name+'_option3').hide();
        $('#'+previous_tab_name+'_facebook_option').hide();
        //2. reset all input value on previous tab
        var previous_tab_input = document.querySelectorAll("input[name*='"+previous_tab_name+"_']");
        var previous_tab_dropdown = document.querySelectorAll("select[name*='"+previous_tab_name+"_']");
        for(var i = 0; i < previous_tab_input.length; i++){
          previous_tab_input[i].value = '';
          previous_tab_input[i].required = false;
          previous_tab_input[i].checked = false;
            if(previous_tab_input[i].type=="file")
            {
              var file_name = $('input[name="'+previous_tab_input[i].name+'"]').val();
              var fIndex = String(previous_tab_input[i].name).match(/\d+/)[0];
              var labelId = String(previous_tab_input[i].name).replace('['+fIndex+']',fIndex);
              $('label[id="'+labelId+'"]').text("");
            }
        }
        for(var i = 0; i < previous_tab_dropdown.length; i++){
          previous_tab_dropdown[i].value = '';
          previous_tab_dropdown[i].selectedIndex  = 0;
          previous_tab_dropdown[i].required = false;
        }
    }
    
    //Event when user clicked on posttoday tab
    $('#posttoday-tab').click(function(e) {
          e.preventDefault()
          var areYouSure = confirm('If you sure you wish to leave this tab?  Any data entered will NOT be saved.');
          if (areYouSure === true) {
            //if user change current tab, Show a posstoday tab
            $('.nav-requestForm').addClass('tabs--ptd');
            active_tab = 'posttoday';
            none_active_tab = 'bangkokpost';
            addTabClass(active_tab,none_active_tab);  //add and remove some attribute on this tab
            requireFieldOnCard('ptd',true);  //add require attribute to input field
            clearPreviousTab(active_tab);  //clear all input value on previous tab
          } else {
            // do other stuff
            return false;
          }
            
    });

    //Event when user clicked on bangkokpost tab
    $('#bangkokpost-tab').click(function(e) {
      e.preventDefault()
      var areYouSure = confirm('If you sure you wish to leave this tab?  Any data entered will NOT be saved.');
          if (areYouSure === true) {
            //if user change current tab, hide posstoday tab and show bangkokpost tab
            $('.nav-requestForm').removeClass('tabs--ptd');
            active_tab = 'bangkokpost';
            none_active_tab = 'posttoday';
            addTabClass(active_tab,none_active_tab); //add and remove some attribute on this tab
            requireFieldOnCard('bp',true);  //add require attribute to input field
            clearPreviousTab(active_tab); //clear all input value on previous tab
          } else {
            // do other stuff
            return false;
          }
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
      //location.href = (active_tab == 'bangkokpost' ? "#bangkokpost" : "#posttoday" );
    }
    
    //create a new input field for posting a customer and advertiser name before user clicked a submit button
    function hiddenField() {
      //event.preventDefault();
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
            Html.find('label[for="customFile"]').each(function() {  //Replace input name
                this.textContent= "Choose file";
                this.id= this.id.replace('0', count);
            });
            Html.find("input[type='hidden']").each(function() {  //Replace input name
                this.id= this.id.replace('0', count);
            });
            Html.find("input[type='file']").each(function() {  //Replace input value
                this.value= '';
            });
            Html.find("input[type='text']").each(function() {  //Replace input value
                this.value= '';
            });
            Html.find("input[name*='old_bp_banner_file']").each(function() {  //Replace input value
                this.value= '';
            });
            Html.find("input[name*='old_bp_quotation_file']").each(function() {  //Replace input value
                this.value= '';
            });
            Html.find("input[name*='old_ptd_banner_file']").each(function() {  //Replace input value
                this.value= '';
            });
            Html.find("input[name*='old_ptd_quotation_file']").each(function() {  //Replace input value
                this.value= '';
            });
            Html.find('select').each(function() {   //Replace dropdown name
                this.name= this.name.replace('[0]', '['+count+']');
                var id = this.name.split('_id['+count+']')[0]; //set hidden input id for posting dropdown text
                
                var select_name = this.name.substring(
                  this.name.lastIndexOf(web_name+"_") + (web_name == 'bp' ? 3 : 4), 
                  this.name.lastIndexOf("_")
                );
                if(select_name == 'position'){
                  this.setAttribute('onchange', 'document.getElementById(\"'+id+'_text'+count+'\").value=this.options[this.selectedIndex].text;changeOptionValue(this);');
                }
                else{
                  this.setAttribute('onchange', 'document.getElementById(\"'+id+'_text'+count+'\").value=this.options[this.selectedIndex].text;');
                }
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

    $("body").on('focus','.datepicker',function(){
      $(this).datepicker({
          autoclose: true,
          todayHighlight: true
      });
    });


    window.onbeforeunload = function (e) {
        e = e || window.event;

        // For IE and Firefox prior to version 4
        if (e) {
            e.returnValue = 'Any string';
        }

        // For Safari
        return 'Any string';
    };

    function Validate(oForm) {
      var _validFileExtensions = [".jpg", ".jpeg", ".zip", ".gif", ".png", ".rar", ".ai", ".psd", ".xls", ".xlsx", ".csv"];    
      var arrInputs = oForm.getElementsByTagName("input");
      for (var i = 0; i < arrInputs.length; i++) {
          var oInput = arrInputs[i];
          if (oInput.type == "file") {
              var sFileName = oInput.value;
              if (sFileName.length > 0) {
                  var blnValid = false;
                  for (var j = 0; j < _validFileExtensions.length; j++) {
                      var sCurExtension = _validFileExtensions[j];
                      if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                          blnValid = true;
                          break;
                      }
                  }
                  
                  if (!blnValid) {
                      alert("Sorry, Your files is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                      return false;
                  }
              }
          }
      }
      return true;
  }

//Show file name on label tag
function showFileName(tagName)
{
  var file_name = $('input[name="'+tagName+'"]').val();
  var fIndex = String(tagName).match(/\d+/)[0];
  var labelId = String(tagName).replace('['+fIndex+']',fIndex);
  $('label[id="'+labelId+'"]').text(String(file_name).slice(String(file_name).lastIndexOf('\\') + 1));
}




</script>
@endsection
