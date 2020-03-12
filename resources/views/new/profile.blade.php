@extends('layouts.app')

@section('content')
        <div class="col-auto div-profile--right bg-fff">
          <div class="content-profile--right profile--form">
            <h2>My Account</h2>
            <div>
            {!! Form::open(['action' => ['UserController@update', 'method' => 'POST']])!!}
                <div class="form-group row">
                  <label for="inputUsername" class="col-sm-4 col-form-label">User name:</label>
                  <div class="col-sm-11">
                    <input type="text" class="form-control" id="inputUsername" value="{{ $user->username }}" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Password:</label>
                  <div class="col-sm-11">
                    <div class="btn-change" id="btn-change">Change</div>
                    <input type="password" class="form-control" name="password" id="inputPassword" value="12345678910" disabled>
                  </div>
                </div>
                <div class="change-password" id="change-password" style="display: none;">
                  <div class="row">
                    <div class="col-sm-14 offset-sm-1">
                      <div class="form-group row">
                        <label for="changePassword1" class="col-sm-5 col-form-label col-form-label-sm">Old Password:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control form-control-sm" id="changePassword1">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="changePassword2" class="col-sm-5 col-form-label col-form-label-sm">Confirm Password:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control form-control-sm" id="changePassword2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="changePassword3" class="col-sm-5 col-form-label col-form-label-sm">New Password:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control form-control-sm" id="changePassword3">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-4 col-form-label">E-mail:</label>
                  <div class="col-sm-11">
                    <input type="email" name="email" class="form-control" id="inputEmail" value="inventory@bangkokpost.co.th">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputMobile" class="col-sm-4 col-form-label">Mobile No:</label>
                  <div class="col-sm-11">
                    <input type="text" name="telephone" class="form-control" id="inputMobile" value="095-555-5555">
                  </div>
                </div>
                <div class="text-center"><button type="submit" value="send" class="btn btn-submit">submit</button></div>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
@endsection
