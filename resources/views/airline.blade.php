@extends('layouts.travel-admin')

@section('content')
		
		
		
		
		
		<section class="inner-content">
			
			<div class="container">
				<div class="row">
					
					@include('includes.advance-search')
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="inner-right-side">
							<!-- <h1>Airline Management</h1> -->
							@include('forms.flight')
							
							
							
						</div>
					
					</div>
					
					
					
				</div>
			</div>
		
		</section>
@endsection	