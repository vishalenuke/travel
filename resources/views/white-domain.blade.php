@extends('layouts.travel-admin')

@section('content')
		
		
		
		
		
		<section class="inner-content">
			
			<div class="container">
				<div class="row">
					@include('includes.advance-search')
					
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="inner-right-side">
						@if(!isset($empty) and !isAdmin())
							@include('forms.add-pages')
						@else
							@include('forms.white-domain')
						@endif	
							
							
						</div>
					
					</div>
					
					
					
				</div>
			</div>
		
		</section>
@endsection	