@extends('pages.layout')
@section('main')
<link href="assets/dayday/assets/css/edit_profile.css" rel="stylesheet">

	<div class="container page-content edit-profile">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- NAV TABS -->
            <form method="post" action="editprofile" id="myform">
             {{ csrf_field() }}
          <ul class="nav nav-tabs nav-tabs-custom-colored tabs-iconized">
            <li class="active"><a href="#profile-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> Profile</a></li>
            <li class=""><a href="#activity-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-rss"></i> skin</a></li>
            @if($user_login->provider==null)
            <li class=""><a href="#settings-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> Settings</a></li>
            @endif
            <li class="pull-right"><a onclick="document.getElementById('myform').submit()" class="btn btn-custom-primary"><i class="fa fa-floppy-o"></i> Save Changes</a></li>
          </ul>
          <!-- END NAV TABS -->
          <div class="tab-content profile-page">
            <!-- PROFILE TAB CONTENT -->
            <div class="tab-pane profile active" id="profile-tab">
              <div class="row">
                <div class="col-md-3">
                  <div class="user-info-left">
                    <img src="{{$user_login->avatar}}" width="200px" alt="Profile Picture">
                    <h2>{{$user_login->name}}</h2>
                    <div class="contact">
                      <p>
                        <span class="file-input btn btn-azure btn-file">
                          Change Avatar <input type="file" multiple="">
                        </span>
                      </p>
                     
                      <ul class="list-inline social">
                        <li><a href="#" title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#" title="Twitter"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#" title="Google Plus"><i class="fa fa-google-plus-square"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-9">
                  <div class="user-info-right">

                  	<div class="basic-info">

                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">Name</span>
                        <input value="{{$user_login->name}}" type="text" name="name" class="form-control" placeholder="Username">
                      </div>
                    </div>

                   <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">phone</span>
                        <input value="{{$user_login->phone}}" type="number" class="form-control" placeholder="number phone">
                      </div>
                    </div>
                      
                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">birthday</span>
                        <input value="" type="date" class="form-control" placeholder="birthday">
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">Address</span>
                        <input value="{{$user_login->Address}}" type="text" class="form-control" placeholder="Address">
                      </div>
                    </div>
                  			
                    <div class="form-group">
                    <label for="comment">describe:</label>
                      <textarea class="form-control" rows="5" id="comment"></textarea>
                    </div>
                    
                    
                  		
                  	</div>

                    
                  </div>
                </div>
              </div>
            </div>
            <!-- END PROFILE TAB CONTENT -->
        
            <!-- ACTIVITY TAB CONTENT -->
            <div class="tab-pane profile " id="activity-tab">

              <div class="row">
                <div class="col-md-3">
                 
                    <img src="assets/dayday/img/photos/skill.svg" width="200">
                 
                </div>
                
                <div class="col-md-9">
                  <div class="user-info-right">

                    <div class="basic-info">

                     <div class="form-group">
                      
                      <select class="form-control" id="position">
                        <option>Position</option>
                        <option>Huấn luyện viên</option>
                        <option>Thủ môn</option>
                        <option>Trung vệ</option>
                        <option>Hậu vệ quét</option>
                        <option>Hậu vệ tự do</option>
                        <option>Hậu vệ cánh</option>
                        <option>Tiền vệ phòng ngự</option>
                        <option>Tiền vệ trung tâm</option>
                        <option>Tiền vệ chạy cánh</option>
                        <option>Tiền vệ tấn công</option>
                      </select>
                    </div>

                   <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">Chiều cao (cm)</span>
                        <input value="" type="number" class="form-control" placeholder="Chiều cao">
                      </div>
                    </div>
                      
                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">Cân nặng (kg) </span>
                        <input value="" type="number" class="form-control" placeholder="Cân nặng">
                      </div>
                    </div> 
                    <div class="form-group">
                    <label for="comment">Ưu điểm:</label>
                      <textarea class="form-control" rows="3" id="comment"></textarea>
                    </div>
                     <div class="form-group">
                    <label for="comment">Nhược điểm:</label>
                      <textarea class="form-control" rows="3" id="comment"></textarea>
                    </div>
                    
                      
                    </div>

                    
                  </div>
                </div>
              </div>
            </div>
            <!-- END ACTIVITY TAB CONTENT -->
          </form>
            <!-- SETTINGS TAB CONTENT -->
            <div class="tab-pane settings" id="settings-tab">
              <form class="form-horizontal" id="form_changepassword" method="post" role="form" action="change_password">
              {{csrf_field()}}
               <input type="hidden" id="id" name="id" value="{{$user_login->id}}">
                <fieldset>
                  <h3><i class="fa fa-square"></i> Change Password</h3>
                  <div class="form-group">
                    <label for="old-password" class="col-sm-3 control-label">Old Password</label>
                    <div class="col-sm-4">
                      <input type="password" id="oldpass" name="oldpassword" class="form-control">
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">New Password</label>
                    <div class="col-sm-4">
                      <input type="password" id="password" name="password" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password2" class="col-sm-3 control-label">Repeat Password</label>
                    <div class="col-sm-4">
                      <input type="password" id="password2" name="password2" class="form-control">
                    </div>
                  </div>
                </fieldset>
                
                <p class="text-center"><a id="submit" class="btn btn-custom-primary"><i class="fa fa-floppy-o"></i> Save Password</a></p>
              </form>
             
            </div>
            <!-- END SETTINGS TAB CONTENT -->
          </div>
        </div>    
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {

        $("#position").click(function(event) {
          
        });




























        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $("#submit").click(function(event) {
          $.post('ajax/checkpass', {id: $('#id').val(),oldpass: $('#oldpass').val()}, function(data, textStatus, xhr) {

          if(data==0)
          {
           if($("#password").val()==$("#password2").val())
           {
            if($("#password").val()=='')
            {
              $("#password").css({
                'border-color': 'red',
              });
            }
            else
            {
              if(($("#password").val().length>=6&&$("#password").val().length<50))
              {
               swal({
                title: "Are you sure?",
                text: "You will logout!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, logout!",
                closeOnConfirm: false
              },
              function(){
                $('#form_changepassword').submit();
              });

             }
              else
                {
                   $("#password").css({
                   'border-color': 'red',
                   });
                 }
            }
        
            }
            else
            {
                $("#password").css({
               'border-color': 'red',
                 });
                $("#password2").css({
                 'border-color': 'red',
                });
            }
         }
    else
    {
       $("#oldpass").css({
          'border-color': 'red',
        });
    }
    });
        });

      });
    </script>
@stop