  
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
		var url='/'+controller+'/'+id+'/subagents';
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