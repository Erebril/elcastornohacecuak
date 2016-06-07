<?php
/**
 * achee-theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package achee-theme
 */

// Custom post types

add_action ( 'init', 'prowp_register_nuestralabor_post_type');

function prowp_register_nuestralabor_post_type() {
	$labels = array(
		'name' => __( 'Nuestra Labor' ),
		'singular_name' => __( 'nuestra labor' ),
		'add_new' => __( 'Añadir Nueva Labor' ),
		'add_new_item' => __( 'Añadir Nueva Labor' ),
		'edit' => __( 'Editar' ),
		'edit_item' => __( 'Editar Labor' ),
		'new_item' => __( 'Nueva Labor' ),
		'view' => __( 'Ver Labor' ),
		'view_item' => __( 'Ver Labor' ),
		'search_items' => __( 'Buscar Labor' ),
		'not_found' => __( 'Labor No Encontrada' ),
		'not_found_in_trash' => __( 'Labor no encontrada en Papelera' )
	);
	register_post_type( 'nuestra-labor', //post type name
		array(
			'labels' => $labels,
			'has_archive' => true,
			'public' => true,
			'description' => __( 'Nuestra Labor' ),
			'supports' => array(
				'title',
				'editor',
				//'author',
				'thumbnail',
				'revisions',
				//'custom-fields',
				'page-attributes'
			),
			'taxonomies' => array( 'post_tag' ),
			'exclude_from_searchs' => false,
			//'capability_type' => 'post'
			'show_in_menu' => 'secciones-home',
			'menu_icon' => 'dashicons-groups',
			'rewrite' => array( 'slug' => 'nuestra-labor'),
			'menu_position' => 4,
			'query_var' => true,
		)
	);

}