<!--<form > -->
<?php $controller=strtolower(isset($keys['controller'])?$keys['controller']:'agency') ?>
		<?php $p=isset($_GET['action']) ?($_GET['action']=="create"?0: 1):0;?>
		{{Form::model($user=(isset($user) and $user)?$user:null, array('route' => array($controller.($user?'.update':'.store'), ($user?$user->agent_id:null)),'id'=>'_Form','method'=>($user?'put':'post'),'enctype'=>'multipart/form-data' ))}}
<div class="domain_detail clearfix">
@if($controller=='subagents')
	<h1>{{isset($_GET['action']) ?($_GET['action']=="create"?"Sub Agent's Details": "Edit Sub Agent's Details"):"Sub Agent's Details"}}</h1>
@else
	<h1>{{isset($_GET['action']) ?($_GET['action']=="create"?"Agent's Details": "Edit Agent's Details"):"Agent's Registration"}}</h1>
	@if(isAdmin())
	<h1>Settings Detail</h1>
	<div class="row">
		
		<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">PLB In(%):</label>
				
				
				{{Form::text('plb_in', isset($settings) && !empty($settings)?$settings->plb_in:null, array('class' => 'form-control required','placeholder'=>"PLB In"))}}
			  </div>
			</div>
		
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">PLB Out(%):</label>	
				{{Form::text('plb_out', isset($settings) && !empty($settings)?$settings->plb_out:null, array('class' => 'form-control required','placeholder'=>"PLB Out"))}}
			  </div>
			</div>
		
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Commission In(%):</label>	
				{{Form::text('commission_in', isset($settings) && !empty($settings)?$settings->commission_in:null, array('class' => 'form-control required','placeholder'=>"Commission In"))}}
			  </div>
			</div>
		
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Commission Out(%):</label>	
				{{Form::text('commission_out', isset($settings) && !empty($settings)?$settings->commission_out:null, array('class' => 'form-control required','placeholder'=>"Commission Out"))}}
			  </div>
			</div>
	</div>
	<div class="">
		 <div class="v-hr"></div>
		 </div>
	<h1>Agent's Detail</h1>
	@endif
	
@endif


	<div class="row">
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">First Name:</label>
			<!--<input type="text" class="form-control first_name" id="first_name" placeholder="First Name"> -->
			
			{{Form::hidden('_search', isset($keys['search'])?$keys['search']:'')}}
			
			{{Form::text('first_name', null, array('class' => 'form-control required','placeholder'=>"First Name"))}}
		  </div>
		</div>
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Last Name:</label>
			<!--<input type="text" class="form-control" id="last_name" placeholder="Last Name">-->
			{{Form::text('last_name', null, array('class' => 'form-control required','placeholder'=>"Last Name"))}}
		  </div>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Email:</label>
			<!--<input type="number" class="form-control" id="email" placeholder="Email">-->
			{{Form::email('email', null, array('class' => 'form-control required','placeholder'=>"Email"))}}
		  </div>
		</div>
		
		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group">
			<label for="">Mobile:</label>
			<!--<input type="number" class="form-control" id="" placeholder="Mobile Number">
			-->
			{{Form::number('phone', null, array('class' => 'form-control required','placeholder'=>"Mobile"))}}
		  </div>
		</div>
		
		
		

		<div class="col-md-4 col-sm-4 col-xs-12">
		  <div class="form-group js">
			<label for="">Photo:</label> 
			@if(isset($keys['image']) and isset($user[$keys['image']]) and !empty($user[$keys['image']]))
				<a href='{{url("images/".$user[$keys["image"]]) }}' target='_blank'>Photo</a>
			@endif
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
@if($controller!='subagents')
<div class="company_detail clearfix">
	<h1>Company Detail</h1>
		<div class="row" >
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Company Name:</label>
				<!--<input type="email" class="form-control" id="" placeholder="Company Name">
				-->
				{{Form::text('company_name', null, array('class' => 'form-control required','placeholder'=>"Company Name"))}}
			  </div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Company Type:</label>
				<!--<input type="email" class="form-control" id="" placeholder="Company Type">
			  	-->
			  	{{Form::text('company_type', null, array('class' => 'form-control required','placeholder'=>"Company Type"))}}
			  </div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Founded On:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Founded On"> -->
				{{Form::text('date_of_incorporation', null, array('class' => 'form-control required  datepicker','placeholder'=>"Founded On"))}}
			  </div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Past Experience:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Past Experience"> -->
				
				{{Form::select('past_experience', years(),null,array('class' => 'form-control required','placeholder'=>"Past Experience"))}}
			  </div>
			</div> 
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">PAN:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="PAN"> -->
				{{Form::text('company_pan', null, array('class' => 'form-control required','placeholder'=>"PAN"))}}
			  </div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="js">
			  <div class="form-group">
				<label for="">Attach PAN Card Copy:</label>
