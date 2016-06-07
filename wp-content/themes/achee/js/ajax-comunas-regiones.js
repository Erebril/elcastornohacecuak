$(function(){

  // Contact Page

	// LOAD PRECINCTS
	function listar_comunas(region){		
		$.ajax({
				url : ajax_general.ajax_url,
				type : 'post',
				dataType: 'json',				
				data : {
					action : 'precincts_by_region',
					name: region					
				}
			}).done(function(response){
				var options = '<option value="" selected>Seleccione una comuna</option>';
				if(typeof response ==='object'){
					for(i in response.rows){
						options += '<option value="'+response.rows[i].nombre+'">'+response.rows[i].nombre+'</option>';
					}

					$('.precinct_list').empty().append(options);
				}
			});
	}

	//LOAD PRECINCT ON CHANGE REGION
	$('.region_list').on('change',function(){
			var region = $(this).val();
			listar_comunas(region);
	});

	//POST SELECTED REGION
	if($('.region_list').length){
		listar_comunas($('.region_list').val());
		if( $('#contact_precinct').val()!=""){
			$('.precinct_list').val($('#contact_precinct').val());			
		}
	}

	//SET PRECINCT IN FORM
	$('.precinct_list').on('change',function(){
		$('#contact_precinct').val($(this).val());
	});



  //CONCTACT FORMS EFFECTS, HIDE, SHOW
  //Add options to select forms
  if($('.custom-form').length){
    var options_contact = '';
    $('.contacts-form').each(function(index, value){
      options_contact += '<option class="form-option" value="'+(index+1)+'">'+ $(this).data('title') +'</option>';
    });
    $('#select-forms').append(options_contact);
  
    // hide or show selected form
    $('#select-forms').on('change',function(){
      var index = $(this).val();
      $('.contacts-form').addClass('hide');
      $('.c'+index).removeClass('hide');      
      $('#contact_form_number').val(index);
    });
  }


    //   // sol2 php post hidden field
  //   if($('#contact_form_tag').val()!=""){
  //     var form_tag = $('#contact_form_tag').val();
  //     $('.contacts-form').addClass('hide');
  //     var form_active = $('#'+form_tag).parent();
  //     form_active.removeClass('hide');      
  //     $('#select-forms').val(form_active.data('number'));   
  //   }


  // }
    
});