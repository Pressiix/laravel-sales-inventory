@extends('layouts.app')
<style>
    input[type=text], select{
        width : 380px;
    }

    input[class=wide-custom]{
        width : 230px;
    }

    select[class=wide-custom]{
        width : 150px;
    }

    b{
        font-weight: 900;
        width: 170px;
        display: inline-block;
    }

    input[type=submit]{
        width : 100px;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row col-md-12">
        
            <div class="card col-md-12">

            <div class="card-body">
            <h3>Request Preview</h3>
                <div class="col-sm-12">
                
                {!! Form::open(['action' => ['AppController@storeRequest', 'method' => 'POST']])!!}
                        <br/>
                        <b>Sales name :&nbsp</b> {{ $sales_name }} <br/><br/>
                        <b>Sales Type :&nbsp</b> {{ $sales_type }}<br/><br/>
                        <b>Customer name :&nbsp</b>{{ $customer_name }}<br/><br/>
                        <b>Campaign name :&nbsp</b> {{ $campaign_name }}<br/><br/>
                        
                         
                        <div class="row">
                            <div class="col-md-2"><b>Website :&nbsp</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                www.abc-company.co.th<br/><br/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"><b>Facebook :&nbsp</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                {{$facebook}}<br/><br/>
                            </div>
                        </div>

                        <b>Advertiser name :&nbsp</b> xxxxxx xxxxxxx 
                        <br/><br/>

                        <div class="row">
                            <div class="col-md-2"><b>Product :</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                xxxxx<br/><br/>
                            </div>
                        </div>

                        <div class="card col-md-12">
                            <div class="card-body">
                        <b style="font-size:20px;">Ad 1 Description : </b><br/><br/>
                        <b style="width:40px;">Size :&nbsp</b>300 x 250 &nbsp
                        <b style="width:65px;">Position :&nbsp</b>xxxxx &nbsp
                        <b style="width:60px;">Section :&nbsp</b>xxxxx </b><br/><br/>
                        <b style="width:60px;">Period: </b>from {{ Form::text('period_from', 'xx/xx/xxxx xx:xx:xx', array('class' => 'wide-custom')) }} to {{ Form::text('period_to', 'xx/xx/xxxx xx:xx:xx', array('class' => 'wide-custom')) }}<br/><br/>
                        <b>URL link banner:&nbsp </b>https://banner.com<br/><br/>
                        <b>Impression:&nbsp </b> xxxxxxxx<br/><br/>
                        </div></div>
                       <br/><br/>
                        <b>Campaign budget (THB): </b>xxxxxxxxxxx<br/><br/>
                        <b>Detail : </b>xxxxxxxxxxx<br/><br/>
                        <b>File : </b>xxxxxxxxxxx<br/><br/>
                        
                        <div class="text-center">
                            {!! Form::hidden('sales_name', $sales_name  ) !!}
                            {!! Form::hidden('sales_type', $sales_type  ) !!}
                            {!! Form::hidden('campaign_name', $campaign_name  ) !!}
                            {!! Form::hidden('facebook', $facebook  ) !!}
                            {!! Form::hidden('facebook_type', $facebook_type  ) !!}
                            {!! Form::hidden('create_at', $create_at  ) !!}

                            {!! Form::submit('Confirm', array( 'class'=>'btn btn-primary form-control' )) !!}
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection