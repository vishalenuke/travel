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
@if(isset($id))
	<div class="submit_btn pull-right">
		<div class="button-inline">
		<button class="btn-submit" type="button" onclick="edit('{{$id}}','agency')">Edit</button>
		</div>
	</div>
	@if(!isset($admin) && isAdmin())
		<div class="submit_btn pull-right">
			<div class="button-inline">
			<button class="btn-submit" type="button" onclick="_delete('{{$id}}','agency')">Delete</button>
			</div>
		</div>
		 <div class="submit_btn pull-right">
			<div class="button-inline">
			<button class="btn-{{$status?'cancel':'submit'}}" type="button" onclick="block('{{$id}}','agency')">{{$status?"Block":"Enable"}}</button>
			</div>
		</div>
		
	@endif
@endif
<h1>{{isset($admin)?"Admin's Details" :"Agent's Details"}}</h1>
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
