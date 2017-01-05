  
$(document).ready(function() {
// 	$("#_Form").bind('submit',function(e) {

// 	    var url = "path/to/your/script.php"; // the script where you handle the form input.
// alert("hello");
// 	    // $.ajax({
// 	    //        type: "put",
// 	    //        url: url,
// 	    //        data: $("#idForm").serialize(), // serializes the form's elements.
// 	    //        success: function(data)
// 	    //        {
// 	    //            alert(data); // show response from the php script.
// 	    //        }
// 	    //      });

// 	    e.preventDefault(); // avoid to execute the actual submit of the form.
// 	});
// $('#result').click(function(){
// 	$('#resultModal').modal('show');
// });

// $( ".inner-right-side" ).height($( document ).height()-($( "#middle-menu" ).height()*(5/2)+$( "#site-header" ).height()*2));
// $( ".inner-right-side" ).height($( document ).height()-($( "#middle-menu" ).outerHeight()+$( "#site-header" ).outerHeight()+$( "#site-footer" ).outerHeight()));
 
$('#login').bind("submit",function(e){
	//  if(!requiredFieldsError())
	// e.preventDefault();
// 	var validator = $( "#login" ).validate({
//   rules: {
//     name: "required",
//     email: {
//       required: true,
//       email: true
//     }
//   },
//   messages: {
//     name: "Please specify your name",
//     email: {
//       required: "We need your email address to contact you",
//       email: "Your email address must be in the format of name@domain.com"
//     }
//   }
// });
// 	validator.form();

});
jQuery.extend(jQuery.validator.messages, {
    required: "Required*",
    remote: "Please fix this field.",
    email: "Please enter a valid email address.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Please enter at least {0} characters."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});
$("#login").validate();
$("#_Form").validate();

 $('#resultModal').modal('show');
    $('#example').DataTable( 
	{
	paging: true,
    "order": [[ 1, "desc" ]]
    } );
	
	$('#example2').DataTable( 
	{
	paging: true,
    "order": [[ 1, "desc" ]]
    } );
	
	$('#example3').DataTable( 
	{
	paging: true,
    "order": [[ 1, "desc" ]]
    } );
	
	$('#example4').DataTable( 
	{
	paging: true,
    "order": [[ 1, "desc" ]]
    } );
	// $(".agent-delete").click(function(){

	// 	var id=$(this).data('id');
		
	// 	if(id && confirm("Do you want to delete.")){
	// 		$.ajax({
	// 			url: "/agency/"+id,
	// 			type: "delete",
	// 			success: function(){
	// 				alert('success');
	// 			}
	// 		});
	// 	}
		
	// });
});


var rowCount = 1;
	function addMoreMRows(frm) {
	rowCount ++;
	var mngRow = '<div class="add-more row" id="rowCount'+rowCount+'"><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label for="">Address:</label><input type="email" class="form-control" id="" placeholder="Company Name"> </div></div><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label for="">Country:</label><input type="email" class="form-control" id="" placeholder="Company Type"> </div></div><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label for="">State:</label><input type="email" class="form-control" id="" placeholder="Founded On"> </div></div><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label for="">City:</label><input type="email" class="form-control" id="" placeholder="Past Experience"> </div></div><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label for="">PIN:</label><input type="email" class="form-control" id="" placeholder="PAN"> </div></div><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label><input type="checkbox"> Do not Send Mail</label> </div></div><button type="button" title="Delete row" onclick="removeRow('+rowCount+');" class="btn btn-danger"><i class="fa fa-minus"></i></button></div>';
	jQuery('#addedfRows').append(mngRow);
	}

	
	function removeRow(removeNum) {
	jQuery('#rowCount'+removeNum).remove();
	}
	function search(value,controller=''){
		// $.ajax({
		// 		url: '/search?value='+value,
		// 		type: "get",
		// 		success: function(data){
		// 			alert(data);
		// 			//console.log(data);
		// 		}
		// 	});
		//if(value){
			
		//alert(controller.toLowerCase());
		if(controller)
			controller=controller.toLowerCase()+'-';
			$.get('/'+controller+'search?value='+value, function(data)
		{
		    //alert(data);
		    $(".list-unstyled").html(data);
		});
		//}
		
	}
	function edit(id,controller=''){
		var search=$('.search').val();
		search= search ? '?value='+search :'';
		if(controller)
			controller=controller.toLowerCase();
		var url='/'+controller+'/'+id+'/edit?action=edit&&'+search;
		//alert(url);
		if(id){
			$.get(url , function(data)
			{
			    //alert(data);
			    $(".inner-right-side").html(data);
			}).done(function(){  
			});
		}
		
	}
	function show(id,controller=''){
		var search=$('.search').val();
		search= search ? '?value='+search :'';
		if(controller)
			controller=controller.toLowerCase();
		//var url='/'+controller+'/'+id+'/subagents?action=show&&'+search;
		var url='/'+controller+'/'+id;
		// if(controller=='agency')
		//  url+='/subagents';
		//alert(url);
		if(id){
			$.get(url , function(data)
			{
			    //alert(data);
			    $(".inner-right-side").html(data);
			}).done(function(){  
			});
		}
		
	}

