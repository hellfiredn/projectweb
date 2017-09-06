@extends('layouts.master')
@section('content')

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr><h1>Chi tiết đơn hàng</h1></tr>
						<tr>
							<th>STT</th>
							<th>Tên sản phẩm</th>										
							<th>Số lượng</th>															
							<th> Thành tiền</th>									
						</tr>
					</thead>
					<tbody>
					<?php  $stt=0;?>
						@foreach($detail as $row)
							<?php $stt++;?>
							<tr>
								<td><?php echo $stt; ?></td>
								<td>{!! $row->ten_sp !!}</td>
								<td>{!! $row->qty !!}</td>
								<td>{!! $row->sub_price !!}</td>
							</tr>
						@endforeach	
						@foreach($oders as $row)
							<tr>
								<td colspan="2">Tổng cộng:</td>
								<td colspan="2">{!! $row->total !!}</td>
							</tr>
						@endforeach					
					</tbody>
				</table>
			</div>

@endsection