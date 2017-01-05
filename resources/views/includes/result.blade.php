
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
			@if(isset($value['city']))
			{{isset(cities()[$value['city']])?cities()[$value['city']]:''}}
			@endif
			@if(isset($value['state']))
			{{isset(states()[$value['state']])?states()[$value['state']]:''}}
			@endif
			@if(isset($value['country']))
			{{isset(countries()[$value['country']])?countries()[$value['country']]:''}}
			@endif


			    

		  </div>
		</div>
		<div class="action">
			
		

      		@if(isset($keys[2]))
      			<!-- <a href="javascript:void(0)"  onclick="edit('{{$value[$keys[2]]}}','{{$controller}}')"><i class="fa fa-user"></i></a> -->
      			<ul class="list-inline">
      			@if($controller=="agency")
      			<li>
      			<button type="button"  title="User" class="btn btn-default" onclick="show('{{$value[$keys[2]]}}','{{$controller}}')"><i class="fa fa-user"></i></button></li>
      			@endif
      			@if(!isset($pending))
      			<li>
      			<button type="button"  title="Edit" class="btn btn-default" onclick="edit('{{$value[$keys[2]]}}','{{$controller}}')"><i class="fa fa-pencil"></i></button></li>
      			<li>
      			<a href="javascript:void(0)" onclick="_delete('{{$value[$keys[2]]}}','{{$controller}}')" ><img src="{{url('/img/user_trash.png')}}" alt="" title=""/></a>
	      		
			    </li>
			    @endif
			    </ul>
		    @endif

		
      	</div>
	</li>
@endforeach	
@endif