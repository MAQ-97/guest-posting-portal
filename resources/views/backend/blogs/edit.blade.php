@extends('layouts.backend.app')

@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blogs
                <small>Edit blog</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Blogs</a></li>
                <li class="active">Edit Blog</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class='fa fa-key'></i> Edit Blog</h3>
                        </div>

                        <div class="col-md-6">
                            {{ Form::model($blog, array('route' => array('blogs.update', $blog->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}
                            <div class="form-group">
                                {{ Form::label('link', 'Blog Link') }}
                                {{ Form::text('link', null, array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Blog Title') }}
                                {{ Form::text('title', null, array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Description') }}
                                {{ Form::textarea('description', null, array('class' => 'form-control textarea')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Price') }}
                                {{ Form::number('price', null, array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Keywords') }}
                                <br>
                                {{Form::select('keywords',$keywords,$blog['keyword'],array('multiple'=>'multiple','name'=>'keyword[]','class' => 'form-control select2','data-placeholder'=>'Select a keyword'))}}
                                <br>
                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'Industries') }}
                                <br>
                                {{Form::select('industries',$industries,$blog['industry'],array('multiple'=>'multiple','name'=>'industry[]','class' => 'form-control select2','data-placeholder'=>'Select a Industry'))}}
                                <br>

                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'Domain Authority') }}
                                {{ Form::number('da', null, array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'FB Likes') }}
                                {{ Form::number('fb_likes', null, array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Followers') }}
                                {{ Form::number('follower', null, array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Dropped') }}
                                {{ Form::radio('dropped', 'true' , true,array('class' => 'minimal-red')) }}
                                {{ Form::radio('dropped', 'false' , true,array('class' => 'minimal-red')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'flag') }}
                                {{ Form::radio('flag', 'true' , true,array('class' => 'minimal-red')) }}
                                {{ Form::radio('flag', 'false' , true,array('class' => 'minimal-red')) }}
                            </div>
                            {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
                        </div>
                    </div>
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
            $('.select2').select2();
        })

    </script>
@endsection
