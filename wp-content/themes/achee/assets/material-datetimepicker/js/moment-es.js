jQuery(function ($) { 


	function init_datepicker(){
		$('.datetime-picker').bootstrapMaterialDatePicker({
			            lang: 'es',
			            weekStart: 1,
			            format: 'LLL',
			            okText:  "Aceptar",
			            cancelText: "Cancelar",            
		});   			
		if($('#destroy-picker').val()==1){
			$('.datetime-picker').bootstrapMaterialDatePicker('init');
		}
	}

	function destroy_datepicker(){
		$('.datetime-picker').bootstrapMaterialDatePicker('destroy');
	}

	if($('#datetime-picker-op').length){
		if($('#datetime-picker-op').is(':checked')){
			 init_datepicker();
		}		

		$('#datetime-picker-op').on('click',function(){

			if($(this).is(':checked')){				
				init_datepicker();
				$('#datetime-picker-op').val(1);
			}
			else{				
				destroy_datepicker();
				$('#datetime-picker-op').val(0);
				$('#destroy-picker').val('1');
			}

		});


	}

 

   
    

});
