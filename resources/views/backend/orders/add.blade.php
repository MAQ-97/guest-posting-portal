@extends('layouts.backend.app')

@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blogs
                <small>Add Blog</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Blogs</a></li>
                <li class="active">Add Blog</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class='fa fa-key'></i> Add Blogs</h3>
                        </div>

                        <div class="col-md-9">
                            {{ Form::open(array('url' => 'blogs')) }}
                            {{--            @csrf--}}
                            <div class="form-group">
                                {{ Form::label('link', 'Blog Link') }}
                                {{ Form::text('link', '', array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Blog Title') }}
                                {{ Form::text('title', '', array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Description') }}
                                {{ Form::textarea('description', '', array('class' => 'form-control textarea')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Price') }}
                                {{ Form::number('price', '', array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Keywords') }}
                                <br>
                                @foreach($keywords as $keyword)
                                    {{ Form::checkbox('keyword', $keyword->id) }}
                                    {{ Form::label('keyword[]', $keyword->keyword) }}
                                    <br>
                                @endforeach
                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'Domain Authority') }}
                                {{ Form::number('da', '', array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'FB Likes') }}
                                {{ Form::number('fb_likes', '', array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Followers') }}
                                {{ Form::number('follower', '', array('class' => 'form-control')) }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::label('name', 'Dropped') }}
                                {{ Form::radio('dropped', 'true' , true,array('class' => 'minimal-red')) }}
                                {{ Form::radio('dropped', 'false' , true,array('class' => 'minimal-red')) }}
                            </div>
                            <br>
                            {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

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
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            // $('.textarea').wysihtml5();
        })
    </script>

@endsection
