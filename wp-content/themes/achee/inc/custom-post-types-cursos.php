<?php
/**
 * achee-theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package achee-theme
 */

// Custom post types

add_action ( 'init', 'prowp_register_cursos_post_type');

function prowp_register_cursos_post_type() {
	$labels = array(
		'name' => __( 'Cursos' ),
		'singular_name' => __( 'Cursos' ),
		'add_new' => __( 'Añadir Curso' ),
		'add_new_item' => __( 'Añadir Nuevo Curso' ),
		'edit' => __( 'Editar' ),
		'edit_item' => __( 'Editar Curso' ),
		'new_item' => __( 'Nuevo Curso' ),
		'view' => __( 'Ver Curso' ),
		'view_item' => __( 'Ver Curso' ),
		'search_items' => __( 'Buscar Curso' ),
		'not_found' => __( 'Curso No Encontrada' ),
		'not_found_in_trash' => __( 'Curso no encontrada en Papelera' )
	);
	register_post_type( 'cursos', //post type name
		array(
			'labels' => $labels,
			'has_archive' => true,
			'public' => true,
			'description' => __( 'Cursos' ),
			'supports' => array(
				'title',
				'editor',
				//'author',
				//'thumbnail',
				//'custom-fields',
				//'page-attributes'
			),
			'taxonomies' => array( 'post_tag' ),
			'exclude_from_searchs' => false,
			//'capability_type' => 'post'
			'menu_icon' => 'dashicons-welcome-learn-more',
			'rewrite' => array( 'slug' => 'cursos'),
			'menu_position' => 4,
			'query_var' => true,
		)
	);

}


// crear un plugin de post types..
// http://premium.wpmudev.org/blog/creating-content-custom-post-types/
//
//
//pendiente:
//
//siguiente paso crear una página con el layout o template para que la página licitaciones muestré el listado de licitaciones
//http://web-codes.blogspot.cl/2013/09/wordpress-mostrar-custom-post-types.html
//
//
//crear un layout para la página de detalle del post type y mostrar la licitacion con sus puntos dl-dt
//http://franciscoamk.com/usar-plantillas-de-pagina-en-custom-post-types-de-wordpress/
//
//https://wp-types.com/documentation/user-guides/creating-wordpress-custom-post-archives/