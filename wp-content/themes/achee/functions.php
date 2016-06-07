<?php
/**
 * AChEE functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AChEE
 */

if ( ! function_exists( 'achee_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function achee_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AChEE, use a find and replace
	 * to change 'achee' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'achee', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'achee' ),
		'secondary-col1' => esc_html__( 'Primer Menú Verde', 'achee' ),
		'secondary-col2' => esc_html__( 'Segundo Menú Verde', 'achee' ),
		'secondary-col3' => esc_html__( 'Tercer Menú Verde', 'achee' ),
		'secondary-col4' => esc_html__( 'Cuarto Menú Verde', 'achee' ),
		'topmenu' => esc_html__( 'Top Menu', 'achee' ),
		'innermenu' => esc_html__( 'Inner Pages Menu', 'achee' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'achee_custom_background_args', array(
		'default-color' => 'f6f6f6',
		'default-image' => '',
	) ) );
}
endif; // achee_setup
add_action( 'after_setup_theme', 'achee_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function achee_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'achee_content_width', 640 );
}
add_action( 'after_setup_theme', 'achee_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
require get_template_directory() . '/inc/register-site-widgets.php';


/*
 * personalización
 */

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Enqueue scripts and styles en el BACK END.
 */
function backend_achee_scripts() {
	global $post_type;
	//wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.4.min.js' );
	//wp_register_script( 'cdn-jquery', plugins_url() . '/custom_assets/jquery-2.1.4.min.js' );
	// wp_enqueue_script( 'cdn-jquery' );
	// wp_register_script( 'materialize-scripts', plugins_url() . '/custom_assets/materialize.min.js' );
	// wp_enqueue_script( 'materialize-scripts' );
	
	// For ALL backend
	wp_register_style( 'custom-backend-styles', plugins_url() . '/custom_assets/custom_back_end.css' );
	wp_enqueue_style( 'custom-backend-styles' );
	wp_register_script( 'custom-admin-scripts', plugins_url() . '/custom_assets/custom-admin.js' );
	wp_enqueue_script( 'custom-admin-scripts' );	

	if( in_array($post_type, array('linea-apoyo','cursos','licitaciones')) ){
		
		// Datetime picker register
		wp_register_script( 'moment', get_template_directory_uri() . '/assets/material-datetimepicker/js/moment.js', array('jquery') );
		wp_register_script( 'moment-es', get_template_directory_uri() . '/assets/material-datetimepicker/js/moment-es.js', array('moment') );
		wp_register_script( 'date-time-picker', get_template_directory_uri() . '/assets/material-datetimepicker/js/bootstrap-material-datetimepicker.js', array('moment') );		
		wp_register_script( 'md-icons', '', array('moment') );
		
		// Add script
		wp_enqueue_script( 'moment' );
		wp_enqueue_script( 'moment-es' );
		wp_enqueue_script( 'date-time-picker' );
		wp_enqueue_script( 'md-icons' );

		if($post_type == 'licitaciones'){
			wp_register_script( 'licitacionesjs', plugins_url() . '/custom_assets/licitaciones.js', array('jquery') );
			wp_enqueue_script( 'licitacionesjs' );			
		}

		
		// CSS
		wp_enqueue_style( 'date-time-picker-style', get_template_directory_uri() . '/assets/material-datetimepicker/css/bootstrap-material-datetimepicker.css');		
		wp_enqueue_style( 'md-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');		
	}


}
add_action('admin_enqueue_scripts', 'backend_achee_scripts');

/**
 * Enqueue scripts and styles en el FRONT END.
 */
function achee_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	//wp_enqueue_script( 'achee-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'achee-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		//wp_enqueue_script( 'comment-reply' );
	}

	// Add Material scripts and styles
	if( !is_admin()){

		wp_deregister_script('jquery');
		wp_enqueue_script( 'cdn-jquery', 'http://code.jquery.com/jquery-2.1.3.min.js', array(), '1.0', false );
		wp_enqueue_script('jquery');		

	}
	// Font awesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/font-awesome-4.4.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'dashicon', get_template_directory_uri() . '/assets/dashicons-master/css/dashicons.css' );
	//wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/dashicons-master/css/style.css' );
	// materialize framework css
	//wp_enqueue_style( 'material-icons', get_template_directory_uri() . '/assets/material-icon.css' );	
	//wp_enqueue_style( 'material-icons', get_template_directory_uri() . '/assets/materialize/css/material-icons.css' );
	wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');			
	wp_enqueue_style( 'material-style', get_template_directory_uri() . '/assets/materialize/css/materialize.min.css' );
	// materialize framework  js
	wp_enqueue_script( 'material-script', get_template_directory_uri() . '/assets/materialize/js/materialize.min.js', array(), '1.0', true );
	// carrousel
	wp_enqueue_script( 'owl-scripts', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.min.js', array(), '1.0', true );
	wp_enqueue_style( 'owl-stylesheet', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.css' );

	// theme style, responsive style fix
	wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/css/stylesheet.css' );
	wp_enqueue_style( 'mediaqueries', get_template_directory_uri() . '/css/mediaqueries.css' );

	// Menu responsive
	wp_enqueue_script( 'menu-responsive-s', get_template_directory_uri() . '/assets/menu-responsive/dist/core/js/jquery.mmenu.min.all.js', array(), '1.0', true );
	wp_enqueue_style( 'menu-responsive-style', get_template_directory_uri() . '/assets/menu-responsive/dist/core/css/jquery.mmenu.all.css' );

	// Parallax
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/assets/parallax/parallax.min.js', array(), '1.0', true );	


	// Custom functions
	wp_enqueue_script( 'material-custom', get_template_directory_uri() . '/js/material-custom-scripts.js', array(), '1.0', true );
	wp_enqueue_script( 'achee-scripts', get_template_directory_uri() . '/js/achee-scripts.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'achee_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom thumbnails image sizes.
 */
require get_template_directory() . '/inc/custom-images-sizes.php';

/**
 * Back-End menu Custom Post Types.
 */
require get_template_directory() . '/inc/custom-post-types-slider.php';
require get_template_directory() . '/inc/custom-post-types-nuestra-labor.php';
require get_template_directory() . '/inc/custom-post-types-exitos.php';
require get_template_directory() . '/inc/custom-post-types-adds.php';
require get_template_directory() . '/inc/custom-post-types-canjeadds.php';
require get_template_directory() . '/inc/custom-post-types-sitios.php';
require get_template_directory() . '/inc/custom-post-types-banners.php';

/* Creación de menú padre para contener estos elementos del home */
function register_parent_menu_home_elements() {
	add_menu_page( 'secciones inicio', 'Secciones Inicio', 'manage_options', 'secciones-home', '', 'dashicons-welcome-widgets-menus', 6);
}
add_Action( 'admin_menu', 'register_parent_menu_home_elements' );

require get_template_directory() . '/inc/the-breadcrumbs.php';

require get_template_directory() . '/inc/custom-post-types-agenda.php';
require get_template_directory() . '/inc/custom-post-types-cursos.php';
require get_template_directory() . '/inc/custom-post-types-linea-apoyo.php';
require get_template_directory() . '/inc/custom-post-types-licitacion.php';

/**
 * Back-End menu Custom meta Boxes.
 */
require get_template_directory() . '/inc/custom-meta-boxes-sitioshome.php';
require get_template_directory() . '/inc/custom-meta-boxes-bannershome.php';
require get_template_directory() . '/inc/custom-meta-boxes-bannerspartners.php';
require get_template_directory() . '/inc/custom-meta-boxes-subtitulos.php';
require get_template_directory() . '/inc/custom-meta-boxes-icon-ourlabor.php';
require get_template_directory() . '/inc/custom-meta-boxes-cursos.php';
require get_template_directory() . '/inc/custom-meta-boxes-linea.php';
require get_template_directory() . '/inc/custom-meta-boxes-licitaciones.php';
require get_template_directory() . '/inc/custom-meta-boxes-icon-subpage.php';

/**
 * Widget para ingresar Teléfono y correo de AChEE en el header superior
 */
require get_template_directory() . '/inc/custom-widget-header.php';

/**
 * Widget para ingresar info ACHEE pie de página
 */
require get_template_directory() . '/inc/custom-widget-piepagina.php';

/**
 * Widget para redes sociales del home
 */
require get_template_directory() . '/inc/rs-twitter-widget.php';
require get_template_directory() . '/inc/rs-youtube-widget.php';

/**
 * Widget para ingresar redes sociales del footer
 */
require get_template_directory() . '/inc/custom-widget-red-social.php';

/**
 * Widget para listar categorias de noticias
 */
require get_template_directory() . '/inc/custom-widget-listado-categorias.php';


/**
 * Widget para listar Cursos en sidebar
 */
require get_template_directory() . '/inc/custom-widget-listado-cursos.php';

/**
 * Widget para listar Licitaciones en sidebar
 */
require get_template_directory() . '/inc/custom-widget-listado-licitaciones.php';


/**
 * Widget para listar Lineas de Apoyo
 */
require get_template_directory() . '/inc/custom-widget-listado-lineas.php';



// barra de menú top personalizada
require get_template_directory() . '/inc/custom-admin-topmenu.php';


/**
 * Custom Taxonomia "Lineamientos"
 */
require get_template_directory() . '/inc/custom-taxanomy-lineamiento.php';


/**
 * Widget Listado Mix para SideBar paginas áreas de acción"
 */
require get_template_directory() . '/inc/custom-widget-listado-areas.php';


/*
 * Pie de página personalizado
 */
function change_footer_admin() {
    echo '&copy;' . get_the_date('Y') . ' Derechos reservados de Agencia Chilena de Eficiencia Energética (AChEE) - Web creada por <a href="http://www.ideauno.cl">Idea Uno</a>';
}
add_filter('admin_footer_text', 'change_footer_admin');

/*
 * Login sitio personalizado
 */
function custom_login_logo() {
        echo '<style type="text/css">
        h1 a { background-image: url('.get_bloginfo('template_directory').'/img/iso.png) !important; }
        </style>';
}
add_action('login_head', 'custom_login_logo');

/*
 * Elementos que no verán usuarios no administradores
 */
if(is_user_logged_in()){
    if (!current_user_can('manage_options')) {

		add_action( 'admin_init', 'remove_menus' );

		function remove_menus() {
			// remove_menu_page('edit.php'); // Entradas
			remove_menu_page('upload.php'); // Multimedia
			remove_menu_page('link-manager.php'); // Enlaces
			// remove_menu_page('edit.php?post_type=page'); // Páginas
			remove_menu_page('edit-comments.php'); // Comentarios
			remove_menu_page('themes.php'); // Apariencia
			remove_menu_page('plugins.php'); // Plugins
			remove_menu_page('users.php'); // Usuarios
			remove_menu_page('tools.php'); // Herramientas
			remove_menu_page('options-general.php'); // Ajustes
		}
	}
}
/*
 * Elementos ocultos para todos los usuarios
 */
/* agregaradministracción de menú */
add_action( 'admin_menu', 'moved_menu_admin' );

function moved_menu_admin() {
	remove_menu_page('edit-comments.php'); // Comentarios
	remove_submenu_page('index.php', 'update-core.php'); // Actualizaciones
	remove_submenu_page( 'themes.php', 'nav-menus.php' );
	add_menu_page( 'Menús Sitio', 'Menús', 'manage_options', 'nav-menus.php', '', 'dashicons-welcome-widgets-menus', 30 );
}

/*
 * Elimina metaboxes del escritorio / página inicio
 */
function wp_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	//remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	//remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'wp_remove_dashboard_widgets' );

/*
 * mensaje bienvenida en escritorio
 */
function custom_dashboard_widget() {
	$urlimg = get_bloginfo('template_directory');
	echo '<div class="ache-wrap">';
	echo '<div class="logo-widget">';
	echo '<img src="' . $urlimg . '/img/logo_sm.png" class="left"/>';
	echo '<h1>¡Hola! Bienvenido al área de edición de la web de AChEE</h1>';
	echo '</div>';
	echo '<div class="left"><p>Aquí va todo el texto que quieras, con todo el HTML que precises</p></div>';
	echo '</div>';
}

function add_custom_dashboard_widget() {
	add_meta_box('custom_dashboard_widget', __('Bienvenido al editor de la AChEE'), 'custom_dashboard_widget', 'dashboard', 'normal', 'high');
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');

/**
 * limitar tamaño caracteres de the_content y the_excerpt.
 */
//metodo perfeccionado de esto:
//<?php echo substr(strip_tags($post->post_title), 0, 15);
function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	}
	$content = preg_replace('/\[.+\]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}
