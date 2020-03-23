@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Ad Network</h2>
          <form>

            <div>
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <select class="custom-select">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <div class="div-form--link"> or <a href="javascript:;">Add new</a></div>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Impression:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">eCPM:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Revenue (THB):</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <input type="text" class="form-control">
                </div>
              </div>
            </div>

            <div class="text-center"><button type="submit" value="send" class="btn btn-submit">submit</button></div>



          </form>
        </div>
      </div>
    
      @endsection
