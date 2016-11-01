@extends('admin.master')
@section('content')  
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Popup
                <small>List</small>
            </h1>
        </div>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>name</th>
                    <th>Alias</th>
                    <th>Image</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php $stt=0; ?>
            @foreach($popup as $item_popup)
            <?php $stt++; ?>
                <tr class="odd gradeX" align="center">
                    <td>{!! $stt !!}</td>
                    <td>{!! $item_popup['name'] !!}</td>
                    <td>{!! $item_popup['alias'] !!}</td>
                    <td><img src="{!! asset('resources/upload/popup/'.$item_popup['image']) !!}" alt="" width="350px"></td>
                    <td>{!! $item_popup['url'] !!}</td>
                    <td>
                        @if($item_popup['p_check'] == 0)
                            {!! 'Ẩn' !!}
                        @else
                            {!! 'Hiện' !!}
                        @endif

                    </td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Do You Want To Delete?')" href="{!! URL::route('admin.popup.delete', $item_popup['id']) !!}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.popup.getedit', $item_popup['id']) !!}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
@endsection()
            