<div id="content_right">
	<h4><span>Trending</span></h4>
	<ul>
		<?php
		$news = DB::table('news')->join('category', 'category.id', '=', 'news.cate_id')->select('news.*', 'category.name')->where('views','>',0)->orderBy('news.views', 'DESC')->take(4)->get();
		?>
		@foreach($news as $item)
		<li id="block">
			<img src="{!! asset('resources/upload/'.$item->image) !!}" alt="">
			<h3 class="cate"><a href="{!! url('category',[$item->name]) !!}">{!! $item->name !!}</a></h3>
			<h3 class="title"><a href="">{!! $item->title !!}</a></h3>
			<span class="date-time">{!! $item->created_at !!}</span>
		</li>
		@endforeach

	</ul>
</div>