	<!-- left menu - menu ben  trai	 -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Tìm kiếm ...">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="{!!url('admin/home/')!!}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li id="danhmuc"><a href="{!!url('admin/danhmuc')!!}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Danh mục</a></li>

			<li id="sanpham"><a href="{!!url('admin/sanpham/all')!!}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản phẩm </a></li>

			<li id="linhkien"><a href="{!!url('admin/linh-kien/all')!!}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Linh - kiện </a></li>

			<li id="linhkien"><a href="{!!url('/admin/addoption')!!}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Thêm linh kiện cho sản phẩm </a></li>

			<li id="linhkien"><a href="{!!url('admin/phong-bang/all')!!}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></svg> Phòng bang</a></li>

			<li id="linhkien"><a href="{!!url('admin/phong-bang/nhom')!!}"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"/></svg> Nhóm kinh doanh </a></li>

			{{-- <li><a href="{!!url('admin/news')!!}"><span class="glyphicon glyphicon-file"></span> Tin tức</a></li> --}}

			{{-- <li><a href="{!!url('admin/nhaphang')!!}"><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg> Nhập hàng</a></li> --}}

			<li><a href="{!!url('admin/donhang')!!}"><svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"/></svg> Đơn đặt hàng</a></li>

			<li><a href="{!!url('admin/khachhang')!!}"><svg class="glyph stroked app-window"><use xlink:href="#stroked-line-graph"></use></svg>Tài khoản nhân viên</a></li>

			<li><a href="{!!url('admin/nhanvien')!!}"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Tài khoản quản trị</a></li>			
			
			<li role="presentation" class="divider"></li>
		</ul>

	</div><!--/.sidebar-->
<!-- /left menu - menu ben  trai	 -->