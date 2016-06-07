$(function(){

	 /** LICITA FILTERS */

    function addParameterToURL(url, param){      
      url += (url.split('?')[1] ? '&':'?') + param;
      return url;
    }
	    
    $('.news-filter').change(function () {
        // si algun filtro cambia formar URL
        var area = $('#licita-list').val();        
        var url = $('#current_url').val();        
        var redirect = true;

        if(area!=""){
          url = addParameterToURL(url,'area='+area)        	
        }
       
        if(redirect)
          window.location.href = url;

    });


	/** SELECT 2 FILTER **/
	$('.select2-fake').select2({minimumResultsForSearch: -1});



});

