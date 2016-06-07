<?php
/**
 * achee-theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package achee-theme
 */

// Custom post types

add_action ( 'init', 'prowp_register_banners_post_type');

function prowp_register_banners_post_type() {
	$labels = array(
		'name' => __( 'Imágenes de banner' ),
		'singular_name' => __( 'cabecera' ),
		'add_new' => __( 'Añadir Nueva Imagen' ),
		'add_new_item' => __( 'Añadir Nueva Imagen' ),
		'edit' => __( 'Editar' ),
		'edit_item' => __( 'Editar Imagen' ),
		'new_item' => __( 'Nueva Imagen' ),
		'view' => __( 'Ver Imagen' ),
		'view_item' => __( 'Ver Imagen' ),
		'search_items' => __( 'Buscar Imagen' ),
		'not_found' => __( 'Imagen No Encontrada' ),
		'not_found_in_trash' => __( 'Imagen no encontrada en Papelera' )
	);
	register_post_type( 'cabecera', //post type name
		array(
			'labels' => $labels,
			'has_archive' => true,
			'public' => true,
			'description' => __( 'Imágenes de banner' ),
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
			//'capability_type' => 'post'
			'show_in_menu' => 'edit.php?post_type=page',
			'menu_icon' => 'dashicons-groups',
			'rewrite' => array( 'slug' => 'cabecera'),
			'menu_position' => 4,
			'query_var' => true,
		)
	);

}