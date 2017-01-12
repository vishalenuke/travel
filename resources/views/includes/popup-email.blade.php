<div class="forgot_password">
			<div class="modal fade" id="emailModalLabel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="emailModalLabel">Send Email</h4>
				  </div>
				  <div class="modal-body clearfix">
							{!! Form::open(array('url' => '#','class'=>'form-inline','id'=>'emailModalForm','method'=>'post')) !!} 
							  <div class="row">
							  <div class="col-md-12">
								  <div class="">
									<textarea class="form-control required" id="exampleInputEmail1" placeholder="Enter Your Message Here...." name="message"></textarea>
								  </div>
							  </div>
							 </div>
							 <div class="col-md-12 rPadding">
								 	<div class="form-group pull-right">
								 	 <button type="submit" class="btn btn-reset" onclick="$('#emailModalForm').validate();">Send</button>
								  </div>
							  </div>
							  
							{!! Form::close() !!}
								
							  
							
				  </div>
				 
				</div>
			  </div>
			</div>
		</div>

