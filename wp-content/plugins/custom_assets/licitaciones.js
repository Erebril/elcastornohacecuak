jQuery(document).ready(function($) {
	// Enable/Disabled other type
	$('#licita_field_type').on('change',function(){
		if($(this).val()=="otro"){
			$('#licita_field_type_other_div').removeClass('input-hide');			
		}
		else{
			$('#licita_field_type_other_div').addClass('input-hide');			
		}
	});
	if($('#licita_field_type').val()=="otro"){
		$('#licita_field_type_other_div').removeClass('input-hide');			
	}





	//Enable market link
	$('#licita_field_market').on('change',function(){		
		if($(this).is(':checked')){
			$('#market-link-content').removeClass('input-hide');			
			$(this).val(1);
		}
		else{
			$('#market-link-content').addClass('input-hide');			
			$(this).val(0);
		}
	});

});