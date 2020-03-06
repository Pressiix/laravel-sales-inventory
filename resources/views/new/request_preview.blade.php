@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Request Preview</h2>
          <form>

            <div class="content-pdb">
              <div class="form-group row">
                <label for="staticName" class="col-sm-5 col-md-4 col-lg-3 col-form-label">Sales name:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <div class="form-control-plaintext">{{ $item['sales_name'] }}</div>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-5 col-md-4 col-lg-3 col-form-label pt-0">Sales Type:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <div class="form-control-plaintext">{{ $item['sales_type'] }}</div>
                </div>
              </div>
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-5 col-md-4 col-lg-3 col-form-label">Customer name:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <div class="form-control-plaintext">{{ $item['customer_name'] }}</div>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-5 col-md-4 col-lg-3 col-form-label">Campaign name:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <div class="form-control-plaintext">{{ $item['campaign_name'] }}</div>
                </div>
              </div>
              <div class="form-group row">
                <label for="advertiserSelect" class="col-sm-5 col-md-4 col-lg-3 col-form-label">Advertiser name:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <div class="form-control-plaintext">{{ $item['advertiser_name'] }}</div>
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
                            <?php for($i=0;$i<$item['total_bp_web'];$i++){
                              echo (!empty($item['bp_web'][$i]) ? "<li>".$item['bp_web'][$i]."</li>" : '');
                            } ?>
                          </ul>
                        </div>
                      </div>
                      <div class="bar-title mt-4"><strong>Facebook:</strong></div>
                      <div class="form-group row">
                        <div class="col-15">
                          <ul class="form-ad--answer">
                            <li>Facebook Boost Post</li>
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
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="customerSelect" class="col-auto col-form-label">Position:</label>
                                  <div class="col-auto">
                                    <div class="form-control-plaintext">{{ $item['bp_position_text'][$i] }}</div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="customerSelect" class="col-auto col-form-label">Section:</label>
                                  <div class="col-auto">
                                    <div class="form-control-plaintext">{{ $item['bp_section_text'][$i] }}</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="input-daterange">
                                <div class="input-group-inline"><span><strong>Period:</strong></span></div>
                                <div class="input-group-inline">
                                  <span>From</span>
                                  <input type="text" class="form-input--date form-control-plaintext" value="{{ $item['bp_date_from'][$i] }}" readonly="">
                                </div>
                                <div class="input-group-inline">
                                  <span>to</span>
                                  <input type="text" class="form-input--date form-control-plaintext" value="{{ $item['bp_date_to'][$i] }}" readonly="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Device:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">Desktop</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>URL link banner:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">{{ $item['bp_banner_url'][$i] }}</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>File Upload:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext"><a href="assets/images/{{ $item['bp_ad_desc_file'][$i] }}" target="_blank">{{ $item['bp_ad_desc_file'][$i] }}</a></div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Impression:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">50,000</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Detail:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">Lorem Ipsum is simply dummy text</div>
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
                        <div class="form-control-plaintext">{{ number_format($item['bp_campaign_budget']) }}</div>
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
                          <?php for($i=0;$i<$item['total_ptd_web'];$i++){
                              echo (!empty($item['ptd_web'][$i]) ? "<li>".$item['ptd_web'][$i]."</li>" : '');
                            } ?>
                          </ul>
                        </div>
                      </div>
                      <div class="bar-title mt-4">Facebook:</div>
                      <div class="form-group row">
                        <div class="col-15">
                          <ul class="form-ad--answer">
                            <li>Normal Post</li>
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
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="customerSelect" class="col-auto col-form-label">Position:</label>
                                  <div class="col-auto">
                                    <div class="form-control-plaintext">{{ $item['ptd_position_text'][$i] }}</div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="customerSelect" class="col-auto col-form-label">Section:</label>
                                  <div class="col-auto">
                                    <div class="form-control-plaintext">{{ $item['ptd_section_text'][$i] }}</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="input-daterange">
                                <div class="input-group-inline"><span><strong>Period:</strong></span></div>
                                <div class="input-group-inline">
                                  <span>From</span>
                                  <input type="text" class="form-input--date form-control-plaintext" value="{{ $item['ptd_date_from'][$i] }}" readonly="">
                                </div>
                                <div class="input-group-inline">
                                  <span>to</span>
                                  <input type="text" class="form-input--date form-control-plaintext" value="{{ $item['ptd_date_to'][$i] }}" readonly="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Device:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">Desktop</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>URL link banner:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">{{ $item['ptd_banner_url'][$i] }}</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>File Upload:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext"><a href="assets/images/{{ $item['ptd_ad_desc_file'][$i] }}" target="_blank">{{ $item['ptd_ad_desc_file'][$i] }}</a></div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Impression:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">50,000</div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-sm-4 col-form-label label-normal"><strong>Detail:</strong></label>
                              <div class="col-sm-11">
                                <div class="form-control-plaintext">Lorem Ipsum is simply dummy text</div>
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
                        <div class="form-control-plaintext">{{ number_format($item['ptd_campaign_budget']) }}</div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div class="btn-2item">
              <div class="row">
                <div class="col-50 box-l"><button type="submit" value="send" class="btn btn-submit">EDIT</button></div>
                <div class="col-50 box-r"><button type="submit" value="send" class="btn btn-submit">Approve</button></div>
              </div>
            </div>

          </form>
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
