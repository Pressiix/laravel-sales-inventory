@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Create Campaign Report</h2>
          {!! Form::open(['action' => ['CampaignController@store_campaign', 'method' => 'POST'],'name'=>'form','id'=>'form','enctype'=>'multipart/form-data'])!!}
            <?php if(isset($item['id'])){ ?>
              <input type="hidden" name='id' value="<?= $item['id'] ?>" readonly="">
            <?php }?>
            <input type="hidden" name="report_type_id" value="<?= (isset($item['report_type_id']) ? $item['report_type_id'] : '') ?>">
            <input type="hidden" name="report_type_name" value="<?= (isset($item['report_type_name']) ? $item['report_type_name'] : '') ?>">
            <div class="content-pdb">
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <div class="form-control-plaintext"><?= (isset($item['advertiser_name']) ? $item['advertiser_name'] : '') ?></div>
                  <input type="hidden" name="advertiser_id" value="<?= (isset($item['advertiser_id']) ? $item['advertiser_id'] : '') ?>">
                  <input type="hidden" name="advertiser_name" value="<?= (isset($item['advertiser_name']) ? $item['advertiser_name'] : '') ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Campaign:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <div class="form-control-plaintext"><?= (isset($item['campaign_name']) ? $item['campaign_name'] : '') ?></div>
                  <input type="hidden" name="campaign_name" value="<?= (isset($item['campaign_name']) ? $item['campaign_name'] : '') ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Start Date:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <div class="form-control-plaintext"><?= (isset($item['start']) ? date_format(date_create($item['start']),"d-m-Y") : '') ?></div>
                  <input type="hidden" name="start" value="<?= (isset($item['start']) ? $item['start'] : '') ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">End Date:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <div class="form-control-plaintext"><?= (isset($item['end']) ? date_format(date_create($item['end']),"d-m-Y") : '') ?></div>
                  <input type="hidden" name="end" value="<?= (isset($item['end']) ? $item['end'] : '') ?>">
                </div>
              </div>

            </div>

            <div class="content-pdb2">

          <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
              <thead class="thead-violet">
                <tr>
                  <th scope="col" class="text-nowrap">Line item</th>
                  <th scope="col">Date</th>
                  <th scope="col">Ad server Impressions</th>
                  <th scope="col">Ad server clicks</th>
                  <th scope="col">Ad server CTR</th>
                </tr>
              </thead>
              <tbody>
              <?php for($i=0;$i<count($item['item_name']);$i++){ ?>
                <tr>
                  <th scope="row" class="text-nowrap"><?= $item['campaign_name'] ?><input type="hidden" name="item_name[<?= $i ?>]" value="<?= (isset($item['item_name'][$i]) ? $item['item_name'][$i] : '') ?>"></th>
                  <td><?= $item['date'][$i] ?><input type="hidden" name="date[<?= $i ?>]" value="<?= (isset($item['date'][$i]) ? $item['date'][$i] : '') ?>"></td>
                  <td><?= $item['ad_server_impression'][$i] ?><input type="hidden" name="ad_server_impression[<?= $i ?>]" value="<?= (isset($item['ad_server_impression'][$i]) ? $item['ad_server_impression'][$i] : '') ?>"></td>
                  <td><?= $item['ad_server_click'][$i] ?><input type="hidden" name="ad_server_click[<?= $i ?>]" value="<?= (isset($item['ad_server_click'][$i]) ? $item['ad_server_click'][$i] : '') ?>"></td>
                  <td><?= $item['ad_server_ctr'][$i] ?>%<input type="hidden" name="ad_server_ctr[<?= $i ?>]" value="<?= (isset($item['ad_server_ctr'][$i]) ? $item['ad_server_ctr'][$i] : '') ?>"></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>

            </div>

            <div class="btn-2item">
              <div class="row">
                <div class="col-50 box-l"><input type="submit" name="action" value="Edit" class="btn btn-submit"></div>
                <div class="col-50 box-r"><input type="submit" name="action" value="Confirm" class="btn btn-submit"></div>
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

</script>
@endsection