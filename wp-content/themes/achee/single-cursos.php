<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
			<main id="main" class="site-main plantilla cursos" role="main">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php while ( have_posts() ) : the_post();

						$value_key_curso_date_ini = get_post_meta( get_the_ID(), '_value_key_curso_date_ini', true);
						$value_key_curso_date_end = get_post_meta( get_the_ID(), '_value_key_curso_date_end', true);
						$value_key_curso_open = get_post_meta( get_the_ID(), '_value_key_curso_open', true);
						$value_key_curso_close = get_post_meta( get_the_ID(), '_value_key_curso_close', true);
						$value_key_curso_act_area = get_post_meta( get_the_ID(), '_value_key_curso_act_area', true);
						//$value_key_curso_act_line = get_post_meta( get_the_ID(), '_value_key_curso_act_line', true);
						$value_key_curso_place = get_post_meta( get_the_ID(), '_value_key_curso_place', true);
						$value_key_curso_state = get_post_meta( get_the_ID(), '_value_key_curso_state', true);
						?>

						<div class="card-panel">
							<ul class="collection with-header">
								<?php echo the_title('<li class="collection-header"><h4><strong>', '</strong></h4></li>'); ?>
								<?php if(get_field('imagen_dentro'))
									echo '<li><img style="max-height:350px; width: 100%;" src="'.get_field('imagen_dentro').'" class="responsive-img wp-post-image"></li>'; ?> 							
								<?php if( ! empty( $value_key_curso_place )) {
									echo '<li class="collection-item"><h5>El curso se realizará en <strong>' . $value_key_curso_place . '</strong></h5></li>';
								} ?>
							</ul>
							<table class="info-table responsive-table bordered">
								<thead class="hide-on-med-and-down">
									<tr>
										<th colspan="2">
											<h5>Detalles</h5>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th class="title">Fecha Inicio Inscripciones:</th>
										<td><?php echo $value_key_curso_date_ini ?></td>
									</tr>
									<tr>
										<th class="title">Fecha Término Inscripciones:</th>
										<td><?php echo $value_key_curso_date_end ?></td>
									</tr>
									<tr>
										<th class="title">Fecha Inicio Curso:</th>
										<td><?php echo $value_key_curso_open ?></td>
									</tr>
									<tr>
										<th class="title">Fecha Término Curso:</th>
										<td><?php echo $value_key_curso_close ?></td>
									</tr>
									<tr>
										<th class="title">Área de acción:</th>
										<td><?php echo get_area_action($value_key_curso_act_area); ?></td>
									</tr>								
<!-- 									<tr>
										<th class="title">Estado:</th>
										<td><?php //echo get_status_by_fecha($value_key_curso_date_end) ?></td>
									</tr>	 -->							
								</tbody>
							</table>
						</div>
						<hr>
						<div class="card-panel">
							<p><?php the_content(); ?></p>
							<?php $posttags = get_the_tags();
								if ($posttags) {
								  foreach($posttags as $tag) {
								    echo '<a href="' . get_tag_link($tag->term_id) . '" class="chip">' . $tag->name . '</a>';
								  }
								}
							?>
						</div>
					<?php endwhile; // end of the loop. ?>

					<div class="share-networks">
						<h5>Compartir</h5>
						<?php echo do_shortcode( '[feather_share]' ); ?>			
					</div>
				</article>

				



			</main><!-- #main -->
		</div><!-- #primary -->
		<div id="secondary" class="widget-area col s12 m12 l3" role="complementary">
			<?php dynamic_sidebar('sidebar-cursos'); ?>			
		</div><!-- #secondary -->

	</div>
</div>
<?php get_footer(); ?>
