<!DOCTYPE html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/css/style.css') !!}"/>
    <script type="text/javascript" src="{!! url('public/user/js/myscript.js') !!}" ></script>
    <meta property="og:url"                content="http://localhost/www/TT_myeva.info/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="When Great Minds Don’t Think Alike" />
    <meta property="og:description"        content="How much does culture influence creative thinking?" />
    <meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />
    <title>olipfun.info</title>
    </head>
    
    <body>
    {{-- facebook --}}
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    	<div class="header">
    		{{-- top --}}
    		@include('user.block.top')
    		{{-- end top --}}

    		{{-- menu --}}
    		@include('user.block.menu')
    		{{-- end menu --}}

    		{{-- banner --}}
    		@include('user.block.banner')
            {{-- end banner--}}
    	</div>
        @if (isset($category))
            @include('layouts.title', ['category'=>$category])
        @elseif(isset($detail))
            @include('layouts.detail', ['detail'=>$detail])
        @endif

    	<div class="website">
    		<div id="content_left">
	    		{{-- home --}}
	    		@yield('content')
	    		{{-- end home --}}
    		</div>
    		{{-- content-right --}}
    		@include('user.block.content-right')
    		{{-- end content-right --}}
    	</div>
    	<div style="clear: both"></div>
    	{{-- footer --}}
    	@include('user.block.footer')
	</body>
</html>