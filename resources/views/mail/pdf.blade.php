
<style type="text/css">
	.pdf{width: 702px; margin: 20px auto; font-family: arial;}
	.pdf h1{text-align: center}
	.pdf-table{border-top: 1px solid #e4e4e4;border-right: 1px solid #e4e4e4; width: 100%}
	.pdf-table .td-1{width: 15%; text-align: left; border-bottom: 1px solid #e4e4e4; border-left: 1px solid #e4e4e4;  padding: 5px; font-size: 12px;font-weight: bold;}
	.pdf-table .td-2{width: 35%; text-align: left; border-bottom: 1px solid #e4e4e4; border-left: 1px solid #e4e4e4;  padding: 5px; font-size: 12px;font-weight: bold;}
	.pdf-table-2 {border-top: 1px solid #dcdcdc; border-right: 1px solid #dcdcdc;  width: 100%;font-size: 12px;}
	.pdf-table-2 td{text-align: center; border-bottom: 1px solid #dcdcdc;    border-left: 1px solid #dcdcdc;  padding: 5px;}
	input#print_button {
	    position: fixed;
	    top: 50%;
	    margin-left: 20px;
	    padding: 10px;
	    border-radius: 5px;
	    background: #fff06a;
	    cursor: pointer;
	}
</style>
<div class="pdf">
	<img src="http://viendemo.hostingweb.vn/banner.png" style="width: 100%;">
	<h1>BẢNG BÁO GIÁ</h1>
	<table class="pdf-table">
		<tr>
			<td class="td-1">Kính gửi:</td>
			<td class="td-2"><?php echo $data['kinhgui']; ?></td>
			<td class="td-1">Người gửi:</td>
			<td class="td-2"><?php echo $data['nguoigui']; ?></td>
		</tr>
		<tr>
			<td class="td-1">Liên hệ:</td>
			<td class="td-2"><?php echo $data['lienhe']; ?></td>
			<td class="td-1">Ngày gửi:</td>
			<td class="td-2"><?php echo $data['ngaygui']; ?></td>
		</tr>
		<tr>
			<td class="td-1">Địa chỉ:</td>
			<td class="td-2"><?php echo $data['diachi']; ?></td>
			<td class="td-1">Hiệu lực:</td>
			<td class="td-2"><?php echo $data['hieuluc']; ?></td>
		</tr>
		<tr>
			<td class="td-1">Điện thoại:</td>
			<td class="td-2"><?php echo $data['dt']; ?></td>
			<td class="td-1">Điện thoại:</td>
			<td class="td-2"><?php echo $data['dtnk']; ?></td>
		</tr>
		<tr>
			<td class="td-1">Fax:</td>
			<td class="td-2"><?php echo $data['fax']; ?></td>
			<td class="td-1">Di động:</td>
			<td class="td-2"><?php echo $data['didong']; ?></td>
		</tr>
		<tr>
			<td class="td-1">Email:</td>
			<td class="td-2"><?php echo $data['email']; ?></td>
			<td class="td-1">Email:</td>
			<td class="td-2"><?php echo $data['emailnk']; ?></td>
		</tr>
	</table>
	<div style="font-size: 12px">
		<div class="title-1" style="margin:10px 0 ">Cty Nguyên Kim xin chân thành cám ơn Quý khách đã quan tâm đến dịch vụ sửa chữa thiết bị từ công ty chúng tôi.</div>
		<div class="title-2">Sau khi kiểm tra máy của Quý khách gửi đến cần kiểm tra sửa chữa, Công ty Nguyên Kim xin trân trọng gửi đến Quý khách bảng giá sửa chữa máy scan 5590C với chi phí như sau:</div>
	</div>
	             <div style="margin: 20px 0;">
                    <table class="bottom top pdf-table-2" id="exportexcel" cellspacing="0">
						<tr style="background: rgba(255, 235, 59, 0.76); font-weight: bold;">
							<td>STT</td>
							<td>Tên sản phẩm</td>
							<td>SL</td>
							<td  style="width: 100px;">Giá</td>
							<td  style="width: 100px;">Thành tiền</td>		
						</tr>
					<?php 	$stt=0		?>
					@foreach( Cart::content() as $row)
						<tr>
							<td><?php echo $stt=$stt+1; ?></td>
							<td>
							      @if($row->options->intro)
			                        {!!$row->options->intro!!}
			                      @else
			                        {!!$row->name!!}
			                      @endif
							</td>
							<td>{!! $row->qty !!}</td>
							<td>{!! $row->price !!}</td>
							<td>{!! number_format($row->qty * $row->price) !!} đ</td>		
						</tr>
					@endforeach
						<tr>
							<td colspan="2">Tổng cộng: </td>
							<td colspan="4">{!!Cart::subtotal()!!} đ</td>
						</tr>
					</table>               
                  </div>

	<div style=" font-size: 12px;">
		<p style=" color: #f00; font-weight: bold;">'- Note: Nếu máy có phát sinh thêm lỗi khác, chúng tôi sẽ thông báo bổ sung với chi phí hỗ trợ tốt nhất.</p>
		<p style=" color: #000; font-weight: bold;">* Giá trên đã bao gồm thuế VAT</p>
		<div >
			<p>* Tình trạng hàng hóa: Hàng chính hãng sản xuất & mới 100%.</p>
			<p>* Hình thức giao hàng: Trong vòng 01 đến 03 ngày sau khi nhận đơn đặt hàng. Giao hàng tận nơi KV TPHCM</p>
			<p>* Hình thức thanh toán: Tiền mặt hoặc chuyển khoản </p>
			<p>* Thời hạn thanh toán: Thanh toán trong vòng 1 tuần</p>
			<p>* Hình thức bảo hành: Theo tiêu chuẩn của các nhà sản xuất. Hỗ trợ bảo hành tận nơi 01 năm KV TPHCM</p>
		</div>
	</div>
	<div>
		<table>
			<tr>
				<td class="td-1">Tài khoản:</td>
				<td class="td-2" style="font-weight: bold;">
					<p style="margin: 5px;">CTY TNHH VI TÍNH NGUYÊN KIM</p>
					<p style="margin: 5px;">NH TM CP Á CHÂU - SỞ GIAO DỊCH - TP HCM</p>
					<p style="margin: 5px;">Số tài khoản : 1 2 8 9 3 2 2 9</p>
				</td>
			</tr>
		</table>
	</div>
	<div class="footer">
		<label style="font-size: 12px; width: 50%; display: inline-block;  float: left;font-weight: bold">
			<p>Chân thành cảm ơn sự quan tâm của quý khách!</p>
			<p style="margin: 0 0 5px 0;">CÔNG TY NGUYÊN KIM</p>
		</label>
		<label style="font-size: 12px; width: 50%; display: inline-block;  float: left; text-align: center;font-weight: bold">
			
			<p style="margin: 0 0 5px 0;">(KH ký tên và đóng dấu xác nhận)</p>
		</label>
	</div>
</div>
<input type="button" id="print_button" class="btn btn-large btn-primary"  value="Print to PDF" onclick="this.style.display ='none'; window.print()" />