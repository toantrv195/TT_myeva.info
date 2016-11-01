@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category
            <small>List</small>
        </h1>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                 <th>Alias</th>
                <th>Category Parent</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt = 0;?>
            @foreach($cate as $item_cate)
            <?php $stt++; ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $item_cate['name'] !!}</td>
                <td>{!! $item_cate['alias'] !!}</td>
                <td>
                    @if($item_cate['parent_id']==0)
                            {!! "None" !!}
                        @else
                            <?php
                               
                                $parent = DB::table('category')->where('id',$item_cate["parent_id"])->first();
                                echo $parent->name; 
                            ?>
                        @endif
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Do You Want To Delete?')" href="{!! URL::route('admin.cate.delete', $item_cate['id']) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.cate.getedit', $item_cate['id']) !!}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
 @endsection()               
