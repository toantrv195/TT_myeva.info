@extends('admin.master')
@section('content')  
<style>
    .img_current{width: 170px;}
    .img_detail{width: 180px; height: 200px; margin: 10px;}
    .icon_del{position: relative; top: -100px; left: -30px;}
    #insert{margin-top: 30px;}
</style>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Article
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
         <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.block.errors')
            <form action="" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                <label>Category </label>
                <select class="form-control" name="sltparent">
                    <option value="0">Please Choose Category</option>
                     <?php cate_parent($cate,0,'--',$data["cate_id"]); ?>
                    option>
                </select>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" name="txtTitle" placeholder="Please Enter Title" value="{!! old('txtTitle',isset($data) ? $data['title'] : null) !!}" />
                </div>
                <div class="form-group">
                    <label>Intro</label>
                    <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro',isset($data) ? $data['intro'] : null) !!}</textarea>
                    <script type="text/javascript">ckeditor("txtIntro")</script>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent',isset($data) ? $data['content'] : null) !!}</textarea>
                    <script type="text/javascript">ckeditor("txtContent")</script>
                </div>
                <div class="form-group">
                        <label>Images current</label><br/>
                        <img src="{!! asset('resources/upload/'.$data['image']) !!}" alt="">
                        <input type="hidden" name="img_current" value="{!! $data['image'] !!}" >
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="fImages">
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input class="form-control" name="txturl" placeholder="Please Enter Url" value="{!! old('txturl',isset($data) ? $data['url'] : null) !!}"/>
                </div>
                <div class="form-group">
                    <label>Tag</label>
                    <input type="text" class="form-control" name="tag" placeholder="Please Enter Tag" value="{!! old('tag', isset($data) ? $data['tag'] : null) !!}" />
                </div>
                <div class="form-group">
                    <label>Types</label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="1" 
                        @if($data['hot_news'] == 1)
                            {!! 'checked' !!}
                        @endif
                         type="radio">Hots news
                    </label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="2"
                        @if($data['hot_news'] == 2)
                            {!! 'checked' !!}
                        @endif
                         type="radio">news
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Article Edit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            <form>
        </div>
    </div>
    <!-- /.row -->
@endsection()            