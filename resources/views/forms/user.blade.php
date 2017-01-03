<!--<form > -->
		<?php $p=isset($_GET['action']) ?($_GET['action']=="create"?0: 1):0;?>
		{{Form::model($user=(isset($user) and $user)?$user:null, array('route' => array(($user?'agency.update':'agency.store'), ($user?$user->agent_id:null)),'id'=>'_Form','method'=>($user?'put':'post'),'enctype'=>'multipart/form-data' ))}}
<div class="domain_detail clearfix">

	<h1>{{isset($_GET['action']) ?($_GET['action']=="create"?"New Agent's Details": "Edit Agent's Details"):"Agent's Registration"}}</h1>
	<div class="row">
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">First Name:</label>
			<!--<input type="text" class="form-control first_name" id="first_name" placeholder="First Name"> -->
			
			{{Form::hidden('_search', isset($keys['search'])?$keys['search']:'')}}
			
			{{Form::text('first_name', null, array('class' => 'form-control','placeholder'=>"First Name","required"=>"required"))}}
		  </div>
		</div>
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Last Name:</label>
			<!--<input type="text" class="form-control" id="last_name" placeholder="Last Name">-->
			{{Form::text('last_name', null, array('class' => 'form-control','placeholder'=>"Last Name"))}}
		  </div>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Email:</label>
			<!--<input type="number" class="form-control" id="email" placeholder="Email">-->
			{{Form::email('email', null, array('class' => 'form-control','placeholder'=>"Email","required"=>"required"))}}
		  </div>
		</div>
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Mobile:</label>
			<!--<input type="number" class="form-control" id="" placeholder="Mobile Number">
			-->
			{{Form::number('phone', null, array('class' => 'form-control','placeholder'=>"Mobile","required"=>"required"))}}
		  </div>
		</div>
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Password:</label>
			<!--<input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password">
			-->
			{{$p?Form::password('password',  array('class' => 'form-control','placeholder'=>"******")):Form::password('password',  array('class' => 'form-control','placeholder'=>"******","required"=>"required"))}}
		  </div>
		</div>
		

		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group js">
			<label for="">Image:</label>
			
			<span> <input type="file" id="exampleInputFile" class="inputfile" name="image">
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

<div class="company_detail clearfix">
	<h1>Company Detail</h1>
		<div class="row" >
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Company Name:</label>
				<!--<input type="email" class="form-control" id="" placeholder="Company Name">
				-->
				{{Form::text('company_name', null, array('class' => 'form-control','placeholder'=>"Company Name","required"=>"required"))}}
			  </div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Company Type:</label>
				<!--<input type="email" class="form-control" id="" placeholder="Company Type">
			  	-->
			  	{{Form::text('company_type', null, array('class' => 'form-control','placeholder'=>"Company Type","required"=>"required"))}}
			  </div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Founded On:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Founded On"> -->
				{{Form::text('date_of_incorporation', null, array('class' => 'form-control datepicker','placeholder'=>"Founded On","required"=>"required"))}}
			  </div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Past Experience:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Past Experience"> -->
				{{Form::text('past_experience', null, array('class' => 'form-control','placeholder'=>"Past Experience"))}}
			  </div>
			</div> 
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">PAN:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="PAN"> -->
				{{Form::text('company_pan', null, array('class' => 'form-control','placeholder'=>"PAN","required"=>"required"))}}
			  </div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Contact Person:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Contact Person"> -->
				{{Form::text('contact_person', null, array('class' => 'form-control','placeholder'=>"Contact Person"))}}
			  </div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Authority Name:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Authority Name"> -->
				{{Form::text('name_of_authority', null, array('class' => 'form-control','placeholder'=>"Authority Name","required"=>"required"))}}
			  </div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">IATA Number:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="IATA Number"> -->
				{{Form::number('iata_no', null, array('class' => 'form-control','placeholder'=>"IATA Number","required"=>"required"))}}
			  </div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Valid From:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Valid From (Document)"> -->
				{{Form::text('valid_from', null, array('class' => 'form-control datepicker','placeholder'=>"Valid From (Document)","required"=>"required"))}}
			  </div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Valid Till:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Valid Till (Document)"> -->
				{{Form::text('valid_till', null, array('class' => 'form-control datepicker','placeholder'=>"Valid Till (Document)","required"=>"required"))}}
			  </div>
			</div>
			
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Credit Limit:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Credit Limit"> -->
				{{Form::text('credit_limit', null, array('class' => 'form-control','placeholder'=>"Credit Limit"))}}
			  </div>
			</div>
		</div>	
			<div class="">
				<div class="v-hr"></div>
			</div>
			
			
			
</div>

<div class="address_detail clearfix">
	<h1>Address</h1>
		<!-- <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="pull-right add_more_btn">
					<button type="button" onclick="addMoreMRows(this.form);"><img src="{{url('img/add_more.png')}}" alt="" title=""/></button>
				</div>
		</div> -->
		<div class="add-more row">
		
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Address:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Company Name"> -->
				{{Form::text('address', null, array('class' => 'form-control','placeholder'=>"Address","required"=>"required"))}}
			  </div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Country:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Company Type"> -->
				{{Form::select('country', array('1' => 'India', '2' => 'Other'),null,array('class' => 'form-control','placeholder'=>"Country","required"=>"required"))}}
				
			  </div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">State:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Founded On"> -->
				{{Form::select('state', array('1' => 'Delhi', '2' => 'Other'),null,array('class' => 'form-control','placeholder'=>"State","required"=>"required"))}}
			  </div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">City:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Past Experience"> -->
				{{Form::select('city', array('1' => 'Delhi', '2' => 'Other'),null,array('class' => 'form-control','placeholder'=>"City","required"=>"required"))}}
			  </div>
			</div> 
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">PIN:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="PAN"> -->
				{{Form::number('pin', null, array('class' => 'form-control','placeholder'=>"PIN","required"=>"required"))}}
			  </div>
			</div>
			@if(isset($_GET['action']))
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label>
				{{Form::checkbox('send_email', null)}}

				  <!-- <input type="checkbox">  -->Do not Send Mail
				</label>	
			  </div>
			</div>
			@endif
		</div><!--add-more ends here-->
		
			
				<div id="addedfRows"></div>
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
