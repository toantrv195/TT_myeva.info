@extends('admin.master')
@section('content')  

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category
            <small>Add</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.block.errors')
        <form action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="sltparent">
                    <option value="0">Please Choose Category</option>
                    <?php cate_parent($parent); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
            </div>
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-default">Category Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
    </div>
</div>
 @endsection()
            