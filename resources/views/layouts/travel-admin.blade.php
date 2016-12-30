<!doctype html>
<html>
<head>

@include('includes.head')
</head>
<body>

@include('includes.header')
@include('includes.menu')
@if (Session::has('error') or Session::has('message'))
<div class="forgot_password">
	<div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">
				@if (Session::has('error'))
					{!! Session::get('error') !!}
				@elseif(Session::has('message'))
					{!! Session::get('message') !!}
				@endif
			</h4>
		  </div>
		  
		 
		</div>
	  </div>
	</div>
</div>
@endif
@yield('content')
@include('includes.footer')

</body>
</html>
