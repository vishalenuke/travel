<!--<form > -->
<?php $controller=strtolower(isset($keys['controller'])?$keys['controller']:'') ?>

		{{Form::model($user=(isset($user) and $user)?$user:null, array('route' => array('whitelabel'.($user?'.update':'.store'), ($user?$user->id:null)),'id'=>'_Form','method'=>($user?'put':'post'),'enctype'=>'multipart/form-data' ))}}
<div class="domain_detail clearfix">

	<div class="row">
			
		<div class="col-md-6 col-sm-6 col-xs-12">
			<h1>{{isset($_GET['action']) ?($_GET['action']=="create"?"White Label Domain's Details": "White Label Domain's Details"):"White Label Domain's Details"}}</h1>
		</div>
		@if($controller=="whitelabelpage" and isset($user) and $user)
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="right-text pull-right">
					<ul class="list-inline">
						<li class="btn btn-delete"><a href="javascript:void(0)" onclick="_delete('{{$user->id}}','whitelabel')"><i class="fa fa-trash"></i> Delete</a></li>
					</ul>
				</div>
			</div>
		@endif			
	</div>


	

	
	<div class="row">
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Domain:</label>
			<!--<input type="text" class="form-control first_name" id="first_name" placeholder="First Name"> -->
			
			{{Form::hidden('_search', isset($keys['search'])?$keys['search']:'')}}
			
			{{Form::text('domain', null, array('class' => 'form-control required','placeholder'=>"Domain"))}}
		  </div>
		</div>
		


		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Site Name:</label>
			<!--<input type="number" class="form-control" id="email" placeholder="Email">-->
			{{Form::text('site_name', null, array('class' => 'form-control required','placeholder'=>"Site Name"))}}
		  </div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Contact No.:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Company Type"> -->
				{{Form::number('mobile', null, array('class' => 'form-control required','placeholder'=>"Contact No."))}}
				
			  </div>
		</div>	
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group js">
			<label for="">Logo:</label>
			@if(isset($keys['image']) and isset($user[$keys['image']]) and !empty($user[$keys['image']]))
				<a href='{{url("images/".$user[$keys["image"]]) }}' target='_blank'>Logo</a>
			@endif			
			<span> <input type="file" id="exampleInputFile" class="inputfile" name="image">
			<img src="{{url('/img/upload_icon.png')}}" alt="" title=""/> 

			 Upload</span> 
			 <!-- {{Form::file('image_url', null, array('class' => 'inputfile form-control',"id"=>"exampleInputFile"))}} -->
			 
		  </div>
		</div>	
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Email:</label>
			<!--<input type="number" class="form-control" id="email" placeholder="Email">-->
			{{Form::email('email', null, array('class' => 'form-control required','placeholder'=>"Email"))}}
		  </div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="form-group">
			<label for="">Description:</label>
			<!--<input type="text" class="form-control" id="last_name" placeholder="Last Name">-->
			<!-- {{Form::text('description', null, array('class' => 'form-control','placeholder'=>"Description By"))}} -->
			{{ Form::textarea('description',null,array('class' => 'form-control required','placeholder'=>"Description","rows"=>"2")) }}
		  </div>
		</div>
		
	</div>
										
		 <div class="">
		 <div class="v-hr"></div>
		 </div>
	<div class="social_detail clearfix">
		<h1>Social Media</h1>
			<div class="row">
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
	</div>
	<div class="">
		 <div class="v-hr"></div>
		 </div>
		
</div>
		<div class="submit_btn">
			<div class="button-inline">
				<button type="submit" class="btn-submit"  onclick="$('#_Form').validate();">Submit</button>
				<a class="btn-cancel btn-close" href="{{ isAdmin()?url('whitelabel'):url('subagents') }}">Cancel</a>
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
