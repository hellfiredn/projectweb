@include('layouts.header')
@include('modules.menu')
@include('layouts.left')
    <div class="col-lg-10 col-md-10 content-mid">     
      	<div class="row">   
			@yield('content')
      	</div>       <!-- /row -->
    </div> <!-- /container -->
@include('layouts.footer')