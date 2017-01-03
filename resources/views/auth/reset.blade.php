@extends('layouts.travel-login')

@section('content')

<div class="page-data">
	<div class="container">
		<div class="form-cont">
			<h3>Reset Password</h3>
			<div class="row">
			
				
			
				<div class="col-md-6 col-md-offset-3">
					{!! Form::open(array('url' => 'password/reset','id'=>'reset_form')) !!} 
						<div class="form-group">
							
							 <input type="hidden" name="token" value="{{ $token }}">
							 <input type="text" class="form-control icon-field" name="email" placeholder="E-Mail*" value="{{ old('email') }}" autocomplete="on"  required>
							 <small>(For mobile number use example: 91-XXXXXXXXXX)</small>
							
							<span class="icon email-icon" style="margin-top:-20px;"></span>
						</div>

						<div class="form-group">
						
							<input type="password" class="form-control icon-field" name="password" placeholder="Enter new password*" required maxlength='15' autocomplete="off" id="password">
							<span class="icon password-icon"></span>
							
							
						</div>
						<div class="form-group">

							<input type="password" class="form-control icon-field" name="password_confirmation" placeholder="Confirm new password*" required maxlength='15' autocomplete="off" id="password_confirmation">
							<span class="icon password-icon"></span>
							<div id="password_error" class="errorMessage">
							
							</div>
							<!--<div class="check-cont show-pw">								
								<input type="checkbox" onchange="document.getElementById('password_confirmation').type = this.checked ? 'text' : 'password'" name="checkboxG2" id="checkboxG2" class="css-checkbox"/> 
								<label for="checkboxG2" class="css-label">show</label>
							</div>-->
						</div>
						
						<div class="form-group text-center">
							 <button type="submit" class="btn btn-primary btn-large btn-search">Reset Password</button> 							
						</div>
					{!! Form::close() !!} 
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(function($){
		
	$('#reset_form').bind("submit",function(e){					   
		//alert($('#password').val()===$('#password').val());
		jQuery('.errorMessage').hide();
			flag=true;
				v1=1;
	   if(!($('#password').val()===$('#password_confirmation').val())){
	   	$('#password_error').html('Password and confirm password not match.');
	   	$('#password_error').show();
	   	e.preventDefault();
	   	
	   }else{
	   	$('#password_error').html('');
	   	
				
				passwordMinLength($('#password'),6);
				passwordMinLength($('#password_confirmation'),6);	   
				
			   if(!flag){
			   	e.preventDefault();
			   	
			   } 
			 return flag;
	   } 
				 
	});
});
</script>
@endsection
{!! Session::forget('error') !!}
