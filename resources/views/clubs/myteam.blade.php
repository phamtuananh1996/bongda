@extends('pages.layout')
@section('main')
  <div class="container page-content">
      <div class="row">
        <div class="col">
          <div class="widget">
            <div class="table-responsive">
            <table class="table user-list">
              <thead>
                <tr>
                  <th><span>Đội bóng</span></th>
                  <th><span>Ngày tạo</span></th>
                  <th class="text-center"><span>Trạng thái</span></th>
                  <th><span>Số điện thoại</span></th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user_login->listClub as $clubs)
                   <tr>
                  <td>
                    <img src="{{$clubs->club->avatar}}" alt="">
                    <a href="clubdetail/{{$clubs->club->id}}" class="user-link">{{$clubs->club->name}}</a>
                    <span class="user-subhead">
                      @if ($clubs->is_creator==1)
                        Admin
                      @endif
                    </span>
                  </td>
                  <td>
                    {{$clubs->club->created_at}}
                  </td>
                  <td class="text-center">
                   
                      @if ($clubs->status==0)
                        <span class="label label-default">
                          Đang chờ duyệt
                        </span>
                      @else
                        <span class="label label-success">
                          Thành Viên
                        </span>
                      @endif
                   
                  </td>
                  <td>
                    <a>{{$clubs->club->phone}}</a>
                  </td>

                  @if ($clubs->is_creator==1)
                    {{-- expr --}}
                 
                  <td style="width: 20%;">
                    <a href="#" class="table-link success">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                    <a href="#" class="table-link">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                    <a href="#" class="table-link danger">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                  </td>

                   @endif
                </tr>
                @endforeach
               
                
              </tbody>
            </table>
            </div>
            {{-- <ul class="pagination pull-right">
            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
            </ul> --}}
            </div>
        </div>
      </div>
    </div>
@stop