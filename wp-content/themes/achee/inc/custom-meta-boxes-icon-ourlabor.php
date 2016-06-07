<?php
/**
 * achee-theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package achee-theme
 */

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function ourlabor_add_meta_box() {

	$screens = array( 'nuestra-labor' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'ourlabor_sectionid',            // Unique ID
         'Icono a mostrar en la caja verde',      				// Box title
         'ourlabor_meta_box_callback',  	// Content callback
          $screen                      	// post type
		);
	}
}
add_action( 'add_meta_boxes', 'ourlabor_add_meta_box' );

/**
 * Prints the box content.
 * @param WP_Post $post The object for the current post/page.
 **/
function ourlabor_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'ourlabor_save_meta_box_data', 'ourlabor_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value_1 = get_post_meta( $post->ID, '_value_site_icono', true );

	echo '<div style="display: inline-block; margin-bottom: 20px; width: 100%;">';
		echo '<div style="float:left; width:50%;">';
			echo '<label style="float: left; width: 100%; margin: 15px 0 10px;" for="icon_green_box">';
			echo 'Clase del icono (<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">ver todos</a>):';
			echo '</label> ';
			echo '<input type="text" id="icon_green_box" name="icon_green_box" value="' . esc_attr( $value_1 ) . '" size="75" style="height:35px;" />';
		echo '</div>';
	echo '</div>';
}

/**
 * guardar info
 * When the post is saved, saves our custom data.
 * @param int $post_id The ID of the post being saved.
 */
function ourlabor_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['ourlabor_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['ourlabor_meta_box_nonce'], 'ourlabor_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	if ( ! isset( $_POST['icon_green_box'] ) ) {
		return;
	}

	// Sanitize user input.
	$data_1 = sanitize_text_field( $_POST['icon_green_box'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_value_site_icono', $data_1 );

}
add_action( 'save_post', 'ourlabor_save_meta_box_data' );