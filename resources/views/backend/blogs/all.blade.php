@extends('layouts.backend.app')

@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blogs
                <small>All Blog</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#" class="active">Blogs</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>link</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>DA</th>
                                    <th>Fb Likes</th>
                                    <th>Followers</th>
                                    <th>Dropped</th>
                                    {{--                                    <th>Flagged</th>--}}
                                    <th>Created Date</th>
                                    <th>operation</th>
                                    {{--                                    <th>description</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($blogs as $key => $blog)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $blog->link }}</td>
                                        <td>{{ $blog->title}}</td>
                                        <td>${{ $blog->price}}</td>
                                        <td>{{$blog->da}}</td>
                                        <td>{{$blog->fb_likes}}</td>
                                        <td>{{$blog->follower}}</td>
                                        @if($blog->dropped != 'false')
                                            <td><img src="{{asset('backend/img/tick-blue-icon.png')}}"
                                                     style="max-height:25px;max-width:30px;" data-toggle="popover"
                                                     data-placement="top" data-html="true" title=""
                                                     data-content="This domain has never been expired and delete in the past, <br/>so there is very little chance its part of a public blog network. <br/><b>Click to see domain history</b>."
                                                     data-original-title="Domain has never been expired, deleted and reused">
                                            </td>
                                        @else
                                            <td>
                                                <img src="{{asset('backend//img/glass-icon.png') }}"
                                                     style="max-height:25px;max-width:30px;" data-toggle="popover"
                                                     data-placement="top" data-html="true" title=""
                                                     data-content="This domain has expired in the past, most are fine but some<br/> are turned into public blog networks so please check<br/><b>Click to see domain history</b>."
                                                     data-original-title="Domain has been expired, deleted and reused"
                                                     aria-describedby="popover198091">
                                            </td>
                                        @endif
                                        <td>{{$blog->created_at->format('d/m/Y')}}</td>
                                        <td>
                                            <a href="{{ URL::to('blogs/'.$blog->id.'/edit') }}"
                                               class="btn btn-info pull-left" style="margin-right: 3px;"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['blogs.destroy', $blog->id] ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>link</th>
                                    <th>Title</th>
                                    <th>Created Date</th>
                                    <th>operation</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
@endsection
