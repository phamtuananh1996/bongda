@extends('pages.layout')
@section('main')
   <link href="assets/dayday/assets/css/profile4.css" rel="stylesheet">
		 <div class="row page-content">
    <div class="col-md-10 col-md-offset-1">
      <div class="row">
        <div class="col-md-12">
          <div class="cover profile">
            <div class="wrapper">
              <div class="image">
                <img src="assets/dayday/img/Cover/profile-cover.jpg" class="show-in-modal" alt="people">
              </div>

              <ul class="friends">
              
                 @foreach ($club->member as $member)
                      <li>
                      <a href="profile/{{$member->id}}">
                        <img src="{{$member->avatar}}" alt="image">
                      </a>
                    </li>
                    @endforeach

                <li><a class="group"><i class="fa fa-group"></i></a></li>
              </ul>
            </div>

            <div class="cover-info">
              <div class="avatar">
                <img src="{{$club->avatar}}" alt="people">
              </div>
              <div class="name"><a href="#">{{$club->name}}</a></div>
          <ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom profile-tabs center" style="margin-left: 150px">
              <li role="presentation" class="active"><a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab" aria-expanded="true">Timeline</a></li>
              <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">Giới thiệu</a></li>
              <li role="presentation" class=""><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">Thành viên</a></li>
              <li role="presentation" class=""><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">Đội hình</a></li>

               <a class="btn btn-azure pull-right" style="margin-right: 10px" href="#" ><i class="fa fa-edit"></i> Sửa Thông Tin </a>
            </ul>

            </div>
          </div>
        </div>
       
      </div>
        <div class="tab-content">
              <!-- Timeline -->
              <div role="tabpanel" class="tab-pane active" id="timeline">
                <div class="row">
                  <div class="col-md-5">
                    <div class="widget">
                      <div class="widget-header">
                        <h3 class="widget-caption">About</h3>
                      </div>
                      <div class="widget-body bordered-top bordered-sky">
                        <ul class="list-unstyled profile-about margin-none">
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Ngày Tạo :</span></div>
                              <div class="col-sm-8">{{$club->created_at}}</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Số Điện Thoại :</span></div>
                              <div class="col-sm-8">{{$club->phone}}</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Địa Chỉ</span></div>
                              <div class="col-sm-8">{{$club->ward->name}}-{{$club->district->name}}-{{$club->province->name}}</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Số Thành Viên :</span></div>
                              <div class="col-sm-8">{{$club->member->count()}}</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Tuổi Trung Bình :</span></div>
                              <div class="col-sm-8"></div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="widget widget-friends">
                      <div class="widget-header">
                        <h3 class="widget-caption">Thành Viên</h3>
                      </div>
                      <div class="widget-body bordered-top  bordered-sky">
                        <div class="row">
                          <div class="col-md-12">
                            <ul class="img-grid" style="margin: 0 auto;">
                              @foreach ($club->member as $member)
                               
                              <li>
                                <a href="profile/{{$member->id}}">
                                  <img src="{{$member->avatar}}" alt="image">
                                </a>
                              </li>

                               @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="widget">
                      <div class="widget-header">
                        <h3 class="widget-caption">Lịch Đấu</h3>
                      </div>
                      <div class="widget-body bordered-top bordered-sky">
                        <div class="card">
                          <div class="content">
                            
                          </div>
                        </div>  
                      </div>
                    </div>
                  </div>

                  <!--============= timeline posts-->
                  <div class="col-md-7">
                    <div class="row">
                      <!-- left posts-->
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-12">
                          <!-- post state form -->
                            <div class="box profile-info n-border-top">
                              <form>
                                  <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?"></textarea>
                              </form>
                              <div class="box-footer box-form">
                                  <button type="button" class="btn btn-azure pull-right">Post</button>
                                  <ul class="nav nav-pills">
                                      <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                                      <li><a href="#"><i class="fa fa-camera"></i></a></li>
                                      <li><a href="#"><i class=" fa fa-film"></i></a></li>
                                      <li><a href="#"><i class="fa fa-microphone"></i></a></li>
                                  </ul>
                              </div>
                            </div><!-- end post state form -->

                            <!--   posts -->
                            <div class="box box-widget">
                              <div class="box-header with-border">
                                <div class="user-block">
                                  <img class="img-circle" src="img/Friends/guy-3.jpg" alt="User Image">
                                  <span class="username"><a href="#">John Breakgrow jr.</a></span>
                                  <span class="description">Shared publicly - 7:30 PM Today</span>
                                </div>
                              </div>

                              <div class="box-body" style="display: block;">
                                <img class="img-responsive show-in-modal" src="img/Post/young-couple-in-love.jpg" alt="Photo">
                                <p>I took this photo this morning. What do you guys think?</p>
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


                            <!-- post -->
                            <div class="box box-widget">
                              <div class="box-header with-border">
                                <div class="user-block">
                                  <img class="img-circle" src="img/Friends/guy-3.jpg" alt="User Image">
                                  <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                                  <span class="description">Shared publicly - 7:30 PM Today</span>
                                </div>
                              </div>
                              <div class="box-body">
                                <p>Far far away, behind the word mountains, far from the
                                countries Vokalia and Consonantia, there live the blind
                                texts. Separated they live in Bookmarksgrove right at</p>

                                <p>the coast of the Semantics, a large language ocean.
                                A small river named Duden flows by their place and supplies
                                it with the necessary regelialia. It is a paradisematic
                                country, in which roasted parts of sentences fly into
                                your mouth.</p>

                                <div class="attachment-block clearfix">
                                  <img class="attachment-img show-in-modal" src="img/Photos/2.jpg" alt="Attachment Image">
                                  <div class="attachment-pushed">
                                  <h4 class="attachment-heading"><a href="http://www.bootdey.com/">Lorem ipsum text generator</a></h4>
                                  <div class="attachment-text">
                                  Description about the attachment can be placed here.
                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                                  </div>
                                  </div>
                                </div>
                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                                <span class="pull-right text-muted">45 likes - 2 comments</span>
                              </div>
                              <div class="box-footer box-comments">
                                <div class="box-comment">
                                  <img class="img-circle img-sm" src="img/Friends/guy-5.jpg" alt="User Image">
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
                                  <img class="img-circle img-sm" src="img/Friends/guy-6.jpg" alt="User Image">
                                  <div class="comment-text">
                                    <span class="username">
                                    Nora Havisham
                                    <span class="text-muted pull-right">8:03 PM Today</span>
                                    </span>
                                    The point of using Lorem Ipsum is that it has a more-or-less
                                    normal distribution of letters, as opposed to using
                                    'Content here, content here', making it look like readable English.
                                  </div>
                                </div>
                              </div>
                              <div class="box-footer">
                                <form action="#" method="post">
                                  <img class="img-responsive img-circle img-sm" src="img/Friends/guy-3.jpg" alt="Alt Text">
                                  <div class="img-push">
                                    <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                                  </div>
                                </form>
                              </div>
                            </div><!-- end post -->

                            <!--  posts -->
                            <div class="box box-widget">
                              <div class="box-header with-border">
                                <div class="user-block">
                                  <img class="img-circle" src="img/Friends/guy-3.jpg" alt="User Image">
                                  <span class="username"><a href="#">John Breakgrow jr.</a></span>
                                  <span class="description">Shared publicly - 7:30 PM Today</span>
                                </div>
                              </div>

                              <div class="box-body" style="display: block;">
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac iaculis ligula, eget efficitur nisi. In vel rutrum orci. Etiam ut orci volutpat, maximus quam vel, euismod orci. Nunc in urna non lectus malesuada aliquet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam dignissim mi ac metus consequat, a pharetra neque molestie. Maecenas condimentum lorem quis vulputate volutpat. Etiam sapien diam
                                </p>
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
                            </div><!--  end posts -->

                            <!--   posts -->
                            <div class="box box-widget">
                              <div class="box-header with-border">
                                <div class="user-block">
                                  <img class="img-circle" src="img/Friends/guy-3.jpg" alt="User Image">
                                  <span class="username"><a href="#">John Breakgrow jr.</a></span>
                                  <span class="description">Shared publicly - 7:30 PM Today</span>
                                </div>
                              </div>

                              <div class="box-body" style="display: block;">
                                <img class="img-responsive pad show-in-modal" src="img/Photos/3.jpg" alt="Photo">
                                <p>I took this photo this morning. What do you guys think?</p>
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
                            </div><!--  end posts -->
                          </div>
                        </div>
                      </div><!-- end left posts-->
                    </div>
                  </div><!-- end timeline posts-->
                </div>
              </div><!-- end timeline -->
              <!-- about -->
              <div role="tabpanel" class="tab-pane" id="profile">
                <div class="col-md-12">
                    <div class="widget">
                      <div class="widget-header">
                        <h3 class="widget-caption">About</h3>
                      </div>
                      <div class="widget-body bordered-top bordered-sky">
                        <ul class="list-unstyled profile-about margin-none">
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Date of Birth</span></div>
                              <div class="col-sm-8">12 January 1990</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Job</span></div>
                              <div class="col-sm-8">Ninja developer</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Gender</span></div>
                              <div class="col-sm-8">Male</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Lives in</span></div>
                              <div class="col-sm-8">Miami, FL, USA</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Credits</span></div>
                              <div class="col-sm-8">249</div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="widget widget-friends">
                      <div class="widget-header">
                        <h3 class="widget-caption">Friends</h3>
                      </div>
                      <div class="widget-body bordered-top  bordered-sky">
                        <div class="row">
                          <div class="col-md-12">
                            <ul class="img-grid" style="margin: 0 auto;">
                              <li>
                                <a href="#">
                                  <img src="img/Friends/guy-6.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/woman-3.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/guy-2.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/guy-9.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/woman-9.jpg" alt="image">
                                </a>
                              </li>
                              <li class="clearfix">
                                <a href="#">
                                  <img src="img/Friends/guy-4.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/guy-1.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/woman-4.jpg" alt="image">
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="img/Friends/guy-6.jpg" alt="image">
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="widget">
                      <div class="widget-header">
                        <h3 class="widget-caption">Groups</h3>
                      </div>
                      <div class="widget-body bordered-top bordered-sky">
                        <div class="card">
                          <div class="content">
                            <ul class="list-unstyled team-members">
                              <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="img/Likes/likes-1.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                       Github
                                    </div>
                        
                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
                                    </div>
                                </div>
                              </li>
                              <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="img/Likes/likes-3.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        Css snippets
                                    </div>
                        
                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
                                    </div>
                                </div>
                              </li>
                              <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="img/Likes/likes-2.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        Html Action
                                    </div>
                        
                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
                                    </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>  
                      </div>
                    </div>
                  </div>

              </div><!-- end about -->
              <!-- friends -->
              <div role="tabpanel" class="tab-pane" id="messages">

              </div><!-- end friends -->
              <!-- photos -->
              <div role="tabpanel" class="tab-pane" id="settings">
              </div><!-- end photos -->
            </div>
    </div>
    </div>


    <!-- Online users sidebar content-->
  
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