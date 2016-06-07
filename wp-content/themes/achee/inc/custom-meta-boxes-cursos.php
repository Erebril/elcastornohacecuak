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
function cursos_add_meta_box() {

	$screens = array( 'cursos' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'cursos_sectionid',            // Unique ID
         'Ficha Técnica',      				// Box title
         'cursos_meta_box_callback',  	// Content callback
          $screen                      	// post type
		);
	}
}
add_action( 'add_meta_boxes', 'cursos_add_meta_box' );

/**
 * Prints the box content.
 * @param WP_Post $post The object for the current post/page.
 **/
function cursos_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'cursos_save_meta_box_data', 'cursos_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value_1 = get_post_meta( $post->ID, '_value_key_curso_date_ini', true );
	$value_2 = get_post_meta( $post->ID, '_value_key_curso_date_end', true );
	$value_3 = get_post_meta( $post->ID, '_value_key_curso_open', true );
	$value_4 = get_post_meta( $post->ID, '_value_key_curso_close', true );
	$value_5 = get_post_meta( $post->ID, '_value_key_curso_act_area', true );
	//$value_6 = get_post_meta( $post->ID, '_value_key_curso_act_line', true );
	//$value_7 = get_post_meta( $post->ID, '_value_key_curso_state', true );
	$value_8 = get_post_meta( $post->ID, '_value_key_curso_place', true );
	$value_9 = get_post_meta( $post->ID, '_value_key_curso_picker', true );
	$value_9 = $value_9 == '' ?  1 : $value_9;


	// Área Acción
	$area_accion = get_area_action_list(true);


	echo '<div class="inputsWrapper" style="margin: 10px;">';				
			echo '<div style="float:right; margin-right: 22px;"><input type="hidden" id="destroy-picker" value="0">';
			echo '<label for="datetime-picker-op">';
				if($value_9 == 1){
					echo '<input type="checkbox" checked="checked" value="1" id="datetime-picker-op" name="curso_field_picker">
					Selector de fecha</label>';
				}
				else{
					echo '<input type="checkbox" value="0" id="datetime-picker-op" name="curso_field_picker">
					Selector de Fecha</label>';
				}
					
			echo '</div>';			
	echo '</div>';

	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="curso_field_dateini">';
			_e( 'Fecha Inicio Inscripciones', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="curso_field_dateini" name="curso_field_dateini" value="' . esc_attr( $value_1 ) . '" size="30" class="datetime-picker" />';
		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="curso_field_dateend">';
			_e( 'Fecha Término Inscripciones', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="curso_field_dateend" name="curso_field_dateend" value="' . esc_attr( $value_2 ) . '" size="35"  class="datetime-picker"/>';
		echo '</div>';
	echo '</div>';
	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="curso_field_open">';
			_e( 'Fecha Inicio Curso', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="curso_field_open" name="curso_field_open" value="' . esc_attr( $value_3 ) . '" size="35" class="datetime-picker" />';
		echo '</div>'; 

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="curso_field_close">';
			_e( 'Fecha Término Curso', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="curso_field_close" name="curso_field_close" value="' . esc_attr( $value_4 ) . '" size="35" class="datetime-picker" />';
		echo '</div>';
	echo '</div>';
	echo '<div class="inputsWrapper">';
		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="curso_field_action">';
			_e( 'Área de acción', 'achee' );
			echo '</label> ';
//			echo '<input type="text" id="curso_field_action" name="curso_field_action" value="' . esc_attr( $value_5 ) . '" size="35" />';
			echo '<select name="curso_field_action" id="curso_field_action" required="required">';
			foreach ($area_accion as $slug => $title) {
				echo '<option value="'.$slug.'"'.(($value_5 == $slug) ? 'selected="selected"' : "" ).'>'.$title.'</option>';
			}
		    echo  '</select>';

		echo '</div>';

		echo '<div class="inputLinner">';
			echo '<label class="inputLabel" for="curso_field_place">';
			_e( 'Ciudad', 'achee' );
			echo '</label> ';
			echo '<input type="text" id="curso_field_place" name="curso_field_place" value="' . esc_attr( $value_8 ) . '" size="35" />';
		echo '</div>';
		
		
		// Campos ya no van!
		// echo '<div class="inputLinner">';
		// 	echo '<label class="inputLabel" for="curso_field_state">';
		// 	_e( 'Estado', 'achee' );
		// 	echo '</label> ';
		// 	//echo '<input type="text" id="curso_field_state" name="curso_field_state" value="' . esc_attr( $value_7 ) . '" size="35" />';
		// 	echo '<select name="curso_field_state" id="curso_field_state" required="required">';
		// 	foreach ($estado as $slug => $title) {
		// 		echo '<option value="'.$slug.'"'.(($value_7 == $slug) ? 'selected="selected"' : "" ).'>'.$title.'</option>';
		// 	}
		//     echo  '</select>';
		// echo '</div>';
		
		// echo '<div class="inputLinner">';
		// 	echo '<label class="inputLabel" for="curso_field_actline">';
		// 	_e( 'Línea de acción', 'achee' );
		// 	echo '</label> ';
		// 	echo '<input type="text" id="curso_field_actline" name="curso_field_actline" value="' . esc_attr( $value_6 ) . '" size="35" />';
		// echo '</div>';
		
	echo '</div>';
}

/**
 * guardar info
 * When the post is saved, saves our custom data.
 * @param int $post_id The ID of the post being saved.
 */
function cursos_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// // Check if our nonce is set.
	// if ( ! isset( $_POST['cursos_meta_box_nonce'] ) ) {
	// 	return;
	// }

	// // Verify that the nonce is valid.
	// if ( ! wp_verify_nonce( $_POST['cursos_meta_box_nonce'], 'cursos_save_meta_box_data' ) ) {
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
	$data_1 = sanitize_text_field( $_POST['curso_field_dateini'] );
	$data_2 = sanitize_text_field( $_POST['curso_field_dateend'] );
	$data_3 = sanitize_text_field( $_POST['curso_field_open'] );
	$data_4 = sanitize_text_field( $_POST['curso_field_close'] );
	$data_5 = sanitize_text_field( $_POST['curso_field_action'] );
	//$data_6 = sanitize_text_field( $_POST['curso_field_actline'] );
	//$data_7 = sanitize_text_field( $_POST['curso_field_state'] );
	$data_8 = sanitize_text_field( $_POST['curso_field_place'] );
	$data_9 = (sanitize_text_field( $_POST['curso_field_picker'] )) == 1 ? 1 : 0;	

	// Update the meta field in the database.
	update_post_meta( $post_id, '_value_key_curso_date_ini', $data_1 );
	update_post_meta( $post_id, '_value_key_curso_date_end', $data_2 );
	update_post_meta( $post_id, '_value_key_curso_open', $data_3 );
	update_post_meta( $post_id, '_value_key_curso_close', $data_4 );
	update_post_meta( $post_id, '_value_key_curso_act_area', $data_5 );
	//update_post_meta( $post_id, '_value_key_curso_act_line', $data_6 );
	//update_post_meta( $post_id, '_value_key_curso_state', $data_7 );
	update_post_meta( $post_id, '_value_key_curso_place', $data_8 );
    update_post_meta( $post_id, '_value_key_curso_picker', $data_9 );

}
add_action( 'save_post', 'cursos_save_meta_box_data' );