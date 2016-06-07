$(function(){

	 /** NEWS FILTERS */

    function addParameterToURL(url, param){      
      url += (url.split('?')[1] ? '&':'?') + param;
      return url;
    }
	    
    $('.news-filter').change(function () {
        // si algun filtro cambia formar URL
        var lineamiento = $('#lineamiento-list').val();
        var cat = $('#cat-list').val();
        var tag = $('#tag-list').val();
        var url = $('#current_url').val();        
        var redirect = true;

        if(lineamiento!=""){
          url = addParameterToURL(url,'lineamiento='+lineamiento)        	
        }

        if(cat!=""){
          url = addParameterToURL(url,'cat='+cat)        	
        }

        if(tag!="" && tag!=null && tag!="Sin Etiqueta"){
          url = addParameterToURL(url,'tag='+tag)        	
        }    

        if(redirect)
          window.location.href = url;

    });



	// SELECT 2 FILTER
	$('.select2-fake').select2({minimumResultsForSearch: -1});


	// LOAD TAGS AJAX

	$("#tag-list").select2({
	  // tags: true,
   //    tokenSeparators: [',', ' '],
   //    multiple: true,
      placeholder: "Ingrese una Etiqueta",
      allowClear: true,
      ajax: {
      url: tags_autocomplete.ajax_url,
      dataType: 'json',
      delay: 250,
      type: 'post',
      data: function (params) {
        return {
          q: params.term, // search term
          //page: params.page
          action: 'get_tag_by_cat',
          cat: $('#cat-list').val(),
          lineamiento: $('#lineamiento-list').val()
        };
      },
      processResults: function (data, params) {
      //   // parse the results into the format expected by Select2
      //   // since we are using custom formatting functions we do not need to
      //   // alter the remote JSON data, except to indicate that infinite
      //   // scrolling can be used
      //   params.page = params.page || 1;
   
         return {
           results: data.items,
      //     pagination: {
      //       more: (params.page * 30) < data.total_count
      //     }
         };
      },
      // cache: true
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 3,
    //templateResult: formatRepo, // omitted for brevity, see the source of this page
    //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
  });

	// option for remove tag
	if($('#tag-list option').size()>1){
		$('#tag-list').select2({data: [{id: '', text: 'Sin Etiqueta'}]});
	}


});

