@if(hasPermission())
@foreach($data as $value)
<?php $controller=strtolower(isset($keys['controller'])?$keys['controller']:'') ?>
	<li  >
		<div class="media">
		  <div class="media-left">
			<a href="#">
			<?php $image_url=imageUrl($value,$keys); ?>
			  <img class="media-object img-circle" src="{{$image_url}}" alt="{{isset($keys[0])?ucwords($value[$keys[0]]):''}}" >
			</a>
		  </div>
		  <div class="media-body">

			@if(isset($keys[0]))<h4 class="media-heading">{{ucwords($value[$keys[0]])}}</h4>@endif
			@if(isset($keys[1]) && $controller=="agency")
				<p>{!! $value[$keys[1]]?'Aproved':'<font color="red">Not aproved</font>' !!}</p>
			@endif
		  </div>
		</div>
		<div class="action">
			
		@if(!isset($pending))

      		@if(isset($keys[2]))
      			<!-- <a href="javascript:void(0)"  onclick="edit('{{$value[$keys[2]]}}','{{$controller}}')"><i class="fa fa-user"></i></a> -->
      			<ul class="list-inline">
      			@if($controller=="agency")
      			<li>
      			<button type="button"  title="User" class="btn btn-default" onclick="show('{{$value[$keys[2]]}}','{{$controller}}')"><i class="fa fa-user"></i></button></li>
      			@endif
      			<li>
      			<button type="button"  title="Edit" class="btn btn-default" onclick="edit('{{$value[$keys[2]]}}','{{$controller}}')"><i class="fa fa-pencil"></i></button></li>
      			<li>
	      		{!! Form::open(array('route' => array($controller.'.destroy', $value[$keys[2]]), 'method' => 'delete')) !!}
	      		<button type="button" title="Delete" class="btn btn-default"><i class="fa fa-trash"></i></button>
			       <!--  <button class='btn btn-danger pull-right btn-xs' type="submit"><i class="fa fa-user"></i></button> -->
			    {!! Form::close() !!}
			    </li>
			    </ul>
		    @endif

		@else
			<button class='btn btn-danger pull-right btn-xs' type="submit">Pending...</button>
		@endif
      	</div>
	</li>
@endforeach	
@endif