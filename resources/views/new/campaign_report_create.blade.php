@extends('layouts.app')

@section('content')
<div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Create Campaign Report</h2>
          {!! Form::open(['action' => ['CampaignController@campaign_report_preview', 'method' => 'POST'],'name'=>'form','id'=>'form','enctype'=>'multipart/form-data'])!!}
          <?php if(isset($item['id'])){ ?>
              <input type="hidden" name='id' value="<?= $item['id'] ?>">
            <?php } ?>
            <div class="content-pdb">
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Report Type:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <select class="custom-select" name="report_type_id" onchange="document.getElementById('report_type_name').value=this.options[this.selectedIndex].text">
                    <option <?= (!isset($item['report_type_id']) ? 'selected' : '') ?> >Choose...</option>
                    <option <?= (isset($item['report_type_id']) && $item['report_type_id']=='1' ? 'selected' : '') ?> value="1">One</option>
                    <option <?= (isset($item['report_type_id']) && $item['report_type_id']=='2' ? 'selected' : '') ?> value="2">Two</option>
                    <option <?= (isset($item['report_type_id']) && $item['report_type_id']=='3' ? 'selected' : '') ?> value="3">Three</option>
                  </select>
                  <input type="hidden" name="report_type_name" id="report_type_name" value="<?= (isset($item['report_type_name']) ? $item['report_type_name'] : '') ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <select class="custom-select" name="advertiser_id" onchange="document.getElementById('advertiser_name').value=this.options[this.selectedIndex].text">
                    <option <?= (!isset($item['advertiser_id']) ? 'selected' : '') ?> >Choose...</option>
                    <?php foreach($advertiser as $key=>$value){ ?>
                      <option <?= (isset($item['advertiser_id']) && $item['advertiser_id']==$key ? 'selected' : '') ?> value="<?= $key ?>"><?= $value ?></option>
                    <?php } ?>
                  </select>
                  <input type="hidden" name="advertiser_name" id="advertiser_name" value="<?= (isset($item['advertiser_name']) ? $item['advertiser_name'] : '') ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Campaign:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <input type="text" class="form-control" id="campaign_name" name="campaign_name" value="<?= (isset($item['campaign_name']) ? $item['campaign_name'] : '') ?>" autocomplete="off">
                </div>
              </div>

              <div class="input-daterange datepicker">
                <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Start Date:</label>
                  <div class="col-sm-4">
                    <div class="input-group-inline">
                      <input type="text" class="form-control form-input--date d2" id="start" name="start" value="<?= (isset($item['start']) ? date_format(date_create($item['start']),"m/d/Y") : '') ?>">
                      <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                     <label class="col-form-label">End Date:</label>
                  </div>
                  <div class="col-sm-4">
                    <div class="input-group-inline">
                      <input type="text" class="form-control form-input--date d2" name="end" value="<?= (isset($item['end']) ? date_format(date_create($item['end']),"m/d/Y") : '') ?>">
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
                  <?php if(!isset($item['item_name'])){ ?>
                  <div class="box-ad--banner" id="item-card">
                    <div class="box-ad--title" id="item-title">Date : - </div>
                    <div class="box-ad--container">
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Name:</label>
                        <div class="col-sm-10">
                          <input type="text" id="item_name0" name="item_name[0]" class="form-control" autocomplete="off" readonly>
                        </div>
                      </div>
                      <div class="form-group row" style="display:none;">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Date:</label>
                        <div class="col-sm-10">
                          <input type="text" id="date0" name="date[0]" class="form-control" autocomplete="off" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server impressions:</label>
                        <div class="col-sm-10">
                          <input type="text" id="ad_server_impression0" name="ad_server_impression[0]" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server clicks:</label>
                        <div class="col-sm-10">
                          <input type="text" id="ad_server_click0" name="ad_server_click[0]" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server CTR:</label>
                        <div class="col-sm-10">
                          <input type="text" id="ad_server_ctr0" name="ad_server_ctr[0]" placeholder="Ad server impressions and Ad server clicks field has been required" class="form-control" autocomplete="off" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } 
                  else{ 
                    for($i=0;$i<count($item['item_name']);$i++){ ?>
                      <div class="box-ad--banner" id="item-card">
                    <div class="box-ad--title" id="item-title">Date : <?= (isset($item['start']) ? $item['start'] : '') ?></div>
                    <div class="box-ad--container">
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Name:</label>
                        <div class="col-sm-10">
                          <input type="text" id="item_name<?= $i ?>" name="item_name[<?= $i ?>]" class="form-control" value="<?= $item['item_name'][$i] ?>" autocomplete="off" readonly>
                        </div>
                      </div>
                      <div class="form-group row" style="display:none;">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Date:</label>
                        <div class="col-sm-10">
                          <input type="text" id="date<?= $i ?>" name="date[<?= $i ?>]" class="form-control" value="<?= $item['date'][$i] ?>" autocomplete="off" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server impressions:</label>
                        <div class="col-sm-10">
                          <input type="text" id="ad_server_impression<?= $i ?>" name="ad_server_impression[<?= $i ?>]" class="form-control" value="<?= $item['ad_server_impression'][$i] ?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server clicks:</label>
                        <div class="col-sm-10">
                          <input type="text" id="ad_server_click<?= $i ?>" name="ad_server_click[<?= $i ?>]" class="form-control" value="<?= $item['ad_server_click'][$i] ?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server CTR:</label>
                        <div class="col-sm-10">
                          <input type="text" id="ad_server_ctr<?= $i ?>" name="ad_server_ctr[<?= $i ?>]" placeholder="Ad server impressions and Ad server clicks field has been required" class="form-control" value="<?= $item['ad_server_ctr'][$i] ?>" autocomplete="off" readonly>
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

    $(document).on("keyup", 'input[id*="campaign_name"]', function () {
        $('input[id*="item_name"]').val(this.value);
    });

    $(document).on("keyup change", '#start', function () {
        var date = new Date(this.value);
        $('input[id*="date"]').val(date.getDate()+"/"+(date.getMonth()+ 1)+"/"+date.getFullYear());
        $('div[id*="item-title"]').text("Date : "+date.getDate()+"/"+(date.getMonth()+ 1)+"/"+date.getFullYear());
    });

          $(document).on("keyup", 'input[id*="ad_server_impression"]', function () {
            var id = this.id;
            var index = id[id.length -1];
            var click = parseFloat($('input[id="ad_server_click'+index+'"]').val());
            var  impression = parseFloat(this.value);
            if($('input[id="ad_server_click'+index+'"]').val().length !== 0 && this.value.length !== 0)
            {
              if(!isNaN(click/impression))
              {
                $('input[id="ad_server_ctr'+index+'"]').val((click/impression).toFixed(2));
              }else{
                $('input[id="ad_server_ctr'+index+'"]').val("");
              }
            }else{
              $('input[id="ad_server_ctr'+index+'"]').val("");
            }
          });

          $(document).on("keyup", 'input[id*="ad_server_click"]', function () {
            var id = this.id;
            var index = id[id.length -1];
            var click = parseFloat(this.value);
            var  impression = parseFloat($('input[id="ad_server_impression'+index+'"]').val());
            if($('input[id="ad_server_impression'+index+'"]').val().length !== 0 && this.value.length !== 0)
            {
              if(!isNaN(click/impression))
              {
                $('input[id="ad_server_ctr'+index+'"]').val((click/impression).toFixed(2));
              }else{
                $('input[id="ad_server_ctr'+index+'"]').val("");
              }
            }else{
              $('input[id="ad_server_ctr'+index+'"]').val("");
            }
          });

    function addItems(){
        var count = $("div[id*='item-card']").length;
        var Html= $("div[id*='item-card']").eq(0).clone();
            Html.find('input').each(function() {  //Replace input name
                this.name= this.name.replace('[0]', '['+count+']');
                this.id= this.id.replace('0', count);
            });
            Html.find("input[type='hidden']").each(function() {  //Replace input name
                this.id= this.id.replace('0', count);
            });
            
            Html.find("input[type='text']").each(function() {  //Replace input value
                this.id= this.id.replace('0', count);
            });

            Html.find("input[name*='ad_server_ctr']").each(function() {  //Replace input value
                this.value= '';
                this.id= this.id.replace('0', count);
            });

            Html.find("input[name*='ad_server_impression']").each(function() {  //Replace input value
                this.value= '';
                this.id= this.id.replace('0', count);
            });

            Html.find("input[name*='ad_server_click']").each(function() {  //Replace input value
                this.value= '';
                this.id= this.id.replace('0', count);
            });
            
            /*Html.find("div[id*='item-title']").each(function() { //Replace box title
                this.textContent = this.textContent.replace('-','-');
                this.id= this.id.replace('0', count);
            });*/
            $('#campaign-item').append(Html);
            count++;
    }

</script>
@endsection
