<!doctype html>
<html>
<head>
@include('includes.head')
</head>
<body>
@include('includes.popup-delete')
@if(Session::has('error') or Session::has('message'))
	@include('includes.popup-message')
@endif
@yield('content')
@include('includes.footer')
</body>
</html>
