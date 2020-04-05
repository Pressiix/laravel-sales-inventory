@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Request Preview</h2>
          {!! Form::open(['action' => ['AppController@storeRequest', 'method' => 'POST']])!!}
            <?php if(isset($item['request_id'])){ ?>
              <input type="hidden" name='request_id' value="<?= $item['request_id'] ?>" readonly="">
            <?php }?>
            <?php if(isset($item['status'])){ ?>
              <input type="hidden" name='status' value="<?= $item['status'] ?>" readonly="">
            <?php }?>
            <div class="content-pdb">
              <div class="form-group row">
                <label for="staticName" class="col-sm-5 col-md-4 col-lg-3 col-form-label">Sales name:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <div class="form-control-plaintext">{{ $item['sales_name'] }}</div>
                  <input type="hidden" name="sales_name" value="{{ $item['sales_name'] }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-5 col-md-4 col-lg-3 col-form-label pt-0">Sales Type:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <div class="form-control-plaintext">{{ $item['sales_type'] }}</div>
                  <input type="hidden" name="sales_type" value="{{ $item['sales_type'] }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-5 col-md-4 col-lg-3 col-form-label">Customer name:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <div class="form-control-plaintext">{{ $item['customer_name'] }}</div>
                  <input type="hidden" name="customer_id" value="{{ $item['customer_id'] }}">
                  <input type="hidden" name="customer_name" value="{{ $item['customer_name'] }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-5 col-md-4 col-lg-3 col-form-label">Campaign name:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <div class="form-control-plaintext">{{ $item['campaign_name'] }}</div>
                  <input type="hidden" name="campaign_name" value="{{ $item['campaign_name'] }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="advertiserSelect" class="col-sm-5 col-md-4 col-lg-3 col-form-label">Advertiser name:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <div class="form-control-plaintext">{{ $item['advertiser_name'] }}</div>
                  <input type="hidden" name="advertiser_id" value="{{ $item['advertiser_id'] }}">
                  <input type="hidden" name="advertiser_name" value="{{ $item['advertiser_name'] }}">
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
                  
                  <div class="content-tablist">
                    <div class="form-ad--detail">
                      <div class="bar-title"><strong>Website:</strong></div>
                      <div class="form-group row">
                        <div class="col-15">
                          <ul class="form-ad--answer">
                            <?php for($i=0;$i<=$item['total_bp_web'];$i++){
                              echo (!empty($item['bp_web'][$i]) ? "<li>".$item['bp_web'][$i]."</li>" : '');
                              if(!empty($item['bp_web'][$i])){
                            ?>
                              <input type="hidden" name="bp_web[<?= $i ?>]" value="<?= (!empty($item['bp_web'][$i]) ? $item['bp_web'][$i] : '') ?>">
                           <?php } } ?>
                          </ul>
                        </div>
                      </div>
                      <div class="bar-title mt-4"><strong>Facebook:</strong></div>
                      <div class="form-group row">
                        <div class="col-15">
                          <ul class="form-ad--answer">
                            <li>{{ (!empty($item['bp_facebook']) ? $item['bp_facebook'] : '') }}</li>
                            <input name="bp_facebook" type="hidden" value="{{ (!empty($item['bp_facebook']) ? $item['bp_facebook'] : '') }}">
                          </ul>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-15">
                      <?php for($i=0;$i<count($item['bp_size_id']);$i++){ ?>
                      <div class="box-ad--banner">
                          <div class="box-ad--title">Ad <?= $i+1 ?> Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="customerSelect" class="col-auto col-form-label">Size:</label>
                                  <div class="col-auto">
                                    <div class="form-control-plaintext">{{ $item['bp_size_text'][$i] }}</div>
                                    <input type="hidden" name="bp_size_id[<?= $i ?>]" value="{{ $item['bp_size_id'][$i] }}">
                                    <input type="hidden" name="bp_size_text[<?= $i ?>]" value="{{ $item['bp_size_text'][$i] }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="customerSelect" class="col-auto col-form-label">Position:</label>
                                  <div class="col-auto">
                                    <div class="form-control-plaintext">{{ $item['bp_position_text'][$i] }}</div>
                                    <input type="hidden" name="bp_position_id[<?= $i ?>]" value="{{ $item['bp_position_id'][$i] }}">
                                    <input type="hidden" name="bp_position_text[<?= $i ?>]" value="{{ $item['bp_position_text'][$i] }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="customerSelect" class="col-auto col-form-label">Section:</label>
                                  <div class="col-auto">
                                    <div class="form-control-plaintext">{{ $item['bp_section_text'][$i] }}</div>
                                    <input type="hidden" name="bp_section_id[<?= $i ?>]" value="{{ $item['bp_section_id'][$i] }}">
                                    <input type="hidden" name="bp_section_text[<?= $i ?>]" value="{{ $item['bp_section_text'][$i] }}">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="input-daterange">
                                <div class="input-group-inline"><span><strong>Period:</strong></span></div>
                                <div class="input-group-inline">
                                  <span>From</span>
                                  <input type="text" name="bp_period_from[<?= $i ?>]" class="form-input--date form-control-plaintext" value="{{ $item['bp_period_from'][$i] }}" readonly="">
                                </div>
                                <div class="input-group-inline">
                                  <span>to</span>
                                  <input type="text" name="bp_period_to[<?= $i ?>]" class="form-input--date form-control-plaintext" value="{{ $item['bp_period_to'][$i] }}" readonly="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Device:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">{{ (!empty($item['bp_device'][$i]) ? $item['bp_device'][$i] : '') }}</div>
                                <input type="hidden" name="bp_device[<?= $i ?>]" value="{{ (!empty($item['bp_device'][$i]) ? $item['bp_device'][$i] : '') }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>URL link banner:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">{{ (!empty($item['bp_banner_url'][$i]) ? $item['bp_banner_url'][$i] : '') }}</div>
                                <input type="hidden" name="bp_banner_url[<?= $i ?>]" value="{{ $item['bp_banner_url'][$i] }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>File banner:</strong></label>
                              <div class="col-sm-11">
                                <?php if(isset($item['bp_banner_file'][$i])){ 
                                  if(is_array($item['bp_banner_file'][$i])){
                                ?>
                                  <div class="form-control-plaintext"><a href="<?= url('/') ?>/storage/files/{{ $item['bp_banner_file'][$i]->hashName() }}" target="_blank">{{ $item['bp_banner_file'][$i]->getClientOriginalName() }}</a></div>
                                  <input type="hidden" name="bp_banner_file[<?= $i ?>]" value="{{ $item['bp_banner_file'][$i]->hashName() }}">
                                  <input type="hidden" name="old_bp_banner_file" value="<?= $item['bp_banner_file'][$i]->hashName() ?>">
                                <?php } 
                                  else{?>
                                    <div class="form-control-plaintext"><a href="<?= url('/') ?>/storage/files/{{ $item['bp_banner_file'][$i] }}" target="_blank">{{ $item['bp_banner_file'][$i] }}</a></div>
                                    <input type="hidden" name="bp_banner_file[<?= $i ?>]" value="{{ $item['bp_banner_file'][$i] }}">
                                    <input type="hidden" name="old_bp_banner_file" value="<?= $item['bp_banner_file'][$i] ?>">
                                  <?php } ?>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>File quotation:</strong></label>
                              <div class="col-sm-11">
                              <?php if(isset($item['bp_quotation_file'][$i])){ 
                                  if(is_array($item['bp_quotation_file'][$i])){
                                ?>
                                  <div class="form-control-plaintext"><a href="<?= url('/') ?>/storage/files/{{ $item['bp_quotation_file'][$i]->hashName() }}" target="_blank">{{ $item['bp_quotation_file'][$i]->getClientOriginalName() }}</a></div>
                                  <input type="hidden" name="bp_quotation_file[<?= $i ?>]" value="{{ $item['bp_quotation_file'][$i]->hashName() }}">
                                  <input type="hidden" name="old_bp_quotation_file" value="<?= $item['bp_quotation_file'][$i]->hashName() ?>">
                                <?php } 
                                  else{?>
                                    <div class="form-control-plaintext"><a href="<?= url('/') ?>/storage/files/{{ $item['bp_quotation_file'][$i] }}" target="_blank">{{ $item['bp_quotation_file'][$i] }}</a></div>
                                    <input type="hidden" name="bp_quotation_file[<?= $i ?>]" value="{{ $item['bp_quotation_file'][$i] }}">
                                    <input type="hidden" name="old_bp_quotation_file" value="<?= $item['bp_quotation_file'][$i] ?>">
                                  <?php } ?>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Impression:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">{{ $item['bp_impression_need'][$i] }}</div>
                                <input type="hidden" name="bp_impression_need[<?= $i ?>]" value="{{ $item['bp_impression_need'][$i] }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Detail:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">{{ $item['bp_ad_detail'][$i] }}</div>
                                <input type="hidden" name="bp_ad_detail[<?= $i ?>]" value="{{ $item['bp_ad_detail'][$i] }}">
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputCampaign" class="col-sm-5 col-form-label">Campaign budget (THB):</label>
                      <div class="col-sm-10">
                        <div class="form-control-plaintext">{{ number_format((float) $item['bp_campaign_budget']) }}</div>
                        <input type="hidden" name="bp_campaign_budget" value="{{ $item['bp_campaign_budget'] }}">
                      </div>
                    </div>
                  </div>

                </div>
                <div class="tab-pane fade" id="posttoday" role="tabpanel" aria-labelledby="posttoday-tab">
                  
                  <div class="content-tablist">
                    <div class="form-ad--detail">
                      <div class="bar-title">Website:</div>
                      <div class="form-group row">
                        <div class="col-15">
                          <ul class="form-ad--answer">
                          <?php for($i=0;$i<=$item['total_ptd_web'];$i++){
                              echo (!empty($item['ptd_web'][$i]) ? "<li>".$item['ptd_web'][$i]."</li>" : ''); 
                              if(!empty($item['ptd_web'][$i])){
                          ?>
                              <input type="hidden" name="ptd_web[<?= $i ?>]" value="<?= (!empty($item['ptd_web'][$i]) ? $item['ptd_web'][$i] : '') ?>">
                          <?php }} ?>
                          </ul>
                        </div>
                      </div>
                      <div class="bar-title mt-4">Facebook:</div>
                      <div class="form-group row">
                        <div class="col-15">
                          <ul class="form-ad--answer">
                          <li>{{ (!empty($item['ptd_facebook']) ? $item['ptd_facebook'] : '') }}</li>
                            <input name="ptd_facebook" type="hidden" value="{{ (!empty($item['ptd_facebook']) ? $item['ptd_facebook'] : '') }}">
                          </ul>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-15">
                      <?php for($i=0;$i<count($item['ptd_size_id']);$i++){ ?>
                        <div class="box-ad--banner">
                          <div class="box-ad--title">Ad <?= $i+1 ?> Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="customerSelect" class="col-auto col-form-label">Size:</label>
                                  <div class="col-auto">
                                    <div class="form-control-plaintext">{{ $item['ptd_size_text'][$i] }}</div>
                                    <input type="hidden" name="ptd_size_id[<?= $i ?>]" value="{{ $item['ptd_size_id'][$i] }}">
                                    <input type="hidden" name="ptd_size_text[<?= $i ?>]" value="{{ $item['ptd_size_text'][$i] }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="customerSelect" class="col-auto col-form-label">Position:</label>
                                  <div class="col-auto">
                                    <div class="form-control-plaintext">{{ $item['ptd_position_text'][$i] }}</div>
                                    <input type="hidden" name="ptd_position_id[<?= $i ?>]" value="{{ $item['ptd_position_id'][$i] }}">
                                    <input type="hidden" name="ptd_position_text[<?= $i ?>]" value="{{ $item['ptd_position_text'][$i] }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="customerSelect" class="col-auto col-form-label">Section:</label>
                                  <div class="col-auto">
                                    <div class="form-control-plaintext">{{ $item['ptd_section_text'][$i] }}</div>
                                    <input type="hidden" name="ptd_section_id[<?= $i ?>]" value="{{ $item['ptd_section_id'][$i] }}">
                                    <input type="hidden" name="ptd_section_text[<?= $i ?>]" value="{{ $item['ptd_section_text'][$i] }}">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="input-daterange">
                                <div class="input-group-inline"><span><strong>Period:</strong></span></div>
                                <div class="input-group-inline">
                                  <span>From</span>
                                  <input type="text" name="ptd_period_from[<?= $i ?>]" class="form-input--date form-control-plaintext" value="{{ $item['ptd_period_from'][$i] }}" readonly="">
                                </div>
                                <div class="input-group-inline">
                                  <span>to</span>
                                  <input type="text" name="ptd_period_to[<?= $i ?>]" class="form-input--date form-control-plaintext" value="{{ $item['ptd_period_to'][$i] }}" readonly="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Device:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">{{ (!empty($item['ptd_device'][$i]) ? $item['ptd_device'][$i] : '') }}</div>
                                <input type="hidden" name="ptd_device[<?= $i ?>]" value="{{ (!empty($item['ptd_device'][$i]) ? $item['ptd_device'][$i] : '') }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>URL link banner:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">{{ (!empty($item['ptd_banner_url'][$i]) ? $item['ptd_banner_url'][$i] : '') }}</div>
                                <input type="hidden" name="ptd_banner_url[<?= $i ?>]" value="{{ $item['ptd_banner_url'][$i] }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>File banner:</strong></label>
                              <div class="col-sm-11">
                                <?php if(isset($item['ptd_banner_file'][$i])){ 
                                  if(is_array($item['ptd_banner_file'][$i])){
                                ?>
                                  <div class="form-control-plaintext"><a href="<?= url('/') ?>/storage/files/{{ $item['ptd_banner_file'][$i]->hashName() }}" target="_blank">{{ $item['ptd_banner_file'][$i]->getClientOriginalName() }}</a></div>
                                  <input type="hidden" name="ptd_banner_file[<?= $i ?>]" value="{{ $item['ptd_banner_file'][$i]->hashName() }}">
                                  <input type="hidden" name="old_ptd_banner_file" value="<?= $item['ptd_banner_file'][$i]->hashName() ?>">
                                <?php } 
                                  else{?>
                                    <div class="form-control-plaintext"><a href="<?= url('/') ?>/storage/files/{{ $item['ptd_banner_file'][$i] }}" target="_blank">{{ $item['ptd_banner_file'][$i] }}</a></div>
                                    <input type="hidden" name="ptd_banner_file[<?= $i ?>]" value="{{ $item['ptd_banner_file'][$i] }}">
                                    <input type="hidden" name="old_ptd_banner_file" value="<?= $item['ptd_banner_file'][$i] ?>">
                                  <?php } ?>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>File quotation:</strong></label>
                              <div class="col-sm-11">
                              <?php if(isset($item['ptd_quotation_file'][$i])){ 
                                  if(is_array($item['ptd_quotation_file'][$i])){
                                ?>
                                  <div class="form-control-plaintext"><a href="<?= url('/') ?>/storage/files/{{ $item['ptd_quotation_file'][$i]->hashName() }}" target="_blank">{{ $item['ptd_quotation_file'][$i]->getClientOriginalName() }}</a></div>
                                  <input type="hidden" name="ptd_quotation_file[<?= $i ?>]" value="{{ $item['ptd_quotation_file'][$i]->hashName() }}">
                                  <input type="hidden" name="old_ptd_quotation_file" value="<?= $item['ptd_quotation_file'][$i]->hashName() ?>">
                                <?php } 
                                  else{?>
                                    <div class="form-control-plaintext"><a href="<?= url('/') ?>/storage/files/{{ $item['ptd_quotation_file'][$i] }}" target="_blank">{{ $item['ptd_quotation_file'][$i] }}</a></div>
                                    <input type="hidden" name="ptd_quotation_file[<?= $i ?>]" value="{{ $item['ptd_quotation_file'][$i] }}">
                                    <input type="hidden" name="old_ptd_quotation_file" value="<?= $item['ptd_quotation_file'][$i] ?>">
                                  <?php } ?>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Impression:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">{{ $item['ptd_impression_need'][$i] }}</div>
                                <input type="hidden" name="ptd_impression_need[<?= $i ?>]" value="{{ $item['ptd_impression_need'][$i] }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Detail:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">{{ $item['ptd_ad_detail'][$i] }}</div>
                                <input type="hidden" name="ptd_ad_detail[<?= $i ?>]" value="{{ $item['ptd_ad_detail'][$i] }}">
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Campaign budget (THB):</label>
                      <div class="col-sm-10">
                        <div class="form-control-plaintext">{{ number_format((float) $item['ptd_campaign_budget']) }}</div>
                        <input name="ptd_campaign_budget" type="hidden" value="{{ $item['ptd_campaign_budget'] }}">
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <?php if(isset($item['id'])){ ?>
              <input type="hidden" name='id' value="<?= $item['id'] ?>">
            <?php } 
             if(isset($item['ad_desc_id'])){ ?>
              <input type="hidden" name='ad_desc_id' value="<?= $item['ad_desc_id'] ?>">
            <?php } 
            if(isset($request_id)){ ?>
              <input type="hidden" name='request_id' value="<?= $request_id ?>">
            <?php } ?>

            
              <div class="btn-2item">
              <div class="row">
              
              <?php if((isset($item['status']) && $item['status'] !== 'Approve' &&strpos(url()->current(),'profile3')) || (!isset($item['status']) && strpos(url()->current(),'request_preview'))){ ?>
                <div class="col-50 box-l"><input type="submit" name="action" value="Edit" class="btn btn-submit"></div>
             <?php } 
               if(strpos(url()->current(),'request_preview2')){ 
                      if(($userRole === "sale-management" || $userRole === "dev") && (isset($item['status']) && $item['status'] !== 'Approve')){ ?>
                          <div class="col-50 box-r"><input type="submit" name="action" value="Approve" class="btn btn-submit"></div>
              <?php } 
              }else{ 
                if(isset($item['status']) && $item['status'] !== 'Approve' || (!isset($item['status']) && strpos(url()->previous(),'request_form'))){ 
                  if($userRole === "sale" || $userRole === "dev"){ ?>
                  <div class="col-50 box-r"><input type="submit" name="action" value="Submit" class="btn btn-submit"></div>
                <?php } else if($userRole === "sale-management"){ ?>
                  <div class="col-50 box-r"><input type="submit" name="action" value="Approve" class="btn btn-submit"></div>
                <?php } 
                }
              } ?>  
              
              </div>
            </div>
              
            {!! Form::close() !!}
        </div>
      </div>
<script>
    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
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
