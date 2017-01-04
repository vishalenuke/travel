<!doctype html>
<html>
<head>

@include('includes.head')
</head>
<body>

@include('includes.header')
@include('includes.menu')
@include('includes.popup-delete')
@if (Session::has('error') or Session::has('message'))
	@include('includes.popup-message')
@endif
@if(hasPermission())
@yield('content')
@else
	<section class="inner-content">			
		<div class="container">
			<div class="row">
				<center><h1>Requested application in process...</h1></center>
			</div>
		</div>		
	</section>
@endif
@include('includes.footer')

</body>
</html>
