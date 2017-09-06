@extends('layouts.master')
@section('content')
  <div class="table-responsive" style="padding: 0 100px;">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên sản phẩm</th>
          <th style="width: 180px;">Giá</th>
        </tr>
      </thead>
      <tbody>
    @if($name == 'server')
    <form action="{!! url('/don-hang/server') !!}" method="POST" accept-charset="utf-8">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <?php $countlk = 0;?>
          @foreach(Cart::content() as $row)
              <?php $countlk = $countlk+1;?>
              <tr>
                <td>{!!$row->id!!}</td>
                <td>
                @if($row->options->intro)
                  {!!$row->options->intro!!}
                @else
                  {!!$row->name!!}
                @endif
                </td>
                <td>
                    {!! $row->price !!}đ
                </td>
              </tr>
              <tr>
                <td colspan="7">
                  <?php $sttcat = 0;  ?>
                  <div class="catoption">
                      @foreach($catoption as $row)
                        <div class="op-item">              
                          <div class="option-<?php echo $sttcat; ?>">{!! $row->tencat !!}</div>
                          <?php $option = DB::table('linhkien')->where('id_catoption', $row->id)->get();
                          ?>
                            <div class="group-item">
                              @foreach($option as $row)
                							@if(in_array($row->id,$lk))
                								<div class="item-<?php echo $sttcat; ?>">
                									<input type="checkbox" name="checklk[]" id="checklk" value="{!! $row->id !!}">{!! $row->ten_lk !!}
                								 </div>
                							@endif
                              @endforeach
                            </div>
                        </div>    
                        <?php $sttcat++;  ?>
                      @endforeach
                  </div>
                </td>
              </tr>
             @endforeach                         
          </tbody>
        </table>
      <button type="submit" class="btn btn-large btn-primary" style="margin-bottom: 100px">Xem đơn hàng</button>
      </form> 
    @elseif($name == 'mayin')
      <form action="{!! url('/don-hang/server') !!}" method="POST" accept-charset="utf-8">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <?php $countlk = 0;?>
          @foreach(Cart::content() as $row)
              <?php $countlk = $countlk+1;?>
              <tr>
                <td>{!!$row->id!!}</td>
                <td>
                @if($row->options->intro)
                  {!!$row->options->intro!!}
                @else
                  {!!$row->name!!}
                @endif
                </td>
                <td>
                    {!! $row->price !!}đ
                </td>
              </tr>
              <tr>
                <td colspan="7">
                  <?php $sttcat = 0;  ?>
                  <div class="catoption">

                        <div class="op-item">              
                          <div class="option-<?php echo $sttcat; ?>">Linh kiện máy in</div>
                          <?php $option = DB::table('linhkien')->where('id_catoption', 10)->get(); 
                          ?>
                            <div class="group-item">
                              @foreach($option as $row)
                                @if(in_array($row->id,$lk))
                                  <div class="item-<?php echo $sttcat; ?>">
                                    <input type="checkbox" name="checklk[]" id="checklk" value="{!! $row->id !!}">{!! $row->ten_lk !!}
                                   </div>
                                @endif
                              @endforeach
                            </div>
                        </div>    
                        <?php $sttcat++;  ?>

                  </div>
                </td>
              </tr>
             @endforeach                         
          </tbody>
        </table>
      <button type="submit" class="btn btn-large btn-primary" style="margin-bottom: 100px">Xem đơn hàng</button>
      </form>
    @endif
  </div>
@endsection
