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

     
        <section class="content">

            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:35%">Blogs</th>
                    <th style="width:23%">Additional Details</th>
                    <th style="width:10%">Price</th>
                    {{-- <th style="width:8%">Quantity</th> --}}
                    <th style="width:20%" class="text-center">Subtotal</th>
                    <th style="width:12%">Action</th>
                </tr>
                </thead>
                <tbody>
        @if (empty($cart_data) == false)       
               

         @foreach($cart_data as $key=>$data)
                    
                <tr style="background:white;">
     
                    <td data-th="Product">
                        <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="{{ asset('storage/'.$data['blog_image'] ) }}" alt="..." class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{$data['title']}}</h4>
                                <p>{{strip_tags($data['description'])}}</p>
                            </div>
                        </div>
                    </td>
                <td data-th="Price">DA: {{$data['da']}} <br> FB: {{$data['fb']}} <br> Followers:  {{$data['follower']}} </td>
                    <td data-th="Price">${{number_format($data['price'],0)}}</td>
                    {{-- <td data-th="Quantity">
                        <input type="number" class="form-control text-center" value="1">
                    </td> --}}
                    <td data-th="Subtotal" class="text-center">1.99</td>
                    <td class="actions" data-th="">
                        {{-- <form method="post" enctype="multipart/form-data" action="{{route('blog.cart_update')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                            <input type="hidden" value="{{$data['title']}}" name="title"  /> --}}
                            {{-- <input type="hidden" value="{{current($data)}}" name="array_index"  /> --}}
                            {{-- <input type="hidden" value="{{$key}}" name="array_index"  />
                            <input type="hidden" value="{{$data['description']}}" name="description"/>
                            <input type="hidden" value="{{$data['price']}}" name="price"/>
                            <input type="hidden" value="{{$data['da']}}" name="da"/>
                            <input type="hidden" value="{{$data['fb']}}" name="fb"/>
                            <input type="hidden" value="{{$data['follower']}}" name="follower"/>
                        <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        </form> --}}
                        <form method="post" enctype="multipart/form-data" action="{{route('blog.cart_delete')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                            <input type="hidden" value="{{$data['title']}}" name="title"  />
                            <input type="hidden" value="{{$key}}" name="array_index"  />
                            <input type="hidden" value="{{$data['description']}}" name="description"/>
                            <input type="hidden" value="{{$data['price']}}" name="price"/>
                            <input type="hidden" value="{{$data['da']}}" name="da"/>
                            <input type="hidden" value="{{$data['fb']}}" name="fb"/>
                            <input type="hidden" value="{{$data['follower']}}" name="follower"/>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </form>
                </tr>
 

                @endforeach

                @else
                <th style = "width:100%; text-align:center">
                    Cart Is Empty
                </th>
                @endif          
                </tbody>
                <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong></strong></td>
                </tr>
                <tr>
                    <td><a href="{{ route('blogs.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    @if (empty($cart_data) == false)     
                    <td class="hidden-xs text-center"><strong></strong></td>
                    <td><a href="{{ route('blog.checkout') }}" class="btn btn-warning"> Check Out <i class="fa fa-angle-right"></i></a></td>
                    @endif
                </tr>
                </tfoot>
            </table>
        

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
