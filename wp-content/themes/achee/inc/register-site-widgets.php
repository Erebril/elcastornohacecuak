<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function achee_widgets_init() {
	// widget para header top menu
	register_sidebar( array(
		'name'          => esc_html__( 'Menú TopHeader Left side', 'achee' ),
		'id'            => 'top-header-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget left %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Menú TopHeader Right side', 'achee' ),
		'id'            => 'top-header-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget left %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	// widget para main menu
	register_sidebar( array(
		'name'          => esc_html__( 'Main Menu Right', 'achee' ),
		'id'            => 'right-mainmenu',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sección Redes Sociales Páginas', 'achee' ),
		'id'            => 'social-networks',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'achee' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	register_widget('contactos_widget');
	register_widget('info_piepag_widget');
	register_sidebar( array(
		'name'          => esc_html__( 'Pie de Página', 'achee' ),
		'id'            => 'achee-piepag',
		'description'   => '',
		'before_widget' => '<div class="widget z-depth-1 %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	// widget redes sociales home
	register_widget('rs_twitter_widget');
	// register_widget('rs_youtube_widget');
	register_sidebar( array(
		'name'          => esc_html__( 'Sección de Banners', 'achee' ),
		'id'            => 'banner-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget side-menu %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><i class="fa fa-check-circle-o"></i>',
		'after_title'   => '</h2>',		
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Sección Twitter', 'achee' ),
		'id'            => 'achee-twitter',
		'description'   => '',
		'before_widget' => '<div class="card-panel widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',		
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sección de Youtube', 'achee' ),
		'id'            => 'achee-youtube',
		'description'   => '',
		'before_widget' => '<div class="widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );
	// Secciones del footer
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Columna 1', 'achee' ),
		'id'            => 'columna-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title white-text">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Columna 2', 'achee' ),
		'id'            => 'columna-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title white-text">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Columna 3', 'achee' ),
		'id'            => 'columna-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title white-text">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Columna 4', 'achee' ),
		'id'            => 'columna-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title white-text">',
		'after_title'   => '</h5>',
	) );



	// Nuevos Sidebar para Custom Post Type

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Cursos', 'achee' ),
		'id'            => 'sidebar-cursos',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	register_widget('ultimos_cursos');


	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Licitaciones', 'achee' ),
		'id'            => 'sidebar-licitaciones',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	register_widget('ultimas_licitaciones');

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Lineas de Apoyo', 'achee' ),
		'id'            => 'sidebar-lineas-apoyo',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	register_widget('ultimas_lineas');

	// Listado Mix => Post, licitaciones, lineas de Apoyo, Cursos
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Listado Mix', 'achee' ),
		'id'            => 'sidebar-listado-mix',
		'description'   => 'Listado de noticias, lineas de apoyo, licitaciones y cursos por área',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	register_widget('posts_by_areas');




	// redes sociales en el footer
	register_widget('add_social_network_widget');
	// listado de categorias noticias
	register_widget('categorias_noticias');
}
add_action( 'widgets_init', 'achee_widgets_init' );