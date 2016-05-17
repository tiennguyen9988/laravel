<div id="categorymenu">
  <nav class="subnav">
    <ul class="nav-pills categorymenu">
      <li><a class="active" href="{{ url('/')}}">Trang chủ</a></li>
      <?php $menu_level_1 = DB::table('categories')->where('parent_id',0)->get(); ?>
      @if($menu_level_1)
        @foreach ($menu_level_1 as $item_level_1)
          <li><a href="{!! URL::route('loaisanpham',[$item_level_1->id,$item_level_1->alias]) !!}">{!! $item_level_1->name !!}</a>
          <?php $menu_level_2 = DB::table('categories')->where('parent_id',$item_level_1->id)->get(); ?>
          @if($menu_level_2)
          <div>
            <ul>            
              @foreach ($menu_level_2 as $item_level_2)
                <li><a href="{!! URL::route('loaisanpham',[$item_level_2->id,$item_level_2->alias]) !!}">{!! $item_level_2->name !!}</a></li>
              @endforeach
            </ul>
          </div>
          @endif
        </li>
        @endforeach
      @endif
    </ul>
  </nav>
</div>