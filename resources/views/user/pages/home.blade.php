@extends('user.master')
@section('content')
	<div class="content">
		<ul>
			@foreach($news as $item_news)
			<li id="block">
				<a href="{!! url('detail',[$item_news->id,$item_news->alias]) !!}"><img src="{!! asset('resources/upload/'.$item_news->image)!!}" alt=""></a>
				<h3 class="cate"><a href="{!! url('category',[$item_news->cate_id,$item_news->name]) !!}">{!! $item_news->name !!}</a></h3>
				<h3 class="title"><a href="{!! url('detail',[$item_news->id,$item_news->alias]) !!}">{!! $item_news->title !!}</a></h3>
				<span class="date-time"> 
					{{ $item_news->created_at }}
				</span>
				<p class="intro">{!! $item_news->intro !!}</p>
			</li>
			@endforeach
		</ul>
	</div>
	<div style="clear:both"></div>
	<div id="pagination">
		<ul>
			@if($news->currentPage() != 1)
			<li><a href='{!! str_replace('/?', '?', $news->url($news->currentPage()-1)) !!}'><</a></li>
			@endif
			@for($i=1 ; $i<=$news->lastPage(); $i++)
			<li class="{!! ($news->currentPage()== $i) ? 'active' : '' !!}"><a href='{{ str_replace('/?', '?', $news->url($i)) }}'>{!! $i !!}</a></li>
			@endfor
			@if($news->currentPage() != $news->lastPage())
			<li><a href='{!! str_replace('/?', '?', $news->url($news->currentPage()+1)) !!}'>></a></li>
			@endif
		</ul>
	</div>
@endsection()