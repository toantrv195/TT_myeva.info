@extends('admin.master')
@section('content')  

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Popup
                <small>Add</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.block.errors')
            <form action="" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="txtName" placeholder="Please Enter Name" value="{!! old('txtName') !!}" />
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
                    <label>Types</label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="0" checked="" type="radio">Ẩn 
                    </label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="1" type="radio">Hiện
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Popup Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
            <form>
        </div>
</div>

    <!-- /.row -->
@endsection()