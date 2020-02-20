@extends('layouts.app')
@section('title', 'Sale Inventory - Request Form')
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
        width: 175px;
        display: inline-block;
    }

    input[type=submit]{
        width : 100px;
    }

    hr.ruler{
        border-top: 3px solid grey;
    }
</style>
<script type="text/javascript">
    window.history.pushState('request-save', 'Title', '/request-form');

    function createHiddenField(){
        customerField();
        advertiserField();
    }
    function customerField() {
        var selIndex = document.form.customer_id.selectedIndex;
		var selText = document.form.customer_id.options[selIndex].text;
		//alert(selText);

        var input = document.createElement("input");

        input.setAttribute("type", "hidden");
        input.setAttribute("name", "customer_name");
        input.setAttribute("value", selText);

        //append to form element that you want .
        document.getElementById("form").appendChild(input);
    };

    function advertiserField() {
        var selIndex = document.form.advertiser_id.selectedIndex;
		var selText = document.form.advertiser_id.options[selIndex].text;
		//alert(selText);

        var input = document.createElement("input");

        input.setAttribute("type", "hidden");
        input.setAttribute("name", "advertiser_name");
        input.setAttribute("value", selText);

        //append to form element that you want .
        document.getElementById("form").appendChild(input);
    };
</script>
@section('content')
            <div class="card col-md-12">

            <div class="card-body">
            <h3>REQUEST FORM</h3>
                <div class="col-sm-12">
                
                {!! Form::open(['action' => ['AppController@review', 'method' => 'POST'],'name'=>'form','id'=>'form'])!!}
                        <br/>
                        <b>Sales name :&nbsp</b> {{ $sales_name }} {{ Form::hidden('sales_name', $sales_name) }} <br/><br/>
                        <b>Sales Type :&nbsp</b> {{ Form::radio('sales_type', 'Direct', (!empty($sales_type) && $sales_type === 'Direct' ? true : false), ['required']) }} Direct &nbsp{{ Form::radio('sales_type', 'Agency', (!empty($sales_type) && $sales_type === 'Agency' ? true : false)) }} Agency<br/><br/>
                        <b>Customer name :&nbsp</b> {{ Form::select('customer_id', $customer, null, array('id' => 'customer_id')) }} 
                        &nbsp<a href="create-customer" target="_blank"><u><b>or create new customer</b></u></a><br/><br/>
                        <b>Campaign name :&nbsp</b> {{ Form::text('campaign_name', (!empty($campaign_name) ? $campaign_name : ''), ['required']) }}<br/><br/>
                        <b>Advertiser name :&nbsp</b> {{ Form::select('advertiser_id', $advertiser, null, array('id' => 'advertiser_id')) }} 
                        &nbsp<a href="create-advertiser" target="_blank"><u><b>or create new advertiser</b></u></a><br/><br/><br/><br/>
                         
                        <div class="row">
                            <div class="col-md-2"><b>Website :&nbsp</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                {{ Form::radio('website', 'Bangkok Post',(!empty($website) && $website === 'Bangkok Post' ? true : false), ['required']) }} Bangkok Post &nbsp
                                {{ Form::radio('website', 'Post Today',(!empty($website) && $website === 'Post Today' ? true : false), ['required']) }} Post Today
                            </div>
                        </div>
                        <hr class="ruler"/>

                        <div class="row">
                            <div class="col-md-2"><b>Type :</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                {{ Form::radio('type1', 'Banner', ['required']) }} Banner &nbsp
                                {{ Form::radio('type1', 'Nytive Ad', ['required']) }} Nytive Ad &nbsp
                                {{ Form::radio('type1', 'Premium Advertorial', ['required']) }} Premium Advertorial<br/><br/>
                                {{ Form::radio('type1', 'Advertorial', ['required']) }} Advertorial &nbsp
                                {{ Form::radio('type1', 'Property Listing', ['required']) }} Property Listing &nbsp
                                {{ Form::radio('type1', 'Special event', ['required']) }} Special event <br/><br/>
                                {{ Form::radio('type1', 'Sponsor Link', ['required']) }} Sponsor Link &nbsp
                                {{ Form::radio('type1', 'Jobs', ['required']) }} Jobs &nbsp 
                                {{ Form::radio('type1', 'PR', ['required']) }} PR &nbsp <br/><br/>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-2"><b>Facebook :&nbsp</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                {{ Form::radio('facebook', 'Bangkok Post', (!empty($facebook) && $facebook === 'Bangkok Post' ? true : false), ['required']) }} Bangkok Post &nbsp
                                {{ Form::radio('facebook', 'Post Today', (!empty($facebook) && $facebook === 'Post Today' ? true : false), ['required']) }} Post Today
                            </div>
                        </div>
                        <hr class="ruler"/>

                        <div class="row">
                            <div class="col-md-2"><b>Type :&nbsp</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                {{ Form::radio('facebook_type', 'Normal Post', (!empty($facebook_type) && $facebook_type === 'Normal Post' ? true : false), ['required']) }} Normal Post &nbsp
                                {{ Form::radio('facebook_type', 'Facebook Boost Post', (!empty($facebook_type) && $facebook_type === 'Facebook Boost Post' ? true : false), ['required']) }} Facebook Boost Post<br/><br/>
                            </div>
                        </div>
                        <br/>

                        <!-- AD DESCRIPTION -->
                        <div class="ad-description">
                            <div class="card">
                                <div class="card-header"><b style="font-size:20px;">Ad 1 Description : </b></div>
                                <div class="card-body">
                                    <b style="width:40px;">Size :&nbsp</b>{{ Form::select('advertiser_name', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }}
                                    <b style="width:65px;">Position :&nbsp</b>{{ Form::select('advertiser_name', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }}
                                    <b style="width:60px;">Section :&nbsp</b>{{ Form::select('advertiser_name', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }} </b><br/><br/>
                                    <b style="width:60px;">Period: </b>from {!! Form::date('date_from', null, ['class'=>'wide-custom','required'=>'required']) !!} to {!! Form::date('date_to', null, ['class'=>'wide-custom','required'=>'required']) !!}<br/><br/>
                                    <b>URL link banner:&nbsp </b>{{ Form::text('banner_url', 'https://banner.com', ['required']) }} <br/><br/>
                                    <b>Impression:&nbsp </b> <a href="/booking-inventory"><u><b>Click for booking inventory</b></u></a>
                                </div>
                            </div>
                        </div>

                        <br/><br/>
                        <button type="button" class="btn btn-primary btn-lg btn-block">+ ADD MORE AD</button><br/><br/>
                        <b>Campaign budget (THB): </b><input name="campaign_budget" type="number" min="1" step="any" value="<?= (!empty($campaign_budget)? $campaign_budget : '') ?>" required /><br/><br/>
                        <hr class="ruler"/>
                        <div class="text-center">
                            {!! Form::hidden('create_at', date("d-m-Y")  ) !!}
                            {!! Form::submit('Confirm', array( 'class'=>'btn btn-primary form-control','OnClick'=>'createHiddenField()' )) !!}
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection