@extends('layouts.travel-login')

@section('content')
<section class="login-container">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-xs-12">
						<div class="login-wrapper">
							<div class="inner_logo text-center">
								<a href="#"><img src="{{url('/img/inner_logo.png')}}" alt="" title=""/></a>
							</div>
							{!! Form::open(array('url' => '/auth/login', 'id'=>'login')) !!} 
							  <div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								{{Form::text('email', null, array('class' => 'form-control required','placeholder'=>"Email","id"=>"email" ))}}
								<!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"> -->
							  </div>
							  <div class="form-group">
								<label for="exampleInputPassword1">Password</label>
						{{Form::password('password',  array('class' => 'form-control required','placeholder'=>"Password","id"=>"password"))}}
								<!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
							  </div>
							 
							  <button type="submit" class="btn btn-login">Login</button>
							  <ul class="list-inline">
							  <li> <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">Forgot Password</a></li>
							  <li> <a href="{{url('/register')}}">Sign Up</a></li>
							  </ul>
							 
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>	
		</section>
		<!-- Modal -->
		<div class="forgot_password">
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
				  </div>
				  <div class="modal-body">
							{!! Form::open(array('url' => '/password/email','class'=>'form-inline')) !!} 
							  <div class="form-group">
								
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email Your Email Address">
							  </div>
							 
							  <button type="submit" class="btn btn-reset">Send Password</button>
							  
							{!! Form::close() !!}
				  </div>
				 
				</div>
			  </div>
			</div>
		</div>
@endsection	

