<?php
/**
 * achee-theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package achee-theme
 */

// Custom post types

add_action ( 'init', 'prowp_register_adds_post_type');

function prowp_register_adds_post_type() {
	$labels = array(
		'name' => __( 'Banners Corporativos' ),
		'singular_name' => __( 'Banner' ),
		'add_new' => __( 'Añadir Nuevo Banner' ),
		'add_new_item' => __( 'Añadir Nuevo Banner' ),
		'edit' => __( 'Editar' ),
		'edit_item' => __( 'Editar Banner' ),
		'new_item' => __( 'Nuevo Banner' ),
		'view' => __( 'Ver Banner' ),
		'view_item' => __( 'Ver Banner' ),
		'search_items' => __( 'Buscar Banner' ),
		'not_found' => __( 'Banner No Encontrada' ),
		'not_found_in_trash' => __( 'Banner no encontrada en Papelera' )
	);
	register_post_type( 'corp-banner', //post type name
		array(
			'labels' => $labels,
			'has_archive' => true,
			'public' => true,
			'description' => __( 'Banners Corporativos' ),
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
			'rewrite' => array( 'slug' => 'corp-banner'),
			'menu_position' => 4,
			'query_var' => true,
		)
	);

}