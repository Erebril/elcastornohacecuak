<?php
/**
 * achee-theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package achee-theme
 */

// Líneas de apoyo
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function linea_apoyo_add_meta_box() {

	$screens = array( 'linea-apoyo' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'linea_apoyo_sectionid',            // Unique ID
         'Ficha Técnica',      				// Box title
         'linea_apoyo_meta_box_callback',  	// Content callback
          $screen                      	// post type
		);
	}
}
add_action( 'add_meta_boxes', 'linea_apoyo_add_meta_box' );

/**
 * Prints the box content.
 * @param WP_Post $post The object for the current post/page.
 **/
function linea_apoyo_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'linea_apoyo_save_meta_box_data', 'linea_apoyo_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value_1 = get_post_meta( $post->ID, '_value_key_line_date_ini', true );
	$value_2 = get_post_meta( $post->ID, '_value_key_line_date_end', true );
	$value_3 = get_post_meta( $post->ID, '_value_key_line_act_area', true );
	//$value_4 = get_post_meta( $post->ID, '_value_key_line_act_line', true );
	$value_5 = get_post_meta( $post->ID, '_value_key_line_state', true );
	$value_6 = get_post_meta( $post->ID, '_value_key_line_picker', true );
	$value_6 = $value_6 == '' ?  1 : $value_6;


	$value_7 =  get_post_meta( $post->ID, '_value_key_line_ei', true ); //Fecha de inicio de preguntas
	$value_8 =  get_post_meta( $post->ID, '_value_key_line_ep', true ); //Fecha final de preguntas
	$value_9 =  get_post_meta( $post->ID, '_value_key_line_er', true ); //Fecha publicación de respuestas
	$value_10 = get_post_meta( $post->ID, '_value_key_line_ecp', true ); //Fecha cierre postulaciones
	$value_11 = get_post_meta( $post->ID, '_value_key_line_erp', true ); //Fecha de apertura de recepción de postulaciones


	// Área Acción
	$area_accion = get_area_action_list(true);

	echo '<div class="inputsWrapper" style="margin: 10px;">';
			echo '<div style="float:right; margin-right: 22px;"><input type="hidden" id="destroy-picker" value="0">';
			echo '<label for="datetime-picker-op">';
				if($value_6 == 1){
					echo '<input type="checkbox" checked="checked" value="1" id="datetime-picker-op" name="linea_field_picker">
					Selector de Fecha</label>';
				}
				else{
					echo '<input type="checkbox" value="0" id="datetime-picker-op" name="linea_field_picker">
					Fecha de Fecha</label>';
				}

			echo '</div>';
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="linea_field_dateini">';
			_e( 'Fecha Inicio', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="linea_field_dateini" name="linea_field_dateini" value="' . esc_attr( $value_1 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="linea_field_dateend">';
			_e( 'Fecha Término', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="linea_field_dateend" name="linea_field_dateend" value="' . esc_attr( $value_2 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';
	echo '</div>';
	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="linea_field_actarea">';
			_e( 'Área de acción', 'achee' );
			echo '</label> ';
			//echo '<input type="text" id="linea_field_actarea" name="linea_field_actarea" value="' . esc_attr( $value_3 ) . '" size="35" />';
			echo '<select name="linea_field_actarea" id="linea_field_actarea" required="required">';
			foreach ($area_accion as $slug => $title) {
				echo '<option value="'.$slug.'"'.(($value_3 == $slug) ? 'selected="selected"' : "" ).'>'.$title.'</option>';
			}
		    echo  '</select>';
		echo '</div>';

		// echo '<div class="inputLinner">';
		// 	echo '<label class="inputLabel" for="linea_field_actline">';
		// 	_e( 'Línea de acción', 'achee' );
		// 	echo '</label> ';
		// 	echo '<input type="text" id="linea_field_actline" name="linea_field_actline" value="' . esc_attr( $value_4 ) . '" size="35" />';
		// echo '</div>';
	echo '</div>';
	// echo '<div class="inputsWrapper">';
	// 	echo '<div class="inputLinner">';
	// 		echo '<label class="inputLabel" for="linea_field_state">';
	// 		_e( 'Estado', 'achee' );
	// 		echo '</label> ';
	// 		echo '<input type="text" id="linea_field_state" name="linea_field_state" value="' . esc_attr( $value_5 ) . '" size="35" />';
	// 	echo '</div>';
	// echo '</div>';
	//



	// ETAPAS NEW

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="linea_field_ei">';
			_e( 'Fecha Inicio Preguntas', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="linea_field_ei" name="linea_field_ei" value="' . esc_attr( $value_7 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="linea_field_ep">';
			_e( 'Fecha final Preguntas', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="linea_field_ep" name="linea_field_ep" value="' . esc_attr( $value_8 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="linea_field_er">';
			_e( 'Fecha publicación Respuestas', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="linea_field_er" name="linea_field_er" value="' . esc_attr( $value_9 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="linea_field_ecp">';
			_e( 'Fecha cierre postulaciones', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="linea_field_ecp" name="linea_field_ecp" value="' . esc_attr( $value_10 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';
	echo '</div>';


	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="linea_field_erp">';
			_e( 'Fecha apertura recepción de postulaciones', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="linea_field_erp" name="linea_field_erp" value="' . esc_attr( $value_11 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';
	echo '</div>';



}

/**
 * guardar info
 * When the post is saved, saves our custom data.
 * @param int $post_id The ID of the post being saved.
 */
function linea_apoyo_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// // Check if our nonce is set.
	// if ( ! isset( $_POST['linea_apoyo_meta_box_nonce'] ) ) {
	// 	return;
	// }

	// // Verify that the nonce is valid.
	// if ( ! wp_verify_nonce( $_POST['linea_apoyo_meta_box_nonce'], 'linea_apoyo_save_meta_box_data' ) ) {
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
	$data_1 = sanitize_text_field( $_POST['linea_field_dateini'] );
	$data_2 = sanitize_text_field( $_POST['linea_field_dateend'] );
	$data_3 = sanitize_text_field( $_POST['linea_field_actarea'] );
	//$data_4 = sanitize_text_field( $_POST['linea_field_actline'] );
	$data_5 = sanitize_text_field( $_POST['linea_field_state'] );
	$data_6 = (sanitize_text_field( $_POST['linea_field_picker'] )) == 1 ? 1 : 0;

	//new
	$data_7 = sanitize_text_field( $_POST['linea_field_ei'] );
	$data_8 = sanitize_text_field( $_POST['linea_field_ep'] );
	$data_9 = sanitize_text_field( $_POST['linea_field_er'] );
	$data_10 = sanitize_text_field( $_POST['linea_field_ecp'] );
	$data_11 = sanitize_text_field( $_POST['linea_field_erp'] );


	// Update the meta field in the database.
	update_post_meta( $post_id, '_value_key_line_date_ini', $data_1 );
	update_post_meta( $post_id, '_value_key_line_date_end', $data_2 );
	update_post_meta( $post_id, '_value_key_line_act_area', $data_3 );
	//update_post_meta( $post_id, '_value_key_line_act_line', $data_4 );
	update_post_meta( $post_id, '_value_key_line_state', $data_5 );
	update_post_meta( $post_id, '_value_key_line_picker', $data_6 );

	//new
	update_post_meta( $post_id, '_value_key_line_ei', $data_7 );
	update_post_meta( $post_id, '_value_key_line_ep', $data_8 );
	update_post_meta( $post_id, '_value_key_line_er', $data_9 );
	update_post_meta( $post_id, '_value_key_line_ecp', $data_10 );
	update_post_meta( $post_id, '_value_key_line_erp', $data_11 );



}
add_action( 'save_post', 'linea_apoyo_save_meta_box_data' );