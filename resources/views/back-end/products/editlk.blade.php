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
				<h1 class="page-header"><small>Sửa linh kiện</small></h1>
			</div>
		</div><!--/.row-->	
		<form action="" method="post">
			{{ csrf_field() }}
			
				<div class="form-group">
					<div class="row">
		      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		      				Tên linh kiện : <input type="text" name="namelk" id="namelk" class="form-control" value="{!! $data->ten_lk !!}"  >
		      			</div>
		      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		      				Thương hiệu : <input type="text" name="brank" id="brank" class="form-control" value="{!! $data->thuong_hieu !!}"  >
		      			</div>
		      		</div>				      			
	      			<div class="row">
		      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		      				Hình ảnh : <input type="file" name="txtimg" accept="image/png" id="inputtxtimg" value="" class="form-control" >
		      			</div>
		      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		      				Gía lẻ : <input type="number" name="pice_le" id="pice_le" class="form-control" value="{!! $data->price_le !!}" >
		      			</div>
		      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		      				Gía sỉ : <input type="number" name="pice_si" id="pice_si" value="{!! $data->price_si !!}" class="form-control">
		      			</div>
		      		</div>				      			
	      		</div>
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-12 col-pro">
							<button title="" class="btn btn-primary pull-right">Cập nhật</button>
						</div>
					</div> 
					
				</div>
		</form>
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection