
  @extends('pages.layout')
  @section('main')
 <p>Your Location: <span id="location"></span></p>
 
    <!-- Begin page content -->
    <div class="container page-content ">
      
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
            <form method="post" action="post" id="fm_post">
               {{ csrf_field() }}
             <div class="form-group">
             <label for="comment">Lời thách đấu:</label>
              <textarea class="form-control" required maxlength="1000" minlength="3" rows="3"  name="content" id="comment"></textarea>
            </div>
            <div class="form-group">
              <div class="input-group col-md-12">
              <label for="phone">Số điện thoại liện hệ:</label>

                <input value="{{$user_login->phone}}" required  minlength="10" maxlength="11" type="number" name="phone" class="form-control col-sm-12" placeholder="number phone"/>

              </div>
            </div>
            <div class="form-group">
              <div class="input-group col-md-12">
              <label for="phone">Địa điểm: <a id="get_place">Lấy địa điểm của bạn</a> </label>
                  <input id="place" readonly required type="text" name="place" class="form-control col-sm-12" placeholder="Địa điểm"/>
              </div>
            </div>
            <div class="form-group">
              <label for="team">Thông tin đội bóng của bạn:</label>
              @if ($user_login->idclub)
              <select class="form-control" required name="position" id="position">
                <option value="">Position</option>
              </select>
              @else
                (Bạn chưa có đội bóng ,hãy tạo đội hoặc gia nhập đội bóng gần bạn để mọi người biết thông tin về đội bóng của bạn)
              @endif

            </div>
             <input type="hidden" id="latitude" name="latitude">
             <input type="hidden" id="longtitude" name="longtitude">
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" id="post_form" class="btn btn-azure pull-right">Đăng bài tìm đối thủ</button>
            </div>
          </div>
          
        </div>
      </div>


      
      <div class="row">

        <!-- left links -->
        <div class="col-md-3">
          <div class="profile-nav">
            <div class="widget">
              <div class="widget-body">
                <div class="user-heading round">
                  <a href="profile">
                      <img src="{{$user_login->avatar}}" alt="">
                  </a>
                  <h1>{{$user_login->name}}</h1>
                  <p></p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="#"> <i class="fa fa-user"></i> News feed</a></li>
                  <li>
                    <a href="#"> 
                      <i class="fa fa-envelope"></i> Messages 
                      <span class="label label-info pull-right r-activity">9</span>
                    </a>
                  </li>
                  <li><a href="#"> <i class="fa fa-calendar"></i> Events</a></li>
                  <li><a href="#"> <i class="fa fa-image"></i> Photos</a></li>
                  <li><a href="#"> <i class="fa fa-share"></i> Browse</a></li>
                  <li><a href="#"> <i class="fa fa-floppy-o"></i> Saved</a></li>
                </ul>
              </div>
            </div>

            <div class="widget">
              <div class="widget-body">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="#"> <i class="fa fa-globe"></i> Pages</a></li>
                  <li><a href="#"> <i class="fa fa-gamepad"></i> Games</a></li>
                  <li><a href="#"> <i class="fa fa-puzzle-piece"></i> Ads</a></li>
                  <li><a href="#"> <i class="fa fa-home"></i> Markerplace</a></li>
                  <li><a href="#"> <i class="fa fa-users"></i> Groups</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- end left links -->


        <!-- center posts -->
        <div class="col-md-6">
          <div class="row">
            <!-- left posts-->
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                <!-- post state form -->
                  <div class="box profile-info n-border-top" >
                    
                    <div class="box-footer box-form " id="post">
                     
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-azure ">Trạng thái</button>
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-azure ">Nhận Đá hộ</button>
                         <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-azure ">Tìm người 'chữa cháy'</button>
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-azure ">Đăng bài tìm đối thủ</button>
                        <ul class="nav nav-pills">
                            
                        </ul>
                    </div>
                  </div><!-- end post state form -->
                  @foreach ($post as $post)
                  
                  <!--   posts -->
                  <div class="box box-widget">
                    <div class="box-header with-border">
                      <div class="user-block">
                        <img class="img-circle" src="{{$post->user->avatar}}" alt="User Image">
                        <span class="username"><a href="#">{{$post->user->name}}</a></span>
                        <span class="description">{{$post->created_at}}</span>
                      </div>
                    </div>

                    <div class="box-body" style="display: block;">
                     
                      <p style="font-size: 30px">{{$post->content}}</p>
                      <p style="font-size: 20px">Liên hệ : {{$post->phone}}</p>
                      <p style="font-size: 20px">Địa điểm : {{$post->place}}</p>
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                      <span class="pull-right text-muted">127 likes - 3 comments</span>
                    </div>
                    <div class="box-footer box-comments" style="display: block;">
                      <div class="box-comment">
                        <img class="img-circle img-sm" src="img/Friends/guy-2.jpg" alt="User Image">
                        <div class="comment-text">
                          <span class="username">
                          Maria Gonzales
                          <span class="text-muted pull-right">8:03 PM Today</span>
                          </span>
                          It is a long established fact that a reader will be distracted
                          by the readable content of a page when looking at its layout.
                        </div>
                      </div>

                      <div class="box-comment">
                        <img class="img-circle img-sm" src="img/Friends/guy-3.jpg" alt="User Image">
                        <div class="comment-text">
                          <span class="username">
                          Luna Stark
                          <span class="text-muted pull-right">8:03 PM Today</span>
                          </span>
                          It is a long established fact that a reader will be distracted
                          by the readable content of a page when looking at its layout.
                        </div>
                      </div>
                    </div>
                    <div class="box-footer" style="display: block;">
                      <form action="#" method="post">
                        <img class="img-responsive img-circle img-sm" src="img/Friends/guy-3.jpg" alt="Alt Text">
                        <div class="img-push">
                          <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                        </div>
                      </form>
                    </div>
                  </div><!--  end posts-->
  {{-- expr --}}
                  @endforeach

                 
                </div>
              </div>
            </div><!-- end left posts-->
          </div>
        </div><!-- end  center posts -->




        <!-- right posts -->
        <div class="col-md-3">
         
          <!-- Friends activity -->
          <div class="widget">
            <div class="widget-header">
              <h3 class="widget-caption">Friends activity</h3>
            </div>
            <div class="widget-body bordered-top bordered-sky">
              <div class="card">
                <div class="content">
                   <ul class="list-unstyled team-members">
                    <li>
                      <div class="row">
                        <div class="col-xs-3">
                          <div class="avatar">
                              <img src="img/Friends/woman-2.jpg" alt="img" class="img-circle img-no-padding img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-9">
                          <b><a href="#">Hillary Markston</a></b> shared a 
                          <b><a href="#">publication</a></b>. 
                          <span class="timeago" >5 min ago</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-xs-3">
                          <div class="avatar">
                              <img src="img/Friends/woman-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-9">
                          <b><a href="#">Leidy marshel</a></b> shared a 
                          <b><a href="#">publication</a></b>. 
                          <span class="timeago" >5 min ago</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-xs-3">
                          <div class="avatar">
                              <img src="img/Friends/woman-4.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-9">
                          <b><a href="#">Presilla bo</a></b> shared a 
                          <b><a href="#">publication</a></b>. 
                          <span class="timeago" >5 min ago</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-xs-3">
                            <div class="avatar">
                                <img src="img/Friends/woman-4.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                            </div>
                        </div>
                        <div class="col-xs-9">
                          <b><a href="#">Martha markguy</a></b> shared a 
                          <b><a href="#">publication</a></b>. 
                          <span class="timeago" >5 min ago</span>
                        </div>
                      </div>
                    </li>
                  </ul>         
                </div>
              </div>
            </div>
          </div><!-- End Friends activity -->

          <!-- People You May Know -->
          <div class="widget">
           
            <div class="widget-header">
              <h3 class="widget-caption">People You May Know</h3>
            </div>
            <div class="widget-body bordered-top bordered-sky">
              <div class="card">
                  <div class="content">
                      <ul class="list-unstyled team-members">
                          <li>
                              <div class="row">
                                  <div class="col-xs-3">
                                      <div class="avatar">
                                          <img src="img/Friends/guy-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                      </div>
                                  </div>
                                  <div class="col-xs-6">
                                     Carlos marthur
                                  </div>
                      
                                  <div class="col-xs-3 text-right">
                                      <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user-plus"></i></btn>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="row">
                                  <div class="col-xs-3">
                                      <div class="avatar">
                                          <img src="img/Friends/woman-1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                      </div>
                                  </div>
                                  <div class="col-xs-6">
                                      Maria gustami
                                  </div>
                      
                                  <div class="col-xs-3 text-right">
                                      <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user-plus"></i></btn>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="row">
                                  <div class="col-xs-3">
                                      <div class="avatar">
                                          <img src="img/Friends/woman-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                      </div>
                                  </div>
                                  <div class="col-xs-6">
                                      Angellina mcblown
                                  </div>
                      
                                  <div class="col-xs-3 text-right">
                                      <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user-plus"></i></btn>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>          
            </div>
          </div><!-- End people yout may know --> 
        </div><!-- end right posts -->
      </div>
    </div>

    
  
    <script type="text/javascript">





      $(document).ready(function() {


       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


       $('#get_place').click(function(event) {
          if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showLocation);
         } else { 
          alert('ban phai cho phap lay vi tri');
        }      

       });
        

        $('#post_form').click(function(event) {
          $("#fm_post").submit();
        });
      $("#fm_post").validate();
 
function showLocation(position) {

    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

      $('#latitude').val(latitude);
      $('#longtitude').val(longitude);
    $.ajax({
        type:'POST',
        url:'ajax/getposition',
        data:'latitude='+latitude+'&longitude='+longitude,
        success:function(msg){
            if(msg){
             
              $("#place").show();
               $("#place").val(msg);
            }else{
               $("#get_place").hide();
                $("#place").val('Not Available');
            }
        }
    });
      }
});


      $(window).scroll(function() {
        if ($(this).scrollTop() < 20) {
          $('#positionpost').hide();
          $('#post').show();
        } else {
          $('#positionpost').show();
          $('#post').hide();
        }
      });
    </script>
    @stop