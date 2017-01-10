<!--<form > -->

@if(!empty($user))
<?php 
$status= 0;
if(isset($user['user_status'])){
	$status= $user['user_status'];
	unset($user['user_status']);
	
}
?>
<div class="domain_detail clearfix">
<div class="row">
	<div class="heading-section clearfix">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="heading-left">
			<ul class="list-inline">
			<?php $image_url=imageUrl($user,$keys); 
			?>
				@if(isset($keys['image']))<li><img src="{{$image_url}}" class="img-circle"/></li>@endif
				@if(isset($keys[0]))<li>{{$user[$keys[0]]}}</li>@endif
				@if(isset($keys['last_name']))<li>{{$user[$keys['last_name']]}}</li>@endif
				<?php if(isset($keys['image']) && isset($user[$keys['image']])){unset($user[$keys['image']]);}
			if(isset($keys[0]) && isset($user[$keys[0]])){
				unset($user[$keys[0]]);
			}
			if(isset($keys['last_name']) && isset($user[$keys['last_name']])){
				unset($user[$keys['last_name']]);
			}?>
			</ul>
		</div>
	</div>

	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="right-text pull-right">
			@if(isset($id))
			<ul class="list-inline">
				<li class="btn btn-primary"><a href="javascript:void(0)" onclick="edit('{{$id}}','agency')"><i class="fa fa-edit"></i> Edit</a></li>
				@if(!isset($admin) && isAdmin())
				<li class="btn btn-block"><a href="javascript:void(0)" onclick="block('{{$id}}','agency')"><i class="fa fa-unlock{{$status?'-alt':''}}"></i> {{$status?"Block":"Enable"}}</a></li>
				<li class="btn btn-delete"><a href="javascript:void(0)" onclick="_delete('{{$id}}','agency')"><i class="fa fa-trash"></i> Delete</a></li>
				@endif
			</ul>
			@endif
		</div>
	</div>



	
</div>
</div>


	<div class="row">
	{{Form::hidden('_search', isset($keys['search'])?$keys['search']:'')}}
	<?php //print_r($user->fillable);die(); ?>
	
		@foreach($user as $key=>$value)
		<div class="col-md-6 col-sm-6 col-xs-12">
		  <div class="form-group">
		  <ul class="list-inline">
		  <li class="text-right">
		  @if($key=="created_at")
		  	<label >Created at:</label>
		  @elseif($key=="updated_at")
		  	<label >Updated at:</label>
		  @else
		  	{{Form::label($key, null)}}:
		  @endif
		  </li>
		 
			<li class="text-left">
			<?php //dd($value);die(); ?>
		  		{!! is_string($value)?ucwords($value):''!!}
		  	</li>
			
		  </ul>			
			
		  </div>
		</div>
		@endforeach
	
	</div>
	
		
</div>
@endif

 
<script type="text/javascript">
$(function () {

	$('.datepicker').datetimepicker({
	                format: 'YYYY-MM-DD'
	            });
});
</script>
