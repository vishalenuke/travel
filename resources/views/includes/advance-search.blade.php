<?php if(!isset($data)) $data=array();?>
<div class="col-md-3 col-sm-3 col-xs-12 rPadding">
	<div class="inner-left-side">
		<div class="advance-search">
			<form class="" role="search">
			  <div class="form-group">
			  <?php $controller=isset($keys['controller'])?$keys['controller']:'' ?>
											<input type="text" class="form-control search" onkeyup="search(this.value,'{{$controller}}')" value="{{isset($keys['search'])?$keys['search']:''}}" >
				<i class="fa fa-search"></i>
			  </div>
			  
			</form>
			<div class="adv_search">
				<a href="#">Advance Search</a>
			</div>
		</div><!--advance-search ends here-->		
		
		
		
		<div class="advance-search-list">
			<h3>Result</h3>
			<ul class="list-unstyled">

			<?php //print_r($keys); die(); ?>
			@include('includes.result')
						
			</ul>
		
		</div>
		
		@include('search.pagination')


		
	</div>
</div>