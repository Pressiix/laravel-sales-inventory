@extends('layouts.app')

@section('content')
      <div class="col-auto div-profile--right bg-fff">
        <div class="content-profile--right">
          <h2>Inbox - Pending lists</h2>
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
              <?php if($someModel){ ?>
                  <?php foreach($someModel as $item){ ?>
                  <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?=  $item['create_at'] ?></td>
                    <td><?=  $item['sales_name'] ?></td>
                    <td>Inventory<!--<?=  $item['sales_type'] ?>--></td>
                    <td><?=  $item['campaign_name'] ?></td>
                    <td style="<?= ($item['status'] == 'Waiting' ? 'color:red;' : 'color:green;') ?>"><b><?= $item['status'] ?></b></td>
                    <td class="text-center"><a href="/request_preview2/<?= $item['id'] ?>" class="btn btn-click">Click</a></td>
                  </tr>
              <?php } ?>
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
  @endsection
