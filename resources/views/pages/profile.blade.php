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
              <div class="profile-status">
                <i class="fa fa-check-circle"></i> chưa có club
              </div>
              <img src="{{$user_login->avatar}}" alt="" class="profile-img img-responsive center-block show-in-modal">
              
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
                      First Name
                    </div>
                    <div class="profile-user-details-value">
                      {{$user_login->name}}
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Last Name
                    </div>
                    <div class="profile-user-details-value">
                      Breakgrow
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Address
                    </div>
                    <div class="profile-user-details-value">
                      chua co
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Email
                    </div>
                    <div class="profile-user-details-value">
                      {{$user_login->email}}
                    </div>
                  </div>
                  <div class="profile-user-details clearfix">
                    <div class="profile-user-details-label">
                      Phone number
                    </div>
                    <div class="profile-user-details-value">
                      {{$user_login->phone}}
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
                      <div class="col-md-12">
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