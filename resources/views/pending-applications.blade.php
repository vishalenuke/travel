@extends('layouts.travel-admin')

@section('content')
		
		
		
		
		
		<section class="inner-content">
			
			<div class="container">
				<div class="row">
					@include('includes.advance-search')
					
					<div class="col-md-9 col-sm-9 col-xs-12 lPadding">
						<div class="inner-right-side">
							@include('tables.applications')	
						</div>
					
					</div>
					
					
				</div>
			</div>
		
		</section>
@endsection	