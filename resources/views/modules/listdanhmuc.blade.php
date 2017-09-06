
    <div classs="danh-muc col-lg-12">
        <div class="list-dm col-lg-12">
          <ul class="icon"> 
                <?php
                  $cate = DB::table('category')->where('parent_id',0)->get();
                  $clear = 0;
                ?>
                @foreach ($cate as $cat_pa)
                  <li class="col-xs-6 col-sm-6 col-md-4 col-lg-4 box-menu">     
                      <div class="bg-menu"></div>
                      <div class="content-menu">
                        <span class="tieu-de-dm">{!! $cat_pa->name !!}</span>
                        <?php
                          $clear = $clear+1;
                          $cat_lv_1 = DB::table('category')->where('parent_id', $cat_pa->id)->get();
                        ?>
                         <ul class="sub-menu">
                          @foreach($cat_lv_1 as $name_lv_1)
                         
                            <li><a href="{!! url('danh-muc/'.$name_lv_1->id) !!}">{!! $name_lv_1->name !!}</a></li>
                          
                          @endforeach
                        </ul> 
                      </div> 
                  </li>
                  <?php
                    if($clear%3 == 0){ ?>
                      <div class="clear"></div>
                  <?php  }  ?>
                 @endforeach
                 <li class="col-xs-6 col-sm-6 col-md-4 col-lg-4 box-menu">
                   <div class="bg-menu"></div>
                      <div class="content-menu" style=" margin-top: 100px;">
                        <span class="tieu-de-dm"></span>
                            <span class="tieu-de-dm">Mục khác</span>
                      </div> 
                 </li>
          </ul>
        </div>
    </div>
