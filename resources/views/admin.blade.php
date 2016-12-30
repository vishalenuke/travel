@extends('layouts.travel-admin')

@section('content')
		
		
		<section class="inner-content">
			
			<div class="container">
				<div class="row">
					@include('includes.advance-search')
					
					<div class="col-md-9 col-sm-9 col-xs-12 lPadding">
						<div class="inner-right-side">
							<div class="domain_detail clearfix">
								<h1>New Domain's Details</h1>
									<form>
									<div class="col-md-4 col-sm-4 col-xs-12">
									  <div class="form-group">
										<label for="">Domain URL:</label>
										<input type="email" class="form-control" id="" placeholder="Domain URL">
									  </div>
									</div>
									
									<div class="col-md-4 col-sm-4 col-xs-12">
									  <div class="form-group">
										<label for="">Descripition:</label>
										<input type="email" class="form-control" id="" placeholder="Descripition">
									  </div>
									</div>

									<div class="col-md-4 col-sm-4 col-xs-12">
									  <div class="form-group">
										<label for="">Site Name:</label>
										<input type="email" class="form-control" id="" placeholder="Site Name">
									  </div>
									</div>
									
									<div class="col-md-4 col-sm-4 col-xs-12">
									  <div class="form-group">
										<label for="">Conact Number:</label>
										<input type="email" class="form-control" id="" placeholder="Contact Number">
									  </div>
									</div>

									<div class="col-md-4 col-sm-4 col-xs-12">
									  <div class="form-group js">
										<span><input type="file" id="exampleInputFile" class="inputfile">
										<img src="img/upload_icon.png" alt="" title=""> Upload</span>
									  </div>
									</div>

									<div class="col-md-4 col-sm-4 col-xs-12">
									  <div class="form-group">
										<label for="">Contact Us Mail:</label>
										<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
									  </div>
									</div>								
									 <div class="col-sm-12 col-md-12 col-xs-12">
									 <div class="v-hr"></div>
									 </div>
									</form>	
							</div>
							
							<div class="social_detail clearfix">
								<h1>Social Media</h1>
									<form>
										<div class="col-md-4 col-sm-4 col-xs-12">
										  <div class="form-group">
											<label for="">Facebook URL:</label>
											<input type="email" class="form-control" id="" placeholder="Domain URL">
										  </div>
										</div>
										
										<div class="col-md-4 col-sm-4 col-xs-12">
										  <div class="form-group">
											<label for="">Instagram URL:</label>
											<input type="email" class="form-control" id="" placeholder="Descripition">
										  </div>
										</div>

										<div class="col-md-4 col-sm-4 col-xs-12">
										  <div class="form-group">
											<label for="">Twitter URL:</label>
											<input type="email" class="form-control" id="" placeholder="Site Name">
										  </div>
										</div>
										
										<div class="col-md-4 col-sm-4 col-xs-12">
										  <div class="form-group">
											<label for="">Google+ URL</label>
											<input type="email" class="form-control" id="" placeholder="Contact Number">
										  </div>
										</div>  
									</form>	
							</div>
							
							
							
							
						</div>
					
					</div>
					
					
					
				</div>
			</div>
		
		</section>
		
@endsection