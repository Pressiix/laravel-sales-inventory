@extends('layouts.app')

@section('content')
<div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Create Campaign Report</h2>
          {!! Form::open(['action' => ['CampaignController@campaign_report_preview', 'method' => 'POST'],'name'=>'form','id'=>'form','enctype'=>'multipart/form-data'])!!}

            <div class="content-pdb">
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Report Type:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <select class="custom-select" name="report_type_id" onchange="document.getElementById('report_type_text').value=this.options[this.selectedIndex].text">
                    <option <?= (!isset($item['report_type_id']) ? 'selected' : '') ?> >Choose...</option>
                    <option <?= (isset($item['report_type_id']) && $item['report_type_id']=='1' ? 'selected' : '') ?> value="1">One</option>
                    <option <?= (isset($item['report_type_id']) && $item['report_type_id']=='2' ? 'selected' : '') ?> value="2">Two</option>
                    <option <?= (isset($item['report_type_id']) && $item['report_type_id']=='3' ? 'selected' : '') ?> value="3">Three</option>
                  </select>
                  <input type="hidden" name="report_type_text" id="report_type_text" value="<?= (isset($item['report_type_text']) ? $item['report_type_text'] : '') ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <select class="custom-select" name="advertiser_id" onchange="document.getElementById('advertiser_name').value=this.options[this.selectedIndex].text">
                    <option <?= (!isset($item['advertiser_id']) ? 'selected' : '') ?> >Choose...</option>
                    <option <?= (isset($item['advertiser_id']) && $item['advertiser_id']=='1' ? 'selected' : '') ?> value="1">One</option>
                    <option <?= (isset($item['advertiser_id']) && $item['advertiser_id']=='2' ? 'selected' : '') ?> value="2">Two</option>
                    <option <?= (isset($item['advertiser_id']) && $item['advertiser_id']=='3' ? 'selected' : '') ?> value="3">Three</option>
                  </select>
                  <input type="hidden" name="advertiser_name" id="advertiser_name" value="<?= (isset($item['advertiser_name']) ? $item['advertiser_name'] : '') ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Campaign:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <input type="text" class="form-control" name="campaign_name" value="<?= (isset($item['campaign_name']) ? $item['campaign_name'] : '') ?>">
                </div>
              </div>

              <div class="input-daterange datepicker">
                <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Start Date:</label>
                  <div class="col-sm-4">
                    <div class="input-group-inline">
                      <input type="text" class="form-control form-input--date d2" name="start" value="<?= (isset($item['start']) ? $item['start'] : '') ?>">
                      <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                     <label class="col-form-label">End Date:</label>
                  </div>
                  <div class="col-sm-4">
                    <div class="input-group-inline">
                      <input type="text" class="form-control form-input--date d2" name="end" value="<?= (isset($item['end']) ? $item['end'] : '') ?>">
                      <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="content-border">

              <div class="row">
                <div class="col-15 box--campaign">

                  <div id="campaign-item">
                  <?php if(!isset($item['name'])){ ?>
                  <div class="box-ad--banner" id="item-card">
                    <div class="box-ad--title" id="item-title">Line item 1:</div>
                    <div class="box-ad--container">
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Name:</label>
                        <div class="col-sm-10">
                          <input type="text" name="name[]" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Date:</label>
                        <div class="col-sm-10">
                          <input type="text" name="date[]" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server impressions:</label>
                        <div class="col-sm-10">
                          <input type="text" name="ad_server_impression[]" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server clicks:</label>
                        <div class="col-sm-10">
                          <input type="text" name="ad_server_click[]" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server CTR:</label>
                        <div class="col-sm-10">
                          <input type="text" name="ad_server_ctr[]" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } 
                  else{ 
                    for($i=0;$i<count($item['name']);$i++){ ?>
                      <div class="box-ad--banner" id="item-card">
                    <div class="box-ad--title" id="item-title">Line item <?= $i+1 ?>:</div>
                    <div class="box-ad--container">
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Name:</label>
                        <div class="col-sm-10">
                          <input type="text" name="name[<?= $i ?>]" class="form-control" value="<?= $item['name'][$i] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Date:</label>
                        <div class="col-sm-10">
                          <input type="text" name="date[<?= $i ?>]" class="form-control" value="<?= $item['date'][$i] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server impressions:</label>
                        <div class="col-sm-10">
                          <input type="text" name="ad_server_impression[<?= $i ?>]" class="form-control" value="<?= $item['ad_server_impression'][$i] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server clicks:</label>
                        <div class="col-sm-10">
                          <input type="text" name="ad_server_click[<?= $i ?>]" class="form-control" value="<?= $item['ad_server_click'][$i] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server CTR:</label>
                        <div class="col-sm-10">
                          <input type="text" name="ad_server_ctr[<?= $i ?>]" class="form-control" value="<?= $item['ad_server_ctr'][$i] ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } 
                  } ?>
                  </div>

                  <div class="box-btn--addmore"><a href="javascript:;" onclick="addItems();" class="btn btn-addmore">+ Create more line item</a></div>

                </div>
              </div>

            </div>

            <div class="text-center"><button type="submit" value="send" class="btn btn-submit">submit</button></div>

            {!! Form::close() !!}
        </div>
      </div>

<script>
window.history.pushState('store_campaign', 'Title', '/campaign_report_create');

    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    function addItems(){
        var count = $("div[id*='item-card']").length;
        var Html= $("div[id*='item-card']").eq(0).clone();
            Html.find("input[type='hidden']").each(function() {  //Replace input name
                this.id= this.id.replace('0', count);
            });
            
            Html.find("input[type='text']").each(function() {  //Replace input value
                this.value= '';
            });
            Html.find("div[id*='item-title']").each(function() { //Replace box title
                this.textContent = this.textContent.replace('Line item 1:','Line item '+(count+1)+':');
            });
            $('#campaign-item').append(Html);
            count++;
    }

</script>
@endsection
