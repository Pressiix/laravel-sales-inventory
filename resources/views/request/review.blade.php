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