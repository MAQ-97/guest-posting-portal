@extends('layouts.backend.app')

@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blogs
                <small>All Blog</small>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#" class="active">Blogs</a></li>
                </ol>

        </section>


        <section class="content min-height-0">

            <div class="row">
                <form method="post" enctype="multipart/form-data" action="{{route('blogs.searchresult')}}">
                    <div class="col-md-8">
                        <div class="box-body">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                            <input class="form-control input-lg" name="keyword" type="text"
                                   placeholder="Search by keyword, URL">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-body">
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Search</button>
                        </div>
                </form>
            </div>

        </section>

    @php
        $user_ids = [];
        $blogs_id = [];
        $logs_details = [];
        $blogs="";

        $logs = \App\order_log::where(['user_id' => Auth::user()->id])->get();

        foreach ($logs as $key => $arr){

           $previous_logs = unserialize($arr->meta_value);

           foreach ($previous_logs as $i => $arr_val){
                $blogs_id[] = $arr_val['blog_id'];
           }

        }

    @endphp

    <!-- Main content -->

    @isset($result)
        <!-- dd($result); -->
            <section class="content">

                <div class="row">

                    @forelse($result as $key => $blog)

                        <form method="post" class="add_to_cart_form" enctype="multipart/form-data" action="{{route('blogs.add_to_cart')}}">
                            <div class="col-md-4">
                                <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user">
                                    <!--style="background: url('{{asset('storage/'.$blog->blog->blog_image)}}') center center;height: 200px;background-size: cover;" Add the bg color to the header custom-bg-blog using any of the bg-* classes -->

                                    <div class="widget-user-header" @if($blog->blog->blog_image) style="background: url('{{asset('storage/'.$blog->blog->blog_image)}}') center center;height: 200px;background-size: cover;"  @else style="background-color: firebrick;height: 200px;background-size: cover;"  @endif>
                                        <h3 class="widget-user-username" style="color: white;text-shadow: 0px 0px 5px black;">{{$blog->blog->title}}</h3>
                                        <h5 class="widget-user-desc" style="color: white;text-shadow: 0px 0px 5px black;">
                                            {{strip_tags(substr($blog->blog->description ,0 , 120))."..." }}
                                        </h5>
                                    </div>
                                    <!-- <div class="widget-user-image">
                                      <img class="img-circle" src="../dist/img/user3-128x128.jpg" alt="User Avatar">
                                    </div> -->
                                    <div class="box-footer">
                                        <div class="row">
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{$blog->blog->blog_meta[0]->meta_value}}</h5>
                                                    <span class="description-text">DA</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{$blog->blog->blog_meta[2]->meta_value}}</h5>
                                                    <span class="description-text">FOLLOWERS</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{$blog->blog->blog_meta[1]->meta_value}}</h5>
                                                    <span class="description-text">FB</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <div class="row">
                                            <!-- /.col -->
                                            <div class="col-md-4 col-sm-6">
                                                <div class="description-block hidden-fields">

                                                    <h5 class="description-header">
                                                        ${{number_format($blog->blog->price,0)}}</h5>
                                                    <span class="description-text">Price</span>


                                                    <input type="hidden" name="title" class="cart_title"
                                                           value="{{ $blog->blog->title}}"/>
                                                    <input type="hidden" class="cart_web_url" name="url"
                                                           value="{{url('/blogs/add_to_cart')}}"/>
                                                    <input type="hidden" name="description" class="cart_description"
                                                           value="{{ $blog->blog->description}}"/>
                                                    <input type="hidden" name="price" class="cart_price"
                                                           value="{{ $blog->blog->price}}"/>
                                                    <input type="hidden" name="da" class="cart_da"
                                                           value="{{$blog->blog->blog_meta[0]->meta_value}}"/>
                                                    <input type="hidden" name="fb" class="cart_fb"
                                                           value="{{$blog->blog->blog_meta[1]->meta_value}}"/>
                                                    <input type="hidden" name="follower" class="cart_follower"
                                                           value="{{$blog->blog->blog_meta[2]->meta_value}}"/>
                                                    <input type="hidden" name="user_id" class="cart_user_id"
                                                           value="{{Auth::user()->id }}"/>
                                                    <input type="hidden" name="blog_id" class="cart_blog_id"
                                                           value="{{$blog->blog->id}}"/>
                                                           <input type="hidden" name="blog_image" class="cart_blog_image"
                                                           value="{{$blog->blog->blog_image}}"/>       
                                                <!-- <h5 class="description-header">{{$blog->blog->price}}</h5> -->
                                                    {{--                                                    <span class="description-text">--}}
                                                    {{--                                                         <button class="btn btn-block btn-success addtocart" type="submit" name="add-to-cart">Starting At $ {{$blog->blog->price}}</button>--}}
                                                    {{--                                                    </span>--}}
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <div class="col-md-2 col-lg-4"></div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="description-block ">
                                                     <span class="description-text addToCart-button-section">
                                                          @if(in_array($blog->blog->id ,array_unique($blogs_id) ))
                                                              <input type="hidden" exists_blog_id="{{$blog->blog->id}}" class="cart_exists_blog_id">
                                                          @else
                                                             <input type="hidden" exists_blog_id="null" class="cart_exists_blog_id">
                                                          @endif


                                                          <label for="" class="label label-success addedLabel">Added</label>

                                                          <button class="btn btn-success addtocart" type="submit" name="add-to-cart">Add to cart</button>

                                                         {{--                                                                     name="add-to-cart">Add to cart</button>
{{--                                                         @if(in_array($blog->blog->id ,array_unique($blogs_id) ))--}}
{{--                                                             <label for="" class="label label-success addedLabel">Added</label>--}}
{{--                                                         @else--}}
{{--                                                             <button class="btn btn-success addtocart" type="submit"--}}
{{--                                                                     name="add-to-cart">Add to cart</button>--}}
{{--                                                         @endif--}}
                                                     </span>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                        </form>
                    @empty
                        <h2 class='text-center'>No Blog Found</h2>
                @endforelse
                <!-- /.col -->
                </div>
            </section>

    @endisset
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
