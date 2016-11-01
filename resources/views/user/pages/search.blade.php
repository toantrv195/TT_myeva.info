@extends('user.master')
@section('content')
	<?php
		function doimau($str, $search)
		{
			return str_replace($search, "<span style='color:red;'>$search</span>", $str);
		}
	?>

	<h4 class="search"> Tìm kiếm: <span style="color:red;">{!! $search !!}</span></h4>
		<div class="content">
			<ul>
				@foreach($news as $item)
				<li id="block">
					<a href="#"><img src="{!! asset('resources/upload/'.$item->image) !!}" alt=""></a>
					<h3 class="cate"><a href="{!! url('category',[$item->cate_id,$item->name]) !!}">{!! $item->name !!}</a></h3>
					<h3 class="title"><a href="{!! url('detail',[$item->id, $item->alias]) !!}">{!! doimau($item->title, $search) !!}</a></h3>
					<span class="date-time">{{ $item->created_at }}</span>
					<p class="intro">{!! doimau($item->intro, $search) !!}</p>
				</li>
				@endforeach
			</ul>
		</div>
		<div style="clear:both"></div>
		<div id="pagination">
			<ul>
				@if($news->currentPage() !=1)
					<li><a href='{{ str_replace('/?', '?',$news->url($news->currentPage()-1)) }}'><</a></li>
				@endif
				@for($i=1; $i<= $news->lastPage(); $i++)
					<li class="{!! ($news->currentPage() == $i) ? 'active' : '' !!}"><a href='{{ str_replace('/?', '?',$news->url($i)) }}'>{{ $i }}</a></li>
				@endfor
				@if($news->currentPage() != $news->lastPage())
					<li><a href='{{ str_replace('/?', '?',$news->url($news->currentPage()+1)) }}'>></a></li>
				@endif
			</ul>
		</div>
@endsection()