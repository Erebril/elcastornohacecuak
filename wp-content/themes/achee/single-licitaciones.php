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
			<main id="main" class="site-main plantilla licitacion" role="main">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php while ( have_posts() ) : the_post();

						$value_key_id = get_post_meta( get_the_ID(), '_value_key_id', true); // ID de licitación
						$value_key_type = get_post_meta( get_the_ID(), '_value_key_type', true); // Tipo de licitación
						$value_key_action_area = get_post_meta( get_the_ID(), '_value_key_action_area', true); // Área de acción
						//$value_key_action_line = get_post_meta( get_the_ID(), '_value_key_action_line', true); // Línea de acción
						$value_key_open_date = get_post_meta( get_the_ID(), '_value_key_open_date', true); // Fecha de publicación
						$value_key_close_date = get_post_meta( get_the_ID(), '_value_key_close_date', true); // Fecha de cierre de recepción de la oferta
						$value_key_open_query = get_post_meta( get_the_ID(), '_value_key_open_query', true); // Fecha de inicio de preguntas
						$value_key_close_query = get_post_meta( get_the_ID(), '_value_key_close_query', true); // Fecha de término de preguntas
						$value_key_publish_query = get_post_meta( get_the_ID(), '_value_key_publish_query', true); // Fecha de publicación de respuestas
						$value_key_actopen_tech = get_post_meta( get_the_ID(), '_value_key_actopen_tech', true); // Fecha de acto de apertura técnica
						$value_key_actopen_econ = get_post_meta( get_the_ID(), '_value_key_actopen_econ', true); // Fecha de acto de apertura económica
						$value_key_adjudic_date = get_post_meta( get_the_ID(), '_value_key_adjudic_date', true); // Fecha de adjudicación
						$value_key_phisic_deliv = get_post_meta( get_the_ID(), '_value_key_phisic_deliv', true); // Fecha de entrega en soporte físico
						$value_key_agree_firm = get_post_meta( get_the_ID(), '_value_key_agree_firm', true); // Fecha de firma de contrato
						$value_key_eval_offer = get_post_meta( get_the_ID(), '_value_key_eval_offer', true); // Tiempo de evaluación de ofertas
						$value_key_lic_state = get_post_meta( get_the_ID(), '_value_key_lic_state', true); // Estado
						$value_key_total = get_post_meta( get_the_ID(), '_value_key_total', true); // Monto total estimado
						$value_key_type_other = get_post_meta( get_the_ID(), '_value_key_type_other', true); // Otro tipo de licitación


						$value_key_market = get_post_meta( get_the_ID(), '_value_key_market', true); // market checkbox
						$value_key_market_link = get_post_meta( get_the_ID(), '_value_key_market_link', true); // market checkbox


						$real_close_date = get_post_meta( get_the_ID(), 'close_date_licita', true); // licita close						


						?>

						<div class="card-panel">
							<ul class="collection with-header">
								<?php echo the_title('<li class="collection-header"><h4>Ficha técnica de <strong>', '</strong></h4></li>'); ?>							
								<?php if( ! empty( $variable_closedate )) {
									echo '<li class="collection-item"><p><strong>Cierre de recepción de oferta:</strong> ' . $variable_closedate . '</p></li>';
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
										<th class="title">ID de licitación:</th>
										<td><?php echo $value_key_id ?></td>
									</tr>
									<tr>
										<th class="title">Tipo de licitación:</th>
										<td><?php echo $value_key_type =="4"  ? $value_key_type_other : get_type_licitacion($value_key_type) ?></td>
									</tr>
									<tr>
										<th class="title">Área de acción:</th>
										<td><?php echo get_area_action($value_key_action_area) ?></td>
									</tr>
									<tr>
										<th class="title">Fecha de publicación:</th>
										<td><?php echo $value_key_open_date ?></td>
									</tr>
									<tr>
										<th class="title">Fecha de cierre de recepción de la oferta:</th>
										<td>
											<?php echo $value_key_close_date ?>											
										</td>
									</tr>
									<tr>
										<th class="title">Fecha de inicio de preguntas:</th>
										<td><?php echo $value_key_open_query ?></td>
									</tr>
									<tr>
										<th class="title">Fecha de término de preguntas:</th>
										<td><?php echo $value_key_close_query ?></td>
									</tr>
									<tr>
										<th class="title">Fecha de publicación de respuestas:</th>
										<td><?php echo $value_key_publish_query ?></td>
									</tr>
									<tr>
										<th class="title">Fecha de acto de apertura técnica:</th>
										<td><?php echo $value_key_actopen_tech ?></td>
									</tr>
									<tr>
										<th class="title">Fecha de acto de apertura económica:</th>
										<td><?php echo $value_key_actopen_econ ?></td>
									</tr>
									<tr>
										<th class="title">Fecha de adjudicación:</th>
										<td><?php echo $value_key_adjudic_date ?></td>
									</tr>
									<tr>
										<th class="title">Fecha de entrega en soporte físico:</th>
										<td><?php echo $value_key_phisic_deliv ?></td>
									</tr>
									<tr>
										<th class="title">Fecha de firma de contrato*:</th>
										<td><?php echo ($value_key_agree_firm =="") ? "No hay información" : $value_key_agree_firm ?></td>
									</tr>
									<tr>
										<th class="title">Tiempo de evaluación de ofertas*:</th>
										<td><?php echo $value_key_eval_offer ?></td>
									</tr>
									<tr>
										<th class="title">Estado:</th>
										<td><?php echo get_status_by_fecha_licita($real_close_date,false) ?></td>
									</tr>
									<tr>
										<th class="title">Monto total estimado:</th>
										<td><?php echo $value_key_total ?></td>
									</tr>
								
								</tbody>
								<tfoot>
									<tr>
										<td><small>* Tiempos aproximados</small></td>
									</tr>
								</tfoot>
							</table>


							<?php if ($value_key_market ==1): ?>								
								<h5 style="margin: 20px 0">Licitación a través de mercado público <i class="fa fa-paperclip"></i></h5>
								<a class="link-mercado" href="<?php echo esc_url($value_key_market_link); ?>" title="Link a Mercado Público">Enlace a Mercado Público <i class="fa fa-external-link"></i></a>
							<?php endif ?>


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
			<?php dynamic_sidebar('sidebar-licitaciones'); ?>			
		</div><!-- #secondary -->
	</div>
</div>
<?php get_footer(); ?>
