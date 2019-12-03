@extends('layouts.backend.app')

@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Orders
                <small>All Orders</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#" class="active">Orders</a></li>
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
                                    <th>User Name</th>
                                    <th>Keyword</th>
                                    <th>Order Status</th>
                                    <th>Created Date</th>
                                    <th>operation</th>
                                    {{--                                    <th>description</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $order->username }}</td>
                                        <td>{{ $order->keyword}}</td>
                                        <td>${{ $order->status}}</td>
                                        <td>{{$order->created_at->format('d/m/Y')}}</td>
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
                                    <th>User Name</th>
                                    <th>Keyword</th>
                                    <th>Order Status</th>
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
