@extends('layouts.app')
@section('title', 'Sale Inventory - Create Advertiser')
<style>
    input[type=text], select{
        width : 340px;
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

    ::-webkit-input-placeholder {
        text-align: center;
    }

    hr.ruler{
        border-top: 3px solid grey;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row col-md-12">
        
            <div class="card col-md-12">

            <div class="card-body">
                <h3>CREATE NEW ADVERTISER</h3>
                <div class="col-sm-12">
                {!! Form::open(['action' => ['AdvertiserController@storeAdvertiser', 'method' => 'POST']])!!}
                        <br/>
                        <b>Name :&nbsp</b> {{ Form::text('advertiser_name', (!empty($advertiser_name) ? $advertiser_name : ''),array('placeholder'=>'Advertiser Name')) }} <br/><br/>
                        <b>Tel no :&nbsp</b> {{ Form::text('customer_telephone', (!empty($customer_telephone) ? $customer_telephone : '')) }} <br/><br/>
                        <b>Email :&nbsp</b> {{ Form::text('customer_email', (!empty($customer_email) ? $customer_email : '')) }} <br/><br/>
                        
                        <div class="text-center">
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