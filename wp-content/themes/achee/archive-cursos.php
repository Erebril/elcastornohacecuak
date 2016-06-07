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
					$argsCurso = array(
						'post_type' => 'cursos',
						'posts_per_page' => 6,
						'orderby' => 'date',
						'paged' => $paged
					);
					$cursos = new WP_Query( $argsCurso );
					//$cursos->query('showposts=6&post_type=cursos'.'&paged='.$paged);
					?>
					<?php
							while ( $cursos->have_posts() ) : $cursos->the_post();
								$variable_opendate = get_post_meta( get_the_ID(), '_value_key_curso_date_ini', true);
								$variable_closedate = get_post_meta( get_the_ID(), '_value_key_curso_date_end', true);
								$variable_placeon = get_post_meta( get_the_ID(), '_value_key_curso_place', true);
								echo '<div class="card hoverable">';
									// begin de la imagen
									if(get_field('imagen_del_curso')){
										echo '<img style="max-height: 100px; width: 100%; max-width: 703px;" src="'.get_field('imagen_del_curso').'" class="img-responsive">';
									} else{
										echo '<img style="max-height: 100px; width: 100%; max-width: 703px;" src="/wp-content/uploads/2016/04/default_cursos.jpg" class="img-responsive">';
									}
									// end de la imagen
									echo '<div class="card-content col s12">';
										echo '<div class="col s12">';
										echo '<a class="card-title" href="' . esc_url( apply_filters( 'the_permalink', get_permalink() ) ) . '">';
										echo the_title();
										echo '</a>';
										echo '</div>';
										if( ! empty( $variable_opendate )) {
											echo '<div class="col s12 eventInfo"><p>Postulaciones abiertas entre:</p></div>';
											echo '<div class="col s12 eventInfo">';
											echo '<div class="col m6 s12" style="margin-bottom: 10px;"><div class="chip"><i class="material-icons">lock_open</i>' . $variable_opendate . '</div></div><!-- <div class="sep"></div>-->';
											echo '<div class="col m6 s12"><div class="chip"><i class="material-icons">lock_outline</i>' . $variable_closedate . '</div></div></div>';
										}
										if( ! empty( $variable_placeon )) {
											echo '<div class="col s12"><p class="left">El curso se realizará en ' . $variable_placeon . '</p></div>';
										}
									echo '</div>';
									echo '<div class="card-action">';
										echo '<div class="datePublish">Publicado el: ';
										echo the_time('l j \d\e F \d\e Y');
										echo '</div>';
										echo '<a href="' . esc_url( apply_filters( 'the_permalink', get_permalink() ) ) . '" class="right waves-effect waves-light btn">' . __('Ver Curso') . '</a>';
									echo '</div>';
								echo '</div>';
							endwhile;
							?>

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
