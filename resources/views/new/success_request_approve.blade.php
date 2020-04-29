@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-success">
         
          <div class="icn-success"><img src="assets/images/icon-svg/success.svg" class="img-fluid"></div>
          <div class="txt-success">
            <h2>Success</h2>
            <p>Your request has been approved successfully.<br>You can check its status at your activity dashboard.</p>
            <a href="/request_form" class="btn btn-submit">OK</a>
          </div>
      
        </div>
      </div>
    @endsection