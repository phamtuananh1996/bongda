  @foreach ($post as $post)
                  
                  <!--   posts -->
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
                           <a href="profile/{{$comment->user->id}}"> {{$comment->user->name}}</a>
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