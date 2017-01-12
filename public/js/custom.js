$(".button-collapse").sideNav();
$('select').material_select();
$(document).ready(function() {
    Materialize.updateTextFields();
  });
 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
		
//============= Preload ============ 
function preloader(){
$(".preloaderimg").fadeOut();
$(".preloader").delay(200).fadeOut("slow").delay(200, function()
{
	$(this).remove();
});
}	

$('#hide').click(
    function () {
        //show its submenu
        $("#rightMenu").stop().slideToggle(100);    
    }
);


