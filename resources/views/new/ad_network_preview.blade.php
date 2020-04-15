@extends('layouts.app')

@section('content')
<div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Preview Ad Network</h2>
          {!! Form::open(['action' => ['AdNetworkController@ad_network_store', 'method' => 'POST'],'name'=>'form','id'=>'form','enctype'=>'multipart/form-data'])!!}
          <?php if(isset($item['id'])){ ?>
              <input type="hidden" name='id' value="<?= $item['id'] ?>">
            <?php } ?>
            <div class="content-pdb">
              <div class="input-daterange datepicker">
                <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Start Date:</label>
                  <div class="col-sm-4">
                    <div class="input-group-inline"><?= $item['start'] ?></div>
                    <input type="hidden" name="start" value="<?= $item['start'] ?>">
                  </div>
                  <div class="col-sm-3">
                     <label class="col-form-label">End Date:</label>
                  </div>
                  <div class="col-sm-4">
                    <div class="input-group-inline"><?= $item['end'] ?></div>
                    <input type="hidden" name="end" value="<?= $item['end'] ?>">
                  </div>
                </div>
              </div>

            </div>

            <div class="content-border">

              <div class="row">
                <div class="col-15 box--adsnetwork">

                <div id="campaign-item">
                <?php if(isset($item['advertiser_id'])){ 
                    for($i=0;$i<count($item['advertiser_id']);$i++){ ?>
                    <div class="box-ad--banner" id="item-card">
                    <div class="box-ad--title" id="item-title">Line item 1:</div>
                    <div class="box-ad--container">
                      <div class="form-group row">
                        <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                        <?php if(!isset($item['new_advertiser'][$i])){ ?>
                          <?= $item['advertiser_name'][$i] ?>
                          <input type="hidden" name="advertiser_id[<?= $i ?>]" id="advertiser_id" value="<?= (isset($item['advertiser_id'][$i]) ? $item['advertiser_id'][$i] : '') ?>" />
                          <input type="hidden" name="advertiser_name[<?= $i ?>]" id="advertiser_name" value="<?= (isset($item['advertiser_name'][$i]) ? $item['advertiser_name'][$i] : '') ?>" />
                        <?php }else{ ?>
                          <?= $item['new_advertiser'][$i] ?>
                          <input type="hidden" name="new_advertiser[<?= $i ?>]" id="new_advertiser" value="<?= (isset($item['new_advertiser'][$i]) ? $item['new_advertiser'][$i] : '') ?>" />
                        <?php } ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Pageview:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <?= $item['pageview'][$i] ?> 
                          <input type="hidden" class="form-control" name="pageview[<?= $i ?>]" value="<?= (isset($item['pageview'][$i]) ? $item['pageview'][$i] : '') ?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Impression:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <?= $item['impression'][$i] ?> 
                          <input type="hidden" class="form-control" name="impression[<?= $i ?>]" value="<?= (isset($item['impression'][$i]) ? $item['impression'][$i] : '') ?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">eCPM:</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <?= $item['ecpm'][$i] ?> 
                          <input type="hidden" class="form-control" name="ecpm[<?= $i ?>]" value="<?= (isset($item['ecpm'][$i]) ? $item['ecpm'][$i] : '') ?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Revenue (THB):</label>
                        <div class="col-sm-11 col-md-11 col-lg-12">
                          <?= $item['revenue'][$i] ?> 
                          <input type="hidden" class="form-control" name="revenue[<?= $i ?>]" value="<?= (isset($item['revenue'][$i]) ? $item['revenue'][$i] : '') ?>" >
                        </div>
                      </div>
                    </div>
                  </div>
                    <?php } 
                  } ?>
                  </div>
                </div>
              </div>

            </div>
            <div class="btn-2item">
              <div class="row" style="position:center;">
                <div class="col-50 box-l"><input type="submit" name="action" value="Edit" class="btn btn-submit"></div>
                <div class="col-20 box-l"><input type="submit" name="action" value="Submit" class="btn btn-submit"></div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
      </div>
      @endsection
