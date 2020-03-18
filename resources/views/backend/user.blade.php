@extends('layouts.app')

@section('content')
<div class="col-auto div-profile--right bg-fff">
          <div class="container content-profile--right" style="padding-left:40px;padding-right:40px;">
          <div class="row"><h2>User Data</h2></div>
            <table id="myTable" class="table table-bordered table-hover" style="width:100%">
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
                  <td><a href="/backend/users-destroy/<?= $item['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a></td>
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
                                  <input type="submit" id="submit_button" class="btn btn-success" value="save">
                                  {!! Form::close() !!}
                                </div>

                                <div class="form-group" id="process" style="display:none;padding-left:5px;padding-right:5px;">
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
                                    </div>
                                  </div>
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

          $(document).ready(function(){
            /*
            * PREGRESS BAR
            ***************************************************************
            */
            $('#form').on('submit', function(event){
              event.preventDefault();
              $.ajax({
              url:"/backend/role-assign",
              method:"POST",
              data:$(this).serialize(),
              beforeSend:function()
              {
                $('#submit_button').attr('disabled', 'disabled');
                $('#process').css('display', 'block');
              },
              success:function(data)
              {
                var percentage = 0;

                var timer = setInterval(function(){
                  percentage = percentage + 20;
                  progress_bar_process(percentage, timer);
                }, 1000);
              }
              })
            });

              function progress_bar_process(percentage, timer)
              {
                $('.progress-bar').css('width', percentage + '%');
                if(percentage > 100)
                {
                  clearInterval(timer);
                  $('#form')[0].reset();
                  $('#process').css('display', 'none');
                  $('.progress-bar').css('width', '0%');
                  $('#submit_button').attr('disabled', false);
                  location.reload();
                  setTimeout(function(){
                    $('#success_message').html('');
                  }, 5000);
                }
              }
            /*
            ***************************************************************
            */

            /*
            * DataTable
            **************************************************************
            */
            $('#myTable').DataTable();

            $("div[class='row']").css("width","100%");
            $("input[type='search']").css("width","100%");
            $("div[class*='col-sm-12']").css("width","100%").removeClass("col-sm-12");
            /*
            ***************************************************************
            */
          });
        </script>
@endsection