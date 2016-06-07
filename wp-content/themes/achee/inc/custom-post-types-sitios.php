<?php
/**
 * achee-theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package achee-theme
 */

// Custom post types

add_action ( 'init', 'prowp_register_sitios_post_type');

function prowp_register_sitios_post_type() {
	$labels = array(
		'name' => __( 'Nuestros Sitios' ),
		'singular_name' => __( 'Sitio' ),
		'add_new' => __( 'Añadir Nuevo Sitio' ),
		'add_new_item' => __( 'Añadir Nuevo Sitio' ),
		'edit' => __( 'Editar' ),
		'edit_item' => __( 'Editar Sitio' ),
		'new_item' => __( 'Nuevo Sitio' ),
		'view' => __( 'Ver Sitio' ),
		'view_item' => __( 'Ver Sitio' ),
		'search_items' => __( 'Buscar Sitio' ),
		'not_found' => __( 'Sitio No Encontrada' ),
		'not_found_in_trash' => __( 'Sitio no encontrada en Papelera' )
	);
	register_post_type( 'nuestros-sitios', //post type name
		array(
			'labels' => $labels,
			'has_archive' => true,
			'public' => true,
			'description' => __( 'Nuestros Sitios' ),
			'supports' => array(
				'title',
				 'editor',
				// 'author',
				'thumbnail',
				// 'revisions',
				//'custom-fields',
				'page-attributes'
			),
			'taxonomies' => array( 'post_tag' ),
			'exclude_from_searchs' => false,
			//'capability_type' => 'post'
			'show_in_menu' => 'secciones-home',
			'menu_icon' => 'dashicons-images-alt2',
			'rewrite' => array( 'slug' => 'nuestros-sitios'),
			'menu_position' => 4,
			'query_var' => true,
		)
	);

}