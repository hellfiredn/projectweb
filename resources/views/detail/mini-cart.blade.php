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
                     <a href="{!!url('/gio-hang/xoa')!!}" type="button" class="btn btn-danger pull-right"> Xóa </a>
                  </div>
                  @else
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
                        <td colspan="3">Không có sản phẩm</td>                        
                       </tbody>                       
                     </table> 
                  </div>
                  @endif
                </ul>
              </li> 
            </ul>