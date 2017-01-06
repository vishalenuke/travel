<div class="forgot_password">
			<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="deleteModalLabel">Confirm</h4>
				  </div>
				  <div class="modal-body">
							<center>
									<h4><div id="confirm_message">Do you really want to approve.Set commision rate.</div></h4>	
							</center>						
							  <br/>
							  {!! Form::open(array('class'=>'form-inline', 'id'=>'commission')) !!} 

							  <div class="form-group">
		<div class="row">

			<div class="col-md-3 col-sm-3 col-xs-12">
			  <div class="form-group">
				<label for="">PLB In(%):</label>
				
				
				{{Form::text('plb_in', null, array('class' => 'form-control required','placeholder'=>"PLB In","id"=>'plb_in'))}}
			  </div>
			</div>
		
			<div class="col-md-3 col-sm-3 col-xs-12">
			  <div class="form-group">
				<label for="">PLB Out(%):</label>	
				{{Form::text('plb_out', null, array('class' => 'form-control required','placeholder'=>"PLB Out","id"=>'plb_out'))}}
			  </div>
			</div>
		
			<div class="col-md-3 col-sm-3 col-xs-12">
			  <div class="form-group">
				<label for="">Commission In(%):</label>	
				{{Form::text('commission_in', null, array('class' => 'form-control required','placeholder'=>"Commission In","id"=>'commission_in'))}}
			  </div>
			</div>
		
			<div class="col-md-3 col-sm-3 col-xs-12">
			  <div class="form-group">
				<label for="">Commission Out(%):</label>	
				{{Form::text('commission_out', null, array('class' => 'form-control required','placeholder'=>"Commission Out","id"=>'commission_out'))}}
			  </div>
			</div>
		</div>
	  </div>
							 <div class="submit_btn">
								<div class="button-inline">
									<button type="submit" class="btn-submit">Approve</button>
									<button type="button" class="btn btn-reset " data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>
							  

							  
							{!! Form::close() !!}
							 
								
							  
							
				  </div>
				 
				</div>
			  </div>
			</div>
		</div>

