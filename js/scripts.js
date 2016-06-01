jQuery(function($) {
    console.log( "ready!" );
	$('body').fadeIn();
	
	
	
	$(".sp_verify_submit").on("click", function(){
		
		
		if($('.sp_day').val() == '' || $('.sp_month').val() == ''  || $('.sp_year').val() == ''){
			
			alert("Please fill our your date of birth!");
		}else{
		$('.sp_submit_form').submit();	
		}
		
		return false;
		
	});
});