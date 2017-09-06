
@extends('layouts.master')
@section('content')


 <!-- =================== /loc ket qua theo lua chon================= -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
      @if($paname == 'MÁY IN')
        <div class="col-lg-12 title-cat">{!! $paname !!} - {!! $name !!}
        <select name="mayin" id="mayin">
          <option>--Chọn loại máy in--</option>
                    @foreach($iddm as $key)
                      <option value="{!! $key->id !!}">{!! $key->name !!}</option>
                    @endforeach
        </select>
      @else
        <div class="col-lg-12 title-cat">{!! $paname !!} - {!! $name !!}  
      @endif
      </div>
           <!-- sản phẩm -->
      <div id="sanpham-dm">   
          <table class="table  table-striped table-bordered table-hover dataTable no-footer" id="editable_table" role="grid" aria-describedby="editable_table_info">
              <thead>
                  <tr role="row">
                      <th class="wid-20 sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-controls="editable_table" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 10px;">Hình ảnh</th>
                      <th class="wid-25 sorting" tabindex="0" rowspan="1" colspan="1" aria-controls="editable_table" aria-label="E-Mail: activate to sort column ascending" style="width: 150px;">Mã</th>
                      <th class="wid-10 sorting" tabindex="0" rowspan="1" colspan="1" aria-controls="editable_table" aria-label="Gender: activate to sort column ascending" style="width: 65.5px;">Tên</th>
                      <th class="wid-20 sorting" tabindex="0" rowspan="1" colspan="1" aria-controls="editable_table" aria-label="City: activate to sort column ascending" style="width: 152.5px;">
                      @if($idpb == 1)
                        Giá lẻ
                      @elseif($idpb == 2)
                        Giá sỉ
                      @endif
                      </th>
                      <th class="wid-10 sorting" tabindex="0" rowspan="1" colspan="1" aria-controls="editable_table" aria-label="Actions: activate to sort column ascending" style="width: 67.5px;">Actions</th>
                  </tr>
              </thead>
              <tbody id="nhomsp-child">
              <?php
                $count = 0;
              ?>
          @foreach($cat_sanpham as $row) 

                  <tr role="row" class="odd">
                      <td class="center">
                        @if($row->images)
                           <img src="{!!url('uploads/products/'.$row->images)!!}"  alt="" width="80" height="50">
                        @else
                           <img src="{!!url('uploads/products/1497326280_tt-nguyenkim.png')!!}"  alt="" width="80" height="50">
                        @endif
                      </td>
                      <td>{!!$row->name!!}</a>
                      </td>
                      <td>{!! $row->intro !!}</td>
                      <td class="center">
                      @if($idpb == 1)
                        <strong>{!!number_format($row->price)!!}</strong> Vnd
                      @elseif($idpb == 2)
                        <strong>{!!number_format($row->price_si)!!}</strong> Vnd
                      @endif
                      </td>
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          <td class="center"">
                            @if($paname == 'SERVER')
                              <a href="{!! url('/server/'.$row->id) !!}" class="add-cart btn btn-warning">Chọn</a>
                            @elseif($paname == 'MÁY IN')
                              <a href="{!! url('/mayin/'.$row->id) !!}" class="add-cart btn btn-warning">Chọn</a>
                            @else
                              <button id="add-cart<?php echo $count; ?>" class="add-cart btn btn-warning" value="{!! $row->id !!}">Chọn</button>
                              <div id="successMsg<?php echo $count; ?>" class="alert alert-success" ></div>
                            @endif
                          </td> 
                  <?php $count++ ?> 
                  </tr>
          @endforeach
              </tbody>    
          </table>
        </div>
        <div style="text-align: center" id="page">{!! $cat_sanpham->links() !!}</div>
        <div class="clearfix"></div>
      </div>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
      <?php 
        $maxsp = count($cat_sanpham);
        for($i=0; $i < $maxsp; $i++)
        {
      ?>
          $('#successMsg<?php echo $i; ?>').hide();
          $("#add-cart<?php echo $i; ?>").click(function(){
              var idsp<?php echo $i; ?> = $(this).val();
              //var idsp = $(this).parent().parent().find('.pro_id').val();
              $.ajax({
                type: 'get',
                url: '<?php echo url('gio-hang/addcart'); ?>/'+idsp<?php echo $i; ?>,
                success:function(){
                  // alert('done');
                  $('#add-cart<?php echo $i; ?>').hide();
                  $('#successMsg<?php echo $i; ?>').show();
                  $('#successMsg<?php echo $i; ?>').append('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>');
                  $('#mini-cart').load('<?php echo url('/mini-cart'); ?>');
                }
              });
          });
      <?php } ?>    
    });
  </script>
@endsection
