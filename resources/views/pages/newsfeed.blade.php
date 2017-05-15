
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
                <div class="col-md-12" id="newsfeed">
                <!-- post state form -->
                  <div class="box profile-info n-border-top" >
                    
                    <div class="box-footer box-form " id="post">
                     
                        {{-- <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-azure ">Trạng thái</button>
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-azure ">Nhận Đá hộ</button>
                         <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-azure ">Tìm người 'chữa cháy'</button> --}}
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-azure pull-right">Đăng bài tìm đối thủ</button>
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

                      @if ($post->like->where('user_id',$user_login->id)->isEmpty())
                        <button type="button" id='like' data-post_id="{{$post->id}}" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Thích</button>
                      @else
                        <button type="button" id="dislike" data-post_id="{{$post->id}}" class="btn btn-default btn-xs" style="border-color: blue; color: blue;">Đã Thích</button>
                      @endif
                     

                     
                      

                      <span class="pull-right text-muted"><span id="{{$post->id}}_like_count">{{$post->like->count()}}</span> Thích - <span id="{{$post->id}}_comment_count">{{$post->comment->count()}}</span> comments</span>
                    </div>
                    <div class="box-footer box-comments" id="{{$post->id}}_box_comment" style="display: block;">
                   
                    @foreach ($post->comment->forPage(0, 5) as $comment)
                      <div class="box-comment">
                        <img class="img-circle img-sm" src="{{$comment->user->avatar}}" alt="User Image">
                        <div class="comment-text">
                          <span class="username">
                           <a href="#"> {{$comment->user->name}}</a>
                          <span class="text-muted pull-right">{{$comment->created_at}}</span>
                          </span>
                            {{$comment->content}}
                        </div>
                      </div>
                    @endforeach
                      

                      
                    </div>
                    <div class="box-footer" style="display: block;">
                      <form id="comment_form" data-post_id="{{$post->id}}">
                        <img class="img-responsive img-circle img-sm" name="{{$user_login->name}}" src="{{$user_login->avatar}}" alt="Alt Text">
                        <div class="img-push">
                          <input type="text" id="{{$post->id}}_content_comment" class="form-control input-sm" placeholder="Press enter to post comment">
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

    
  
    <script type="text/javascript" src="js/newsfeed.js"> </script>
    @stop