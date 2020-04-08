@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-inventory">
          <div class="box-title">
            <h2>Campaign Report</h2>
            <div class="btn-create"><a href="/campaign_report_create">Create Campaign Report</a></div>
          </div>
          <form>
            <div class="content-pdb2">
              <div class="form-group">
                 <div class="input-daterange datepicker">
                 {!! Form::open(['action' => ['CampaignController@campaign_report', 'method' => 'GET']])!!}
                  <div class="input-group-inline"><span><strong>Period:</strong></span></div>
                  <div class="input-group-inline">
                    <span>From</span>
                    <input type="text" class="form-control form-input--date" name="start" autocomplete="off">
                    <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                  </div>
                  <div class="input-group-inline">
                    <span>to</span>
                    <input type="text" class="form-control form-input--date" name="end" autocomplete="off">
                    <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                  </div>
                  <button type="submit" class="btn btn-click2">Apply</button>
                  {{ Form::close() }}
                </div>
              </div>
            </div>
          </form>

          <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
              <thead class="thead-violet">
                <tr>
                  <th scope="col">Row</th>
                  <th scope="col">Report Date</th>
                  <th scope="col" class="text-nowrap">Advertiser Name</th>
                  <th scope="col">Report Type</th>
                  <th scope="col" class="text-nowrap">Campaign Name</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Download</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0; foreach($item as $value){ ?>
                <tr>
                  <th scope="row"><?= $i+1 ?></th>
                  <td><?= $value['report_date'] ?></td>
                  <td><?= $value['advertiser_name'] ?></td>
                  <td><?= $value['report_type'] ?></td>
                  <td><?= $value['campaign_name'] ?></td>
                  <td><a href="/campaign_report_preview2/<?= $value['id'] ?>" class="btn-click">Edit</a></td>
                  <td><a href="/campaign_report_download/<?= $value['id'] ?>" target="_blank" class="btn-click">Click</a></td>
                </tr>
                <?php $i++; } ?>
              </tbody>
            </table>
          </div>


        </div>
      </div>

<script>


    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        orientation: "bottom"
    });

</script>
@endsection
