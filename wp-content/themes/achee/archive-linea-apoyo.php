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
	<div id="content-wrapper" class="row">
		<div class="content-overall valign-wrapper z-depth-1">
			<?php custom_breadcrumbs(); ?>
		</div>

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
						'post_type' => 'linea-apoyo',
						'posts_per_page' => 6,
						'orderby' => 'date',
						'paged' => $paged
					);


					// Filtrar por área de acción
					if(isset($_GET['area'])){						
						$args['meta_query'] = array(
							array(
								'key'     => '_value_key_line_act_area',
								'value'   => $_GET['area']								
							)
						);						
					}

					$linea = new WP_Query( $args );
					?>
					<?php if($linea->have_posts()): ?>
						<?php 
							while ( $linea->have_posts() ) : $linea->the_post();
							$variable_opendate = get_post_meta( get_the_ID(), '_value_key_line_date_ini', true);
							$variable_closedate = get_post_meta( get_the_ID(), '_value_key_line_date_end', true);
							$variable_stateof = get_post_meta( get_the_ID(), '_value_key_line_date_end', true);
							echo '<div class="card hoverable">';
								echo '<div class="card-content col s12">';
									echo '<div class="col s12">';
									echo '<a class="card-title" href="' . esc_url( apply_filters( 'the_permalink', get_permalink() ) ) . '">';
									echo the_title();
									echo '</a>';
									echo '</div>';
									if( ! empty( $variable_opendate )) {
										echo '<div class="col s12 eventInfo"><p>Concurso entre:</p>';
										echo '<div class="chip"><i class="material-icons">lock_open</i>' . $variable_opendate . '</div><div class="sep"></div>';
										echo '<div class="chip"><i class="material-icons">lock_outline</i>' . $variable_closedate . '</div></div>';
									} else {
										echo '<div class="col s12">' . content(15) . '</div>';
										echo '<div class="col s12"><p><strong>Estado:</strong> ' . get_status_by_fecha($variable_stateof,false) . '</p></div>';
									}
								echo '</div>';
								echo '<div class="card-action">';
									echo '<div class="datePublish">Publicado el: ';
									echo the_time('l j \d\e F \d\e Y');
									echo '</div>';
									echo '<a href="' . esc_url( apply_filters( 'the_permalink', get_permalink() ) ) . '" class="right waves-effect waves-light btn">' . __('Ver Línea de apoyo') . '</a>';
								echo '</div>';
							echo '</div>';
							endwhile;
						?>
					<?php else: ?>
						<h4>No hay líneas de apoyo asociadas</h4>
					<?php endif ?>

				<?php

					if (function_exists('custom_pagination')) {
						custom_pagination($cursos,$paged);
					}
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
