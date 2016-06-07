jQuery(document).ready(function($) {
	// inicializando selects
	// $('select').material_select();
	// desactivar el materialize select
	// $('.manage-menus select').material_select('destroy');
	// agregar el placeholder a los text inputs
	var searchVal = $("input#search-submit").val();
	$('input[type="search"]').attr("placeholder", searchVal);

	var menuUrl = window.location.pathname.split('/');
	var pathArray = menuUrl[3];
	if (pathArray == 'nav-menus.php') {
		$('#menu-appearance, #menu-appearance > a').removeClass('wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-appearance menu-top-first');
		$('#menu-appearance, #menu-appearance > a').addClass('wp-has-submenu wp-not-current-submenu menu-top menu-icon-appearance menu-top-first');
	}


});