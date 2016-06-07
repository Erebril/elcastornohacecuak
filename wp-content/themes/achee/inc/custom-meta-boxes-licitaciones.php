<?php
/**
 * achee-theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package achee-theme
 */

// Custom meta boxes
// ejemplo
// https://developer.wordpress.org/plugins/metadata/creating-custom-meta-boxes/
// https://codex.wordpress.org/Function_Reference/add_meta_box

// Licitaciones
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function licitacion_add_meta_box() {

	$screens = array( 'licitaciones' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'licitacion_sectionid',            // Unique ID
         'Ficha Técnica',      				// Box title
         'licitacion_meta_box_callback',  	// Content callback
          $screen                      	// post type
		);
	}
}
add_action( 'add_meta_boxes', 'licitacion_add_meta_box' );

/**
 * Prints the box content.
 * @param WP_Post $post The object for the current post/page.
 **/
function licitacion_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'licitacion_save_meta_box_data', 'licitacion_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value_1 = get_post_meta( $post->ID, '_value_key_id', true );
	$value_2 = get_post_meta( $post->ID, '_value_key_type', true );
	$value_3 = get_post_meta( $post->ID, '_value_key_action_area', true );
	$value_4 = get_post_meta( $post->ID, '_value_key_action_line', true );
	$value_5 = get_post_meta( $post->ID, '_value_key_open_date', true );
	$value_6 = get_post_meta( $post->ID, '_value_key_close_date', true );
	$value_7 = get_post_meta( $post->ID, '_value_key_open_query', true );
	$value_8 = get_post_meta( $post->ID, '_value_key_close_query', true );
	$value_9 = get_post_meta( $post->ID, '_value_key_publish_query', true );
	$value_10 = get_post_meta( $post->ID, '_value_key_actopen_tech', true );
	$value_11 = get_post_meta( $post->ID, '_value_key_actopen_econ', true );
	$value_12 = get_post_meta( $post->ID, '_value_key_adjudic_date', true );
	$value_13 = get_post_meta( $post->ID, '_value_key_phisic_deliv', true );
	$value_14 = get_post_meta( $post->ID, '_value_key_agree_firm', true );
	$value_15 = get_post_meta( $post->ID, '_value_key_eval_offer', true );
	//$value_16 = get_post_meta( $post->ID, '_value_key_lic_state', true );
	$value_17 = get_post_meta( $post->ID, '_value_key_total', true );

	$value_18 = get_post_meta( $post->ID, '_value_key_picker', true );
	$value_18 = $value_18 == '' ?  1 : $value_18;	
	
	// campo nuevo para texto libre de tipo de licitación
	$value_19 = get_post_meta( $post->ID, '_value_key_type_other', true );	


	// campo nuevo está o no en mercado público
	$value_20 = get_post_meta( $post->ID, '_value_key_market', true );			
	$value_20 = $value_20 == 1 ?  1 : $value_20;
	$value_21 = get_post_meta( $post->ID, '_value_key_market_link', true );			


	// Área Acción		
	$area_accion = get_area_action_list(true);

	//Tipo Licitacion
	$tipo_licitacion = array(
	    ''  => 'Seleccione Tipo de Licitación',
		'Licitación Pública menor a 100 UTM (L1)' => 'Licitación Pública menor a 100 UTM (L1)',
		'Licitación Pública entre 100 y 1000 UTM (LE)' => 'Licitación Pública entre 100 y 1000 UTM (LE)',
		'Licitación Pública mayor a 1000 UTM (LP)' => 'Licitación Pública mayor a 1000 UTM (LP)',
		'otro' => 'Otro'
	);
	
	echo '<div class="inputsWrapper" style="margin: 10px;">';
			echo '<div style="float:right; margin-right: 22px;"><input type="hidden" id="destroy-picker" value="0">';
			echo '<label for="datetime-picker-op">';
				if($value_18 == 1){
					echo '<input type="checkbox" checked="checked" value="1" id="datetime-picker-op" name="licita_field_picker">
					Selector de Fecha</label>';
				}
				else{
					echo '<input type="checkbox" value="0" id="datetime-picker-op" name="licita_field_picker">
					Selector de Fecha</label>';
				}
					
			echo '</div>';			
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_id">';
			_e( 'ID de licitación', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_id" name="licita_field_id" value="' . esc_attr( $value_1 ) . '" size="35" />';
		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_type">';
			_e( 'Tipo de licitación', 'achee' );
			echo '</label> ';
			//echo '<input type="text" id="licita_field_type" name="licita_field_type" value="' . esc_attr( $value_2 ) . '" size="35" />';			
			echo '<select name="licita_field_type" id="licita_field_type" required="required">';
			foreach ($tipo_licitacion as $slug => $title) {
				echo '<option value="'.$slug.'"'.(($value_2 == $slug) ? 'selected="selected"' : "" ).'>'.$title.'</option>';
			}
		    echo  '</select>';		    

		echo '</div>';
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_area">';
			_e( 'Área de acción', 'achee' );
			echo '</label> ';
			//echo '<input type="text" id="licita_field_area" name="licita_field_area" value="' . esc_attr( $value_3 ) . '" size="35" />';
			echo '<select name="licita_field_area" id="licita_field_area" required="required">';
			foreach ($area_accion as $slug => $title) {
				echo '<option value="'.$slug.'"'.(($value_3 == $slug) ? 'selected="selected"' : "" ).'>'.$title.'</option>';
			}
		    echo  '</select>';		    
		echo '</div>';

		echo '<div id="licita_field_type_other_div" class="inputLinner input-hide">';
			echo '<label class="inputLabel" for="licita_field_type_other">';
			_e( 'Otro tipo Licitación', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_type_other" name="licita_field_type_other" value="' . esc_attr( $value_19 ) . '" size="35" placeholder="Ingrese el tipo de licitación" />';
		echo '</div>';

		// echo '<div class="inputLinner">';
		// 	echo '<label class="inputLabel" for="licita_field_line">';
		// 	_e( 'Línea de acción', 'achee' );
		// 	echo '</label> ';
		// 	echo '<input type="text" id="licita_field_line" name="licita_field_line" value="' . esc_attr( $value_4 ) . '" size="35" />';
		// echo '</div>';
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_start">';
			_e( 'Fecha de publicación', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_start" name="licita_field_start" value="' . esc_attr( $value_5 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_end">';
			_e( 'Fecha de cierre de recepción de oferta', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_end" name="licita_field_end" value="' . esc_attr( $value_6 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_qstart">';
			_e( 'Fecha de inicio de preguntas', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_qstart" name="licita_field_qstart" value="' . esc_attr( $value_7 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_qend">';
			_e( 'Fecha de término de preguntas', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_qend" name="licita_field_qend" value="' . esc_attr( $value_8 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_qpublish">';
			_e( 'Fecha de publicación de respuestas', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_qpublish" name="licita_field_qpublish" value="' . esc_attr( $value_9 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_openact">';
			_e( 'Fecha de acto de apertura técnica', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_openact" name="licita_field_openact" value="' . esc_attr( $value_10 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_economic">';
			_e( 'Fecha de acto de apertura económica', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_economic" name="licita_field_economic" value="' . esc_attr( $value_11 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_adjudica">';
			_e( 'Fecha de adjudicación', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_adjudica" name="licita_field_adjudica" value="' . esc_attr( $value_12 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_phisic">';
			_e( 'Fecha de entrega en soporte físico', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_phisic" name="licita_field_phisic" value="' . esc_attr( $value_13 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_firm">';
			_e( 'Fecha de firma de contrato', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_firm" name="licita_field_firm" value="' . esc_attr( $value_14 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_offers">';
			_e( 'Tiempo de evaluación de ofertas', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_offers" name="licita_field_offers" value="' . esc_attr( $value_15 ) . '" size="35" />';
		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="licita_field_total">';
			_e( 'Monto total estimado', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_total" name="licita_field_total" value="' . esc_attr( $value_17 ) . '" size="35" />';
		echo '</div>';
		
		// echo '<div class="inputLinner">';
		// 	echo '<label class="inputLabel" for="licita_field_state">';
		// 	_e( 'Estado', 'achee' );
		// 	echo '</label> ';
		// 	echo '<input type="text" id="licita_field_state" name="licita_field_state" value="' . esc_attr( $value_16 ) . '" size="35" />';
		// echo '</div>';
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
				echo '<label class="inputLabel" for="licita_field_market">';				
				_e( 'Licitación en Mercado público', 'achee' );								
				if($value_20 == 1){
						echo '<input type="checkbox" checked="checked" value="1" id="licita_field_market" name="licita_field_market" class="custom-check"></label>';
					}
					else{
						echo '<input type="checkbox" value="0" id="licita_field_market" name="licita_field_market" class="custom-check"></label>';
				}				
		echo '</div>';

		echo '<div id="market-link-content" class="inputLinner'. ( $value_20 == 1 ? '': ' input-hide'). '">';
			echo '<label class="inputLabel" for="licita_field_market_link">';
			_e( 'Link mercado público', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="licita_field_market_link" name="licita_field_market_link" value="' . esc_attr( $value_21 ) . '" size="35" />';
		echo '</div>';
	echo '</div>';

}

/**
 * guardar info
 * When the post is saved, saves our custom data.
 * @param int $post_id The ID of the post being saved.
 */
function licitacion_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// // Check if our nonce is set.
	// if ( ! isset( $_POST['licitacion_meta_box_nonce'] ) ) {
	// 	return;
	// }

	// // Verify that the nonce is valid.
	// if ( ! wp_verify_nonce( $_POST['licitacion_meta_box_nonce'], 'licitacion_save_meta_box_data' ) ) {
	// 	return;
	// }

	// // If this is an autosave, our form has not been submitted, so we don't want to do anything.
	// if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	// 	return;
	// }

	// // Check the user's permissions.
	// if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

	// 	if ( ! current_user_can( 'edit_page', $post_id ) ) {
	// 		return;
	// 	}

	// } else {

	// 	if ( ! current_user_can( 'edit_post', $post_id ) ) {
	// 		return;
	// 	}
	// }

	// /* OK, it's safe for us to save the data now. */

	// // Make sure that it is set.
	// if ( ! isset( $_POST['licita_field_start'] ) ) {
	// 	return;
	// }

	// Sanitize user input.
	$data_1 = sanitize_text_field( $_POST['licita_field_id'] );
	$data_2 = sanitize_text_field( $_POST['licita_field_type'] );
	$data_3 = sanitize_text_field( $_POST['licita_field_area'] );
	$data_4 = sanitize_text_field( $_POST['licita_field_line'] );
	$data_5 = sanitize_text_field( $_POST['licita_field_start'] );
	$data_6 = sanitize_text_field( $_POST['licita_field_end'] );
	$data_7 = sanitize_text_field( $_POST['licita_field_qstart'] );
	$data_8 = sanitize_text_field( $_POST['licita_field_qend'] );
	$data_9 = sanitize_text_field( $_POST['licita_field_qpublish'] );
	$data_10 = sanitize_text_field( $_POST['licita_field_openact'] );
	$data_11 = sanitize_text_field( $_POST['licita_field_economic'] );
	$data_12 = sanitize_text_field( $_POST['licita_field_adjudica'] );
	$data_13 = sanitize_text_field( $_POST['licita_field_phisic'] );
	$data_14 = sanitize_text_field( $_POST['licita_field_firm'] );
	$data_15 = sanitize_text_field( $_POST['licita_field_offers'] );
	//$data_16 = sanitize_text_field( $_POST['licita_field_state'] );
	$data_17 = sanitize_text_field( $_POST['licita_field_total'] );	
	$data_18 = (sanitize_text_field( $_POST['licita_field_picker'] )) == 1 ? 1 : 0;		
	
	// Extra field licita type other	
	$data_19 = sanitize_text_field( $_POST['licita_field_type_other'] );	

	//Other Extra field
	$data_20 = (sanitize_text_field( $_POST['licita_field_market'] )) == 1 ? 1 : 0;		
	$data_21 = sanitize_text_field( $_POST['licita_field_market_link'] );


	// Update the meta field in the database.
	update_post_meta( $post_id, '_value_key_id', $data_1 );
	update_post_meta( $post_id, '_value_key_type', $data_2 );
	update_post_meta( $post_id, '_value_key_action_area', $data_3 );
	update_post_meta( $post_id, '_value_key_action_line', $data_4 );
	update_post_meta( $post_id, '_value_key_open_date', $data_5 );
	update_post_meta( $post_id, '_value_key_close_date', $data_6 );
	update_post_meta( $post_id, '_value_key_open_query', $data_7 );
	update_post_meta( $post_id, '_value_key_close_query', $data_8 );
	update_post_meta( $post_id, '_value_key_publish_query', $data_9 );
	update_post_meta( $post_id, '_value_key_actopen_tech', $data_10 );
	update_post_meta( $post_id, '_value_key_actopen_econ', $data_11 );
	update_post_meta( $post_id, '_value_key_adjudic_date', $data_12 );
	update_post_meta( $post_id, '_value_key_phisic_deliv', $data_13 );
	update_post_meta( $post_id, '_value_key_agree_firm', $data_14 );
	update_post_meta( $post_id, '_value_key_eval_offer', $data_15 );
	//update_post_meta( $post_id, '_value_key_lic_state', $data_16 );
	update_post_meta( $post_id, '_value_key_total', $data_17 );
	update_post_meta( $post_id, '_value_key_picker', $data_18 );

	// Other text Type
	update_post_meta( $post_id, '_value_key_type_other', $data_19 );

	//Market
	update_post_meta( $post_id, '_value_key_market', $data_20 );
	update_post_meta( $post_id, '_value_key_market_link', $data_21 );

	// clone _value_key_close_date with date format
	// function in extras.php included in functions.php	
	// _value_key_close_date => close_date_licita
	$final = clone_closed_date($data_6);

}
add_action( 'save_post', 'licitacion_save_meta_box_data' );