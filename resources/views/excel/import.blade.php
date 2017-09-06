@extends('back-end.layouts.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Thêm {!! $namepage !!}</li>
			</ol>
	</div>
	<div class="" style="margin-top: 20px">
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			<label>Chọn file: </label>
			<input type="file" name="file">
			<button type="submit">Nhập file</button>
		</form>
	</div>
</div>
@endsection