@extends('layouts.app')

@section('content')
<div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Create Ad Network</h2>
          {!! Form::open(['action' => ['AdNetworkController@ad_network_preview', 'method' => 'POST'],'name'=>'form','id'=>'form','enctype'=>'multipart/form-data'])!!}
          <?php if(isset($item['id'])){ ?>
              <input type="hidden" name='id' value="<?= $item['id'] ?>">
            <?php } ?>
            <div class="content-pdb">
              <div class="input-daterange datepicker">
                <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Start Date:</label>
                  <div class="col-sm-4">
                    <div class="input-group-inline">
                      <input type="text" class="form-control form-input--date d2" name="start" value="<?= (isset($item['start']) ? $item['start'] : '' ) ?>" autocomplete="off" required>
                      <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                     <label class="col-form-label">End Date:</label>
                  </div>
                  <div class="col-sm-4">
                    <div class="input-group-inline">
                      <input type="text" class="form-control form-input--date d2" name="end" value="<?= (isset($item['start']) ? $item['end'] : '' ) ?>" autocomplete="off" required>
                      <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="content-border">

              <div class="row">
                <div class="col-15 box--adsnetwork">

                <div id="campaign-item">
                <?php if(!isset($item['pageview'])){ ?>
                  <div class="box-ad--banner" id="item-card">
                    <div class="box-ad--title" id="item-title">Line item 1:</div>
                    <div class="box-ad--container">
                      <div class="form-group row">
                        <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                        <select class="custom-select" name="advertiser_id[0]" onchange="document.getElementById('advertiser_name').value=this.options[this.selectedIndex].text" required>
                          <option value="">Choose...</option>
                          <?php foreach($advertiser as $key=>$value){ ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                          <?php } ?>
                        </select>
                        <input type="hidden" name="advertiser_name[0]" id="advertiser_name" value="<?= (isset($item['advertiser_name']) ? $item['advertiser_name'] : '') ?>"  required>
                          <div class="div-form--link"> or <a href="javascript:;" id="btn-addnew0" onclick="$('#addnews-advertiser'+this.id.substring(10,this.id.length,10)).show();">Add new</a></div>
                        </div>
                      </div>
                      <div class="addnews-advertiser" id="addnews-advertiser0" style="display: none;">
                        <div class="row">
                          <div class="col-sm-14 offset-sm-1">
                            <div class="form-group row">
                              <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">New Advertiser</label>
                              <div class="col-sm-11 col-md-11 col-lg-12">
                                <input type="text" class="form-control" name="new_advertiser[0]">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Pageview:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <input type="text" class="form-control" name="pageview[0]" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Impression:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <input type="text" class="form-control" id="impression0" name="impression[0]" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">eCPM:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <input type="text" class="form-control" placeholder="Impression and Revenue field has been required" id="ecpm0" name="ecpm[0]" readonly required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Revenue (THB):</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <input type="text" class="form-control" id="revenue0" name="revenue[0]" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } 
                  else{ 
                    for($i=0;$i<count($item['pageview']);$i++){ ?>
                    <div class="box-ad--banner" id="item-card">
                    <div class="box-ad--title" id="item-title">Line item 1:</div>
                    <div class="box-ad--container">
                      <div class="form-group row">
                        <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                        <select class="custom-select" name="advertiser_id[<?= $i ?>]" onchange="document.getElementById('advertiser_name').value=this.options[this.selectedIndex].text">
                          <option <?= (!isset($item['advertiser_id'][$i]) ? 'selected' : '') ?> >Choose...</option>
                          <?php foreach($advertiser as $key=>$value){ ?>
                            <option <?= (isset($item['advertiser_id'][$i]) && $item['advertiser_id'][$i] ==$key ? 'selected' : '') ?> value="<?= $key ?>"><?= $value ?></option>
                          <?php } ?>
                        </select>
                        <input type="hidden" name="advertiser_name[<?= $i ?>]" id="advertiser_name" value="<?= (isset($item['advertiser_name'][$i]) ? $item['advertiser_name'][$i] : '') ?>"  required>
                          <div class="div-form--link"> or <a href="javascript:;" id="btn-addnew1" onclick="$('#addnews-advertiser<?= $i ?>').show();">Add new</a></div>
                        </div>
                      </div>
                      <div class="addnews-advertiser" id="addnews-advertiser<?= $i ?>" style="<?= (isset($item['new_advertiser'][$i]) ? '' : 'display:none;') ?>">
                        <div class="row">
                          <div class="col-sm-14 offset-sm-1">
                            <div class="form-group row">
                              <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">New Advertiser</label>
                              <div class="col-sm-11 col-md-11 col-lg-12">
                                <input type="text" class="form-control" name="new_advertiser[<?= $i ?>]" value="<?= (isset($item['new_advertiser'][$i]) ? $item['new_advertiser'][$i] : '') ?>" >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Pageview:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <input type="text" class="form-control" name="pageview[<?= $i ?>]" value="<?= (isset($item['pageview'][$i]) ? $item['pageview'][$i] : '') ?>"  required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Impression:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <input type="text" class="form-control" id="impression<?= $i ?>" name="impression[<?= $i ?>]" value="<?= (isset($item['impression'][$i]) ? $item['impression'][$i] : '') ?>"  required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">eCPM:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <input type="text" class="form-control" placeholder="Impression and Revenue field has been required" id="ecpm<?= $i ?>" name="ecpm[<?= $i ?>]" value="<?= (isset($item['ecpm'][$i]) ? $item['ecpm'][$i] : '') ?>"  required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Revenue (THB):</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <input type="text" class="form-control" id="revenue<?= $i ?>" name="revenue[<?= $i ?>]" value="<?= (isset($item['revenue'][$i]) ? $item['revenue'][$i] : '') ?>"  required>
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
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            orientation: "bottom"
        });

        
          $(document).on("keyup", 'input[id*="revenue"]', function () {
            var id = this.id;
            var index = id[id.length -1];
            var impression = parseFloat($('input[id="impression'+index+'"]').val());
            var revenue = parseFloat(this.value);
            if($('input[id="impression'+index+'"]').val().length !== 0 && this.value.length !== 0)
            {
              if(!isNaN((revenue/impression)*1000))
              {
                $('input[id="ecpm'+index+'"]').val(((revenue/impression)*1000).toFixed(2));
              }else{
                $('input[id="ecpm'+index+'"]').val("");
              }
            }else{
              $('input[id="ecpm'+index+'"]').val("");
            }
          });

          $(document).on("keyup", 'input[id*="impression"]', function () {
            var id = this.id;
            var index = id[id.length -1];
            var revenue = parseFloat($('input[id="revenue'+index+'"]').val());
            var  impression = parseFloat(this.value);
            if($('input[id="impression'+index+'"]').val().length !== 0 && this.value.length !== 0)
            {
              if(!isNaN((revenue/impression)*1000))
              {
                $('input[id="ecpm'+index+'"]').val(((revenue/impression)*1000).toFixed(2));
              }else{
                $('input[id="ecpm'+index+'"]').val("");
              }
            }else{
              $('input[id="ecpm'+index+'"]').val("");
            }
          });

        function addItems(){
            var count = $("div[id*='item-card']").length;
            //console.log(count);
            var Html= $("div[id*='item-card']").eq(0).clone();

                Html.find("a[id*='btn-addnew']").each(function() {
                  this.id= this.id.replace('0', count);
                });
                Html.find("div[id*='addnews-advertiser']").each(function() {
                    this.id= this.id.replace('0',count);
                });
                Html.find("input[name*='new_advertiser']").each(function() {  //Replace input name
                    this.name= this.name.replace('0', count);
                });

                Html.find('input').each(function() {  //Replace input name
                    this.name= this.name.replace('[0]', '['+count+']');
                    this.id= this.id.replace('0', count);
                });
                Html.find('select').each(function() {  //Replace input name
                    this.name= this.name.replace('[0]', '['+count+']');
                    this.value= '';
                });
                Html.find("input[type='hidden']").each(function() {  //Replace input name
                    this.id= this.id.replace('0', count);
                });
                Html.find("input[name*='advertiser_name']").each(function() {  //Replace input name
                  this.value= '';
                });
                Html.find("input[type='text']").each(function() {  //Replace input value
                    this.value= '';
                });
                Html.find("div[id*='item-title']").each(function() { //Replace box title
                    this.textContent = this.textContent.replace('Line item 1:','Line item '+(count+1)+':');
                });
                $('#campaign-item').append(Html);
                $("div[id='addnews-advertiser"+count+"']").hide();
                count++;
        }
      </script>
      @endsection
