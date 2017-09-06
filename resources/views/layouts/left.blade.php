<div class="col-lg-2 col-md-2 fron-left">
	<div class="logo">
		<img src="{!!url('public/images/tt-nguyenkim.png')!!}">
	</div>
	<ul class="nav navbar-nav menu-left" id="menu-left">
		<li> <a href="{!!url('home')!!}" title=""><b class="glyphicon glyphicon-home" aria-hidden="true" style="padding-right:10px"></b> Trang chủ </a> </li>
		<?php
		      $cate = DB::table('category')->where('parent_id',0)->get();
		      $clear = 0;
		?>
		@foreach ($cate as $cat_pa)
		  <li>
		  	<span>{!! $cat_pa->name !!}</span>
	        <?php
              $cat_lv_1 = DB::table('category')->where('parent_id', $cat_pa->id)->get();
            ?>
		  	<ul>
              @foreach($cat_lv_1 as $name_lv_1)            
                <li><a href="{!! url('danh-muc/'.$name_lv_1->id) !!}">{!! $name_lv_1->name !!}</a></li>
              @endforeach
		  	</ul>
		  </li>
		@endforeach                           
	</ul>
</div>