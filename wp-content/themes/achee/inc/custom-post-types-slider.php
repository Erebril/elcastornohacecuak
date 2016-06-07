<?php
/**
 * achee-theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package achee-theme
 */

// Custom post types

add_action ( 'init', 'prowp_register_slider_post_type');

function prowp_register_slider_post_type() {
	$labels = array(
		'name' => __( 'Slider Inicio' ),
		'singular_name' => __( 'Slider' ),
		'add_new' => __( 'Añadir Nuevo Slider' ),
		'add_new_item' => __( 'Añadir Nuevo Slider' ),
		'edit' => __( 'Editar' ),
		'edit_item' => __( 'Editar Slider' ),
		'new_item' => __( 'Nuevo Slider' ),
		'view' => __( 'Ver Slider' ),
		'view_item' => __( 'Ver Slider' ),
		'search_items' => __( 'Buscar Slider' ),
		'not_found' => __( 'Slider No Encontrada' ),
		'not_found_in_trash' => __( 'Slider no encontrada en Papelera' )
	);
	register_post_type( 'slider', //post type name
		array(
			'labels' => $labels,
			'has_archive' => true,
			'public' => true,
			'description' => __( 'Sliders Inicio' ),
			'supports' => array(
				'title',
				'editor',
				//'author',
				'thumbnail',
				//'revisions',
				//'custom-fields',
				'page-attributes'
			),
			//'taxonomies' => array( 'post_tag' ),
			'exclude_from_searchs' => false,
			//'capability_type' => 'post'
			'show_in_menu' => 'secciones-home',
			'menu_icon' => 'dashicons-images-alt2',
			'rewrite' => array( 'slug' => 'slider'),
			'menu_position' => 4,
			'query_var' => true,
		)
	);

}