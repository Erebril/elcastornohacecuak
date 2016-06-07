<?php

	// add_image_size( 'labor-thumb', 450, 200 );
	add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
	function wpdocs_theme_setup() {
		add_image_size( 'extra-large', 960, 350, array('center', 'center') );
		add_image_size( 'news-roundthumb', 150, 190, array('center', 'center') );
		add_image_size( 'adds-thumb', 325, 124, array('center', 'center') );
		add_image_size( 'noticias-thumb', 300, 145, array('center', 'top') );
		add_image_size( 'newslist-thumb', 280, 170, array('center', 'top') );
		add_image_size( 'parent-heading', 1300, 435, array('center', 'top') );
		add_image_size( 'oursites-thumb', 235, 146, array('center', 'center') );

		// downloads imgs
		add_image_size( 'download-thumb', 105, 140, true);

	}

?>