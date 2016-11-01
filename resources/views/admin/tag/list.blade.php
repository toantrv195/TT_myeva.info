@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tags
            <small>List</small>
        </h1>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tags</th>
                <th>Use</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt = 0;?>
         @foreach($tags as $item)
            <?php $stt++; ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $item->name !!}</td>
                <td>
                   {!! $item->total!!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
 @endsection()               
