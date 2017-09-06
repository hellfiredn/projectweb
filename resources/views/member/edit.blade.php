@extends('layouts.master')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="table-responsive">
				<form action="" method="post">
					<input type="hidden" name="_token" value="crsf_token">
					<table class="table-edit-user table">
						<thead>
							<tr>
								<th colspan="2">Tên nhân viên : 
								</th>	
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Họ tên</td>
								<td>									
									<input type="text" name="name" value="{!! $data->name !!}">
								</td>
							</tr>
							<tr>
								<td>Địa chỉ E-mail</td>
								<td><input type="text" name="email" value="{!! $data->email !!}"></td>
							</tr>
							<tr>
								<td>Điện thoại</td>
								<td><input type="text" name="phone" value="{!! $data->phone !!}"></td>
							</tr>
							<tr>
								<td>Địa chỉ</td>
								<td><input type="text" name="address" value="{!! $data->address !!}"></td>
							</tr>
							<tr>
								<td>Ngày đăng ký</td>
								<td><input type="text" name="created_at" value="{!! $data->created_at !!}" readonly></td>
							</tr>
								<tr>
									<td>Phòng bang</td>
									<td>
										<input type="text" name="tenphongbang" value="{!! $user->tenphongbang !!}" readonly>
									</td>
								</tr>
								<tr>
									<td>Nhóm</td>
									<td><input type="text" name="tennhom" value="{!! $user->tennhom !!}" readonly></td>
								</tr>
							<tr>
								<td>Chức vụ</td>
								<td>
									@if( $data->level == 0)
										Quản lý
									@else
										Nhân viên
									@endif
								</td>
							</tr>
							<tr>
								<th colspan="2">
									<a href="{!! url('/user/edit') !!}" class="btn btn-success" style="float: right;">Lưu</a>
								</th>									
							</tr>
						</tbody>
					</table>
				</form>
				</div>
			</div>
		</div>
	</div>
@endsection
