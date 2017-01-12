<div class="agent_detail clearfix">
	<!-- <h1>Sub Agent Listing (Broker 1)</h1> -->
	<h1>Sub Agent Listing</h1>
		<div class="table-responsive">
			<table id="example" class="table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Sub Agent Name</th>
							<th>Role</th>
							<th>Status</th>
							<th>Created At</th>
							<th>Action</th>
							
						</tr>
					</thead>
					
					<tbody>
						@foreach($data as $value)
				<?php $controller=strtolower(isset($keys['controller'])?$keys['controller']:'') ?>
				<tr>
					<td>{{ isset($keys[0])?ucwords($value[$keys[0]]):''}}</td>
					<td>{{ isset($value['role'])?$value['role']:''}}</td>
					<td style="color: red;" >Not Approved</td>
					<td>{{ isset($keys[3])?ucwords($value[$keys[3]]):''}}</td>
					<td>
					<div class="action-list">
						<ul class="list-inline">
						<li>
      			<button type="button"  title="Edit" class="btn btn-default" onclick="edit('{{$value[$keys[2]]}}','subagents')"><i class="fa fa-pencil"></i></button></li>
      			<li>
      			<a href="javascript:void(0)" onclick="_delete('{{$value[$keys[2]]}}','subagents')" ><img src="{{url('/img/user_trash.png')}}" alt="" title=""/></a>
	      		
			    </li>
						</ul>

					</div>
					</td>
					
				</tr>
			@endforeach	
						
					</tbody>
			</table>
		</div>
</div>
							
						