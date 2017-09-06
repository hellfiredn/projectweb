@extends('layouts.master')
@section('content')
	<link href="{!!url('public/front-end/tableexport.min.css')!!}" type="text/css" rel="stylesheet" />
	<!-- SheetJS js-xlsx library -->
	<script type="text/javascript" async="" src="{!! url('public/js/sheetjs/ga.js ') !!}"></script>
	<script type="text/javascript" src="{!! url('public/js/sheetjs/shim.js') !!}"></script>
	<script type="text/javascript" src="{!! url('public/js/sheetjs/xlsx.full.min.js') !!}"></script>
	<!-- Spinner -->
	<script src="{!! url('public/js/js/spin.js') !!}"></script>
	<!-- Alert -->
	<script src="{!! url('public/js/js/alertify.js') !!}"></script>
	<link rel="stylesheet" media="screen" href="{!! url('public/js/js/alertify.css') !!}">
	<!-- FileSaver.js is the library of choice for Chrome -->
	<script type="text/javascript" src="{!! url('public/js/sheetjs/Blob.js') !!}"></script>
	<script type="text/javascript" src="{!! url('public/js/sheetjs/FileSaver.js') !!}"></script>
	<!-- FileSaver doesn't work in older IE and newer Safari; Downloadify is the flash fallback -->
	<script type="text/javascript" src="{!! url('public/js/sheetjs/swfobject.js') !!}"></script>
	<script type="text/javascript" src="{!! url('public/js/sheetjs/downloadify.min.js') !!}"></script>
	<script type="text/javascript" src="{!! url('public/js/sheetjs/basễ.min.js') !!}"></script>
	<script>
		function s2ab(s) {
			if(typeof ArrayBuffer !== 'undefined') {
				var buf = new ArrayBuffer(s.length);
				var view = new Uint8Array(buf);
				for (var i=0; i!=s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
				return buf;
			} else {
				var buf = new Array(s.length);
				for (var i=0; i!=s.length; ++i) buf[i] = s.charCodeAt(i) & 0xFF;
				return buf;
			}
		}

		function export_table_to_excel(id, type, fn) {
		var wb = XLSX.utils.table_to_book(document.getElementById(id), {sheet:"Sheet JS"});
		var wbout = XLSX.write(wb, {bookType:type, bookSST:true, type: 'binary'});
		var fname = fn || 'Đơn hàng.' + type;
		try {
			saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), fname);
		} catch(e) { if(typeof console != 'undefined') console.log(e, wbout); }
		return wbout;
		}

		function doit(type, fn) { return export_table_to_excel('table', type || 'xlsx', fn); }
	</script>
<div class="container">
	<table class="bottom top exportexcel" id="table" cellspacing="0" >
		<tr>
			<td>STT</td>
			<td>Mã</td>
			<td>Thông tin</td>
			<td>Số lượng</td>
			<td>Giá</td>
			<td>Thành tiền</td>		
		</tr>
		<?php 	$stt=0		?>
		@foreach( Cart::content() as $row)
		<tr>
			<td><?php echo $stt=$stt+1; ?></td>
			<td>{!! $row->name !!}</td>
			<td>{!! $row->options->intro !!}</td>
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
	<table id="xport">
		<tbody>
		<tr style="padding:10px">
			<td>
			<!--[if gt IE 9]>-->
				<p id="xportxlsx" class="btn btn-large xport"><input type="submit" value="Export to XLSX!" onclick="doit(&#39;xlsx&#39;);"></p>
			<!--<![endif]-->
				<p id="xlsxbtn" class="btn"></p>
			</td>
			<td>
			<!--[if gt IE 9]>-->
				<p id="xportcsv" class="btn btn-large xport"><input type="submit" value="Export to CSV!" onclick="doit(&#39;csv&#39;);"></p>
			<!--<![endif]-->
				<p id="csvbtn" class="btn"></p>
			</td>
		</tr>
		</tbody>
	</table>
</div>


