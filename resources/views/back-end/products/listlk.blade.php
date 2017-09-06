@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Linh kiện</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-12 col-pro">
								<a href="{!! url('admin/linh-kien/add') !!}" title="" class="btn btn-primary pull-right" style="margin-left: 20px">Thêm mới</a>
								<a href="{!! url('admin/import/linh-kien') !!}" title="">
									<button type="button" class="btn btn-primary pull-right">Import từ Excel</button>
								</a>
							</div>
						</div> 
						
					</div>
					    @if (Session()->has('thongbao'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('thongbao') !!}	
						        </ul>
						    </div>
						@endif
					<div class="panel-body" style="font-size: 12px;">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>										
										<th>ID</th>										
										<th>Tên sản phẩm</th>
										<th>Thương hiệu</th>
										<th>Giá lẻ</th>
										<th>Giá sỉ</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $row)
										<tr>
											<td>{!!$row->id!!}</td>
											<td>{!!$row->ten_lk!!}</td>
											<td>{!!$row->thuong_hieu!!}</td>
											<td>{!!$row->price_le!!} đ</td>
											<td>{!!$row->price_si!!} đ</td>			
											<td>
											    <a href="{!! url('admin/linh-kien/edit/'.$row->id) !!}" title="Sửa"><span class="glyphicon glyphicon-edit"></span> </a>
											    <a href="{!! url('admin/linh-kien/del/'.$row->id) !!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove"></span> </a>
											</td>
										</tr>
									@endforeach								
								</tbody>
							</table>
						</div>
						{!! $data->links() !!}
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection