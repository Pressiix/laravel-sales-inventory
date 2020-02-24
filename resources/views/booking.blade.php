@extends('layouts.app')
@section('title', 'Sale Inventory - Booking Inventory')
<style>
    input[type="radio"]{
        width:20px;
    }
    input[type="text"]{
        width:65%;
    }
    input[type="submit"]{
        width:200px;
    }
    label{
        width:100px;
    }
    input.draft{
        width:65%;
    }
    b.field_label{
        font-weight: 900;
        width: 180px;
        display: inline-block;
    }
    .center {
        margin: auto;
        width: 50%;
        border: 30px ;
        padding : 2px 10px 10px 2px;
    }
</style>

@section('content')

            <div class="card col-md-12">
                <div class="card-body">
                    <h1>BOOKING INVENTORY</h1><br/>
                    {!! Form::open(['action' => ['AppController@storeBooking', 'method' => 'POST'],'name'=>'form','id'=>'form','enctype'=>'multipart/form-data'])!!}
                        <br/>
                        
                        <div class="row">
                            <div class="col-md-2"><b class="field_label">Website :</b></div> 
                            <div class="col-md-10" >
                                {{ Form::radio('website', 'Bangkok Post',(!empty($website) && $website === 'Bangkok Post' ? true : false), ['required']) }} Bangkok Post &nbsp
                                {{ Form::radio('website', 'Post Today',(!empty($website) && $website === 'Post Today' ? true : false), ['required']) }} Post Today
                            </div>
                        </div>
                        <br/>
                        <div class="card" style="height:80px;background-color:#E9EFFB;">
                        <br/>
                            <div class="card-body center col-md-12 row" style="padding : 2px 5px 5px 2px;" >
                                <div class="col-md-9" style="padding-top: 10px;">
                                    <b style="padding-left: 50px;">Total Inventory left: <a style="color:blue;">100,000</a> impression</b>
                                </div>
                                <div class="col-md-3" style="padding-top: 5px;">
                                    <a href="https://google.co.th" target="_blank" class="btn btn-primary btn-lg" style="width:180px;">click to view dashboard</a>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <b class="field_label">Advertiser name :&nbsp</b> {{ Form::text('advertiser_name', '') }} 
                        <br/><br/>
                        <div class="row">
                            <div class="col-md-2"><b>Ad type :</b></div> 
                            <div class="col-md-10" >
                                {{ Form::radio('ad_type', 'Banner',(!empty($ad_type) && $ad_type === 'Banner' ? true : false), ['required']) }} Banner &nbsp
                                {{ Form::radio('ad_type', 'Native ad',(!empty($ad_type) && $ad_type === 'Native ad' ? true : false), ['required']) }} Native ad
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-2"><b>Device :</b></div> 
                            <div class="col-md-10" >
                                {{ Form::radio('device', 'Desktop',(!empty($device) && $device === 'Desktop' ? true : false), ['required']) }} Desktop &nbsp
                                {{ Form::radio('device', 'Mobile',(!empty($device) && $device === 'Mobile' ? true : false), ['required']) }} Mobile
                            </div>
                        </div>
                        <br/>
                        <b class="field_label">Impression needed :&nbsp</b> {{ Form::text('impression_need', '', array('class' => 'draft')) }} <button class="btn btn-lg btn-outline-primary">Save as draft</button>
                        <br/><br/>
                        <b class="field_label">Detail :&nbsp</b> {{ Form::text('detail', '') }}
                        <br/><br/>
                        <b class="field_label">Upload file :&nbsp</b> 
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <input type="file" name="file" required>
                        <br/><br/><br/>
                        <div class="text-center">
                            {!! Form::submit('Confirm', array( 'class'=>'btn btn-lg btn-primary' )) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        
@endsection