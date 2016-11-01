<div class="footer">
	<div class="main">
		<div class="main_footer">
            <ul>
            <?php  
                $news = DB::table('news')->select('id', 'title', 'alias', 'image', 'hot_news')->where('hot_news', 1)->orderBy('id', 'DESC')->take(5)->get();
            ?>
                @foreach($news as $item)
                <li id="block">
                    <img src="{!! asset('resources/upload/'.$item->image) !!}" alt="">
                    <h3 class="title"><a href="{!! url('detail',[$item->id, $item->alias]) !!}">{!! $item->title !!}</a></h3>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="bottom">
        <div class="logobottom">
        	<div class="logo">
        		 <a href="{{url('/')}}"><img src="{{ asset('public/user/image/logo/olipfun-272x89.png') }}" alt=""></a>
        	</div>
        	<div class="about">
        		<h3>about us</h3>
        	</div>
        	<div class="folow">
        		<h3>follow us</h3>
        		<div class="face">
        		<a href="#" ><button type="">f</button></a>
        		</div>
        	</div>
        </div>
    </div>
    <div class="copyright">
    	<div class="copy">
    		<div id="top-left">
				<p>© Copyright Olipfun 2016</p>
			</div>
			<div id="top-right">
				<ul>
                    <?php $cate = DB::table('category')->where('parent_id', 0)->orderBy('id', 'ASC')->get(); ?>
					<li><a href="{!! url('/') !!}">home</a></li>
					@foreach($cate as $item)
                    <li><a href="{!! url('category',[$item->id, $item->alias]) !!}">{!! $item->name !!}</a><li>
                    @endforeach
				</ul>
			</div>
    	</div>
    </div>
</div>	