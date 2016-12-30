<!--<form > -->
<?php $controller=strtolower(isset($keys['controller'])?$keys['controller']:'') ?>

		{{Form::model($user=(isset($user) and $user)?$user:null, array('route' => array($controller.($user?'.update':'.store'), ($user?$user->id:null)),'id'=>'_Form','method'=>($user?'put':'post') ))}}
<div class="domain_detail clearfix">

	<h1>{{isset($_GET['action']) ?($_GET['action']=="create"?"New White Label Domain's Details": "Edit White Label Domain's Details"):"White Label Domain's Registration"}}</h1>
	<div class="row">
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Domain:</label>
			<!--<input type="text" class="form-control first_name" id="first_name" placeholder="First Name"> -->
			
			{{Form::hidden('_search', isset($keys['search'])?$keys['search']:'')}}
			
			{{Form::text('domain', null, array('class' => 'form-control','placeholder'=>"Domain","required"=>"required"))}}
		  </div>
		</div>
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Description:</label>
			<!--<input type="text" class="form-control" id="last_name" placeholder="Last Name">-->
			{{Form::text('description', null, array('class' => 'form-control','placeholder'=>"Description By"))}}
		  </div>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Site Name:</label>
			<!--<input type="number" class="form-control" id="email" placeholder="Email">-->
			{{Form::text('site_name', null, array('class' => 'form-control','placeholder'=>"Site Name","required"=>"required"))}}
		  </div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Contact No.:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Company Type"> -->
				{{Form::number('mobile', null, array('class' => 'form-control','placeholder'=>"Contact No."))}}
				
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
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Email:</label>
			<!--<input type="number" class="form-control" id="email" placeholder="Email">-->
			{{Form::email('email', null, array('class' => 'form-control','placeholder'=>"Email"))}}
		  </div>
		</div>
		
	</div>
										
		 <div class="">
		 <div class="v-hr"></div>
		 </div>
	<div class="social_detail clearfix">
		<h1>Social Media</h1>
			
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="form-group">
					<label for="">Facebook URL:</label>
					<!-- <input type="email" class="form-control" id="" placeholder="Domain URL"> -->
					{{Form::text('facebook_url', null, array('class' => 'form-control','placeholder'=>"Facebook Url"))}}
				  </div>
				</div>
				
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="form-group">
					<label for="">Instagram URL:</label>
					<!-- <input type="email" class="form-control" id="" placeholder="Descripition"> -->
					{{Form::text('instagram_url', null, array('class' => 'form-control','placeholder'=>"Instagram Url"))}}
				  </div>
				</div>

				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="form-group">
					<label for="">Twitter URL:</label>
					<!-- <input type="email" class="form-control" id="" placeholder="Site Name"> -->
					{{Form::text('twitter_url', null, array('class' => 'form-control','placeholder'=>"Twitter Url"))}}
				  </div>
				</div>
				
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="form-group">
					<label for="">Google+ URL</label>
					<!-- <input type="email" class="form-control" id="" placeholder="Contact Number"> -->
					{{Form::text('google_plus_url', null, array('class' => 'form-control','placeholder'=>"Google+ Url"))}}
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
