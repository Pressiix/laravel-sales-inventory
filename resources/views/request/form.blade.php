@extends('layouts.app')
@section('title', 'Sale Inventory - Request Form')
<style>
    input[type=text], select{
        width : 50%;
    }

    input[class=wide-custom]{
        width : 230px;
    }

    select[class=wide-custom]{
        width : 150px;
    }

    b{
        font-weight: 900;
        width: 185px;
        display: inline-block;
    }

    input[type=submit]{
        width : 100px;
    }

    hr.ruler{
        border-top: 3px solid grey;
    }
    #ad-card{
        border-color: #00BAA5;
    }
    div.card-header{
        background-color:#E8F9F7;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    window.history.pushState('request-save', 'Title', '/request-form');
    var count = 1;
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

    
    function addAds(){
            console.log('aaa');
            
            var cardHeader = '<div class="card-header"><b style="font-size:20px;">Ad '+(count+1)+' Description :</b></div>';
            var size_form = '<b style="width:60px;">Size :&nbsp</b><select name="size['+count+']" class="wide-custom"><option value="L">Large</option><option value="S">Small</option></select>';
            var position_form = '<b style="width:75px;">&nbspPosition :&nbsp</b><select name="position['+count+']" class="wide-custom"><option value="L">Large</option><option value="S">Small</option></select>';
            var section_form = '<b style="width:70px;">&nbspSection :&nbsp</b><select name="section['+count+']" class="wide-custom"><option value="L">Large</option><option value="S">Small</option></select> </b><br/><br/>';
            var date_form = '<b style="width:60px;">Period: </b>from <input required="required" name="date_from['+count+']" type="date" class="wide-custom">&nbsp<i class="fa fa-calendar"></i> to <input required="required" name="date_to['+count+']" type="date" class="wide-custom">&nbsp<i class="fa fa-calendar"></i><br/><br/>';
            var banner_url = '<b>URL link banner:&nbsp </b><input required="required" name="banner_url['+count+']" type="text" value=""> <br/><br/>';
            var booking_link = '<b>Impression:&nbsp </b> <a href="/booking-inventory"><u><b>Click for booking inventory</b></u></a>';
            var cardBody = '<div class="card-body">'+size_form+position_form+section_form+date_form+banner_url+booking_link+'</div>';
                            
                            
            var div = $('<br/><div class="card" id="ad-card">'+cardHeader+cardBody+'</div>');
            //div.html('<');
            div.appendTo('#ad-description');
            count = count + 1;
        };
    
</script>
@section('content')
            <div class="card col-md-12">

            <div class="card-body">
            <h1>REQUEST FORMS</h1>
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
                                {{ Form::radio('type1[0]', 'Banner',(!empty($type1[0]) && $type1[0] === 'Banner' ? true : false)) }} Banner &nbsp
                                {{ Form::radio('type1[1]', 'Nytive Ad',(!empty($type1[1]) && $type1[1] === 'Nytive Ad' ? true : false)) }} Nytive Ad &nbsp
                                {{ Form::radio('type1[2]', 'Premium Advertorial',(!empty($type1[2]) && $type1[2] === 'Premium Advertorial' ? true : false)) }} Premium Advertorial<br/><br/>
                                {{ Form::radio('type1[3]', 'Advertorial',(!empty($type1[3]) && $type1[3] === 'Advertorial' ? true : false)) }} Advertorial &nbsp
                                {{ Form::radio('type1[4]', 'Property Listing',(!empty($type1[4]) && $type1[4] === 'Property Listing' ? true : false)) }} Property Listing &nbsp
                                {{ Form::radio('type1[5]', 'Special event',(!empty($type1[5]) && $type1[5] === 'Special event' ? true : false)) }} Special event <br/><br/>
                                {{ Form::radio('type1[6]', 'Sponsor Link',(!empty($type1[6]) && $type1[6] === 'Sponsor Link' ? true : false)) }} Sponsor Link &nbsp
                                {{ Form::radio('type1[7]', 'Jobs',(!empty($type1[7]) && $type1[7] === 'Jobs' ? true : false)) }} Jobs &nbsp 
                                {{ Form::radio('type1[8]', 'PR',(!empty($type1[8]) && $type1[8] === 'PR' ? true : false)) }} PR &nbsp <br/><br/>
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
                        <section class="ad-description" id="ad-description">
                            <div class="card" id="ad-card">
                                <div class="card-header"><b style="font-size:20px;">Ad 1 Description : </b></div>
                                <div class="card-body">
                                    <b style="width:60px;">Size :&nbsp</b>{{ Form::select('size[0]', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }}
                                    <b style="width:75px;">Position :&nbsp</b>{{ Form::select('position[0]', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }}
                                    <b style="width:70px;">Section :&nbsp</b>{{ Form::select('section[0]', array('L' => 'Large', 'S' => 'Small'), null, ['class' => 'wide-custom']) }} </b><br/><br/>
                                    <b style="width:60px;">Period: </b>from {!! Form::date('date_from[0]', null, ['class'=>'wide-custom','required'=>'required']) !!}&nbsp<i class="fa fa-calendar"></i> to {!! Form::date('date_to[0]', null, ['class'=>'wide-custom','required'=>'required']) !!}&nbsp<i class="fa fa-calendar"></i><br/><br/>
                                    <b>URL link banner:&nbsp </b>{{ Form::text('banner_url[0]', '', ['required']) }} <br/><br/>
                                    <b>Impression:&nbsp </b> <a href="/booking-inventory"><u><b>Click for booking inventory</b></u></a>
                                </div>
                            </div>
                        </section>

                        <br/><br/>
                        <button type="button" id="addAd" class="btn btn-primary btn-lg btn-block" OnClick="addAds()">+ ADD MORE AD</button><br/><br/>
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