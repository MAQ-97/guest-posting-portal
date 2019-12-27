@extends('layouts.backend.app')

@section('section')
@php
    $num=1;
@endphp
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
                                    <th>UserName</th>
                                    <th>Order Status</th>
                                    <th>Total Amount</th>
                                    <th>Created Date</th>
                                    <th>operation</th>
                                    {{--                                    <th>description</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                    <td>{{$num++}}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>{{$order->status}}</td>
                                        <td> $ {{$order->total_amount}}</td>
                                        <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                                        <td>
                                        @hasrole('admin')
                                        
                                        <a href="{{action('OrderController@edit',$order->id)}}" class="btn btn-info" style="margin-right: 3px;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{action('OrderController@destroy',$order->id)}}" class="btn btn-danger" style="margin-right: 3px;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        
                                        @else
                                        <a href="{{action('OrderController@show',$order->id)}}"
                                               class="btn btn-success pull-left" style="margin-right: 3px;"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                        @endrole
                                        </td>
                                   
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>UserName</th>
                                    <th>Order Status</th>
                                    <th>Total Amount</th>
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
