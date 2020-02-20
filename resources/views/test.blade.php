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
</style>
<script>window.history.pushState('request-save', 'Title', '/request-form');</script>
@section('content')

    
        
            <div class="card col-md-12">

            <div class="card-body">
            <h3>TEST</h3>
                <div class="col-sm-12">
                
                {!! Form::select('test', $options) !!}
                    
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection