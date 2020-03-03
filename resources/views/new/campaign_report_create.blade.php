@extends('layouts.app')

@section('content')
<div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Create Campaign Report</h2>
          <form>

            <div class="content-pdb">
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Report Type:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <select class="custom-select">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <select class="custom-select">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Campaign:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <input type="text" class="form-control">
                </div>
              </div>

              <div class="input-daterange datepicker">
                <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Start Date:</label>
                  <div class="col-sm-4">
                    <div class="input-group-inline">
                      <input type="text" class="form-control form-input--date d2" name="start">
                      <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                     <label class="col-form-label">End Date:</label>
                  </div>
                  <div class="col-sm-4">
                    <div class="input-group-inline">
                      <input type="text" class="form-control form-input--date d2" name="end">
                      <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="content-border">

              <div class="row">
                <div class="col-15 box--campaign">

                  <div class="box-ad--banner">
                    <div class="box-ad--title">Line item 1:</div>
                    <div class="box-ad--container">
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Name:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Date:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server impressions:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server clicks:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server CTR:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="box-ad--banner">
                    <div class="box-ad--title">Line item 2:</div>
                    <div class="box-ad--container">
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Name:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Date:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server impressions:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server clicks:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCampaign" class="col-sm-5 col-form-label">Ad server CTR:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                  

                  <div class="box-btn--addmore"><a href="javascript:;" class="btn btn-addmore">+ Create more line item</a></div>

                </div>
              </div>

            </div>

            <div class="text-center"><button type="submit" value="send" class="btn btn-submit">submit</button></div>



          </form>
        </div>
      </div>

<script>
window.history.pushState('campaign_report_create', 'Title', '/campaign_report');

    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    });

</script>
@endsection
