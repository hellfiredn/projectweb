@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Phòng bang</li>
			</ol>
		</div><!--/.row-->
	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="{!!url('admin/phong-bang/add')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm phòng bang</button></a>
					</div>
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif (Session()->has('flash_massage'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('flash_massage') !!}	
						        </ul>
						    </div>
						@endif
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>										
										<th>ID</th>										
										<th>Tên phòng bang</th>										
										<th>Action</th>
									</tr>
								</thead>
								@foreach($data as $val)
									<tbody>
										<tr>
											<td>{!! $val->id !!}</td>
											<td>{!! $val->tenphongbang !!}</td>
											<td>
											    <a href="{!! url('admin/phong-bang/edit/'.$val->id) !!}" title="Sửa"><span class="glyphicon glyphicon-edit"></span> </a>
											    <a href="{!! url('admin/phong-bang/del/'.$val->id) !!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove"></span> </a>
											</td>
										</tr>										
									</tbody>
								@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection