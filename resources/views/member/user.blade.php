@extends('layouts.master')
@section('content')
	<div class="container">
	<hr>
		<div class="row">
			    @if (Session()->has('flash_massage'))
                    <div class="alert alert-success">
                            {!! Session::get('flash_massage') !!}   
                    </div>
                @endif
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover text-center">
						<thead>
							<tr>
								<th colspan="2">Tên nhân viên : {!!Auth::user()->name !!}
								@if(Auth::user()->level == 0)
									<a href="{!! url('/user/add') !!}" class="btn btn-success" style="float: right;">Thêm nhân viên</a>
									@foreach ($user as $row)
										<a href="{!! url('/user/danh-sach/'.$row->id_nhom) !!}" class="btn btn-success" style="float: right;margin-right:10px">Danh sách nhân viên</a>
									@endforeach
								@endif
								</th>
									
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Họ tên</td>
								<td>{!!Auth::user()->name!!}</td>
							</tr>
							<tr>
								<td>Địa chỉ E-mail</td>
								<td>{!!Auth::user()->email!!}</td>
							</tr>
							<tr>
								<td>Điện thoại</td>
								<td>{!!Auth::user()->phone !!}</td>
							</tr>
							<tr>
								<td>Địa chỉ</td>
								<td>{!!Auth::user()->address!!}</td>
							</tr>
							<tr>
								<td>Ngày đăng ký</td>
								<td>{!!Auth::user()->created_at !!}</td>
							</tr>
							@foreach ($user as $row)
								<tr>
									<td>Phòng bang</td>
									<td>{!! $row->tenphongbang !!}</td>
								</tr>
								<tr>
									<td>Nhóm</td>
									<td>{!! $row->tennhom !!}</td>
								</tr>
							@endforeach
							<tr>
								<td>Chức vụ</td>
								<td>
									@if( Auth::user()->level == 0)
										Quản lý
									@else
										Nhân viên
									@endif
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr><h1>Lịch sử mua hàng </h1></tr>
						<tr>
							<th> ID</th>										
							<th> Mã đơn hàng</th>										
							<th> Ngày đặt hàng</th>										
							<th> Tổng tiền</th>	
							<th>Action</th>									
						</tr>
					</thead>
					<tbody>
					<?php  $stt=0;?>
						@foreach($data as $row)
							<?php $stt++;?>
							<tr>
								<td>{!!$stt!!}</td>
								<td>{!!$row->id!!}</td>
								<td>{!!$row->created_at!!}</td>
								<td>{!! $row->total !!} Vnđ</td>
								<td><a href="{!! url('/donhang/'.$row->id) !!}"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></a></td>
							</tr>
						@endforeach							
					</tbody>
				</table>
				<div class="paginate">{!! $data->links() !!}</div>
			</div>
		</div>
	</div>
@endsection
