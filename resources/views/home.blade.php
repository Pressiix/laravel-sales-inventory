@extends('layouts.app')
@section('title', 'Sale Inventory - Home')

@section('content')
<div id="bkp-ad-description">
                        <div id="bkp-ad-card" class="box-ad--banner">
                          <div class="box-ad--title">Ad 1 Description:</div>
                          <div class="box-ad--container">
                            <div class="form-row">
                              <div class="col-md-5 mb-3">
                                <label>Size:</label>
                                <select name="bkp_size[0]" class="custom-select">
                                  <option selected="" value="">Choose Size</option>
                                  <option value="1">Billboard</option>
                                  <option value="2">Rectangle</option>
                                  <option value="3">Double-Rectangle</option>
                                  <option value="4">Boombox</option>
                                  <option value="5">Fullwidth</option>
                                  <option value="6">Leaderboard</option>
                                </select>
                                <div class="invalid-feedback">
                                  Please select a valid state.
                                </div>
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Position:</label>
                                <select name="bkp_position[0]" class="custom-select">
                                  <option selected="" value="">Choose Position</option>
                                  <option value="1">Top</option>
                                  <option value="2">Middle</option>
                                  <option value="3">Bottom</option>
                                  <option value="4">Left</option>
                                  <option value="5">Right</option>
                                </select>
                              </div>
                              <div class="col-md-5 mb-3">
                                <label>Section:</label>
                                <select name="bkp_section[0]" class="custom-select">
                                  <option selected="" value="">Choose Section</option>
                                  <option value="1">Homepage</option>
                                  <option value="2">Business</option>
                                  <option value="3">Social</option>
                                  <option value="4">Sport</option>
                                  <option value="5">Car</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="input-daterange datepicker">
                                <div class="input-group-inline"><span>Period:</span></div>
                                <div class="input-group-inline">
                                  <span>From</span>
                                  <input type="text" class="form-control form-input--date" name="bkp_date_from[0]">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                                <div class="input-group-inline">
                                  <span>to</span>
                                  <input type="text" class="form-control form-input--date" name="bkp_date_to[0]">
                                  <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputURL" class="col-md-4 col-lg-3 col-form-label label-normal">URL link banner:</label>
                              <div class="col-md-11 col-lg-12">
                                <input name="bkp_banner_url[0]" type="text" class="form-control">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-15 col-form-label label-normal">Impression: &nbsp; <a href="javascript:;" class="btn btn-click2">Click for booking inventory</a></div>
                            </div>
                          </div>
                        </div>
                        <div id="bkp-ad-card" class="box-ad--banner"><div class="box-ad--title">Ad 2 Description:</div><div class="box-ad--container"><div class="form-row"><div class="col-md-5 mb-3"><label>Size:</label><select name="bkp_size[1]" class="custom-select"><option selected="" value="">Choose Size</option><option value="1">Billboard</option><option value="2">Rectangle</option><option value="3">Double-Rectangle</option><option value="4">Boombox</option><option value="5">Fullwidth</option><option value="6">Leaderboard</option></select><div class="invalid-feedback">Please select a valid state.</div></div><div class="col-md-5 mb-3"><label>Position:</label><select name="bkp_position[1]" class="custom-select"><option selected="" value="">Choose Position</option><option value="1">Top</option><option value="2">Middle</option><option value="3">Bottom</option><option value="4">Left</option><option value="5">Right</option></select></div><div class="col-md-5 mb-3"><label>Section:</label><select name="bkp_section[1]" class="custom-select"><option selected="" value="">Choose Section</option><option value="1">Homepage</option><option value="2">Business</option><option value="3">Social</option><option value="4">Sport</option><option value="5">Car</option></select></div></div><div class="form-group"><div class="input-daterange datepicker"><div class="input-group-inline"><span>Period:</span></div><div class="input-group-inline"><span>From</span><input type="text" class="form-control form-input--date" name="bkp_date_from[1]"><span><img src="assets/images/icon-svg/calendar.svg" width="20"></span></div><div class="input-group-inline"><span>to</span><input type="text" class="form-control form-input--date" name="bkp_date_to[1]"><span><img src="assets/images/icon-svg/calendar.svg" width="20"></span></div></div></div><div class="form-group row"><label for="inputURL" class="col-md-4 col-lg-3 col-form-label label-normal">URL link banner:</label><div class="col-md-11 col-lg-12"><input name="bkp_banner_url[1]" type="text" class="form-control"></div></div><div class="row"><div class="col-15 col-form-label label-normal">Impression: &nbsp; <a href="javascript:;" class="btn btn-click2">Click for booking inventory</a></div></div></div></div></div>

<script>


    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#myTab a#posttoday-tab').on('click', function (e) {
      e.preventDefault()
      $('.nav-requestForm').addClass('tabs--ptd');
    })
    $('#myTab a#bangkokpost-tab').on('click', function (e) {
      e.preventDefault()
      $('.nav-requestForm').removeClass('tabs--ptd');
    })


</script>
@endsection