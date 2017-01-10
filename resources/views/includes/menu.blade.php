<?php if(!(isset($type) and $type) ){
	$type=strtolower(isset($keys['controller'])?$keys['controller']:'');

	}?>
<div class="" id="middle-menu">
			<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 rPadding">
							<div class="middle-menu-list">
								<ul class="list-inline left-list">
									<!-- <li><a href="#"><i class="fa fa-bars"></i></a>
									
									<div class="dropdown-content">
										<a href="#">Link 1</a>
										<a href="#">Link 2</a>
										<a href="#">Link 3</a>
									</div>
									
									</li> -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Management<span class="caret"></span></a>
										@if(hasPermission())
										<ul class="dropdown-menu">

										@if(isAdmin())
											<li><a class="drpmenu" href="{{url('pending/applications')}}">Pending Applications</a></li>
											<li><a class="drpmenu" href="{{url('agency')}}">Agent Management</a></li>
											<li><a class="drpmenu" href="{{url('airline')}}">Airline Management</a></li>
											<li><a class="drpmenu" href="{{url('whitelabel')}}">White Label</a></li>
										@else
											<li><a class="drpmenu" href="{{url('subagents')}}">Sub Agent Management</a></li>
											<li><a class="drpmenu" href="{{url('whitelabelpage')}}">White Label</a></li>
										@endif
											
											
										</ul>
										@endif
									</li>
									<li><h4><div id="drpmenu">
									
								</div></h4></li>
									
								</ul>
								
								<ul class="list-inline clearfix">
								@if(hasPermission())
									<li class="pull-right"><a href="{{url('/'.$type.'/create?action=create')}}" class="btn btn-add"><img src="{{url('img/add.png')}}" alt="" title=""/> {{Auth::user() && Auth::user()->role!="admin"?($type=="whitelabelpage"?"Add Page":"Add"):"Add"}}</a></li>
								@endif
								</ul>
							</div>
						</div>
					</div>
			</div>
		</div>