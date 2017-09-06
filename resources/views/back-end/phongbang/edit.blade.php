@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Thêm phòng bang</li>
			</ol>
		</div><!--/.row-->
	<form action="" method="post">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-lg-12">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>																	
										<th>Tên phòng bang</th>										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="text" name="tenpb" value="{!! $data->tenphongbang !!}" id="tenpb">
										</td>
									</tr>
									<tr>
										<td>
											<input type="submit" name="btnAdd" class="btn btn-primary" value="Cập nhật" class="button" />
										</td>
									</tr>									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</form>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection