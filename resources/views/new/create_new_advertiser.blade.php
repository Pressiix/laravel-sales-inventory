@extends('layouts.app')

@section('content')
<div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Create New Advertiser</h2>
          
          {!! Form::open(['action' => ['AdvertiserController@storeAdvertiser', 'method' => 'POST'],'onsubmit'=>'return confirm(\'Are you sure you wish to create advertiser?\')']) !!}
            <div class="content-pdb2">
              <div class="form-group row">
                <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Company name:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <input type="text" name="company_name" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-auto col-sm-5 col-md-4 col-lg-3 col-form-label pt-0">Company Type:</label>
                <div class="col-auto col-sm-10 col-md-11 col-lg-12">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="company_type" id="inlineRadio1" value="Direct" checked>
                    <label class="form-check-label" for="inlineRadio1">Direct</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="company_type" id="inlineRadio2" value="Agency">
                    <label class="form-check-label" for="inlineRadio2">Agency</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Company product:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <input type="text" name="company_product" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Company tel no:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <input type="text" name="company_telephone" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Company email:</label>
                <div class="col-sm-10 col-md-11 col-lg-12">
                  <input type="text" name="company_email" class="form-control">
                </div>
              </div>
            </div>

            <div>
              <div class="bar-title"><strong>Contact person</strong></div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Full name:</label>
                <div class="col-sm-6 mb-sm-0 mb-3">
                  <input type="text" name="advertiser_firstname" class="form-control" placeholder="First name">
                </div>
                <div class="col-sm-6">
                  <input type="text" name="advertiser_lastname" class="form-control" placeholder="Surname">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nickname:</label>
                <div class="col-sm-12">
                  <input type="text" name="advertiser_nickname" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tel no:</label>
                <div class="col-sm-12">
                  <input type="text" name="advertiser_telephone" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">E-mail:</label>
                <div class="col-sm-12">
                  <input type="text" name="advertiser_email" class="form-control">
                </div>
              </div>
            </div>

            <div class="text-center"><button type="submit" value="send" class="btn btn-submit">Confirm</button></div>

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
