// Contact Page

   // Map Address
    function initMap() {   
      var achee = {lat: -33.4229846, lng: -70.6156507};
      var map = new google.maps.Map(document.getElementById('map'), {
        center: achee,      
          zoom: 18,
          scrollwheel: false,
        navigationControl: false,
        mapTypeControl: false,
        //scaleControl: true,
        draggable: true,
        });
      var marker = new google.maps.Marker({
          position: achee,
          map: map,
          title: 'Agencia de Eficiencia Energética'
      });
      
      var contentString = '<div id="map-info">'+            
            '<h1 class="map-info-title">ACHEE</h1>'+
            '<div class="map-info-address">'+
            '<p>Agencia Chilena de Eficiencia Energética</p>'+            
            '<p>Monseñor Sotero Sanz 221, Providencia.Santiago - Chile</p>'
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });


        google.maps.event.addDomListener(window, 'resize', function() {
         map.setCenter(achee);
        });
    }




$(function(){
   
    // effect
    $('.input-contact').on('focusin',function(){            
      var label = $(this).parent().parent().find('label');
      if($(this).val()==""){
        label.addClass('active');
      }     
    });

    $('.input-contact').on('focusout',function(){ 
      var label = $(this).parent().parent().find('label');      
      if($(this).val()==""){
        label.removeClass('active');
      }
      else{
        label.addClass('active');
      }
    });

    // for submit post effect
    $('.input-contact').each(function(index, value){
      var label = $(this).parent().parent().find('label');                  
      if($(this).val()!==""){
        label.addClass('active');       
      }
      
    });




    
});