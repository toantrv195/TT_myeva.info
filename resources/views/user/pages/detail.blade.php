@extends('user.master')
@section('content')
    <div class="content_top">
        <h2 class="title">{!! $detail->title !!}</h2>
        <div class="time_views">
            <div class="time">
                <span class="date-time">
                    <?php 
                    $timezone = +7;
                    echo ''.gmdate("H:i:s | d-m-Y ", time() + 3600*($timezone+date("A"))).'';
                    ?>  
                </span>
            </div>
            <div class="view">
                <ul>
                    <li><img src="{!! asset('public/user/image/logo/views.png') !!}" alt=""></li>
                    <li><span>:{!! $detail->views !!}</span></li>
                </ul>
            </div>
        </div>
        <div class="share">
            <ul>
                <div class="fb-like" data-href="http://myeva.info/" data-width="100px" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
                {{-- <li class="face"><a href="#" ><button type="">Share on Facebook</button></a></li>
                <li class="like"><a href="#" ><button type="">thich</button></a></li> --}}

            </ul>
        </div>
        <div style="clear:both"></div>
        <div class="detail">
            <p class="intro">{!! $detail->intro !!}</p>
            <p class="content">{!! $detail->content !!}</p>
        </div>
        <div style="clear:both"></div>
        @if(isset($detail->url))
            {{-- <iframe width="560" height="315" src="{!! $detail->url !!}" frameborder="0" allowfullscreen></iframe> --}}
            {!! $detail->url !!}
        @endif
        <div class="shareface">
            <ul>

                <li class="sharer"> <div class="fb-like" data-href="http://localhost/www/TT_myeva.info/" data-width="100px" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div></li>
                {{--
                <li class="face"><a href="#" ><button type="">Share on Facebook</button></a></li>
                <li class="like"><a href="#" ><button type="">thich</button></a></li> --}}
            </ul>
        </div>
        
        <div class="article_dff">
            
            @if(isset($prev))
            <div class="prev">
                <span class="date-time">Previous article</span>
                <h3 class="title"><a href="{!! url('detail',[$prev->id, $prev->alias]) !!}">{!! $prev->title !!}</a></h3>
            </div>
            @endif

            @if(isset($next))           
            <div class="next">
                <span class="date-time">Next article</span>
                <h3 class="title"><a href="{!! url('detail',[$next->id, $next->alias]) !!}">{!! $next->title !!}</a></h3>
                </ul>
            </div>
            @endif
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="content_footer">
            <h4><span>RELATED ARTICLES</span></h4>
            <ul>
                @foreach($rerate as $rate)
                <li id="block">
                    <img src="{!! asset('resources/upload/'.$rate->image)!!}" alt="">
                    <h3 class="title"><a href="{!! url('detail',[$rate->id, $rate->alias]) !!}">{!! $rate->title !!}</a></h3>
                </li>
                @endforeach
             </ul>   
        </div>
        
    </div>
@endsection()