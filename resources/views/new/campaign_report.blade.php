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
                  <div class="input-group-inline"><span><strong>Period:</strong></span></div>
                  <div class="input-group-inline">
                    <span>From</span>
                    <input type="text" class="form-control form-input--date" name="start">
                    <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                  </div>
                  <div class="input-group-inline">
                    <span>to</span>
                    <input type="text" class="form-control form-input--date" name="end">
                    <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                  </div>
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
                <tr>
                  <th scope="row">1</th>
                  <td>28/2/2020 </td>
                  <td>Otto</td>
                  <td>Inventory</td>
                  <td>Xxxxx xxxxxxxxxxx xxxx</td>
                  <td><a href="javascript:;" class="btn-click">Edit</a></td>
                  <td><a href="javascript:;" class="btn-click">Click</a></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>28/2/2020 </td>
                  <td>Thornton</td>
                  <td>Inventory</td>
                  <td>Xxxxx xxxxxxxxxxx xxxx</td>
                  <td><a href="javascript:;" class="btn-click">Edit</a></td>
                  <td><a href="javascript:;" class="btn-click">Click</a></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>28/2/2020 </td>
                  <td>the Bird</td>
                  <td>Inventory</td>
                  <td>Xxxxx xxxxxxxxxxx xxxx</td>
                  <td><a href="javascript:;" class="btn-click">Edit</a></td>
                  <td><a href="javascript:;" class="btn-click">Click</a></td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>28/2/2020 </td>
                  <td>the Fish</td>
                  <td>Inventory</td>
                  <td>Xxxxx xxxxxxxxxxx xxxx</td>
                  <td><a href="javascript:;" class="btn-click">Edit</a></td>
                  <td><a href="javascript:;" class="btn-click">Click</a></td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>28/2/2020 </td>
                  <td>the Fish</td>
                  <td>Inventory</td>
                  <td>Xxxxx xxxxxxxxxxx xxxx</td>
                  <td><a href="javascript:;" class="btn-click">Edit</a></td>
                  <td><a href="javascript:;" class="btn-click">Click</a></td>
                </tr>
                <tr>
                  <th scope="row">6</th>
                  <td>28/2/2020 </td>
                  <td>the Fish</td>
                  <td>Inventory</td>
                  <td>Xxxxx xxxxxxxxxxx xxxx</td>
                  <td><a href="javascript:;" class="btn-click">Edit</a></td>
                  <td><a href="javascript:;" class="btn-click">Click</a></td>
                </tr>
              </tbody>
            </table>
          </div>


        </div>
      </div>

<script>


    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    });

</script>
@endsection
