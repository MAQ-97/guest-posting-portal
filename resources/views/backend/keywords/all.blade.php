@extends('layouts.backend.app')

@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Keywords
                <small>All Keywords</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#" class="active">Keywords</a></li>
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
                                    <th>Keyword</th>
                                    <th>Created Date</th>
                                    <th>operation</th>
                                    {{--                                    <th>description</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($keywords as $key => $keyword)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$keyword->keyword}}</td>
                                        <td>{{$keyword->created_at->format('d/m/Y')}}</td>
                                      
                                        <td>
                                        @hasrole('admin')
                                            <a href="{{ URL::to('keywords/'.$keyword->id.'/edit') }}"
                                               class="btn btn-info pull-left" style="margin-right: 3px;"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i></a>

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['keywords.destroy', $keyword->id] ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                            @else
                                            <a href="{{ URL::to('keywords/'.$keyword->id) }}"
                                               class="btn btn-success pull-left" style="margin-right: 3px;"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                            @endrole
                                        </td>
                                     
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Keyword</th>
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
