@extends('layouts.app')

@section('content')
      <div class="col-auto div-profile--right bg-fff">
        <div class="content-profile--right">
          <div class="box-title">
            <h2>My Activities</h2>
            <div class="profile-period">
              <div class="profile-period--right">
                <div class="input-group input-daterange" id="datepicker">
                  <div class="input-group-addon">Period: From</div>
                  <input type="text" class="form-control form-input--date" name="start">
                  <div class="input-group-addon"><img src="assets/images/icon-svg/calendar.svg" width="20"> to</div>
                  <input type="text" class="form-control form-input--date" name="end">
                  <div class="input-group-addon"><img src="assets/images/icon-svg/calendar.svg" width="20"></div>
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
                <tr>
                  <th scope="row" class="text-center">1</th>
                  <td>28/2/2020 </td>
                  <td>Otto</td>
                  <td>Inventory</td>
                  <td>Xxxxx xxxxxxxxxxx xxxx</td>
                  <td>Approved</td>
                  <td class="text-center"><a href="javascript:;" class="btn btn-click">Click</a></td>
                </tr>
                <tr>
                  <th scope="row" class="text-center">2</th>
                  <td>28/2/2020 </td>
                  <td>Thornton</td>
                  <td>Inventory</td>
                  <td>Xxxxx xxxxxxxxxxx xxxx</td>
                  <td>Approved</td>
                  <td class="text-center"><a href="javascript:;" class="btn btn-click">Click</a></td>
                </tr>
                <tr>
                  <th scope="row" class="text-center">3</th>
                  <td>28/2/2020 </td>
                  <td>the Bird</td>
                  <td>Inventory</td>
                  <td>Xxxxx xxxxxxxxxxx xxxx</td>
                  <td>Approved</td>
                  <td class="text-center"><a href="javascript:;" class="btn btn-click">Click</a></td>
                </tr>
                <tr>
                  <th scope="row" class="text-center">4</th>
                  <td>28/2/2020 </td>
                  <td>the Fish</td>
                  <td>Inventory</td>
                  <td>Xxxxx xxxxxxxxxxx xxxx</td>
                  <td>Approved</td>
                  <td class="text-center"><a href="javascript:;" class="btn btn-click">Click</a></td>
                </tr>
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
      </script>
@endsection
