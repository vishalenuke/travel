<!--<form > -->
<?php $controller=strtolower(isset($keys['controller'])?$keys['controller']:'') ?>

		{{Form::model($user=(isset($user) and $user)?$user:null, array('route' => array($controller.($user?'.update':'.store'), ($user?$user->id:null)),'id'=>'_Form','method'=>($user?'put':'post') ))}}
<div class="domain_detail clearfix">

	<h1>{{isset($_GET['action']) ?($_GET['action']=="create"?"New Flight's Details": "Edit Flight's Details"):"Flight's Registration"}}</h1>
	<div class="row">
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Company Name:</label>
			<!--<input type="text" class="form-control first_name" id="first_name" placeholder="First Name"> -->
			
			{{Form::hidden('_search', isset($keys['search'])?$keys['search']:'')}}
			
			{{Form::text('company_name', null, array('class' => 'form-control','placeholder'=>"Company Name"))}}
		  </div>
		</div>
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Manufactured By:</label>
			<!--<input type="text" class="form-control" id="last_name" placeholder="Last Name">-->
			{{Form::text('mfd_by', null, array('class' => 'form-control','placeholder'=>"Manufactured By"))}}
		  </div>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Manufactured Date:</label>
			<!--<input type="number" class="form-control" id="email" placeholder="Email">-->
			{{Form::text('mfd_on', null, array('class' => 'form-control datepicker','placeholder'=>"Manufactured Date"))}}
		  </div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Country:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Company Type"> -->
				{{Form::select('country', array('1' => 'India', '2' => 'Other'),null,array('class' => 'form-control','placeholder'=>"Country"))}}
				
			  </div>
		</div>		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Description:</label>
			<!--<input type="number" class="form-control" id="email" placeholder="Email">-->
			{{Form::text('description', null, array('class' => 'form-control datepicker','placeholder'=>"Description"))}}
		  </div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group js">
			<label for="">Image:</label>
			
			<span> <input type="file" id="exampleInputFile" class="inputfile">
			<img src="{{url('/img/upload_icon.png')}}" alt="" title=""/> 

			 Upload</span> 
			 <!-- {{Form::file('image_url', null, array('class' => 'inputfile form-control',"id"=>"exampleInputFile"))}} -->
			 
		  </div>
		</div>
	</div>
										
		 <div class="">
		 <div class="v-hr"></div>
		 </div>
		
</div>
		<div class="submit_btn">
			<div class="button-inline">
				<button type="submit" class="btn-submit">Submit</button>
				<button type="button" class="btn-cancel">Cancel</button>
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
