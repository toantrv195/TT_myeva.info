<div id="top">
    <div id="top-left">
        <p>
            <?php 
                $timezone = +7;
                echo ''.gmdate("H:i:s | d-m-Y ", time() + 3600*($timezone+date("A"))).'';
            ?>  
        </p>
    </div>
    <div id="top-right">
        <ul>
            <li><a href="{!! url('/') !!}">home</a></li>
            <?php $cate = DB::table('category')->where('parent_id', 0)->orderBy('id', 'ASC')->get(); ?>
            @foreach($cate as $item_cate)
            <li><a href="{!! url('category',[$item_cate->id, $item_cate->alias]) !!}">{!! $item_cate->name !!}</a></li>
            @endforeach
        </ul>
    </div>
</div>