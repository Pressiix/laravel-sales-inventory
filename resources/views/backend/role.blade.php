@extends('layouts.app')

@section('content')
<div class="col-auto div-profile--right bg-fff">
          <div class="container content-profile--right" style="padding-left:40px;padding-right:40px;">
            <div class="row"><h2>Role Data</h2></div>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($items as  $key => $item){ ?>
                <tr>
                  <td><?= $key ?></td>
                  <td><?= $item ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
@endsection