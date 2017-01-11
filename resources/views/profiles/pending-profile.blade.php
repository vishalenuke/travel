<!--<form > -->

@if(!empty($user))
@include('includes.popup-email')
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
						<?php if(isset($user[$keys['image']])){unset($user[$keys['image']]);}
					if(isset($user[$keys[0]])){
						unset($user[$keys[0]]);
					}
					if(isset($user[$keys['last_name']])){
						unset($user[$keys['last_name']]);
					}?>
					</ul>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="right-text pull-right">
					
					<ul class="list-inline">
						<li class="btn btn-primary"><a href="javascript:void(0)" onclick="sendEmail('{{$id}}')"><!-- <i class="fa fa-edit"></i> --> Send Email</a></li>
						<li class="btn btn-primary"><a href="javascript:void(0)" onclick="rejectApplication('{{$id}}')"><!-- <i class="fa fa-edit"></i> --> Reject</a></li>
						<li class="btn btn-primary"><a href="javascript:void(0)" onclick="applicationApprove('{{$id}}','agency')"><!-- <i class="fa fa-edit"></i> --> Approve</a></li>
						
					</ul>
					
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

		  		{!!ucwords($value)!!}
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
