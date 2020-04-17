@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-success">
         
          <div class="icn-success"><img src="assets/images/icon-svg/success.svg" class="img-fluid"></div>
          <div class="txt-success">
            <h2>Success</h2>
            <p>The request has been submitted successfully.<br>You can check its status at your activity dashboard.</p>
            <a href="/campaign_report" class="btn btn-submit">OK</a>
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
