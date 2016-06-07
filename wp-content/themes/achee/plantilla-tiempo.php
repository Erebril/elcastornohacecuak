<?php
/**
 * Template Name: Actualizar campo fecha término
 *
 * @package achee-theme
 */

?>



<?php 

	// script update new field in licitacion

	$args = array(
	    'posts_per_page' => -1,
	    'post_type'=> 'licitaciones',
	);
	$query = new WP_Query($args);

	if ($query->have_posts()) {
	    while ($query->have_posts()) {
	        $query->the_post();

	        $close_date = get_post_meta(get_the_ID(), '_value_key_close_date', true);
			
	        // format datetime
			echo clone_closed_date($close_date) .'<br>';
	        
	    }

	    wp_reset_postdata();
	}
	//
	//
	
	// $date = '2016-15-03 22:15';

	// $a = date_to_words($date);

	// 	var_dump($a);

	// $date = '2016-03-15 14:30';
	// $b = date_to_words($date);

	// var_dump($b);


 ?>