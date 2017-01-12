@extends('layouts.travel-login')

@section('content')

		
		
		
		<section class="login-container">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-1 col-xs-12">
						<div class="agent-register-wrapper">
							
							<div class="inner_logo text-center">
								<a href="#"><img src="img/inner_logo.png" alt="" title=""/></a>
							</div>
							
							@include('forms.register')
						</div>
					</div>
				</div>
			</div>	
		</section>
@endsection	