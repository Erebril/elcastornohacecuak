<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package achee-theme
 */

get_header(); ?>

<div class="container">
	<div id="content-wrapper" class="row news-filters">


		<div class="news-filter-content z-depth-1">
			<div class="row news-filter-title">
				<div class="col m4">
					<p>Filtrar Licitaciones</p>
				</div>
			</div>
			<div class="row news-dropdowns">				
					<?php //custom_breadcrumbs(); ?>
					<div class="col s12 m4">
						<?php $area = isset($_GET['area']) ? $_GET['area'] : null; ?>
						<?php dropdown_licita_areas($area); ?>
						<input type="hidden" id="current_url" name="current_url" value="<?php echo get_current_url(); ?>">						
					</div>					
			</div>
		</div>


	<!-- 	<div class="content-overall valign-wrapper z-depth-1">
			<?php //custom_breadcrumbs(); ?>
		</div> -->

		<div id="primary" class="content-area col s12 m12 l9">
			<main id="main" class="site-main" role="main">
				<header class="page-header">
					<div class="title catArchive">
						<h4 class="page-title"><?php echo post_type_archive_title(); ?></h4>						
					</div>					
				</header>

				<?php

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
						'post_type' => 'licitaciones',
						'post_status' => array('publish'),
						'posts_per_page' => 6,
						// orden por fecha de cierre de licitacion
						'orderby' => 'meta_value',		
						'meta_key' => 'close_date_licita',						
						'order' => 'DESC',
						'paged' => $paged
					);

					// Filtrar por área de acción
					if(!is_null($area)){						
						$args['meta_query'] = array(
							array(
								'key'     => '_value_key_action_area',
								'value'   => $_GET['area']								
							)							
						);						
					}


					$licita = new WP_Query( $args );
				?>
				

					<?php if($licita->have_posts()): ?>
						<?php 
							while ( $licita->have_posts() ) : $licita->the_post();
							$variable_opendate = get_post_meta( get_the_ID(), '_value_key_open_date', true);
							$variable_closedate = get_post_meta( get_the_ID(), '_value_key_close_date', true);
							$variable_detailed = get_post_meta( get_the_ID(), '_value_key_details', true);
							$market = (get_post_meta( get_the_ID(), '_value_key_market', true) == 1) ? 1 : 0;
							

							$real_date_close = get_post_meta( get_the_ID(), 'close_date_licita', true);
							

							echo '<div class="card hoverable">';
								echo '<div class="card-content col s12">';
									echo '<div class="col s12">';
									echo '<a class="card-title" href="' . esc_url( apply_filters( 'the_permalink', get_permalink() ) ) . '">';
									echo the_title();
									echo '</a>';
									echo '</div>';
									if( ! empty( $variable_closedate )) {
										echo '<div class="col s12 eventInfo"><p>Postulaciones abiertas entre:</p>';
										echo '<div class="chip"><i class="material-icons">lock_open</i>' . $variable_opendate . '</div><div class="sep"></div>';
										echo '<div class="chip"><i class="material-icons">lock_outline</i>' . $variable_closedate . '</div></div>';
									} else {
										echo '<div class="col s12">' . content(15) . '</div>';
									}
									
									// Está o no en mercado público									
									if($market==0){
										echo '<div class="col s12"><h6><strong>Esta licitación no se encuentra disponible en Mercado Público.</strong></h6></div>';
									}
									
									/*if( ! empty( $variable_closedate )) {
										echo '<div class="col s12"><p><strong>Cierre de recepción de oferta:</strong> ' . $variable_closedate . '</p></div>';
									}*/
								echo '</div>';
								echo '<div class="card-action">';
									echo '<div class="datePublish">Publicado el: ';
									echo the_time('l j \d\e F \d\e Y');
									echo '</div>';
									echo '<a href="' . esc_url( apply_filters( 'the_permalink', get_permalink() ) ) . '" class="right waves-effect waves-light btn">' . __('Ver Licitación') . '</a>';
								echo '</div>';
							echo '</div>';
						endwhile;					
						?>
					<?php else: ?>
						<h4>No hay licitaciones asociadas</h4>
					<?php endif ?>

				<?php
					if (function_exists('custom_pagination')) {
						custom_pagination($licita);
					}
				?>



			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
