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
			<h4 class="modal-title" id="myModalLabel">Message</h4>
		  </div>
		  <div class="modal-body">
					@if (Session::has('error'))
						{!! "<div style='color: red;'>".Session::get('error')."</div>" !!}
					@elseif(Session::has('message'))
						{!! "<div style='color: green;'>".Session::get('message')."</div>" !!}
						
					@endif
		  </div>
		 
		</div>
	  </div>
	</div>
</div>

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
