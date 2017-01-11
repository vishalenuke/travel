<div class="forgot_password">
			<div class="modal fade" id="emailModalLabel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="emailModalLabel">Send Email</h4>
				  </div>
				  <div class="modal-body">
							{!! Form::open(array('url' => '#','class'=>'form-inline','id'=>'emailModalForm','method'=>'post')) !!} 
							  <div class="form-group">
								
								<textarea class="form-control required" id="exampleInputEmail1" placeholder="Message" name="message"></textarea>
							  </div>
							 
							  <button type="submit" class="btn btn-reset" onclick="$('#emailModalForm').validate();">Send</button>
							  
							{!! Form::close() !!}
								
							  
							
				  </div>
				 
				</div>
			  </div>
			</div>
		</div>

