@extends('layouts.backend.app')

@section('section')

<style>
  .display{
      display:none;
  }
</style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#" class="active">Cart</a></li>
            </ol>
                 
        </section>

     
        <section class="section-content bg padding-y">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        @if (Session::has('error'))
                            <p class="alert alert-danger">{{ Session::get('error') }}</p>
                        @endif
                    </div>
                </div>
            <form action="{{route('orders.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <header class="card-header">
                                    <h2 class="card-title mt-2">Billing Details</h2>
                                </header>
                                <article class="card-body">
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label>First name</label>
                                            <input type="text"  class="form-control" name="fname">
                                        </div>
                                        <div class="col form-group">
                                            <label>Last name</label>
                                            <input type="text"  class="form-control" name="lname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text"  class="form-control" name="address">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6" style="padding-left:0px;">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city">
                                        </div>
                                        <div class="form-group col-md-6" style="padding-left:0px;">
                                            <label>Country</label>
                                            <input type="text" class="form-control" name="country">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group  col-md-6" style="padding-left:0px;">
                                            <label>Post Code</label>
                                            <input type="text" class="form-control" name="post_code">
                                        </div>
                                        <div class="form-group  col-md-6" style="padding-left:0px;">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone_number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" >
                                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Order Notes</label>
                                        <textarea class="form-control" name="notes" rows="6"></textarea>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <header class="card-header">
                                            <h2 class="card-title mt-2">Your Order</h2>
                                        </header>
                                        @foreach($cart_data as $key=>$data)
                                        <article class="card-body">
                                            <dl style="display:flex">
                                                <dt>1 x {{$data['title']}} </dt>
                                                <dt style="margin-left:250px;"> ${{$data['price']}} </dt>
                                            </dl>                   
                                        </article>
                                        @endforeach
                                        <dl class="dlist-align">
                                            <dt>Total cost: </dt>
                                            <dd class="text-right h5 b">  </dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
