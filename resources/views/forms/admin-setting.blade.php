<!--<form > -->
<?php $controller=strtolower(isset($keys['controller'])?$keys['controller']:'') ?>

		{{Form::model($user=(isset($user) and $user)?$user:null, array('route' => array($controller.($user?'.update':'.store'), ($user?$user->setting_id:null)),'id'=>'_Form','method'=>($user?'put':'post'),'enctype'=>'multipart/form-data' ))}}
<div class="domain_detail clearfix">

	@if(empty($user))
	<h1>Add Admin's Settings</h1>
	@else
	<h1>Admin's Settings</h1>
	@endif
	<div class="form-group">
		<div class="row">

			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">PLB In(%):</label>
				
				
				{{Form::text('plb_in', null, array('class' => 'form-control required','placeholder'=>"PLB In"))}}
			  </div>
			</div>
		
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">PLB Out(%):</label>	
				{{Form::text('plb_out', null, array('class' => 'form-control required','placeholder'=>"PLB Out"))}}
			  </div>
			</div>
		
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Commission In(%):</label>	
				{{Form::text('commission_in', null, array('class' => 'form-control required','placeholder'=>"Commission In"))}}
			  </div>
			</div>
		
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Commission Out(%):</label>	
				{{Form::text('commission_out', null, array('class' => 'form-control required','placeholder'=>"Commission Out"))}}
			  </div>
			</div>
		</div>
	  </div>
	
	 <div class="submit_btn">
		<div class="button-inline">
			<button type="submit" class="btn-submit" onclick="$('#_Form').validate();">Submit</button>
			<a class="btn-cancel btn-close" href="{{ url('auth/login') }}">Cancel</a>
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
