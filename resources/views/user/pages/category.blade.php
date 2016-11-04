@extends('user.master')
@section('content')

	<div class="content">
		<ul>
			@foreach($cate as $item)
			<li id="block">
				<a href="{!! url('detail',[$item->id, $item->alias]) !!}"><img src="{!! asset('resources/upload/'.$item->image) !!}" alt=""></a>
				
				<h3 class="cate"><a href="{!! url('category',[$item->name]) !!}">{!! $item->name !!}</a></h3>
				<h3 class="title"><a href="{!! url('detail',[$item->id, $item->alias]) !!}">{!! $item->title !!}</a></h3>
				<span class="date-time">{{ $item->created_at }}</span>
			</li>
			@endforeach
		</ul>
	</div>
	<div style="clear:both"></div>
	<div id="pagination">
		<ul>
			@if($cate->currentPage() !=1)
				<li><a href='{{ str_replace('/?', '?',$cate->url($cate->currentPage()-1)) }}'><</a></li>
			@endif
			@for($i=1; $i<= $cate->lastPage(); $i++)
				<li class="{!! ($cate->currentPage() == $i) ? 'active' : '' !!}"><a href='{{ str_replace('/?', '?',$cate->url($i)) }}'>{{ $i }}</a></li>
			@endfor
			@if($cate->currentPage() != $cate->lastPage())
				<li><a href='{{ str_replace('/?', '?',$cate->url($cate->currentPage()+1)) }}'>></a></li>
			@endif
		</ul>
	</div>
@endsection()