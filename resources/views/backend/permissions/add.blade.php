    @extends('layouts.backend.app')

@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Permissions
                <small>Add Permission</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Permissions</a></li>
                <li class="active">Add Permissions</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class='fa fa-key'></i> Add Permissions</h3>
            </div>

        <div class="col-md-6">
            {{ Form::open(array('url' => 'permissions')) }}
{{--            @csrf--}}
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', '', array('class' => 'form-control')) }}
            </div><br>
            @if(!$roles->isEmpty())
{{--                //If no roles exist yet--}}
            <h4>Assign Permission to Roles</h4>

            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

            @endforeach
            @endif
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
