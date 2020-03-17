@extends('layouts.app')

@section('content')
<div class="col-auto div-profile--right bg-fff">
          <div class="container content-profile--right" style="padding-left:40px;padding-right:40px;">
          <div class="row"><h2>User Data</h2></div>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>EMAIL</th>
                  <th>USERNAME</th>
                  <th>ROLE</th>
                  <th>ASSIGN</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($items as $item){ ?>
                <tr>
                  <td><?= $item['id'] ?></td>
                  <td><?= $item['email'] ?></td>
                  <td><?= $item['username'] ?></td>
                  <td><?= (!empty($item['role']) ? $item['role'][0] : '') ?></td>
                  <td><a href="#" data-target="#myModal" data-toggle="modal" class="btn btn-success" onclick="createHiddenField('<?= $item['id'] ?>','<?= (!empty($item['role']) ? $item['role'][0] : '')  ?>');">Role</a></td>
                  <td><a href="#" class="btn btn-danger">Delete</a></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>

                <!-- modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><b>Edit User Role</b></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body text-center">
                                
                                {!! Form::open(['action' => ['DevController@assignRoleToUser', 'method' => 'POST'],'name'=>'form','id'=>'form'])!!}
                                  <div class="form-group row">
                                    <label for="customerSelect" class="col-sm-6 col-md-6 col-lg-6 col-form-label">Role :</label>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                      <select name="role_name" class="form-control">
                                        <?php foreach($role_dropdown as $item){ ?>
                                          <option value="<?= $item ?>"><?= $item ?></option>
                                        <?php } ?>
                                      </select>
                                      <input type="hidden" id="user_id" name="user_id">
                                      <input type="hidden" id="old_role" name="old_role">
                                    </div>
                                  </div>
                                  <input type="submit" class="btn btn-success" value="save">
                                  {!! Form::close() !!}
                                </div>
                            </div>

                        </div>
                      </div>
        </div>
        <script>
        window.history.pushState('role-assign', 'Title', 'users-display');
          function createHiddenField(id,role)
          {
              document.getElementById("user_id").setAttribute("value", id);
              document.getElementById("old_role").setAttribute("value", role);
          }
        </script>
@endsection