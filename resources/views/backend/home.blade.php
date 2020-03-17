@extends('layouts.app')

@section('content')
<div class="col-auto div-profile--right bg-fff">
          <div class="content-profile--right profile--form">
            <div>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>EMAIL</th>
                  <th>USERNAME</th>
                  <th>TELEPHONE</th>
                  <th>ROLE</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($user as $item){ ?>
                <tr>
                  <td><?= $item['id'] ?></td>
                  <td><?= $item['firstname'].' '.$item['lastname'] ?></td>
                  <td><?= $item['email'] ?></td>
                  <td><?= $item['username'] ?></td>
                  <td><?= $item['telephone'] ?></td>
                  <td><?= $item['role'] ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
@endsection