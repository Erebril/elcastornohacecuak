// ==========  START GOOGLE MAP ========== //
// function initialize() {
  
// var myLatLng = new google.maps.LatLng(-33.4435392,-70.6498049);

// var mapOptions = {
//     zoom: 15,
//     center: myLatLng,
// 	disableDefaultUI: false,
// 	scrollwheel: false,
//     navigationControl: false,
//     mapTypeControl: false,
//     scaleControl: true,
//     draggable: true,
//     mapTypeControlOptions: {
//     /*mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'roadatlas']*/
//     }
//   };

//   var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  
   
//   var marker = new google.maps.Marker({
//       position: myLatLng,
//       map: map,
//       //icon: 'img/location-icon.png',
// 	  title: 'NaturMedizin',
//   });
  
//   var contentString = '<div style="max-width: 300px" id="content">'+
//       '<div id="bodyContent">'+
// 	  '<h5 class="color-primary"><strong>NaturMedizin</strong></h5>' +
//       '<p style="font-size: 12px">Especialistas en Medicina Natural. Ofrecemos HomeopatÃ­a, Fitoterapia y Recetario,' +
//       '</p>'+
//       '</div>'+
//       '</div>';

//   var infowindow = new google.maps.InfoWindow({
//       content: contentString
//   });
  
//   google.maps.event.addListener(marker, 'click', function() {
//     infowindow.open(map,marker);
//   });

//   var styledMapOptions = {
//     name: 'US Road Atlas'
//   };

//   var usRoadMapType = new google.maps.StyledMapType(styledMapOptions);

//   map.mapTypes.set('roadatlas', usRoadMapType);
//   map.setMapTypeId('roadatlas');

//   console.log("GOOOGLEEE");

// }

// google.maps.event.addDomListener(window, "load", initialize);
// ========== END GOOGLE MAP ========== //