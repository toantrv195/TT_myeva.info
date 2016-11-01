@extends('admin.master')
@section('content')  

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Article
                <small>Add</small>
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
                     <?php cate_parent($parent); ?>
                    option>
                </select>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" name="txtTitle" placeholder="Please Enter Title" value="{!! old('txtTitle') !!}" />
                </div>
                <div class="form-group">
                    <label>Intro</label>
                    <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
                    <script type="text/javascript">ckeditor("txtIntro")</script>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
                    <script type="text/javascript">ckeditor("txtContent")</script>
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="fImages">
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input class="form-control" name="txturl" placeholder="Please Enter Url" value="{!! old('txturl') !!}"/>
                </div>
                <div class="form-group">
                    <label>Tag</label>
                    <input type="text" class="form-control" name="tag" placeholder="Please Enter Tag" value="{!! old('tag') !!}" />
                </div>
                <div class="form-group">
                    <label>Types</label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="1" checked="" type="radio">Hots news
                    </label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="2" type="radio">news
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Article Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
            <form>
        </div>
</div>

    <!-- /.row -->
@endsection()