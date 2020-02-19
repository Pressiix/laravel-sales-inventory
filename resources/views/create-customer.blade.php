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
                <h3>CREATE NEW CUSTOMER</h3>
                <div class="col-sm-12">
                {!! Form::open(['action' => ['AppController@storeCustomer', 'method' => 'POST']])!!}
                        <br/>
                        <b>Company name :&nbsp</b> {{ Form::text('company_name', 'Xxxxx Xxxxx') }} <br/><br/>
                        <b>Company type :&nbsp</b> {{ Form::radio('company_type', 'Direct') }} Direct &nbsp{{ Form::radio('company_type', 'Agency') }} Agency<br/><br/>
                        <b>Company product :&nbsp</b> {{ Form::text('company_name', 'Xxxxx Xxxxx') }} <br/><br/>
                        <b>Company tel no :&nbsp</b> {{ Form::text('company_telephone', 'Xxxxx Xxxxx') }} <br/><br/>
                        <b>Company email :&nbsp</b> {{ Form::text('company_email', 'Xxxxx Xxxxx') }} <br/><br/>
                        <b style="font-size:20px;">Contact person : </b><br/><br/>
                        <b>Company name :&nbsp</b> {{ Form::text('company_name', 'Xxxxx Xxxxx') }} &nbsp {{ Form::text('company_surname', 'Xxxxx Xxxxx') }}<br/><br/>
                        <b>Company name :&nbsp</b> {{ Form::text('company_name', 'Xxxxx Xxxxx') }} <br/><br/>
                        <b>Company name :&nbsp</b> {{ Form::text('company_name', 'Xxxxx Xxxxx') }} <br/><br/>
                        <b>Company name :&nbsp</b> {{ Form::text('company_name', 'Xxxxx Xxxxx') }} <br/><br/>
                        
                        <div class="text-center">
                            {!! Form::submit('Save', array( 'class'=>'btn btn-danger form-control' )) !!}
                        </div>
                        
                    {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection