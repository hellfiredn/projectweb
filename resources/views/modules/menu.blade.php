 <!-- main menu  navbar -->
    <nav class="navbar navbar-default navbar-top" role="navigation" id="main-Nav">
      <div class="">  
        <div class="row">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
             <span  class="visible-xs pull-left" style="font-size:30px;cursor:pointer; padding-left: 10px; color: #ecf0f1;" onclick="openNav()">&#9776; </span> 
             <span  class="visible-xs pull-right" style="font-size:20px;cursor:pointer; padding-right: 10px; padding-top: 8px; color: #FFFFFF;" >      
              <!-- Authentication Links -->
                @if (Auth::guest())
                    <a class="top-a" href="{{ url('/') }}" > Trang chủ </a> 
                    <a href="#" data-toggle="modal" data-target="#login-modal" style="color:#e67e22;"> Đăng nhập </a>
                    {{-- <a class="top-a" href="{{ url('/login') }}">Login</a> --}}
                @else  
                    <a class="top-a" href="{{ url('/user') }}" style="color:#c0392b;"><strong>{!!Auth::user()->name!!}</strong></a>
                    <a class="top-a" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i><small>Thoát</small></a>
                @endif 
                </span>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="main-mav-top">
             <ul class="nav navbar-nav pull-right">
                @if (Auth::guest())
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Đăng nhập</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu info-user" role="menu">
                            <li><a href="{{ url('/user') }}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>Thông tin cá nhân</a></li>
                            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <div id="mini-cart">
              <ul class="nav navbar-nav pull-right">
                {{-- <li><a href="{{ url('/admin/home') }}">Vào trang quản trị</a></li> --}}
                <li class="dropdown">
                  <a class="style1 btn btn-lg btn-primary facebook-pixel-add2cart" href="{!! url('/gio-hang') !!}">
                  <span class="etl-icon icon-basket mbr-iconfont mbr-iconfont-btn"></span>
                  <span class="text">Đơn hàng - {!!Cart::count();!!}</span>
                  </a>
                  <ul class="dropdown-menu mini-cart" style="right:0; left: auto; min-width: 350px;">
                  @if(Cart::count() !=0)
                    <div class="table-responsive">
                       <table class="table table-hover" >
                        <thead>
                        <tr>
                          <th>Ảnh</th>
                          <th>LS</th>
                          <th>Tên <SPAN></SPAN></th>
                          <th>Giá</th>
                        </tr>
                      </thead>
                         <tbody>                       
                        @foreach(Cart::content() as $row)
                           <tr>
                             <td>
                        @if($row->images)
                           <img src="{!!url('uploads/products/'.$row->images)!!}"  alt="" width="80" height="50">
                        @else
                           <img src="{!!url('uploads/products/1497326280_tt-nguyenkim.png')!!}"  alt="" width="80" height="50">
                        @endif
                            </td>
                             <td>{!!$row->qty!!}</td>
                             <td>{!!$row->name!!}</td>                           
                             <td>{!!$row->price!!}</td>
                           </tr>                         
                          @endforeach                           
                         </tbody>                       
                       </table> 
                       <a href="{!!url('/gio-hang/')!!}" type="button" class="btn btn-success"> Chi Tiết đơn hàng </a>
                       <a href="{!!url('/gio-hang/xoa')!!}" type="button" class="btn btn-danger pull-right"> Xóa toàn bộ </a>
                    </div>
                    @else
                      <div class="table-responsive">
                       <table class="table table-hover">
                        <thead>
                        <tr>
                          <th>Ảnh</th>
                          <th>LS</th>
                          <th>Tên <SPAN></SPAN></th>
                          <th>Giá</th>
                        </tr>
                      </thead>
                         <tbody>                       
                          <td colspan="3">Không có sản phẩm</td>                        
                         </tbody>                       
                       </table> 
                    </div>
                    @endif
                  </ul>
                </li> 
              </ul>
             </div>
          </div><!-- /.navbar-collapse -->
          <div class="search-top form-group col-lg-4">
            <div class="">
              <div class="col-lg-12">
                <div class="input-group" style=" width: 100%;">
                <form action="{!! url('/search') !!}" method="post" id="search">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                  <input type="text" class="form-control" placeholder="Tìm sản phẩm" name="keyword" id="keyword">
                  <span class="input-group-btn" style="position: absolute; right: 0;">
                    <button class="btn btn-default" type="submit" id="clickkey"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                  </span>
                </form>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
            </div>
          </div>
        </div> <!-- /row -->
      </div><!-- /container -->
    </nav>    <!-- /main nav -->

  <!-- left slider bar nav -->

  <!-- /left slider bar nav -->

  {{-- loginform --}}
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
      <div class="loginmodal-container">
        <h1>Đăng nhập</h1><br>
        <form class="form-horizontal" role="form" method="POST" id="login-form" action="{{ url('/login') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" placeholder="Nhập địa chỉ Email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" name="password" class="form-control" placeholder="Nhập mật khẩu"> 
             @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif        
          </div>
          <div class="form-group">
            <div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Ghi nhớ
                    </label>
                </div>
            </div>
        </div>       
          <input type="submit" name="login" class="btn btn-primary" value="Đăng nhập">
        </form>      
        <div class="login-help">
          <a class="btn btn-link" href="{!!url('/register')!!}"> <strong style="color:red;"> Đăng ký </strong> </a> - <a class="btn btn-link" href="{{ url('/password/reset') }}">Bạn đã quên mật khẩu?</a>
        </div>
      </div>
    </div>
  </div>