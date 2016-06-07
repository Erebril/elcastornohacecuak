<?php
/**
 * achee-theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package achee-theme
 */

// Custom post types

add_action ( 'init', 'prowp_register_casosexitos_post_type');

function prowp_register_casosexitos_post_type() {
	$labels = array(
		'name' => __( 'Casos de Éxito' ),
		'singular_name' => __( 'Caso de Éxito' ),
		'add_new' => __( 'Añadir Nuevo Caso de Éxito' ),
		'add_new_item' => __( 'Añadir Nuevo Caso de Éxito' ),
		'edit' => __( 'Editar' ),
		'edit_item' => __( 'Editar Caso de Éxito' ),
		'new_item' => __( 'Nuevo Caso de Éxito' ),
		'view' => __( 'Ver Caso de Éxito' ),
		'view_item' => __( 'Ver Caso de Éxito' ),
		'search_items' => __( 'Buscar Caso de Éxito' ),
		'not_found' => __( 'Caso de Éxito No Encontrada' ),
		'not_found_in_trash' => __( 'Caso de Éxito no encontrada en Papelera' )
	);
	register_post_type( 'casos-exito', //post type name
		array(
			'labels' => $labels,
			'has_archive' => true,
			'public' => true,
			'description' => __( 'Casos de Éxito' ),
			'supports' => array(
				'title',
				// 'editor',
				//'author',
				'thumbnail',
				// 'revisions',
				//'custom-fields',
				// 'page-attributes'
			),
			'taxonomies' => array( 'post_tag' ),
			'exclude_from_searchs' => false,
			// 'capability_type' => 'page',
			'show_in_menu' => 'secciones-home',
			'menu_icon' => 'dashicons-images-alt2',
			'rewrite' => array( 'slug' => 'casos-exito'),
			'menu_position' => 4,
			'query_var' => true,
		)
	);

}