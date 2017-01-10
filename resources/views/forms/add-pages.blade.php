<!--<form > -->
<?php $controller=strtolower(isset($keys['controller'])?$keys['controller']:'') ?>

		{{Form::model($user=(isset($user) and $user)?$user:null, array('route' => array('whitelabelpage'.($user?'.update':'.store'), ($user?$user->id:null)),'id'=>'_Form','method'=>($user?'put':'post'),'enctype'=>'multipart/form-data' ))}}
<div class="domain_detail clearfix">

	<h1>{{"Add Page to White Label"}}</h1>
	<div class="row">
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Page Title:</label>
			<!--<input type="text" class="form-control first_name" id="first_name" placeholder="First Name"> -->
			
			{{Form::hidden('_search', isset($keys['search'])?$keys['search']:'')}}
			
			{{Form::text('title', null, array('class' => 'form-control required','placeholder'=>"Page Title"))}}
		  </div>
		</div>
		<!-- <div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
			<label for="">Code:</label>
			
			
			{{ Form::textarea('code',null,array('class' => 'form-control required','placeholder'=>"Code","rows"=>"2")) }}
		  </div>
		</div> -->


		
		<div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
			<label for="">Contents:</label>
			
			{{ Form::textarea('code',null,array('class' => 'form-control required','placeholder'=>"Contents","rows"=>"2")) }}
		  </div>
		</div>
		
	</div>
										
		 <div class="">
		 <div class="v-hr"></div>
		 </div>
	<div class="social_detail clearfix">
			
	</div>
	<div class="">
		 <div class="v-hr"></div>
		 </div>
		
</div>
		<div class="submit_btn">
			<div class="button-inline">
				<button type="submit" class="btn-submit">Submit</button>
				<a class="btn-cancel btn-close" href="{{ url('whitelabel') }}">Cancel</a>
			</div>
		</div>
		
</div>
{{ Form::close() }}
 
<script type="text/javascript">
$(function () {

	$('.datepicker').datetimepicker({
	                format: 'YYYY-MM-DD'
	            });
});
</script>
