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

 <div class="submit_btn pull-right">
	<div class="button-inline">
	<button class="btn-submit" type="button" onclick="applicationApprove('{{$id}}','agency')">Approve</button>
	</div>
</div>
<h1>Agent's Profile</h1>
</div>

<!-- <div class="action-list">
						<ul class="list-inline">
						<li><a href="#"><img src="{{url('/img/user_detail.png')}}" alt="" title=""/></li>
						<li><a href="#"><img src="{{url('/img/user_edit.png')}}" alt="" title=""/></li>
						<li>
						
						</li>
						
						<li><a href="javascript:void(0)" onclick="_delete('{{$id}}','agency')" ><img src="{{url('/img/user_trash.png')}}" alt="" title=""/></a></li> 
						
						</ul>

					</div> -->

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
