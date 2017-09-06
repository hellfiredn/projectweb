@extends('layouts.master')
@section('content')
<!-- script -->
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
  <script type="text/javascript" src="{!! url('public/js/sheetjs/base64.min.js') !!}"></script>
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
    var fname = fn || 'test.' + type;
    try {
      saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), fname);
    } catch(e) { if(typeof console != 'undefined') console.log(e, wbout); }
    return wbout;
    }

    function doit(type, fn) { return export_table_to_excel('table', type || 'xlsx', fn); }
  </script>
  <!-- end script -->

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br />
            @endforeach
        </div>
    @elseif (Session()->has('flash_massage'))
        <div class="alert alert-success">
                {!! Session::get('flash_massage') !!}   
        </div>
    @endif           
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">              
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <div class="panel panel-success">
            <div class="panel-body"> 
              <form action="{!! url('dat-hang') !!}" method="post"> 
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                <div class="info-kh">
                  <legend class="text-left">Xác nhận thông tin đơn hàng</legend>     
                  <div class="khac-hang col-lg-6">
                    <div class="info-kh">Thông tin khách hàng:</div>
                    <div class="col-lg-12"><label class="col-lg-6" >Kính gửi:</label><input type="text" id="kinhgui" name="kinhgui" placeholder="" class="col-lg-6" ></div>
                    <div class="col-lg-12"><label class="col-lg-6" >Liên hệ:</label><input type="text" id="lienhe" name="lienhe" placeholder="" class="col-lg-6"  ></div>
                    <div class="col-lg-12"><label class="col-lg-6" >Địa chỉ:</label><input type="text" id="diachi" name="diachi" placeholder="" class="col-lg-6"  ></div>
                    <div class="col-lg-12"><label class="col-lg-6" >Điện thoại:</label><input type="text" id="dt" name="dt" placeholder="" class="col-lg-6"  ></div>
                    <div class="col-lg-12"><label class="col-lg-6" >Fax:</label><input type="text" id="fax" name="fax" placeholder="" class="col-lg-6"  ></div>
                    <div class="col-lg-12"><label class="col-lg-6" >Email</label><input type="text" id="email" name="email" placeholder="" class="col-lg-6"  ></div>
                  </div>

                  <div class="khac-hang col-lg-6">
                    <div class="info-nv">Thông tin nhân viên:</div>
                    <div class="col-lg-12"><label class="col-lg-6" >Người gửi:</label><input type="text" id="nguoigui" name="nguoigui" class="col-lg-6" value="{!!Auth::user()->name!!}" ></div>
                    <div class="col-lg-12">
                      <label class="col-lg-6" >Ngày gửi:</label>
                      <?php $timezone = +7;
                      echo '<input id="ngaygui" id="ngaygui" class="col-lg-6" type="text" value="'.gmdate("d-m-Y ", time() + 3600*($timezone+date("I"))).'" readonly>';
                      ?>
                    </div>
                    <div class="col-lg-12"><label class="col-lg-6" >Hiệu lực:</label><input type="text" id="hieuluc" name="hieuluc" placeholder="" class="col-lg-6" value="" ></div>
                    <div class="col-lg-12"><label class="col-lg-6" >Điện thoại</label><input type="text" id="dtnk" name="dtnk" placeholder="" class="col-lg-6" value="" ></div>
                    <div class="col-lg-12"><label class="col-lg-6" >Di động</label><input type="text" id="didong" name="didong" class="col-lg-6" value="{!!Auth::user()->phone !!}" ></div>
                    <div class="col-lg-12"><label class="col-lg-6" >Email</label><input type="text" id="emailnk" name="emailnk" class="col-lg-6" value="{!!Auth::user()->email!!}" ></div>                    
                  </div>
                </div> 
                <legend class="text-left">Xác nhận thông tin đơn hàng</legend> 
                  <div class="table-responsive">
                    <table id="table" class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Hình ảnh</th>
                          <th>Tên sản phẩm</th>
                          <th>SL</th>
                          <th>Giá</th>
                          <th>Thành tiền</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach(Cart::content() as $row)
                        <tr>
                          <td>{!!$row->id!!}</td>
                          <td>
                            @if($row->options->img)
                               <img src="{!!url('uploads/products/'.$row->options->img)!!}"  alt="" width="80" height="50">
                            @else
                               <img src="{!!url('uploads/products/1497326280_tt-nguyenkim.png')!!}"  alt="" width="80" height="50">
                            @endif
                          </td>
                          <td>
                            @if($row->options->intro)
                              {!!$row->options->intro!!}
                            @else
                              {!!$row->name!!}
                            @endif
                          </td>
                          <td class="text-center">                        
                              <span>{!!$row->qty!!}</span>
                          </td>
                          <td>{!!$row->price!!} Vnd</td>
                          <td>{!!$row->qty * $row->price!!} Vnd</td>                          
                        </tr>
                      @endforeach                    
                        <tr>
                          <td colspan="3"><strong>Tổng cộng :</strong> </td>
                          <td>{!!Cart::count()!!}</td>
                          <td colspan="2" style="color:red;">{!! Cart::subtotal() !!} Vnd</td>       
                        </tr>                    
                      </tbody>
                    </table>                
                  </div> 
                      <div class="data-button">
                          <input id="guimail" name="guimail" type="submit" class="btn btn-large btn-primary" value="Gửi mail" >
                          <input id="printpdf" type="submit" name="printpdf" class="btn btn-large btn-primary" target="_blank"  value="Print to PDF" >
                      </div>
                  </form>
                    <div id="xport">
                          <!--[if gt IE 9]>-->
                            <p id="xportxlsx" class="btn btn-large xport"><input type="submit" value="Export to XLSX!" onclick="doit(&#39;xlsx&#39;);" class="btn btn-large btn-primary"></p>
                          <!--<![endif]-->
                            <p id="xlsxbtn" class="btn"></p>
                    </div>
            </div>
          </div>   
        </div>
      </div>     
    </div> 
</div>
<!-- ===================================================================================/news ============================== -->
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
tableau('xlsbbtn',  'xportxlsb',  'xlsb',  'test.xlsb');
tableau('xlsxbtn',  'xportxlsx',  'xlsx',  'test.xlsx');
tableau('csvbtn',   'xportcsv',   'csv',   'test.csv');

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
