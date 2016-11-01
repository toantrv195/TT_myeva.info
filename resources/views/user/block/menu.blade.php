<div id="menu">
	<div class="menu_top">
		<ul>
			<?php $cate = DB::table('category')->where('parent_id', 0)->orderBy('id', 'ASC')->get(); ?>
			<li><a href="{!! url('/') !!}">home</a></li>
			@foreach($cate as $item)
			<li><a href="{!! url('category',[$item->id, $item->alias]) !!}">{!! $item->name !!}</a></li>
			@endforeach
		</ul>
	</div>
	<div id="menu-right">
    	<ul>
        	<li>
            	<form action="{!! route('search') !!}" method="POST">
            	<input type="hidden" name="_token" value={!! csrf_token() !!}>
            	  <input type="text" placeholder="nhập nội dung tìm kiếm" size="25px" name="txtsearch"/>
            	  <input type="submit" value="search" style="margin-right:5px;"/>
              	</form>
            </li>
        </ul>
    </div>
</div>