@if(isset($keys['image1']) and isset($user[$keys['image1']]) and !empty($user[$keys['image1']]))
<a href='{{url("images/".$user[$keys["image1"]]) }}' target='_blank'>Copy</a>
@endif
				
				<span> <input type="file" id="exampleInputFile1" class="inputfile" name="pan_image">
				<img src="{{url('/img/upload_icon.png')}}" alt="" title=""/> 

				 Upload</span> 
				 
				 
			  </div>
			  </div>
			</div>
			
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Owner's Name:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Authority Name"> -->
				{{Form::text('contact_person', null, array('class' => 'form-control required','placeholder'=>"Owner's Name"))}}
			  </div>
			</div>
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">IATA Number:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="IATA Number"> -->
				{{Form::number('iata_no', null, array('class' => 'form-control required','placeholder'=>"IATA Number"))}}
			  </div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Valid From:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Valid From (Document)"> -->
				{{Form::text('valid_from', null, array('class' => 'form-control required datepicker','placeholder'=>"Valid From (Document)"))}}
			  </div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Valid Till:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Valid Till (Document)"> -->
				{{Form::text('valid_till', null, array('class' => 'form-control required datepicker','placeholder'=>"Valid Till (Document)"))}}
			  </div>
			</div>
			
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Credit Limit:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Credit Limit"> -->
				{{Form::text('credit_limit', null, array('class' => 'form-control required','placeholder'=>"Credit Limit"))}}
			  </div>
			</div>
		</div>	
			<div class="">
				<div class="v-hr"></div>
			</div>
			
			
			
</div>
@endif
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
				<label for="">Address Line1:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Company Name"> -->
				{{Form::text('address_line1', null, array('class' => 'form-control required','placeholder'=>"Address Line1"))}}
			  </div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Address Line2:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Company Name"> -->
				{{Form::text('address_line2', null, array('class' => 'form-control required','placeholder'=>"Address Line2"))}}
			  </div>
			</div>
			
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">City:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Past Experience"> -->
				{{Form::select('city', cities(),null,array('class' => 'form-control required','placeholder'=>"City"))}}
			  </div>
			</div> 
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">State:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Founded On"> -->
				{{Form::select('state', states(),null,array('class' => 'form-control required','placeholder'=>"State"))}}
			  </div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Country:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="Company Type"> -->
				{{Form::select('country', countries(),null,array('class' => 'form-control required','placeholder'=>"Country"))}}
				
			  </div>
			</div>
			
			
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label for="">Zip Code:</label>
				<!-- <input type="email" class="form-control" id="" placeholder="PAN"> -->
				{{Form::number('zip_code', null, array('class' => 'form-control required','placeholder'=>"Zip Code"))}}
			  </div>
			</div>
			@if((isAdmin() || $controller=='subagents'))
			<div class="col-md-4 col-sm-4 col-xs-12">
			  <div class="form-group">
				<label>
				{{Form::checkbox('send_email', null)}}

				  <!-- <input type="checkbox">  -->Send Mail
				</label>	
			  </div>
			</div>
			@endif
		</div><!--add-more ends here-->
		
			
				<div id="addedfRows"></div>
		<div class="submit_btn">
			<div class="button-inline">
				<button type="submit" class="btn-submit"  onclick="$('#_Form').validate();">Submit</button>
				<a class="btn-cancel btn-close" href="{{ url('agency') }}">Cancel</a>
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
