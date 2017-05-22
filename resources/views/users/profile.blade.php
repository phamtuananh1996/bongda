   @extends('pages.layout')
   @section('main')
    <link href="assets/dayday/assets/css/profile2.css" rel="stylesheet">
  <script src="assets/dayday/assets/js/jquery.1.11.1.min.js"></script>
    <script src="assets/dayday/assets/js/custom.js"></script>
     <script src="assets/dayday/bootstrap.3.3.6/js/bootstrap.min.js"></script>
     <div class="container page-content">
      <div class="row" id="user-profile">
        <div class="col-md-4 col-xs-12">
          <div class="row-xs">
            <div class="main-box clearfix">
              <h2>{{$user_login->name}}</h2>
              
              <img src="{{$user_login->avatar}}" alt="" width="200" class="profile-img img-responsive center-block show-in-modal">
              
              <div class="profile-details">
                <ul class="fa-ul">
                  <li><i class="fa-li fa fa-user"></i>Following: <span>456</span></li>
                  <li><i class="fa-li fa fa-users"></i>Followers: <span>828</span></li>
                  <li><i class="fa-li fa fa-comments"></i>Posts: <span>1024</span></li>
                </ul>
              </div>
              
              <div class="profile-message-btn center-block text-center">
                <a href="editprofile" class="btn btn-azure">
                  <i class="fa fa-edit"></i>
                  Edit profile
                </a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-8 col-xs-12">
          <div class="row-xs">
            <div class="main-box clearfix">
              <div class="row profile-user-info">
                <div class="col-sm-8">
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Họ Tên
                    </div>
                    <div class="profile-user-details-value">
                      {{$user_login->name}}
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Ngày Sinh:
                    </div>
                    <div class="profile-user-details-value">
                     @if ($user_login->birthday)
                       {{$user_login->birthday}}
                      @else
                        chưa cập nhập
                      @endif
                      
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Địa chỉ
                    </div>
                    <div class="profile-user-details-value">
                     @if ($user_login->address)
                        {{$user_login->address}}
                      @else
                        chưa có địa chỉ
                      @endif
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Email
                    </div>
                    <div class="profile-user-details-value">
                       @if ($user_login->emailaddress)
                        {{$user_login->emailaddress}}
                      @else
                        chưa có email
                      @endif
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Số Điện Thoại
                    </div>
                    <div class="profile-user-details-value">
                     @if ($user_login->phone)
                        {{$user_login->phone}}
                      @else
                        chưa cập nhật
                      @endif
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 profile-social">
                  <ul class="fa-ul">
                    <li><i class="fa-li fa fa-twitter-square"></i><a href="#">@johnbrewk</a></li>
                    <li><i class="fa-li fa fa-linkedin-square"></i><a href="#">John Breakgrow jr.</a></li>
                    <li><i class="fa-li fa fa-facebook-square"></i><a href="#">John Breakgrow jr.</a></li>
                    <li><i class="fa-li fa fa-skype"></i><a href="#">john_smart</a></li>
                    <li><i class="fa-li fa fa-instagram"></i><a href="#">john_smart</a></li>
                  </ul>
                </div>
              </div>
              
              <div class="tabs-wrapper profile-tabs">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab-timeline" data-toggle="tab">Timeline</a></li>
                  <li><a href="#tab-following" data-toggle="tab">Kỹ Năng</a></li>
                  <li><a href="#tab-followers" data-toggle="tab">Thông Tin Team</a></li>
                </ul>
                
                <div class="tab-content">
                  <div class="tab-pane fade in active" id="tab-timeline">
                    <div class="row">
                      <div class="col-md-12" id="newsfeed">
                        <!--   posts -->
                          @foreach ($user_login->post->sortByDesc('id')->forPage(0,5) as $post)
                          {{-- expr --}}
                       
                          <div class="box box-widget">
                            <div class="box-header with-border">
                              <div class="user-block">
                                <img class="img-circle" src="{{$post->user->avatar}}" alt="User Image">
                                <span class="username"><a href="profile/{{$post->user->id}}">{{$post->user->name}}</a></span>
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
                    @endforeach
                            



                        <!-- post -->
                     
                      </div>
                    </div>
                  </div>
                  
                  <div class="tab-pane fade" id="tab-following">
                    <ul class="widget-users row">
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-3.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Mileth zanders</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 5 minutes ago
                          </div>
                          <div class="type">
                            <span class="label label-danger">Admin</span>
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-3.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Mila Kendrichk</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                          <div class="type">
                            <span class="label label-warning">Pending</span>
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-1.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Arnold Thossling</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-2.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Peter Downey</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: Thursday
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-3.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Emiliath Suansont</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 1 week ago
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-6.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Briatng bowingy</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 1 month ago
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-4.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Milanith Grotyu</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                          <div class="type">
                            <span class="label label-warning">Pending</span>
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-5.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Trwort Htrew</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
                    </ul>
                    <br>
                    <a href="#" class="btn btn-azure pull-right">
                      <i class="fa fa-refresh"></i>
                      Load more
                    </a>
                  </div>
                  
                  <div class="tab-pane fade" id="tab-followers">
                    <ul class="widget-users row">
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-6.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Danielath grande</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 5 minutes ago
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-4.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Fernanda Hytrod</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-1.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Arnold Thossling</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-2.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Peter Downey</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: Thursday
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-3.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Emiliath Suansont</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 1 week ago
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-6.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Briatng bowingy</a>
                          </div>
                          <div class="time">
                            <i class="fa fa-clock-o"></i> Last online: 1 month ago
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/woman-4.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Milanith Grotyu</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
                      <li class="col-md-6">
                        <div class="img">
                          <img src="img/Friends/guy-5.jpg" alt="">
                        </div>
                        <div class="details">
                          <div class="name">
                            <a href="#">Trwort Htrew</a>
                          </div>
                          <div class="time online">
                            <i class="fa fa-check-circle"></i> Online
                          </div>
                        </div>
                      </li>
                    </ul>
                    <br>
                    <a href="#" class="btn btn-azure pull-right">
                      <i class="fa fa-refresh"></i>
                      Load more
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <!-- Modal -->
    <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body text-centers">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    @stop