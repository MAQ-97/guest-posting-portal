<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.auth.head')
<body class="hold-transition {{$auth_body}}">
@yield('section')

</body>
</html>
