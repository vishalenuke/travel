<?php if(!isset($data)) $data=array();?>
<div class="col-md-4 col-sm-4 col-xs-12">
	<div class="inner-left-side">
		<div class="advance-search">
			<form class="form-inline" role="search">
			  <div class="form-group">
				<input type="text" class="form-control">
				<i class="fa fa-search"></i>
			  </div>
			  <button type="submit" class="btn btn-default"><img src="img/add.png" alt="" title=""/> Advanced Search</button>
			</form>

		</div><!--advance-search ends here-->		
		
		<div class="advance-search-list">
			<h3>Result</h3>
			<ul class="list-unstyled">
			@foreach($data as $value)
				<li>
					<div class="media">
					  <div class="media-left">
						<a href="#">
						  <img class="media-object" src="img/list_user_icon.png" alt="...">
						</a>
					  </div>
					  <div class="media-body">
						<h4 class="media-heading">{{ucwords($value[0])}}</h4>
						<p>{{$value[1]?"Aproved":"Not aproved"}}</p>
					  </div>
					</div>
				</li>
			@endforeach				
			</ul>
		
		</div>
		
		@include('airline.pagination')


		
	</div>
</div>