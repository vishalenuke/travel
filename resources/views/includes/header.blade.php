<header id="site-header" class="header">
			<div class="container">
				<div class="row">
						<!--header -->
						<?php $user_details=Auth::user();?>
						<?php $image_url=headerImageUrl($user_details?$user_details->image_url:''); ?>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="logo">
								<a href="#"><img src="{{url('/img/logo.png')}}" alt="" title=""/></a>
							</div>
						</div>
						
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="search-bar text-center">
								<form class="">
									<div class="form-group">
									  <input type="text" class="form-control" placeholder="Search">
									  <img src="{{url('/img/search-icon.png')}}" alt="" title=""/>
									</div>
								</form>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="user-login">
								<ul class="nav navbar-right">
									<li class="dropdown">
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									  
									  {{$name=$user_details?ucwords($user_details->first_name." ".$user_details->last_name." "):'First Name '}}<img src="{{$image_url}}" alt="{{$name}}" title="{{$name}}" width="40" height="40" class="img-circle" /> <span class="caret"></span></a>
									  <ul class="dropdown-menu">
										<li><a href="#">Profile</a></li>
										<li><a href="#">Setting</a></li>
										<li><a href="{{url('auth/logout')}}">Logout</a></li>
										
									  </ul>
									</li>
								</ul>
							</div>
						</div>
						
						<!--header ends-->
					
				</div>
			</div>
		</header>