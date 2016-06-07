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
			<main id="main" class="site-main plantilla single-linea" role="main">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php while ( have_posts() ) : the_post();

						$value_key_line_date_ini = get_post_meta( get_the_ID(), '_value_key_line_date_ini', true); // Fecha Inicio
						$value_key_line_date_end = get_post_meta( get_the_ID(), '_value_key_line_date_end', true); // Fecha Término
						$value_key_line_act_area = get_post_meta( get_the_ID(), '_value_key_line_act_area', true); // Área de acción
						//$value_key_line_act_line = get_post_meta( get_the_ID(), '_value_key_line_act_line', true); // Línea de acción
						$value_key_line_state = get_post_meta( get_the_ID(), '_value_key_line_state', true); // Estado
						
						//new fields
						$value_key_line_ei = get_post_meta( get_the_ID(), '_value_key_line_ei', true); // Fecha de inicio de preguntas
						$value_key_line_ep = get_post_meta( get_the_ID(), '_value_key_line_ep', true); // Fecha final de preguntas
						$value_key_line_er = get_post_meta( get_the_ID(), '_value_key_line_er', true); // Fecha publicación de respuesta
						$value_key_line_ecp = get_post_meta( get_the_ID(), '_value_key_line_ecp', true); // Fecha cierre postulaciones
						$value_key_line_erp = get_post_meta( get_the_ID(), '_value_key_line_erp', true); // Fecha de apertura de recepción de postulaciones


						?>

						<div class="card-panel">
							<ul class="collection with-header">
								<?php echo the_title('<li class="collection-header"><h4>Ficha técnica de <strong>', '</strong></h4></li>'); ?>
								<li class="collection-item"><h6><strong>Esta línea de apoyo no se encuentra disponible en Mercado Público.</strong></h6></li>
								<?php if( ! empty( $value_key_line_date_end )) {
									echo '<li class="collection-item"><p><strong>Cierre de recepción de oferta:</strong> ' . $value_key_line_date_end . '</p></li>';
								} ?>
							</ul>
							<table class="info-table responsive-table bordered">
								<thead class="hide-on-med-and-down">
									<tr>
										<th colspan="2">
											<h5>Ficha ténica</h5>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th class="title">Fecha Inicio:</th>
										<td><?php echo $value_key_line_date_ini ?></td>
									</tr>
									<tr>
										<th class="title">Fecha Término:</th>
										<td><?php echo $value_key_line_date_end ?></td>
									</tr>
									<tr>
										<th class="title">Área de acción:</th>
										<td><?php echo get_area_action($value_key_line_act_area) ?></td>
									</tr>
									<tr>
										<th class="title">Estado:</th>
										<td><?php echo get_status_by_fecha($value_key_line_date_end,false) ?></td>
									</tr>						

								</tbody>
								<tfoot>
									<tr>
										<td><small>* Tiempos aproximados</small></td>
									</tr>
								</tfoot>
							</table>


							<table class="info-table responsive-table bordered">
								<thead class="hide-on-med-and-down">
									<tr>
										<th colspan="2">
											<h5>Etapas</h5>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th class="title">Fecha de inicio de preguntas:</th>
										<td><?php echo $value_key_line_ei ?></td>
									</tr>
									<tr>
										<th class="title">Fecha final de preguntas:</th>
										<td><?php echo $value_key_line_ep ?></td>
									</tr>
									<tr>
										<th class="title">Fecha publicación de respuestas:</th>
										<td><?php echo $value_key_line_er ?></td>
									</tr>
									<tr>
										<th class="title">Fecha cierre postulaciones:</th>
										<td><?php echo $value_key_line_ecp ?></td>
									</tr>
									<tr>
										<th class="title">Fecha de apertura de recepción de postulaciones:</th>
										<td><?php echo $value_key_line_erp ?></td>
									</tr>								
								</tbody>
								<tfoot>
									<tr>
										<td><small>* Tiempos aproximados</small></td>
									</tr>
								</tfoot>
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

				<!-- areas de accion -->
				<div class="row" id="action-areas">
					<?php 

					    $url_ = get_post_type_archive_link( 'linea-apoyo' );
						//$page_ = get_page_by_title('noticias'); 
						//$url_ = get_page_link($page_->ID);
					?>		    			    	
				    <div class="col s12 title">
						<h4><?php echo __('Áreas de Acción', 'achee'); ?></h4>
					</div>
					<div class="areas-action-container row">
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=edificacion' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-edificacion"><span>Edificación</span></h5>		    		   
						    	</a>
						    </div>		    
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=industria-y-mineria' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-industria"><span>Industria &amp; Minería</span></h5>		    		   
						    	</a>
						    </div>	
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=transporte' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-transporte"><span>Transporte</span></h5>		    		   
						    	</a>
						    </div>		
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=educacion' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-educacion"><span>Educación</span></h5>		    		   
						    	</a>
						    </div>		
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=medicion-y-verificacion' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-medicion"><span>Medición &amp; Verificación</span></h5>		    		   
						    	</a>
						    </div>		    
						    <div class="col area-item m4 l2">
						    	<a href="<?php echo $url_ . '?area=formacion-de-capacidades' ?>" class="link-area-action">
						    		<h5 class="icon-area-action icon-capacidad"><span>Formación de Capacidades</span></h5>		    		   
						    	</a>
						    </div>		    
						</div>	
				</div>
			

			</main><!-- #main -->
		</div><!-- #primary -->
		<div id="secondary" class="widget-area col s12 m12 l3" role="complementary">
			<?php dynamic_sidebar('sidebar-lineas-apoyo'); ?>			
		</div><!-- #secondary -->
	</div>
</div>
<?php get_footer(); ?>
