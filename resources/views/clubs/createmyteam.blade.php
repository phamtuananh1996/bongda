@extends('pages.layout')
@section('main')

<link href="assets/dayday/assets/css/edit_profile.css" rel="stylesheet">
 <link href="assets/dayday/assets/css/photos1.css" rel="stylesheet">
	<div class="container page-content edit-profile">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- NAV TABS -->
            
         <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Chọn ảnh</h4>
            </div>
            <div class="modal-body">
            	<div class="row">
          		<div class="col-md-12">
            	<div id="grid" class="row">
              
            @foreach ($avatar_club as $avatar_club)
              
           
                <div class="mix col-sm-3  page3 page2 margin30 " id="img">
                    <div class="item-img-wrap ">
                        <img src="images/avatar_club/{{$avatar_club->link}}" width="100" height="100" alt="workimg">
                        <div class="item-img-overlay">
                            <a  class="show-image">
                                <span></span>
                            </a>
                        </div>
                    </div> 
                </div>
              
              @endforeach
                
                
                                                                  
            </div>
            </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-azure pull-right" data-dismiss="modal">Đóng</button>
            </div>
          </div>
          
        </div>
      </div>
          <!-- END NAV TABS -->
          <div class="tab-content profile-page">
            <!-- PROFILE TAB CONTENT -->
            <div class="tab-pane profile active" id="profile-tab">
              <div class="row">
                <div class="col-md-3">
                  <div class="user-info-left">
                  <form method="post" action="post_create_club" id="create_club_form">
                   {{ csrf_field() }}
                    <img src="images/avatar_club/fbc.png" id="avatar" width="200px" height="200px" alt="Profile Picture"/>
                    <h2></h2>
                    <div class="contact">
                      <p>
                        <span class="file-input btn btn-azure btn-file" data-toggle="modal" data-target="#myModal" >
                          Chọn ảnh khác 
                        </span>
                      </p>
                      <input type="hidden" value="images/avatar_club/fbc.png" name="avatar_club" id="avatar_club">
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
                        <span class="input-group-addon">Tên Đội Bóng</span>
                        <input  required type="text" name="name" class="form-control" placeholder="Tên Đội Bóng">
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">Số điện thoại</span>
                        <input value="{{$user_login->phone}}" required minlength="10" maxlength="11" type="number" name="phone" class="form-control" placeholder="number phone">
                      </div>
                    </div>
                     <label for="comment">(hãy chọn chính xác địa chỉ đội bóng.Điều này sẽ cho phép mọi người dễ tìm đội bóng của bạn hơn)</label>
                     <div class="row" style="margin-bottom: 10px">
                   <div class="form-group">
                   		<div class="col-sm-4">
                       <select class="form-control" required name="province" id="province">
                        <option value="">Tỉnh /Thành Phố</option>
                       	@foreach ($province as $province)
                       		 <option value="{{$province->provinceid}}">{{$province->name}}</option>
                       	@endforeach
                       
                       
                      </select>
                      </div>

                      <div class="col-sm-4">
                       <select class="form-control" required  name="district" id="district">
                        <option value="">Quận/Huyện</option>
                       
                      </select>
                      </div>

                      <div class="col-sm-4">
                       <select class="form-control" required name="ward" id="ward">
                        <option value="">Xã/Phường</option>
                        
                       
                      </select>
                      </div>
                    </div>
                      </div>
                    
                  			
                    <div class="form-group">
                    <label for="comment">Mô tả:</label>
                      <textarea minlength="10" maxlength="500" class="form-control" rows="5" name="describe" id="comment"></textarea>
                    </div>
                    
                    
                  		   <a id="create" class="btn btn-custom-primary pull-right"><i class="fa fa-floppy-o"></i> Tạo Đội Bóng</a>
                        </form>
                  	</div>

                    
                  </div>
                </div>
              </div>
            </div>
            <!-- END PROFILE TAB CONTENT -->
        
            <!-- ACTIVITY TAB CONTENT -->
          
            <!-- END ACTIVITY TAB CONTENT -->
         
            <!-- SETTINGS TAB CONTENT -->
          
            <!-- END SETTINGS TAB CONTENT -->
          </div>
        </div>    
      </div>
    </div>
   
    <script type="text/javascript">
    	$(document).ready(function() {


         $('#create_club_form').validate();


    	 $('#create').click(function(event) {
          $('#create_club_form').submit();
        });

        

    		$('#province').change(function(event) {

    			$.post('ajax/getdistrict', {provinceid: $(this).val()}, function(data, textStatus, xhr) {
    				$('#district').html('');
    				$('#district').append(data);
    				$('#ward').append('<option value="">Xã/Phường</option>');
    			});

    		});



    		$('#district').change(function(event) {

    			$.post('ajax/getward', {districtid: $(this).val()}, function(data, textStatus, xhr) {
    				$('#ward').html('');
    				$('#ward').append(data);
    			});

    		});


       



        $('#grid').on('click', '#img', function(event) {
          var l=$(this).find('img').attr('src');
          $('#avatar').attr('src', l);
          $('#avatar_club').val(l);
        });

    	});
    </script>

    @stop