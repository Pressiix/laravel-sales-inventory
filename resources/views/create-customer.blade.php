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
                <h3>CREATE NEW CUSTOMER</h3>
                <div class="col-sm-12">
                {!! Form::open(['action' => ['AppController@storeCustomer', 'method' => 'POST']])!!}
                        <br/>
                        <b>Company name :&nbsp</b> {{ Form::text('company_name', (!empty($company_name) ? $company_name : '')) }} <br/><br/>
                        <b>Company type :&nbsp</b> {{ Form::radio('company_type', 'Direct') }} Direct &nbsp{{ Form::radio('company_type', 'Agency') }} Agency<br/><br/>
                        <b>Company product :&nbsp</b> {{ Form::text('company_product', (!empty($product) ? $product : '')) }} <br/><br/>
                        <b>Company tel no :&nbsp</b> {{ Form::text('company_telephone', (!empty($company_telephone) ? $company_telephone : '')) }} <br/><br/>
                        <b>Company email :&nbsp</b> {{ Form::text('company_email', (!empty($company_email) ? $company_email : '')) }} <br/><br/>
                        <br/><b style="font-size:18px;">Contact person </b><br/><hr class="ruler"><br/>
                        <b>Full name :&nbsp</b> {{ Form::text('customer_name', (!empty($customer_name) ? $customer_name : ''),array('placeholder'=>'First Name')) }} &nbsp {{ Form::text('customer_surname', (!empty($customer_surname) ? $customer_surname : ''),array('placeholder'=>'Surname')) }}<br/><br/>
                        <b>Nickname :&nbsp</b> {{ Form::text('customer_nickname', (!empty($customer_nickname) ? $customer_nickname : '')) }} <br/><br/>
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