@extends('admin.master')
@section('content')  
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Article
                <small>List</small>
            </h1>
        </div>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>title</th>
                    <th>intro</th>
                    <th>category</th>
                    <th>views</th>
                    <th>likes</th>
                    <th>Hot_news</th>
                    <th>URL</th>
                    <<th>Tags</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php $stt=0; ?>
                @foreach($data as $item)
                <?php $stt++; ?>
                <tr class="odd gradeX" align="center">
                    <td>{!! $stt !!}</td>
                    <td>{!! $item['title'] !!}
                    <p><img width="120" height="80" src="{!! asset('resources/upload/'.$item['image']) !!}" alt=""></p>
                    </td>
                    <td>{!! $item['intro'] !!}</td>
                    <td>
                    <?php $category = DB::table('Category')->where('id',$item['cate_id'])->first(); ?>
                        @if(!empty($category->name))
                            {!! $category->name !!}
                        @endif
                    </td>
                    <td>{!! $item['views'] !!}</td>
                    <td>{!! $item['likes'] !!}</td>
                    <td>
                        @if($item['hot_news'] == 1)
                            {!! 'Nổi Bật' !!}
                            @else
                            {!! 'Tin thường' !!}
                        @endif
                    </td>
                    <td>{!! $item['url'] !!}</td>
                    <td>{!! $item['tag'] !!}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Do You Want To Delete?')" href="{!! URL::route('admin.article.delete', $item['id']) !!}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.article.getedit', $item['id']) !!}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
@endsection()
            