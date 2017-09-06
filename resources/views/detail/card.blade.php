@extends('layouts.master')
@section('content')
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">             
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">              
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <div class="panel panel-success">
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
            </div>
            @elseif (Session()->has('flash_level'))
              <div class="alert alert-success">
                  <ul>
                      {!! Session::get('flash_massage') !!} 
                  </ul>
              </div>
          @endif
            <div class="panel-body">
            <form action="{!!url('/don-hang')!!}" method="POST" accept-charset="utf-8">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Hình ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th style="width: 100px;">SL</th>
                      <th style="width: 180px;">Gía</th>
                      <th style="width: 170px;">Thành tiền</th>
                      <th style="width: 10px;">xóa</th>
                    </tr>
                  </thead>
                  <tbody>
                  <form method="post" action="">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                  <?php $countlk = 0;?>
                  @foreach(Cart::content() as $row)
                    <?php $countlk = $countlk+1;?>
                    <tr>
                      <td>{!!$row->id!!}</td>
                      <td>
                      @if($row->options->img)
                         <img src="{!!url('uploads/products/'.$row->options->img)!!}"  alt="" width="80" height="50">
                      @else
                         <img src="{!!url('uploads/products/1497326280_tt-nguyenkim.png')!!}"  alt="" width="80" height="50">
                      @endif
                      
                      </td>
                      <td>
                      @if($row->options->intro)
                        {!!$row->options->intro!!}
                      @else
                        {!!$row->name!!}
                      @endif
                      </td>
                      <td class="">                        
                          @if (($row->qty) >1)
                          <a href="{!!url('gio-hang/update/'.$row->rowId.'/'.$row->qty.'-down')!!}"><span class="glyphicon glyphicon-minus"></span></a> 
                          @else
                            <a href="#"><span class="glyphicon glyphicon-minus"></span></a> 
                          @endif
                          <input type="text" class="qty text-center" value=" {!!$row->qty!!}" style="width:30px; font-weight:bold; font-size:15px; color:blue;" readonly="readonly"> 
                        <a href="{!!url('gio-hang/update/'.$row->rowId.'/'.$row->qty.'-up')!!}"><span class="glyphicon glyphicon-plus-sign"></span></a>
                      </td>
                      <td>
                          <input class="price" type="number" name="gia" value="{!! $row->price !!}">
                          <a href="javascript:void(0)"><span class="updateprice" id="{!! $row->rowId !!}">Lưu</span></a>
                      </td>
                      <td>{!! number_format($row->qty * $row->price) !!} đ</td>
                      <td>
                        <a href="{!!url('gio-hang/delete/'.$row->rowId)!!}" onclick="return xacnhan('Xóa sản phẩm này ?')" ><span class="glyphicon glyphicon-remove" style="padding:5px; font-size:18px; color:red;"></span></a>
                      </td>
                    </tr>
                  @endforeach  
                  </form>                  
                    <tr>
                      <td colspan="3"><strong>Tổng cộng :</strong> </td>
                      <td>{!!Cart::count()!!}</td>
                      <td colspan="3" style="color:red;">{!!Cart::subtotal('0','','.')!!} Vnd</td>                      
                    </tr>                    
                  </tbody>
                </table>                
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 no-paddng cart-link"> 
                  <button type="submit" class="btn btn-large btn-primary" >Xuất dữ liệu</button>
              </div>
              </form>
            </div>
          </div>   
        </div>
      </div>     
    </div> 
  </div>
<!-- ===================================================================================/news ============================== -->
@endsection

@section('script')
  <script>

    $(document).ready(function(){
      $('.updateprice').click(function(){
        var id = $(this).attr('id');
        var price = $(this).parent().parent().find('.price').val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: 'gio-hang/update/'+id+'/'+price,
            type: 'get',
            cache: false,
            data: {
                    "_token":token,
                    "id":id, 
                    "price":price
                  },
            success:function(data){
                window.location = "gio-hang" 
            }
        });
      });
      $('.addlk').change(function(){
        var id = $(this).val();
        var token = $("input[name='_token']").val();
        // alert(id);
        $.ajax({
            url: '/hoclaravel/gio-hang/update/'+id,
            type: 'get',
            cache: false,
            data: {
                    "_token":token,
                    "id":id, 
                  },
            success:function(data){
                window.location = "gio-hang" 
            }
        });
      });
    });
  </script>
@endsection