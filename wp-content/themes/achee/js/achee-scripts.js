jQuery(document).ready(function ($) {
	 
	// set active first item menu
	//$('nav.main-navigation .hide-on-med-and-down li').first().addClass('active');
	

	// Flecha Top
	$('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});
 
	$(window).scroll(function(){	
		if( $(this).scrollTop() > 300 ){
			$('.ir-arriba').slideDown(300);
		} else {
			$('.ir-arriba').slideUp(300);
		}
	});

     // Menu responsive
     $("#my-menu").mmenu({
     //options
               extensions: [
                  "border-full",
                  "pageshadow",
                  "theme-white",
                  "pagedim-black"
               ],
               offCanvas: {
                  position: "right"
               },
               counters: false,
               navbars: [
               		{
            			content: [ $('#search-form-responsive') ]
	           		},
	           		{
            			position: "bottom",
            			content: [ $('#mobile-social-network') ]
         			}
	           ]
     },{
     	//config
     });


    // Menu dropdown preventDefault
    $('#menu-principal li:first a').click(function(e){		
    	e.preventDefault();
    });

    // On Click outside menu secundario
   	// $(document).on("click", function(event){
    //     //var $trigger = $('#menu-principal li:first a');
    //     var block = $('#menu-secundario');
    //     if(block.hasClass('menu-open')){
    //         block.removeClass('menu-open');
    //         $('#menu-secundario-alt').toggleClass('hide');
    //     }
    // });

     // Dropdown on Hover
	// $('#menu-principal li:first a').hover(function(e){		
	//  	//$('#menu-secundario').addClass('menu-open');	
	// });

	$('#masthead').on('mouseover',function(e){

		var ancher = $(e.target);
		var xx;
		var xx_id;		
		
		// es del header => masthead
		if(ancher.parents('.nav-main-wrapper') || ancher.parents('.nav-top-wrapper').length){					
			// es otro elemento distinto de a#Sobre
			if(ancher.is('a')){				
				if(ancher.attr('href')=="#Sobre"){					
					$('#menu-secundario').addClass('menu-open');
				}
				else{					
					if(!ancher.parents('.secondMenu-navigation').length){
						//console.log("CERRAR");
						$('#menu-secundario').removeClass('menu-open');					
					}
				}
			}
			else{ // Si no es del secondMenu, cerrar
				if(!ancher.parents('.secondMenu-navigation').length){						
					$('#menu-secundario').removeClass('menu-open');					
				}				
			}		
		}
		//else if(!ancher.parents('.secondMenu-navigation').length){
			//$('#menu-secundario').removeClass('menu-open');
		//}

		//if(ancher.attr('href')!="#Sobre"){		


			// <> #menu-secundario			
			// xx = ancher.closest('ul');
			// xx_id = xx.attr('id');					
			// if(!ancher.hasClass('menu-second') && !xx.hasClass("sub-menu") && xx_id!="menu-menu-01-nosotros" && xx_id!="menu-menu-02-eficiencia-energetica" && xx_id!="menu-menu-03-asesoramiento" && xx_id!="menu-menu-04-formacion-de-capacidades"){
			// 	$('#menu-secundario').removeClass('menu-open');				
			// }
		//}		
	});

	// Dropdown on Leave mouse
	$('#menu-secundario').on("mouseleave", function(event){ 		
       $(this).removeClass('menu-open');        
    });
    
   

	// Dropdown Menu on Click
	// $('#menu-principal li:first a').click(function(e){
	// 	e.preventDefault();
	// 	if($('#menu-secundario-alt').length){
	// 		$('#menu-secundario-alt').toggleClass('hide');
	// 	}
	// 	$('#menu-secundario').toggleClass('menu-open');
	// });

	// // Dropdown disapear when click outside menu
	// $(document).on("click", function(event){
	 //        var $trigger = $('#menu-principal li:first a');
	 //        var block = $('#menu-secundario');
	 //        if($trigger[0] !== event.target && block.hasClass('menu-open')){
	 //            block.removeClass('menu-open');
	 //            $('#menu-secundario-alt').toggleClass('hide');
	 //        }
 //    });


	// TABS HOME
	var $ulTabs = $( "ul.sectiontabs" );
	var slideTabInterval;
	// When click on tab
	$('.sectiontabs .tab-link').on('click',function(){
			var tab_id = $(this).attr('data-tab');
			$('ul.sectiontabs .tab-link').removeClass('current');
			$('.sectiontab-content').removeClass('current');
			$(this).addClass('current');
			$("#"+tab_id).addClass('current');
			$ulTabs.removeClass('first second third fourth').addClass($(this).data('position'));
	});


	// Transition tabs
	function slide_tab_transition(){
		
		var tab = $ulTabs.find('li.current');
		var tab_active = tab.data('number') < 4 ? (tab.data('number')+1) : 1;
		$ulTabs.find('li:nth-child('+tab_active+')').trigger('click');
	}
	function start_slide_tab(){
		slideTabInterval = setInterval(slide_tab_transition, 10000);
	}
	//run transition tabs
	start_slide_tab();


	// slider home
	$('.slider').slider(
		{
			full_width: true,
			height: 350
		}
	);


	// Pause slide tab on hover and restart on unhover
	$('.tabwraper').hover(function(ev){		
	    clearInterval(slideTabInterval);
	}, function(ev){		
	    slideTabInterval = setInterval( slide_tab_transition, 10000);
	});





	// Ajuste de hover menu naranjo
	$('.secondary-navigation ul li:nth-of-type(1) a').hover(
		function() {
			$('.main-navigation ul li.active').addClass('arrowhover');
		}, function() {
			$('.main-navigation ul li.active').removeClass('arrowhover');
		}
	);


	$(document).ready(function(){
		//$('#workAreas').tabs();

		// icono de idioma
		$('.goog-te-menu-frame.skiptranslate').attr('style', 'display:block');

		// cambiar icono del menu busqueda
		// $( '.main-navigation .search-form' ).prepend( '<i class="fa fa-search"></i>' );
		// $( '.main-navigation .search-form .fa' ).click(function() {
		// 	$( this ).remove();
		// 	$( '.main-navigation .search-form label, .main-navigation .search-form input' ).css( 'opacity', '1' );
		// });

		//ajustar el alto de los div
		// var currentTallest = 0,
		// currentRowStart = 0,
		// rowDivs = new Array(),
		// $el,
		// topPosition = 0;

		// $('.menu').each(function() {
		// 	$el = $(this);
		// 	topPosition = $el.position().top;
		// 	if (currentRowStart != topPosition) {
		// 	// we just came to a new row.  Set all the heights on the completed row
		// 	for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
		// 		rowDivs[currentDiv].height(currentTallest);
		// 	}
		// 	// set the variables for the new row
		// 	rowDivs.length = 0; // empty the array
		// 	currentRowStart = topPosition;
		// 	currentTallest = $el.height();
		// 	rowDivs.push($el);
		// 	} else {
		// 		// another div on the current row.  Add it to the list and check if it's taller
		// 		rowDivs.push($el);
		// 		currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		// 	}
		// 	// do the last row
		// 	for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
		// 		rowDivs[currentDiv].height(currentTallest);
		// 	}
		// });
	});




	// owl-slider
	// http://www.owlcarousel.owlgraphic.com/docs/api-options.html
	// http://www.owlcarousel.owlgraphic.com/demos/responsive.html

	// OWL INIT SLIDE CORP & SUCCESS

	var owl_1 = $("#owl-slide-corp");
	owl_1.owlCarousel({
      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : [500,1], // itemsMobile disabled - inherit from itemsTablet option
      autoPlay: true
   });

	var owl_2 = $("#owl-slide-success");
	owl_2.owlCarousel({
      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : [500,1], // itemsMobile disabled - inherit from itemsTablet option
      autoPlay: true
   });


	// Custom Navigation for Corp
	$(".next-corp").click(function(){
		owl_1.trigger('owl.next');
	});
	$(".prev-corp").click(function(){
		owl_1.trigger('owl.prev');
	});

	// Custom Navigation for Success
	$(".next-success").click(function(){
		owl_2.trigger('owl.next');
	});
	$(".prev-success").click(function(){
		owl_2.trigger('owl.prev');
	});


	//agregar clases para el caso que haya solo 1 entrada
	if($('.noticia-content').length) {
		$('.no-more-noticia').addClass('hide');
	}
	if($('.curso-content').length){
		$('.no-more-curso').addClass('hide');
	}
	if($('.linea-content').length) {
		$('.no-more-linea').addClass('hide');
	}
	if($('.licita-content').length) {
		$('.no-more-licita').addClass('hide');
	}
	if($('.no-more-noticia').length) {
		$('.no-more-noticia').css('display', 'block');
	}
	if($('.no-more-curso').length) {
		$('.no-more-curso').css('display', 'block');
	}
	if($('.no-more-linea').length) {
		$('.no-more-linea').css('display', 'block');
	}
	if($('.no-more-licita').length) {
		$('.no-more-licita').css('display', 'block');
	}


	// Ajustar altura Labor
	function mismaAltura(midiv,remove) {
		var alto = 0;
		if(remove){
			midiv.height('auto');
		}
		midiv.each(function() {
			altura = $(this).height();
			if(altura > alto) {
				alto = altura;
			}
		});
		midiv.height(alto);
	}
	function setLaborHeight(op){
		mismaAltura($('#ourlabor .theExcerpt'),op);
		mismaAltura($('#ourlabor .tileLink'),op);
	}

	//init labor height
	if($('#ourlabor').length){
		setLaborHeight(false);
	}

	// altura subpage blocks 
	if($('.about-blocks').length){
		mismaAltura($('.content-p'),false);		
	}



	function fixTabs(){
		if($('.tabs.tab-ancho').length){
			if( $(window).width() <= 909 ){
				if($('.tabs.tab-ancho').length){
					var tabs_qty  = $('.tabs.tab-ancho li').length;
					$('.tabs.tab-ancho').css('height',Math.round(48*tabs_qty/2)+ 10 + 'px');
					$('.tabs.tab-ancho li').css('width','50%');				
				}
			}
			else{ // mayor 910
				var tabs_qty  = $('.tabs.tab-ancho li').length;
			 	$('.tabs.tab-ancho').css('height','');
			 	$('.tabs.tab-ancho li').css('width',100/tabs_qty+'%');
			}
		}
	}
	// on page ready!
	fixTabs();

	// run in resizes ...
	$(window).resize(function(){
			//same height
			mismaAltura($('.content-p'),true);
			setLaborHeight(true);
			fixWidthTimeline();
			fixTabs();		
	});





});



//fix twitter responsive wdith
function fixWidthTimeline(){
	if($(window).width()<=991){							
		$('.twitter-timeline').contents().find('.timeline,.stream').css({'max-width':'100%','width': '100%'});
	}			
}


// Sticky Nav Primary Menu
jQuery(document).ready(function ($) {

	if ($('#wrap-primary-menu').length) {
	  var nav = $('#wrap-primary-menu');
	  var margin_top = nav.offset().top;
	  var admin_bar = $('#wpadminbar');	  
	  var nav2 = $('#menu-secundario-alt');
	  $(window).scroll(function () {
	    if ($(this).scrollTop() > margin_top) {
	      // add sticky class
	      nav.addClass("sticky");	      
	      // fix imgbanner
	      $('.imgBanner').css('margin-top','120px');
	      // admin bar?
	      if(admin_bar.length){
	      	nav.addClass("sticky-admin");		    
	      	// exists secondary menu?
		    if(nav2.length){		     
		    	nav2.addClass('sticky sticky-admin');
		    }	      	
	      }
	      else{
	      	if(nav2.length){		     
	      		nav2.addClass('sticky');
	        }
	      }
	    } else {
	    	
	      // remove class sticky
	      nav.removeClass("sticky sticky-admin");
	      // remove fix
	      $('.imgBanner').css('margin-top','');
	      // if exists secondary menu, remove class
	      if($('#menu-secundario-alt').length){
	      	nav2.removeClass("sticky sticky-admin");
	      }
	    }
	  });
	}
});
