@extends('layouts.app')
@section('title', 'Sale Inventory - Request Preview')
<style>
    input[type=text], select{
        width : 150px;
        text-align: center; 
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
    #ad-card{
        border-color: #00BAA5;
    }
    div.card-header{
        background-color:#E8F9F7;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row col-md-12">
        
            <div class="card col-md-12">

            <div class="card-body">
            <h1>Request Preview</h1>
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
                                {{$website}}<br/><br/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"><b>Facebook :&nbsp</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                {{$facebook}}<br/><br/>
                            </div>
                        </div>

                        <b>Advertiser name :&nbsp</b> {{ $advertiser_name }} 
                        <br/><br/>

                        <div class="row">
                            <div class="col-md-2"><b>Product :</b></div> 
                            <div class="col-md-9" style="left:16px;">
                                xxxxx<br/><br/>
                            </div>
                        </div>
                        <?php 
                            $count_desc = count($size);
                            
                            for($i=0;$i<$count_desc;$i++){ 
                        ?>
                        <div class="card " id="ad-card">
                            <div class="card-header"><b style="font-size:20px;">Ad {{$i+1}} Description : </b></div>
                            <div class="card-body">
                                <b style="width:60px;">Size :&nbsp</b>{{ $size[$i] }} &nbsp
                                <b style="width:75px;">Position :&nbsp</b>{{ $position[$i] }} &nbsp
                                <b style="width:70px;">Section :&nbsp</b>{{ $section[$i] }} </b><br/><br/>
                                <b style="width:60px;">Period: </b>from <input type="text" value="<?= $date_from[$i] ?>" disabled>  to <input type="text" value="<?= $date_to[$i] ?>" disabled><br/><br/>
                                <b>URL link banner:&nbsp </b>{{ $banner_url[$i]}}<br/><br/>
                                <b>Impression:&nbsp </b> xxxxxxxx<br/><br/>
                            </div>
                            {!! Form::hidden('size[$i]', $size[$i]) !!}
                            {!! Form::hidden('position[$i]', $position[$i]) !!}
                            {!! Form::hidden('section[$i]', $section[$i]) !!}
                            {!! Form::hidden('date_from[$i]', $date_from[$i]) !!}
                            {!! Form::hidden('date_to[$i]', $date_to[$i]) !!}
                            {!! Form::hidden('banner_url[$i]', $banner_url[$i]) !!}
                        </div>
                        <br/>
                        <?php 
                                }
                         ?> 

                        <br/><br/>
                        <b>Campaign budget (THB): </b>{{ $campaign_budget }}<br/><br/>
                        <b>Detail : </b>xxxxxxxxxxx<br/><br/>
                        <b>File : </b>xxxxxxxxxxx<br/><br/>
                        
                        <div class="text-center" id="hidden-form">
                            {!! Form::hidden('sales_name', $sales_name) !!}
                            {!! Form::hidden('sales_type', $sales_type) !!}
                            {!! Form::hidden('customer_id', $customer_id) !!}
                            {!! Form::hidden('customer_name', $customer_name) !!}
                            {!! Form::hidden('campaign_name', $campaign_name) !!}
                            {!! Form::hidden('advertiser_id', $advertiser_id) !!}
                            {!! Form::hidden('advertiser_name', $advertiser_name) !!}
                            {!! Form::hidden('website', $website) !!}
                            {!! Form::hidden('facebook', $facebook) !!}
                            {!! Form::hidden('facebook_type', $facebook_type  ) !!}
                            {!! Form::hidden('create_at', $create_at) !!}
                            {!! Form::hidden('campaign_budget', $campaign_budget  ) !!}
                            <br/>
                            <div class="form-group row" >
                                <div class="col-md-6" >
                                    {!! Form::submit('Edit', array('name'=>'action', 'class'=>'btn btn-warning form-control' )) !!}
                                </div>
                                <div class="col-md-6" >   
                                    {!! Form::submit('Submit', array('name'=>'action','class'=>'btn btn-primary form-control')) !!}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection