    @extends('layouts.backend.app')

@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Industries
                <small>Edit Industy</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Industries</a></li>
                <li class="active">Edit Industry</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class='fa fa-industry'></i> Edit Industry</h3>
            </div>

        <div class="col-md-6">
            {{ Form::model($industry, array('route' => array('keywords.update', $industry->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}
            <div class="form-group">
                {{ Form::label('industry', 'Industry') }}
                {{ Form::text('industry', null, array('class' => 'form-control')) }}
            </div>
            <br>
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
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
