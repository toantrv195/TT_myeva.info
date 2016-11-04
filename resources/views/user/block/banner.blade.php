<div id="banner">
	<div id="banner-left">
        <a href="{!! url('/') !!}"><img src="{{ asset('public/user/image/logo/olipfun-272x89.png') }}" alt=""></a>
    </div>
    <?php 
    	$popup = DB::table('popups')->select('name', 'image', 'url')->where('p_check', 1)->orderBy('id', 'DESC')->first();
    ?>
    @if(isset($popup->image))
    	<div id='ads_right'>
        	<div id='exit-ads'><a href='javascript:void(0)' onclick='hide_ads_right()'>Tắt Quảng Cáo [X]</a></div>
            <div id='content-ads'><a href='{!! $popup->url !!}' target='_blank'>
            <img src="{!! asset('resources/upload/popup/'.$popup->image) !!}"></a></div>
            <div id='look-ads'><a href='javascript:void(0)' onclick='block_ads_right()'>Xem Quảng Cáo...</a></div>
    	</div>
    @endif
</div>