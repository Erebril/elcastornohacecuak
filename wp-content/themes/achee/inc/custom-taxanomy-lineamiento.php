<?php 


add_action( 'init', 'custom_taxonomy_lineamiento', 0 );



function custom_lineamiento_box($post,$box){

	$defaults = array( 'taxonomy' => 'lineamiento' );
	
	if ( ! isset( $box['args'] ) || ! is_array( $box['args'] ) ) {
	    $args = array();
	}
	else {
	    $args = $box['args'];
	}
	extract( wp_parse_args($args, $defaults), EXTR_SKIP );
	//$tax = get_taxonomy( $taxonomy );

	//var_dump($tax);
	?>
	
	<div id="taxonomy-<?php echo $taxonomy; ?>" class="categorydiv">
	        <?php 
	        $name = 'tax_input[lineamientos]';
	     //   echo "<input type='hidden' name='{$name}' value='' />"; // Allows for an empty term set to be sent. 0 is an invalid Term ID and will be ignored by empty() checks.
	        	        
	        $term_selected = wp_get_object_terms( $post->ID, 'lineamientos' ); //_log($term_obj[0]->term_id)				
			$terms = get_terms( 'lineamientos', array( 'hide_empty' => 0 ) );
			//var_dump();

			///$terms = get_terms( $taxonomy );
			if ( $terms ) {
				//edit				
				if($term_selected){
					printf( '<select name="tax_input[lineamientos]" class="postform" required>' );
					printf( '<option value="">%s</option>', esc_attr( "Seleccione Lineamiento" ));
					foreach ( $terms as $term ) {
						if($term_selected[0]->term_id == $term->term_id){
							printf( '<option value="%s" selected="selected">%s</option>', esc_attr( $term->slug ), esc_html( $term->name ) );	
						}	
						else{
							printf( '<option value="%s">%s</option>', esc_attr( $term->slug ), esc_html( $term->name ) );							
						}				
					}
					print( '</select>' );					
				}
				else{
					//new
					printf( '<select name="tax_input[lineamientos]" class="postform" required>' );
					printf( '<option value="">%s</option>', esc_attr( "Seleccione Lineamiento" ));
					foreach ( $terms as $term ) {					
						printf( '<option value="%s">%s</option>', esc_attr( $term->slug ), esc_html( $term->name ) );
					}
					print( '</select>' );					
				}
			}


	        // if ( ! empty( $term_obj ) ) {
		       //  wp_dropdown_categories( array(
		       //  	'taxonomy'		=> 'lineamientos',
		       //  	'hide_empty'		=> 0,
		       //  	'name'			=> "{$name}[]",
		       //  	'selected'		=> $term_obj[0]->term_id,
		       //  	'orderby'		=> 'name',
		       //  	'hierarchical'		=> 0,
		       //  	'show_option_none'	=> '&mdash;',
		       //  	'class'			=> 'widefat'
		       //  ) );
	        // }
	        ?>
	</div>
	<?php

}


function custom_taxonomy_lineamiento() {

	// Add new taxonomy, make it hierarchical like categories
	//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Lineamientos', 'taxonomy general name' ),
    'singular_name' => _x( 'Lineamiento', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Lineamientos' ),
    'all_items' => __( 'Todos los Lineamientos' ),
    'parent_item' => __( 'Padre Lineamiento' ),
    'parent_item_colon' => __( 'Padre Lineamiento:' ),
    'edit_item' => __( 'Editar Lineamiento' ), 
    'update_item' => __( 'Actualizar Lineamiento' ),
    'add_new_item' => __( 'Agregar Lineamiento' ),
    'new_item_name' => __( 'Nuevo Lineamiento' ),
    'menu_name' => __( 'Lineamientos' ),
  ); 	

// Now register the taxonomy

  register_taxonomy('lineamientos',array('post'), array(
    // 'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'meta_box_cb' => 'custom_lineamiento_box',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'lineamiento' ),
  ));

}

add_action( 'restrict_manage_posts', 'add_filter_to_post_admin' );
function add_filter_to_post_admin() {
	global $typenow;

	$taxonomy = $typenow.'_type';
	if( $typenow == "post" ){
		$filters = array("lineamientos");
		foreach ($filters as $tax_slug) {
			//$tax_obj = get_taxonomy($tax_slug);
			// var_dump($tax_obj);						
			$terms = get_terms('lineamientos');			
			echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
			echo "<option value=''>Todos los lineamientos</option>";
			foreach ($terms as $term) { echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .'</option>'; }
			echo "</select>";				

		}
	}
}



function get_lineamiento(){		
	 $lineamiento = wp_get_post_terms( get_the_ID(), 'lineamientos' );
	 if(is_array($lineamiento) && isset($lineamiento[0]->name)){	 	
	 	return array('lineamiento' => $lineamiento[0], 'status' => true);
	 }
	 return array('status' => false);
}


function get_lineamiento_link($term_id){
	$link = get_term_link($term_id, 'lineamientos');		
	if(is_string($link)){
		echo $link;
	}
	else{
		echo "#";
	}
}