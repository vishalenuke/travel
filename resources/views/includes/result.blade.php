@foreach($data as $value)
<?php $controller=strtolower(isset($keys['controller'])?$keys['controller']:'') ?>
	<li onclick="show('{{$value[$keys[2]]}}','{{$controller}}')" >
		<div class="media">
		  <div class="media-left">
			<a href="#">
			<?php $image_url=imageUrl($value,$keys); ?>
			  <img class="media-object img-circle" src="{{$image_url}}" alt="{{isset($keys[0])?ucwords($value[$keys[0]]):''}}" width="40" height="40" >
			</a>
		  </div>
		  <div class="media-body">

			@if(isset($keys[0]))<h4 class="media-heading">{{ucwords($value[$keys[0]])}}</h4>@endif
			@if(isset($keys[1]))<p>{{$value[$keys[1]]?"Aproved":"Not aproved"}}</p>@endif
		  </div>
		</div>
		<div class="action">
		@if(!isset($pending))
      		@if(isset($keys[2]))<a href="javascript:void(0)"  onclick="edit('{{$value[$keys[2]]}}','{{$controller}}')">Edit</a>
      		{!! Form::open(array('route' => array($controller.'.destroy', $value[$keys[2]]), 'method' => 'delete')) !!}
		        <button class='btn btn-danger pull-right btn-xs' type="submit">Delete</button>
		    {!! Form::close() !!}
		    @endif
		@else
			<button class='btn btn-danger pull-right btn-xs' type="submit">Pending...</button>
		@endif
      	</div>
	</li>
@endforeach	