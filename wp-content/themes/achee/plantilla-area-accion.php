<?php
/**
 * Template Name: Plantilla página de areas acción
 *
 * @package achee-theme
 */

get_header(); ?>

<div class="container">


	<div id="content-wrapper" class="row">

		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
		<?php $area = (isset($_GET['area']) && $_GET['area']!="") ? $_GET['area'] : null; ?>
		

		<div class="content-overall valign-wrapper z-depth-1">
			<?php custom_breadcrumbs(); ?>
		</div>

		<div id="primary" class="content-area col s12 m12 l9">
			<main id="main" class="site-main" role="main">

			

				<div class="row">
					<header class="entry-header">
						<h5 class="entry-title"><?php echo __('Área asociadas', 'achee') ?>  <?php echo is_null($area) ? 'Todas' : $area; ?></h5>
					</header>
				</div>


					<!-- areas de accion -->
				<div class="row" id="action-areas">
					<?php 
					    
						//$url = get_page_by_title('areas-de-accion'); 

						$url_ = null;
					?>		    			    	
				    <div class="col s12 title">
						<h4><?php echo __('Áreas de Acción', 'achee'); ?></h4>
					</div>
					<div class="areas-action-container row">
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=edificacion' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-edificacion<?php echo $area == 'edificacion' ? ' active' : ''  ?>"><span>Edificación</span></h5>		    		   
						    	</a>
						    </div>		    
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=industria-y-mineria' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-industria <?php echo $area == 'industria-y-mineria' ? ' active' : ''  ?>"><span>Industria &amp; Minería</span></h5>		    		   
						    	</a>
						    </div>	
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=transporte' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-transporte<?php echo $area == 'transporte' ? ' active' : ''  ?>"><span>Transporte</span></h5>		    		   
						    	</a>
						    </div>		
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=educacion' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-educacion<?php echo $area == 'educacion' ? ' active' : ''  ?>"><span>Educación</span></h5>		    		   
						    	</a>
						    </div>		
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=medicion-y-verificacion' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-medicion<?php echo $area == 'medicion-y-verificacion' ? ' active' : ''  ?>"><span>Medición &amp; Verificación</span></h5>		    		   
						    	</a>
						    </div>		    
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=formacion-de-capacidades' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-capacidad <?php echo $area == 'formacion-de-capacidades' ? ' active' : ''  ?>"><span>Formación de Capacidades</span></h5>		    		   
						    	</a>
						    </div>		    
						</div>	
				</div>


				<?php

					// Custom query
					$posts_per_page = get_option('posts_per_page');
					$newsArray = array(
						'post_type' => array('post','licitaciones','cursos','linea-apoyo'),
						//'post_type' => array('post'),
						'posts_per_page' => $posts_per_page,
						'orderby' => 'date',
						'paged' => $paged
					);

									
					if(!is_null($area)){								
						$newsArray['meta_query'] = array(
									// licitacion
									'relation' => 'OR',
									array(
										'key'     => '_value_key_action_area',
										'value'   => $area,										
									),
									// // curso
									array(
									 	'key'    => '_value_key_curso_act_area',
									 	'value'  => $area
									),
									// // linea apoyo
									array(
										'key'    => '_value_key_line_act_area',
										'value'  => $area
									)
								);
						
					}
					


					$mainNews = new WP_Query( $newsArray );
					if ( $mainNews->have_posts() ) :
						while ( $mainNews->have_posts() ) : $mainNews->the_post(); ?>
							<?php 

								// nombre tipo de POST!
								$post_type = get_post_type();
								$post_type_name = '';
								if($post_type == 'cursos'){
									$post_type_name = 'Curso';
								}
								elseif ($post_type == 'licitaciones') {
								 	$post_type_name = 'Licitación';	
								 } 
								 elseif ($post_type == 'linea-apoyo') {
								 	$post_type_name = 'Linea de Apoyo';
								 }
							?>
							<div class="col s12">
								<div class="row">
									<div class="col s12">
										<div class="left newstitle">
											<div class="ontitle day"><?php echo get_the_date('d') ?></div>
											<div class="ontitle date"><?php echo get_the_date('F') .' '.get_the_date('Y') ?></div>
											<div class="ontitle text">
												<a href="<?php the_permalink(); ?>"><em><?php echo $post_type_name ?></em>: <?php the_title(); ?></a>
											</div>
										</div>
									</div>
								</div>
								<div class="row newsexcerpt">									
									<div class="col s12 m9">
											<a href="<?php the_permalink(); ?>"><?php echo the_excerpt(); ?></a>
											<a href="<?php the_permalink(); ?>" class="waves-effect waves-light orange accent-4 white-text btn"><i class="tiny material-icons">label</i> Leer más</a>
									</div>
									<div class="col s12">
										<div class="border"></div>
									</div>
								</div>
							</div>							

						<?php endwhile; // End of the loop. ?>


						<?php
							if (function_exists('custom_pagination')) {
								custom_pagination($mainNews);
							}
						?>


					<?php else : ?>
						<div class="valign-wrapper noContent">
							<div class="valign">
								<div class="card-panel grey lighten-5 z-depth-1">
									<div class="row">
										<div class="col s1 m3">
											<img src="<?php echo get_template_directory_uri(); ?>/img/iso.png" alt="" class="circle responsive-img right">
										</div>
										<div class="col s11 m8">
											<h5 class="title">Aún no existen Licitaciones, Cursos o Líneas de Apoyo asociadas.</h5>	
											<h6>Para noticias por favor visite sección "noticias"</h6>										
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
