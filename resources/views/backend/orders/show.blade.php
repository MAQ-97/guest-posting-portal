@extends('layouts.backend.app')

@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order Detail
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Order</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <h4> User Detail </h4>

                    <form role="form">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label for="">First Name:</label>
                                        <label for="">{{$user_detail['fname']}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Last Name:</label>
                                        <label for="">{{$user_detail['lname']}}</label>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Phone No:</label>
                                        <label for="">{{$user_detail['phone_number']}}</label>
                                    </div>


                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Country:</label>
                                        <label for="">{{$user_detail['country']}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="">City:</label>
                                        <label for="">{{$user_detail['city']}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Postal Code:</label>
                                        <label for="">{{$user_detail['post_code']}}</label>
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label for="">Address:</label>
                                        <label for="">{{$user_detail['address']}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Note:</label>
                                        <label for="">{{$user_detail['notes']}}</label>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- /.box-body -->
                    </form>

                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <h4> Order Detail </h4>

                    <table class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th >Blogs</th>
                            <th >Additional Details</th>
                            <th >Price</th>
                            <th class="text-center">Subtotal</th>
                            <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($order as $key => $val)

                            <tr style="background:white;">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $val['title']  }}</h4>
                                            <p> {{ substr(strip_tags($val['description']), 0 , 50)."..." }} </p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">
                                    DA: {{ $val['da'] }}<br>
                                    FB: {{ $val['fb'] }} <br>
                                    Followers: {{ $val['follower'] }}
                                </td>
                                <td data-th="Price">
                                    {{ "$".number_format($val['price'],0) }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="background:white;">
                                <td></td>
                                <td></td>
                                <td></td>
                                @if($key+1 == $total_blogs )
                                    <td class="text-center"> <strong>{{ "$".number_format($total,0) }}</strong></td>
                                    <td> <strong> {{ ucfirst($order_status) }} </strong></td>
                                @else
                                    <td></td>
                                    <td></td>
                                @endif
                            </tr>

                        @endforeach


                        </tbody>

                    </table>

                </div>
            </div>
        </section>
    </div>


    {{--@endsection--}}
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