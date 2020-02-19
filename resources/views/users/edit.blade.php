@extends('layouts.app')
@section('title', 'Sale Inventory - My Profile')
<style>
    input{
        width:300px;
    }
    label{
        width:100px;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row col-md-12">
        <div class="card col-md-3">

                <div class="card-body">
                    <img src="image/avatar.png" alt="Avatar" style="display:block;margin: 0 auto;width:150px;height:150px;border-radius: 50%;">
                    
                    <div class="text-center">
                        <h4><b>{{ $user->name }}</b></h4>
                    </div>
                    <hr>
                    <a href="/profile">MY ACCOUNT</a><br/>
                    <a href="/pending-list">INBOX</a><br/>
                    <a href="#">MY ACTIVITIES</a>
                </div>
            </div><div class="col-md-1"></div>
            <div class="card col-md-8">

                <div class="card-body">
                <h3>My Account</h3><br/>
                
                {!! Form::open(['action' => ['UserController@update', 'method' => 'POST']])!!}
                    <div class="form-group">
                        <label for="usr">User name:</label>
                        <input type="text" name="name"  value="{{ $user->username }}" />
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="password"  value="123456789" />
                    </div>
                    <div class="form-group">
                        <label for="pwd">E-mail:</label>
                        <input type="email" name="email" value="{{ $user->email }}" />
                    </div>

                    <div class="form-group">
                        <label for="pwd">Telephoen:</label>
                        <input type="text" name="telephone" value="{{ $user->telephone }}" />
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Submit</button>
                {!! Form::close() !!}
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection