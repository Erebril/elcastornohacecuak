<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package AChEE
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function achee_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'achee_body_classes' );



function submenu_view(){
	global $post;
	$my_wp_query = new WP_Query();
	$op = array(
		'post_parent' => $post->ID,
		'post_type' => 'page',
		'orderby'   => 'menu_order',
	    'order'  => 'DESC',
	    'posts_per_page' => 99,
	);
	$children = $my_wp_query->query($op);
	$html = '';
	if ($children) {
		// creo submenu
		$html .= '<div id="menu-secundario-alt" class="menu-inner-pages with-title" data-title="'.get_the_title($post->ID).'"><div class="container"><div class="row">';
		$html .= '<div class="col s12">';
		$html .= '<ul class="green-menu">';
		$html .= '<li class="submenu-parent">'.get_the_title($post->ID).'<i class="fa fa-angle-right"></i></li>';
		foreach ($children as $key => $child) {
			$html .= '<li><a href="'.get_permalink($child->ID).'">'.get_the_title($child->ID).'</a></li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div></div></div>';
	}
	else{
		// reviso si tiene un padre
		// Si es así listo sus hermanos
		if($post->post_parent !=""){
			$wp_query = new WP_Query();
			$op = array(
				'post_parent' => $post->post_parent,
				'post_type' => 'page',
				'orderby'   => 'menu_order',
			    'order'  => 'DESC',
			    'posts_per_page' => 99,
			);
			$children = $wp_query->query($op);
			// creo submenu
			$html .= '<div id="menu-secundario-alt" class="menu-inner-pages with-title with-parent" data-title="'.get_the_title($post->post_parent).'"><div class="container"><div class="row">';
			$html .= '<div class="col s12">';
			$html .= '<ul class="green-menu">';
			// agrego al padre
			$html .= '<li class="submenu-parent">'.get_the_title($post->post_parent).'<i class="fa fa-angle-right"></i></li>';
			foreach ($children as $key => $child) {
				$class = ($post->ID == $child->ID) ? ' class="active"' : '';
				$html .= '<li'.$class.'><a href="'.get_permalink($child->ID).'">'.get_the_title($child->ID).'</a></li>';
			}
			$html .= '</ul>';
			$html .= '</div>';
			$html .= '</div></div></div>';


		}
	}
	return $html;
}



function item_active_or_not($page_id,$item_page_id){
	return $page_id == $item_page_id ? "mm-selected" : "normal";
}

function menu_dropdown($page_id){

	   $menu_1 = wp_get_nav_menu_items(3); // menu-01-nosotros
	   $menu_2 = wp_get_nav_menu_items(32); // menu-02-eficiencia-energetica
	   $menu_3 = wp_get_nav_menu_items(33); // menu-03-asesoramiento
	   $menu_4 = wp_get_nav_menu_items(34); // menu-04-formacion-de-capacidades

	   $html = '<ul>';
	   for($i=1; $i<=4; $i++){

		   foreach (${"menu_".$i} as $key => $item) {
		   		if ($item->menu_item_parent==0) {
		   			$html .= '<li class="'.item_active_or_not($page_id,$item->object_id).'"><a href="'.$item->url.'">'.$item->title.'</a>
		   						<ul>
		   					 ';
		   		}
		   		else{
		   			$html .= '<li class="'.item_active_or_not($page_id,$item->object_id).'"><a href="'.$item->url.'">'.$item->title.'</a></li>';
		   		}
		   }
		   $html .= '</ul>';
		   $html .= '</li>';

	   }

	$html .= '</ul>';

	return $html;

}


function menu_responsive(){

	   global $post;

	   $menu_primary = wp_get_nav_menu_items(2); // menu-principal
	   $html = '<nav id="my-menu" class="my-menu-res">';
	   $html .= '<ul id="mobile-nav-list">';
	   //$html .= '<li><form role="search" method="get" class="search-responsive" action="'.home_url( '/' ).'"><input type="text" name="s" placeholder="'.esc_attr_x( 'Search …', 'placeholder' ).'" value="'.get_search_query().'"></form></li>';
	   foreach ($menu_primary as $k => $parent) {
	   		 // dropdown
	   		 if($k==0){
	   			$html .= '<li>
							<span>'.$parent->title.'</span>
	   						'.menu_dropdown($post->ID).
	   					  '</li>';
	   		 }
	   		 else{
	   		 	$html .= '<li class="'.item_active_or_not($post->ID,$parent->object_id).'"><a href="'.$parent->url.'">'.$parent->title.'</a></li>';
	   		}
	   }
	   $html .= '</ul>';
	   $html .= '</nav>';


	   echo $html;

}





function custom_pagination($wp_query) {
    //global $wp_query;
    $big = 999999999; // need an unlikely integer
    $class = "";
    $print = true;

    // debug for link.
    //var_dump(get_pagenum_link());
    $separator = (parse_url(get_pagenum_link(), PHP_URL_QUERY) == NULL) ? '?' : '&';

    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            //'base' => '%_%',
            //'base' => str_replace('#038;','',get_pagenum_link(1) . '%_%'),
            'format' => $separator.'paged=%#%',
            //'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => __('<i class="material-icons">chevron_left</i>'),
			'next_text'    => __('<i class="material-icons">chevron_right</i>'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div class="page-pagination">';
            echo '<ul class="pagination">';
            foreach ( $pages as $page ) {
            		if(preg_match('/current/',$page)){
            		 	$class = " active";
            		}
            		if(preg_match('/dots/',$page)){
            		 	$class = " dots";
            		 	$print = false;
            		}
            		if($print) {
                  		echo '<li class="waves-effect'.$class.'">'.$page.'</li>';
            		}
                  	else{
                  		// dots
                  		echo '<li>'.$page.'</li>';
                  	}
                  	$class = '';
                  	$print = true;
            }
           echo '</ul>';
           echo '</div>';

        }
}





//add_action( 'wp_enqueue_scripts', 'precinct_script' );
// function precinct_script() {

//     wp_enqueue_script( 'precincts', get_template_directory_uri() . '/js/ajax-precincts.js', array('achee-scripts'), '1.0', true );
// 	wp_localize_script( 'precincts', 'ajax_general', array(
// 		'ajax_url' => admin_url( 'admin-ajax.php' )
// 	));

// }


if(is_admin()){
	add_action( 'wp_ajax_nopriv_precincts_by_region', 'precinct_ajax_callback');
	add_action( 'wp_ajax_precincts_by_region', 'precinct_ajax_callback' );
}

function precinct_ajax_callback(){

	global $wpdb;
	$region_name = $_POST['name'];
	$results = $wpdb->get_results( 'SELECT codigo FROM acee_regions WHERE nombre = "'.$region_name.'" limit 1', ARRAY_A);
	$codigo = $results[0]['codigo'];
	//SELECT * FROM achee_db.acee_precincts where padre = '13'
	$precints = $wpdb->get_results( 'SELECT nombre FROM acee_precincts WHERE padre = "'.$codigo.'"', ARRAY_A);
	echo json_encode(array('rows' =>$precints, 'codigo' => $codigo));
	die();

}


function replace_cf7($class, $text, &$html) {
	$matches = false;
	$pattern = '/<select (.*) class="(.*)(\s)'.$class.'" [^>]*>(.*)<\/select>/iU';
	preg_match($pattern, $html, $matches);
	if ($matches) {
		$select = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $matches[0]);
		$html = preg_replace($pattern, $select, $html);
	}
}

function my_wpcf7_form_elements($html) {
	replace_cf7('region_list','Región', $html);
	replace_cf7('precinct_list','Comuna', $html);
	return $html;
}
// add Select vario a dropdown 
//add_filter('wpcf7_form_elements', 'my_wpcf7_form_elements');




function dropdown_lineamiento($lineamiento){
	// $custom_group = 943;
	// $fields = apply_filters('acf/field_group/get_fields', array(), $custom_group);

	$terms = get_terms( 'lineamientos', array( 'hide_empty' => 0 ) );
	$html = '<select id="lineamiento-list" name="lineamiento-list" class="news-filter select2-fake" style="width:100%;">';
	if(is_array($terms)){
		//if(isset($fields[0]['choices'])){
			//$options = $fields[0]['choices'];
			//$html .='<option value="">Todos los Lineamientos</option>';
			$html .='<option value="">Todos los lineamientos</option>';
			foreach ($terms as $term) {
				if($lineamiento==$term->slug){
					//if($key!=""){
						$html .='<option value="'.$term->slug.'" selected>'.$term->name.'</option>';
					//}
					//else{
					//}
				}
				else{
					$html .='<option value="'.$term->slug.'">'.$term->name.'</option>';
				}
			}
		//}
	}
	$html .= '</select>';
	echo $html;
}

function dropdown_categories_list($cat){
	$html = '<select id="cat-list" name="cat-list" class="news-filter select2-fake" style="width:100%;">';
	  $args = array('orderby' => 'name','order' => 'ASC');
	  $categories = get_categories($args);
	  $html .='<option value="">Todas las Categorías</option>';
	  foreach ($categories as $category) {
	  	if($cat == $category->slug){
	  		$html .= '<option value="'.$category->slug.'" selected>';
	  	}
	  	else{
	  		$html .= '<option value="'.$category->slug.'">';
	  	}
		$html .= $category->cat_name;
		$html .= '</option>';
	  }
	  $html .= '</select>';
	  echo $html;
}


function dropdown_tags($tag){

	$html = '';

	if($tag){
		if($tag!="Sin Etiqueta"){
			$tag_obj = get_tag($tag);
			$html = '<select id="tag-list" class="news-filter" style="width: 100%;">
					   <option value="'.$tag_obj->term_id.'" selected="selected">'.$tag_obj->name.'</option>
					</select>';
					   //<option value="">Sin Etiqueta</option>

		}
		else{
			$html = '<select id="tag-list" class="news-filter" style="width: 100%;">
				</select>';
				   //<option value="" selected="selected">Ingrese una Etiqueta</option>
		}
	}
	else{
		$html = '<select id="tag-list" class="news-filter" style="width: 100%;">
				</select>';
				   //<option value="" selected="selected">Ingrese una Etiqueta</option>
	}

	echo $html;
}


function get_attach_image( $post_id ) {

	//Esto o
	//echo the_post_thumbnail( 'download-thum', array( 'class' => 'thumb' ) );

    $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id());

    if ( $feat_image_url!="" ) {
        echo '<img width="200px" height="300px" class="responsive-img" src="' . $feat_image_url . '">';
    }
    else{
    	echo '<img width="200px" height="300px" class="responsive-img" src="' . get_template_directory_uri() . '/img/default-big920.jpg">';
    }
}



// function tags_autocomplete(){
// 	//js
// 	wp_enqueue_script( 'select2', get_template_directory_uri() . '/assets/select2/dist/js/select2.min.js', array('achee-scripts'), '1.0', true );
// 	// wp_localize_script( 'select2', 'tags_autocomplete', array(
// 	// 	'ajax_url' => admin_url( 'admin-ajax.php' )
// 	// ));
// 	//wp_enqueue_script( 'tags_autocomplete', get_template_directory_uri() . '/js/tags-autocomplete.js', array('select2'), '1.0', true );
// 	//css
// 	wp_enqueue_style( 'select2-style', get_template_directory_uri() . '/assets/select2/dist/css/select2.min.css');
// }

function scripts_news(){
	//  Página Noticias scripts
	if(is_page('noticias')){
		// select2 plugin para tags
		wp_enqueue_script( 'select2', get_template_directory_uri() . '/assets/select2/dist/js/select2.min.js', array('achee-scripts'), '1.0', true );
		wp_enqueue_script( 'select2_es', get_template_directory_uri() . '/assets/select2/dist/js/i18n/es.js', array('select2'), '1.0', true );
		wp_enqueue_script( 'news-filter', get_template_directory_uri() . '/js/news-filter.js', array('select2_es'), '1.0', true );
		wp_localize_script( 'news-filter', 'tags_autocomplete', array(
			'ajax_url' => admin_url( 'admin-ajax.php' )
		 ));
		wp_enqueue_style( 'select2-style', get_template_directory_uri() . '/assets/select2/dist/css/select2.min.css');
	}

	// Plantilla para licitaciones por área
	if(is_post_type_archive('licitaciones')){	
		wp_enqueue_script( 'select2', get_template_directory_uri() . '/assets/select2/dist/js/select2.min.js', array('achee-scripts'), '1.0', true );
		wp_enqueue_script( 'select2_es', get_template_directory_uri() . '/assets/select2/dist/js/i18n/es.js', array('select2'), '1.0', true );
		wp_enqueue_script( 'licita-filter', get_template_directory_uri() . '/js/licita-filter.js', array('select2_es'), '1.0', true );
		wp_enqueue_style( 'select2-style', get_template_directory_uri() . '/assets/select2/dist/css/select2.min.css');
	}


}

function scripts_contact(){
	if(is_page('contacto')){
		//rgister map
 		//wp_register_script( 'gmap', 'http://maps.google.com/maps/api/js');
 		//wp_register_script( 'gmap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBfYMeYGvjfF9PfUFED3PdeULCPqlbrvrQ&callback=initMap');
		//wp_register_script( 'maps', get_template_directory_uri() . '/js/maps.js', array('gmap'), '1.0', true );

		// other func
 		//wp_enqueue_script('gmap');
 		//wp_enqueue_script('maps');
		wp_enqueue_script( 'contact-scripts', get_template_directory_uri() . '/js/contact-scripts.js', array('achee-scripts'), '1.0', true );
		// wp_localize_script( 'precincts', 'ajax_general', array(
		// 	'ajax_url' => admin_url( 'admin-ajax.php' )
		// ));
	}
}

add_action( 'wp_enqueue_scripts', 'scripts_contact');
add_action( 'wp_enqueue_scripts', 'scripts_news');


if(is_admin()){
	add_action( 'wp_ajax_nopriv_get_tag_by_cat', 'get_tag_by_cat_callback');
	add_action( 'wp_ajax_get_tag_by_cat', 'get_tag_by_cat_callback' );
}





/**
 * Función que entrega listado de Tags a partir de una categoría y un lineamiento
 * @return [type] [description]
 * @author Nicolas Vera <nicolas.vera@ideauno.cl>
 */
function get_tag_by_cat_callback(){

	global $wpdb;
	$results = array();
	$q = isset($_POST['q']) ? $_POST['q'] : null;
	$cat = isset($_POST['cat']) && ($_POST['cat']!="") ? $_POST['cat'] : null;
	$lineamiento = isset($_POST['lineamiento']) && ($_POST['lineamiento']!="") ? $_POST['lineamiento'] : null;
	if($q){

			$query = "
				SELECT DISTINCT terms2.term_id as id, terms2.name as text, terms2.slug as slug, CHARACTER_LENGTH(terms2.name) as len
				FROM
					".$wpdb->prefix."posts as p1
					LEFT JOIN ".$wpdb->prefix."term_relationships as r1 ON p1.ID = r1.object_ID
					LEFT JOIN ".$wpdb->prefix."term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
					LEFT JOIN ".$wpdb->prefix."terms as terms1 ON t1.term_id = terms1.term_id,

					".$wpdb->prefix."posts as p2
					LEFT JOIN ".$wpdb->prefix."term_relationships as r2 ON p2.ID = r2.object_ID
					LEFT JOIN ".$wpdb->prefix."term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
					LEFT JOIN ".$wpdb->prefix."terms as terms2 ON t2.term_id = terms2.term_id
				WHERE
					p1.post_status = 'publish' AND
			";

			//Si hay lieamiento
			$lin_id = null;
			if($lineamiento){
				// mapear id
				$lineamientos = get_terms( 'lineamientos', array( 'hide_empty' => 0 ));
				foreach ($lineamientos as $key => $lin) {
					if($lin->slug == $lineamiento){
						$lin_id = $lin->term_id;
					}
				}
			}

			// add to query
			if($lin_id){
				if($cat){
					if($cat){
						$cat_obj = get_category_by_slug($cat);
						$category = $cat_obj->term_id;
						$query .= " terms1.term_id IN ($lin_id,$category) AND ";
					}
				}
				else{
					//solo lineamiento
					$query .= " terms1.term_id = '".$lin_id."' AND ";
				}

				$query .= "t2.taxonomy = 'post_tag' AND p2.post_status = 'publish' AND terms2.slug LIKE '%".$q."%'
						AND p1.ID = p2.ID
					ORDER by text";

				$tags = $wpdb->get_results($query);
				$tags_buenos = array();
				if($tags){
					$aux = $tags[0];
					foreach ($tags as $key => $tag) {
						if($key > 0){
							if($tag->id == $aux->id && $tag->slug != $aux->slug){
								$tags_buenos[] = $tag;
							}
							$aux = $tag;
						}
					}
				}
				if($tags){
					$results = array("items"=>$tags_buenos);
				}

			}
			else{
				// SOLO hay categoria
				if($cat){
					$cat_obj = get_category_by_slug($cat);
					$category = $cat_obj->term_id;
					$query .= " terms1.term_id = '".$category."' AND ";
				}

				$query .= "t2.taxonomy = 'post_tag' AND p2.post_status = 'publish' AND terms2.name LIKE '%".$q."%'
					AND p1.ID = p2.ID
				ORDER by len ASC LIMIT 50";

				$tags = $wpdb->get_results($query);
				if($tags){
					$results = array("items"=>$tags);
				}

			}

	}
	//echo $query;
	echo json_encode($results);
	die();
}



/**
 * get_download_link  funcion devuelve ulr para filtrar categorias de descargas
 * @param  [string] $cat_slug slug de una categorias de descargas
 * @return [type]           [description]
 */
function get_download_link($cat_slug){
		$link = get_the_permalink();
		$separator = (parse_url($link, PHP_URL_QUERY) == NULL) ? '?' : '&';
   		$link .= $separator . 'download_cat='.$cat_slug;
   		echo $link;
}



/**
 *
 *	Agrega Numero de Noticias nuevas segun Tipo en Home
 *	Para saber si hay licitaciones, lineas de apoyo o cursos nuevos
 *
 */


function numeroDiasHabiles(){

    $today = date('N');
    switch ($today) {
        case 1:
             //lun
             $less = 10;
             break;
        case 7:
             //dom
             $less = 10;
             break;
        case 6:
            //sab
            $less = 9;
        default:
            //mar,mier,jue,vier
            $less = 8;
            break;
    }

    return $less;
}

function number_of_new_post($type){

		$postProp = array(
						'post_type' => $type,
						'posts_per_page' => -1,
						'post_status' => array('publish'),
						'date_query' => array(
							'after' => '-'.numeroDiasHabiles().' days'
						)
		);
		$results = new WP_Query($postProp);
		return $results->post_count;
}

function badge($type){
	$number = number_of_new_post($type);
	if($number>0){
		echo ' <span class="badge-new">'.$number.'</span>';
	}
}

function badge_text($type){
	if($type == 'cursos'){
		$new = "nuevo";
	}
	else{
		$new = "nueva";
	}
	echo ' <span class="badge-text">'.$new.'</span>';
}


function check_post_is_new($type){
	global $post;
	//string '2015-12-22 18:17:41
	//echo date('Y-m-d H:i:s');
	$format = 'Y-m-d H:i:s';
	$date_post  = new DateTime((string)$post->post_date);
	$date_today = new DateTime();
	$date_back  = new DateTime(date($format,strtotime(-numeroDiasHabiles().' days')));


	if($date_post >= $date_back && $date_post <= $date_today){
		//new post!
		badge_text($type);
	}

}







/// Funciones para Limitar Contenido de TEXTO

function limit_subtitle($content,$limit = 200){		
	return $content ? strlen($content) ? '<p>'.substr($content,0,$limit).'...</p>' :  '<p>'.$content.'</p>' : '<p>Sin contenido aún</p>';
}

function limit_title($number = 100, $before = '', $after = ''){
	$title_ = get_the_title();
	$title_ = strlen($title_) > $number ? substr($title_, 0, $number).'...' : $title_;
	return $before.$title_.$after;
}

function limit_content($number){
	$content = get_the_content();
    return substr($content, 0, $number);
}


// Funcion utilitaria para saber si un post es hijo de Otro
function is_child() {
	global $post;
	if( is_page() && ($post->post_parent > 0) ) {
               return true;
	} else {
               return false;
	}
}


function get_parent_ID(){
	global $post;
	if( is_page() && ($post->post_parent > 0) ) {
               return $post->post_parent;
	} else {
               return false;
	}
}



// Funciones 
// Relacionadas a Campos Personalizados Cursos, Licitaciones, Linea de Apoyo
// Mapeo de tipos, Fix fechas, Areas de accion, etc...


function get_area_action_list($op = false){
	$area_accion = array('edificacion'=>'Edificación','industria-y-mineria'=>'Industria y Minería','educacion'=>'Educación','transporte'=>'Transporte', 'medicion-y-verificacion' =>'Medición y Verificación','formacion-de-capacidades'=>'Capacitación');
	if($op){
		$area_accion = array(''=>'Seleccione área Acción') + $area_accion;
	}
	return $area_accion;
}

function get_area_action($area = null){
	$area_accion = array('edificacion'=>'Edificación','industria-y-mineria'=>'Industria y Minería','educacion'=>'Educación','transporte'=>'Transporte', 'medicion-y-verificacion' =>'Medición y Verificación','formacion-de-capacidades'=>'Capacitación');
	if(is_null($area) || $area == "" ){
		return false;
	}
	return $area_accion[$area];
}


function word_date_to_english($date){
	$english = array('January','February','March','April','May','June','July','August','September','October','November','December');
	$spanish = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
    $date_fix = str_replace($spanish, $english, $date);    
    $date_fix = str_replace(' de', '', $date_fix);    
    return $date_fix;
    //input ex: 19 de Septiembre 2015 22:15
    //return ex: 29 September 2015 22:15
}



function date_to_words($date){
	
	// date input ex: 2016-03-15 14:30

	$new_date = DateTime::createFromFormat('Y-m-d H:i',$date);		
	$date_english_words = $new_date->format('d \d\e F \d\e Y H:i');
	$english = array('January','February','March','April','May','June','July','August','September','October','November','December');
	$spanish = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
    $date_fix = str_replace($english, $spanish, $date_english_words);    
   
   	return $date_fix;

}


function clone_closed_date($close_date){

		if(!is_null($close_date)){
			// contiene "de" => formato date picker i hope!
			if(preg_match('/de/', $close_date)){				

				$date_fix = word_date_to_english($close_date);					
				$date_termino_fix = DateTime::createFromFormat('d F Y H:i',$date_fix);	
				//final		
				if($date_termino_fix){
					$final = $date_termino_fix->format('Y-m-d H:i');
				}
				else{					
					$final = true;
				}
			}
			else{
				// Formato distinto a date picker				
				
				// saco palabras y parentesis	
				$date_fix = preg_replace('/([a-z\(\)])/i', '', $close_date);			
				
				// cambio "/" por "-" 			
				$date_fix = str_replace('/', '-',$date_fix);
				
				// Fecha
				$fecha = strtotime($date_fix); 
				$fecha_fix = date('Y-m-d',$fecha);			

				// Hora
				$hour = strtotime($date_fix);
				$hora_fix = date('H:i',$hour);			
								
				// final
				$final = $fecha_fix.' '.$hora_fix;			

			}
			
			//update final
			update_post_meta(get_the_ID(), 'close_date_licita', $final);			

		}

		return $final;

}



/**
 * Mapeo de Estado segun Fecha
 * @param  [type]  $fecha_termino [description]
 * @param  boolean $hh            [description]
 * @return [type]                 [description]
 * @author Nicolas Vera <nicolas.vera@ideauno.cl>
 * 
 */


function get_status_by_fecha_licita($fecha_termino,$hh = true){
	$hoy = new DateTime();
	
	// viene en formato 2016-03-05 22:15
	$date_termino_fix = date_create_from_format('Y-m-d H:i',$fecha_termino);
	return (($hoy > $date_termino_fix) ? ( ($hh) ? 'Terminado' : 'Terminada') : ( ($hh) ? 'Inscripción' : 'Publicada'));
}


function get_status_by_fecha($fecha_termino = null,$hh = true){
	$hoy = new DateTime();
	// FORMATO => 29 de Septiembre de 2015
	$date_fix = word_date_to_english($fecha_termino);	
	//29 September 2015 22:15
	
	$date_termino_fix = date_create_from_format('d F Y H:i',$date_fix);
	return (($hoy > $date_termino_fix) ? ( ($hh) ? 'Terminado' : 'Terminada') : ( ($hh) ? 'Inscripción' : 'Publicada'));
	
}

/**
 * Mapeo de Tipo de Licitación
 * @param  string $type número indicando que tipo de licitación
 * @return string  		Texto descriptivo de Tipo de Licitación
 * @author Nicolas Vera <nicolas.vera@ideauno.cl>
 */
function get_type_licitacion($type = null){

		$tipo_licitacion = array(
		    ''  => 'Seleccione Tipo de Licitación',
			'Licitación Pública menor a 100 UTM (L1)' => 'Licitación pública menor a 100 UTM (L1)',
			'Licitación Pública entre 100 y 1000 UTM (LE)' => 'Licitación pública entre 100 y 1000 UTM (LE)',
			'Licitación Pública mayor a 1000 UTM (LP)' => 'Licitación pública mayor a 1000 UTM (LP)',
			'otro' => 'Otro'
		);

		if(is_null($type) || $type == "" ){
			return false;
		}
		return $tipo_licitacion[$type];
}




function dropdown_licita_areas($area){
	$areas = get_area_action_list();
	$html = '<select id="licita-list" name="licita-list" class="news-filter select2-fake" style="width:100%;">';
	$html .= '<option value="">Todas las Áreas</option>';
	foreach ($areas as $slug => $name) {
			$html .= '<option value="'.$slug.'"'.  (($area == $slug) ? " selected" : "") .'>'.$name.'</option>';
	}
	$html .= '</select>';

	echo $html;
}


function get_current_url(){
	global $wp;
	return $current_url = home_url(add_query_arg(array(),$wp->request));	
}


// function dropdown_lineamiento($lineamiento){
// 	// $custom_group = 943;
// 	// $fields = apply_filters('acf/field_group/get_fields', array(), $custom_group);

// 	$terms = get_terms( 'lineamientos', array( 'hide_empty' => 0 ) );
// 	$html = '<select id="lineamiento-list" name="lineamiento-list" class="news-filter select2-fake" style="width:100%;">';
// 	if(is_array($terms)){
// 		//if(isset($fields[0]['choices'])){
// 			//$options = $fields[0]['choices'];
// 			//$html .='<option value="">Todos los Lineamientos</option>';
// 			$html .='<option value="">Todos los lineamientos</option>';
// 			foreach ($terms as $term) {
// 				if($lineamiento==$term->slug){
// 					//if($key!=""){
// 						$html .='<option value="'.$term->slug.'" selected>'.$term->name.'</option>';
// 					//}
// 					//else{
// 					//}
// 				}
// 				else{
// 					$html .='<option value="'.$term->slug.'">'.$term->name.'</option>';
// 				}
// 			}
// 		//}
// 	}
// 	$html .= '</select>';
// 	echo $html;
// }



/*
function get_category_tags($args) {
	global $wpdb;
	$tags = $wpdb->get_results
	("
		SELECT DISTINCT terms2.term_id as tag_id, terms2.name as tag_name, null as tag_link
		FROM
			wp_posts as p1
			LEFT JOIN wp_term_relationships as r1 ON p1.ID = r1.object_ID
			LEFT JOIN wp_term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
			LEFT JOIN wp_terms as terms1 ON t1.term_id = terms1.term_id,

			wp_posts as p2
			LEFT JOIN wp_term_relationships as r2 ON p2.ID = r2.object_ID
			LEFT JOIN wp_term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
			LEFT JOIN wp_terms as terms2 ON t2.term_id = terms2.term_id
		WHERE
			t1.taxonomy = 'category' AND p1.post_status = 'publish' AND terms1.term_id IN (".$args['categories'].") AND
			t2.taxonomy = 'post_tag' AND p2.post_status = 'publish'
			AND p1.ID = p2.ID
		ORDER by tag_name
	");
	$count = 0;
	foreach ($tags as $tag) {
		$tags[$count]->tag_link = get_tag_link($tag->tag_id);
		$count++;
	}
	return $tags;
}
*/