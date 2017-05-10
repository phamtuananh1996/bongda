@extends('pages.layout')
@section('main')
<link href="assets/dayday/assets/css/edit_profile.css" rel="stylesheet">
  <script src="assets/dayday/assets/js/jquery.1.11.1.min.js"></script>
   <script src="assets/dayday/assets/js/custom.js"></script>
	<script src="assets/dayday/bootstrap.3.3.6/js/bootstrap.min.js"></script>
	<div class="container page-content edit-profile">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- NAV TABS -->
            <form method="post" action="editprofile" id="myform">
             {{ csrf_field() }}
          <ul class="nav nav-tabs nav-tabs-custom-colored tabs-iconized">
            <li class="active"><a href="#profile-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> Profile</a></li>
            <li class=""><a href="#activity-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-rss"></i> skin</a></li>
            <li class=""><a href="#settings-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> Settings</a></li>
            <li class="pull-right"><a onclick="document.getElementById('myform').submit()" class="btn btn-custom-primary"><i class="fa fa-floppy-o"></i> Save Changes</a></li>
          </ul>
          <!-- END NAV TABS -->
          <div class="tab-content profile-page">
            <!-- PROFILE TAB CONTENT -->
            <div class="tab-pane profile active" id="profile-tab">
              <div class="row">
                <div class="col-md-3">
                  <div class="user-info-left">
                    <img src="{{$user_login->avatar}}" alt="Profile Picture">
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
            <div class="tab-pane activity" id="activity-tab">
            
             
            </div>
            <!-- END ACTIVITY TAB CONTENT -->
          </form>
            <!-- SETTINGS TAB CONTENT -->
            <div class="tab-pane settings" id="settings-tab">
              <form class="form-horizontal" role="form">
                <fieldset>
                  <h3><i class="fa fa-square"></i> Change Password</h3>
                  <div class="form-group">
                    <label for="old-password" class="col-sm-3 control-label">Old Password</label>
                    <div class="col-sm-4">
                      <input type="password" id="old-password" name="old-password" class="form-control">
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
                
                <p class="text-center"><a href="#" class="btn btn-custom-primary"><i class="fa fa-floppy-o"></i> Save Password</a></p>
              </form>
             
            </div>
            <!-- END SETTINGS TAB CONTENT -->
          </div>
        </div>    
      </div>
    </div>
    
@stop