<!DOCTYPE html>
<html>
@include('layouts.backend.head')
<body>
@include('layouts.backend.header')
@if(Session::has('flash_message'))
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-3">
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('flash_error_message'))
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-3">
                <div class="alert alert-danger"><em> {!! session('flash_error_message') !!}</em>
                </div>
            </div>
        </div>
    </div>
@endif


@if (count($errors) > 0)
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
@include('layouts.backend.nav')


@yield('section')
@include('layouts.backend.script')
@yield('script')
</body>
</html>