function _delete1(id,controller=''){
	//if(confirm("Do you want to delete.")){
		// var search=$('.search').val();
		// search= search ? '?value='+search :'';
		if(controller)
			controller=controller.toLowerCase();
		var url='/'+controller+'/'+id;
		var _token=$('#__token').data('id');
		
		if(id){
			$.ajax({
			    url: url,
			    type: 'DELETE',
			    data: { _token:_token},
			    success: function(data) {
			        location.reload();
			    }
			});			
		}
	//}		
}
function _delete(id,controller=''){
	//_delete1(id,controller);	
	$('#deleteModal').modal('show');
	$('#confirm_message').html('Do you really want to delete.');
	$('#delete_popup').html('Delete');
	$('#delete_popup').removeClass('btn-danger');
	$('#delete_popup').addClass('btn-danger');
	$('#delete_popup').attr('onclick',"_delete1("+id+",'"+controller+"')");	
}
function approve(id,controller=''){
	//_delete1(id,controller);	
	$('#deleteModal').modal('show');
	$('#confirm_message').html('Do you really want to approve.');
	$('#delete_popup').html('Approve');
	$('#delete_popup').removeClass('btn-success');
	$('#delete_popup').addClass('btn-success');
	$('#delete_popup').attr('onclick',"approve1("+id+",'"+controller+"')");	
}
function approve1(id,controller){
	
		// var search=$('.search').val();
		// search= search ? '?value='+search :'';
		if(controller)
			controller=controller.toLowerCase();
		var url='/'+controller+'/'+id+'/approve';
		var _token=$('#__token').data('id');
		
		
			$.ajax({
			    url: url,
			    type: 'GET',
			    data: { _token:_token},
			    success: function(data) {
			        location.reload();
			    }
			});
			
		
	
		
		
}
function requiredFieldsError()
{
	var firtObj='';
	jQuery(".required").each(function(){	

		var obj = $(this);	
    	var val=obj.val();
    	var errorId=obj.attr('id');		
			if(val==="" || val==null){
				showSubmitError(obj);
				if(firtObj=='')
				{
					firtObj=errorId;
				}				
				flag= false;
			}					        					    
    
	});
	if(firtObj!='')
	$('#'+firtObj).focus();
	return flag;
}

function showSubmitError(obj)
{
	var errorId=obj.attr('id');
	var msg=obj.data("msg");
	
	var messg='Required*';   		        		
	if(typeof(msg)!='undefined')
	{
		messg=msg;
	}

	if (errorId!='undefined') {
		jQuery('#'+errorId+'_error').remove();
	obj.parent().append( "<div id='"+errorId+"_error' class='errorMessage'>"+messg+"</div>" );
	jQuery('#'+errorId+'_error').show();
	}

}
