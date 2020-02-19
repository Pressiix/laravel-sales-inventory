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
<script>window.history.pushState('request-save', 'Title', '/request-form');</script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row col-md-12">
        
            <div class="card col-md-12">

            <div class="card-body">
            <h3>REQUEST FORM</h3>
                <div class="col-sm-12">
                
                {!! Form::open(['action' => ['AppController@review', 'method' => 'POST']])!!}
                        <br/>
                        <b>Sales name :&nbsp</b> {{ Form::text('sales_name', $sales_name) }} <br/><br/>
                        <b>Sales Type :&nbsp</b> {{ Form::radio('sales_type', 'Direct') }} Direct &nbsp{{ Form::radio('sales_type', 'Agency') }} Agency<br/><br/>
                        <b>Customer name :&nbsp</b> {{ Form::select('customer_name', array('L' => 'Large', 'S' => 'Small')) }} 
                        &nbsp<a href="create-customer" target="_blank"><u><b>or create new customer</b></u></a><br/><br/>
                        <b>Campaign name :&nbsp</b> {{ Form::text('campaign_name', (!empty($campaign_name) ? $campaign_name : '')) }}<br/><br/>
                        <b>Advertiser name :&nbsp</b> {{ Form::select('advertiser_name', array('L' => 'Large', 'S' => 'Small')) }} 
                        &nbsp<a href="#"><u><b>or create new advertiser</b></u></a><br/><br/>
                         
                        <div class="row">
                            <div class="col-md-2"><b>Website :&nbsp</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                {{ Form::radio('website', 'Bangkok Post') }} Bangkok Post &nbsp
                                {{ Form::radio('website', 'Post Today') }} Post Today<br/><br/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"><b>Type :</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                {{ Form::radio('type1', 'Banner') }} Banner &nbsp
                                {{ Form::radio('type1', 'Nytive Ad') }} Nytive Ad &nbsp
                                {{ Form::radio('type1', 'Premium Advertorial') }} Premium Advertorial<br/><br/>
                                {{ Form::radio('type1', 'Advertorial') }} Advertorial &nbsp
                                {{ Form::radio('type1', 'Property Listing') }} Property Listing &nbsp
                                {{ Form::radio('type1', 'Special event') }} Special event <br/><br/>
                                {{ Form::radio('type1', 'Sponsor Link') }} Sponsor Link &nbsp
                                {{ Form::radio('type1', 'Jobs') }} Jobs &nbsp 
                                {{ Form::radio('type1', 'PR') }} PR &nbsp <br/><br/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"><b>Facebook :&nbsp</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                {{ Form::radio('facebook', 'Bangkok Post') }} Bangkok Post &nbsp
                                {{ Form::radio('facebook', 'Post Today') }} Post Today<br/><br/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"><b>Type :&nbsp</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                {{ Form::radio('facebook_type', 'Normal Post') }} Normal Post &nbsp
                                {{ Form::radio('facebook_type', 'Facebook Boost Post') }} Facebook Boost Post<br/><br/>
                            </div>
                        </div>
                        
                        <b style="font-size:20px;">Ad 1 Description : </b><br/><br/>
                        <b style="width:40px;">Size :&nbsp</b>{{ Form::select('advertiser_name', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }}
                        <b style="width:65px;">Position :&nbsp</b>{{ Form::select('advertiser_name', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }}
                        <b style="width:60px;">Section :&nbsp</b>{{ Form::select('advertiser_name', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }} </b><br/><br/>
                        <b style="width:60px;">Period: </b>from {{ Form::text('period_from', 'xx/xx/xxxx xx:xx:xx', array('class' => 'wide-custom')) }} to {{ Form::text('period_to', 'xx/xx/xxxx xx:xx:xx', array('class' => 'wide-custom')) }}<br/><br/>
                        <b>URL link banner:&nbsp </b>{{ Form::text('banner_url', 'https://banner.com') }} <br/><br/>
                        <b>Impression:&nbsp </b> <a href="#"><u><b>Click for booking inventory</b></u></a><br/><br/>

                        <!--<b style="font-size:20px;">Ad 2 Description : </b><br/><br/>
                        <b style="width:40px;">Size :&nbsp</b>{{ Form::select('advertiser_name', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }}
                        <b style="width:65px;">Position :&nbsp</b>{{ Form::select('advertiser_name', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }}
                        <b style="width:60px;">Section :&nbsp</b>{{ Form::select('advertiser_name', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }} </b><br/><br/>
                        <b style="width:60px;">Period: </b>from {{ Form::text('period_from', 'xx/xx/xxxx xx:xx:xx', array('class' => 'wide-custom')) }} to {{ Form::text('period_to', 'xx/xx/xxxx xx:xx:xx', array('class' => 'wide-custom')) }}<br/><br/>
                        <b>URL link banner:&nbsp </b>{{ Form::text('banner_url', 'https://banner.com') }} <br/><br/>
                        <b>Impression:&nbsp </b> <a href="#"><u><b>Click for booking inventory</b></u></a><br/><br/>-->
                        <a href="#"><u><b>Add more ad +</b></u></a><br/><br/>
                        <b>Campaign budget (THB): </b>{{ Form::text('campaign_budget', '#####') }}<br/><br/>
                        
                        <div class="text-center">
                            {!! Form::hidden('create_at', date("Y-m-d h:i:s")  ) !!}
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