@extends('layouts.app')
@section('title', 'Sale Inventory - My Profile')
<style>
    input{
        width:50%;
    }
    label{
        width:100px;
        font-weight: bold;
    }
</style>
@section('content')

            <div class="card col-md-9">

                <div class="card-body">
                <h1>My Account</h1><br/>
                
                {!! Form::open(['action' => ['UserController@update', 'method' => 'POST']])!!}
                    <div class="form-group">
                        <label>User name:</label>
                        <input type="text" name="name"  value="{{ $user->username }}" disabled />
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password"  value="{{ $user->password }}" disabled />
                    </div>
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="email" name="email" value="{{ $user->email }}" />
                    </div>

                    <div class="form-group">
                        <label>Mobile No:</label>
                        <input type="text" name="telephone" value="{{ $user->telephone }}" />
                    </div>
                    
                    <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                {!! Form::close() !!}
                
                </div>
            </div>
@endsection