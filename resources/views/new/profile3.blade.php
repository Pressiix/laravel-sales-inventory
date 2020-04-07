@extends('layouts.app')

@section('content')
      <div class="col-auto div-profile--right bg-fff">
        <div class="content-profile--right">
        <div class="box-title">
            <h2>My Activities</h2>
            <div class="profile-period">
              <div class="form-group">
                 <div class="input-daterange datepicker" id="datepicker">
                 {{ Form::open(['route' => '/profile3', 'method' => 'GET'])}}
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
          </div>

          <div class="table-responsive table-profile">
            <table class="table table-striped table-borderless">
              <thead class="thead-green">
                <tr>
                  <th scope="col" class="text-center">Row</th>
                  <th scope="col" class="text-nowrap">Date received</th>
                  <th scope="col" class="text-nowrap">Requester Name</th>
                  <th scope="col">Type</th>
                  <th scope="col" class="text-nowrap">Campaign Name</th>
                  <th scope="col">Status</th>
                  <th scope="col" class="text-center">Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php if($someModel){ $i=1; ?>
                  <?php foreach($someModel as $item){ ?>
                  <tr>
                    <td><?= $i/*$item['id']*/ ?></td>
                    <td><?=  $item['create_at'] ?></td>
                    <td><?=  $item['sales_name'] ?></td>
                    <td>Inventory<!--<?=  $item['sales_type'] ?>--></td>
                    <td><?=  $item['campaign_name'] ?></td>
                    <td style="<?= ($item['status'] == 'Waiting' ? 'color:red;' : 'color:green;') ?>"><b><?= $item['status'] ?></b></td>
                    <td class="text-center"><a href="/request_preview2/<?= $item['id'] ?>" class="btn btn-click">Click</a></td>
                  </tr>
              <?php $i++; } ?>
              <?php }else{ ?>
                  <tr>
                    <td class="text-center" colspan="7"><b>No Data</b></td>
                  </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>

      <script>
          $('#datepicker').datepicker({
              autoclose: true,
              todayHighlight: true
          });

          //$("input[type='submit']").value() = "";
      </script>
@endsection