<script type="text/javascript">var fallback = false;</script>
<!--[if lte IE 9]><script type="text/javascript">fallback = true;</script><![endif]-->
<script type="text/javascript">
function tableau(pid, iid, fmt, ofile) {
	if(fallback) {
		if(document.getElementById(iid)) document.getElementById(iid).hidden = true;
		Downloadify.create(pid,{
			swf: 'media/downloadify.swf',
			downloadImage: 'download.png',
			width: 100,
			height: 30,
			filename: ofile, data: function() { var o = doit(fmt, ofile); return window.btoa(o); },
			transparent: false,
			append: false,
			dataType: 'base64',
			onComplete: function(){ alert('Your File Has Been Saved!'); },
			onCancel: function(){ alert('You have cancelled the saving of this file.'); },
			onError: function(){ alert('You must put something in the File Contents or there will be nothing to save!'); }
		});
	} else document.getElementById(pid).innerHTML = "";
}
tableau('xlsbbtn',  'xportxlsb',  'xlsb',  'Đơn hàng.xlsb');
tableau('xlsxbtn',  'xportxlsx',  'xlsx',  'Đơn hàng.xlsx');
tableau('csvbtn',   'xportcsv',   'csv',   'Đơn hàng.csv');

var pending = false;
var rABS = typeof FileReader !== "undefined" && typeof FileReader.prototype !== "undefined" && typeof FileReader.prototype.readAsBinaryString !== "undefined";
function fixdata(data) {
	var o = "", l = 0, w = 10240;
	for(; l<data.byteLength/w; ++l) o+=String.fromCharCode.apply(null,new Uint8Array(data.slice(l*w,l*w+w)));
	o+=String.fromCharCode.apply(null, new Uint8Array(data.slice(l*w)));
	return o;
}
function process_wb(wb) {
	console.log(wb);
	var o = XLSX.utils.sheet_to_html(wb.Sheets[wb.SheetNames[0]], {editable:true}).replace("<table", '<table id="table" border="1"')
	spinner.stop();
	document.getElementById('table').outerHTML = o;
	pending = false;
}
var drop = document.getElementById('drop');
var spinner;
function xw(data, cb) {
	pending = true;
	spinner = new Spinner().spin(drop);
	var worker = new Worker('./modify.js');
	worker.onmessage = function(e) {
		switch(e.data.t) {
			case 'ready': break;
			case 'e': pending = false; console.error(e.data.d); break;
			case 'xlsx': cb(JSON.parse(e.data.d)); break;
		}
	};
	var arr = rABS ? data : btoa(fixdata(data));
	worker.postMessage({d:arr,b:rABS});
}
function handleDrop(e) {
	e.stopPropagation();
	e.preventDefault();
	if(pending) return alertify.alert('Please wait until the current file is processed.', function(){});
	var files = e.dataTransfer.files;
	var f = files[0];
	var reader = new FileReader();
	reader.onload = function(e) {
		if(typeof console !== 'undefined') console.log("onload", new Date());
		var data = e.target.result;
		function doitnow() {
			try {
				xw(data, process_wb);
			} catch(e) {
				console.log(e);
				alertify.alert('We unfortunately dropped the ball here.  Please test the file using the <a href="/js-xlsx/">raw parser</a>.  If there are issues with the file processor, please send this file to <a href="mailto:dev@sheetjs.com?subject=I+broke+your+stuff">dev@sheetjs.com</a> so we can make things right.', function(){});
				pending = false;
			}
		}
		if(e.target.result.length > 1e6) alertify.confirm("This file is " + e.target.result.length + " bytes and may take a few moments.  Your browser may lock up during this process.  Shall we play?", function(k) { if(k) doitnow(); });
		else doitnow();
	};
	if(rABS) reader.readAsBinaryString(f);
	else reader.readAsArrayBuffer(f);
}

function handleDragover(e) {
	e.stopPropagation();
	e.preventDefault();
	e.dataTransfer.dropEffect = 'copy';
}


if(drop.addEventListener) {
	drop.addEventListener('dragenter', handleDragover, false);
	drop.addEventListener('dragover', handleDragover, false);
	drop.addEventListener('drop', handleDrop, false);
}

</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36810333-1']);
  _gaq.push(['_setDomainName', 'sheetjs.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
@endsection