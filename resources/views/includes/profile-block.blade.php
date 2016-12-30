
<?php 
use App\Category;
$count=0;

$category_show=Config::get('constants.category_show');
if(Auth::User())
{
	$cat=Category::where('slug',$type)->first();
	$title=$category_show[$cat->category_id];
	$id=$cat->category_id;
	$arr_id=array(4,5,6,7);
	if(in_array($id,$arr_id))
	$count=Auth::User()->getProfileCount($id);
	
}
?>

<div class="profile-list">
	<div class="single-profile">
		<div class="row">
			<div class="col-sm-7">
				<h4>{{ucfirst($title)}}</h4>				
			</div>
			<div class="col-sm-5">
				<div class="profile-list-action">
					<div class=" text-right">
								<a href="{{url('/profile/'.$type.'/create')}}" type="button" class="createProfile btn btn-primary btn-lg" {{$count?"disabled='disabled'":""}} onclick="return {{ $count?' false;':';'}}"><i class="fa fa-user-plus"></i> Create Profile</a>
					</div>
				</div><!--/profile list action-->
			</div>
		</div>
	</div><!--/single-profile-->
</div>
<br/>
@if(empty($profiles))
<div class="alert alert-danger">
  <strong>You have not added any "{{$title}}" profile.</strong> 
</div> 
@else


<div class="profile-list">

@foreach ($profiles as $profile)
<div class="single-profile">
	<div class="row">
		<div class="col-sm-7">
			<h4><a href="profiles/{{$type}}/{{$profile['profile_id']}}">{{ ucfirst(isset($profile['title'])?$profile['title']:$profile['job_title']) }}</a></h4>			
				<div class="location-widget">
				<ul>
				@if($profile['country'])<li><span class="icon country"></span>{{$profile['country']}}</li>@endif	
				@if($profile['state'])<li><span class="icon state"></span>{{$profile['state']}}</li>@endif
				@if($profile['city'])<li><span class="icon city"></span><h6>{{$profile['city']}}</h6></li>@endif
				</ul>
				</div>
		</div>
		<div class="col-sm-5">
			<div class="profile-list-action">
				<ul>
					@if(!($type==="job" || $type==="job-seeker" ))<li><a href="profile/chat-message/{{$profile['profile_id']}}" title="Chat Message"><i class="fa fa-weixin"></i>@if($chat_count=getUnreadChat( Auth::User()->user_id, $profile['profile_id'] ))<span class="chat-count">{{ $chat_count}}</span>@endif</a></li>
					@endif
					<li><a href="/mail/{{$profile['profile_id']}}?outbox" name="outbox" value="outbox" title="Outbox"><i class="fa fa-envelope-o"></i></a></li>
					<li><a href="/mail/{{$profile['profile_id']}}?inbox" name="inbox" value="inbox" title="Inbox"><i class="fa fa-inbox"></i>@if($msg_count=getUnreadMessage( Auth::User()->user_id, $profile['profile_id'] ))<span class="chat-count">{{ $msg_count}}</span>@endif</a></li>
					
					<li><a href="profile/{{$type}}/edit/{{$profile['profile_id']}}" title="Edit"><i class="fa fa-pencil-square-o"></i></a></li>			@if(Auth::User()->user_id==$profile['user_id'] and ($profile['status']=="0" or $profile['status']=="2") or $type==="job")
					<li><a href="profile/{{$profile['profile_id']}}" class="confirm" title="Delete" ><i class="fa fa-trash"></i></a></li>
@endif
<?php if ($profile['status']){$cl='success';$st="Active"; }

								else{	$cl='danger';  $st="Inactive";} ?>
							
							<?php $link="#";
								if ($profile['status']!="2")
								{$link="/profile/".$profile['profile_id']."/status"; }
							 ?>
<li></li>						
							<label >
							@if(!($type==="job"))
							<a class="btn btn-small btn-{{$cl}}" href="{{$link}}" >
								{{$st}}					
							</a>
							@endif
							</label>
				</ul>
				
				
			</div><!--/profile list action-->
		</div>
	</div>
</div><!--/single-profile-->
@endforeach	
						
</div><!--/profile list-->
@endif

