<?php
	$argsCases = array(
		'post_type' => 'casos-exito',
		'order' => 'ASC'
	);
	$cases = new WP_Query( $argsCases );

	if ( $cases->have_posts() ) :
		?>
			<div class="col s12 successCases title">
				<h4><?php echo __('Casos de éxito', 'achee'); ?></h4>
			</div>
			<div class="col s12 m12">
				<div class="logosSlider">
					<div class="fshadow"></div>
					<div id="owl-slide-success" class="row owl-carousel owl-theme owl-slide-home">
					<?php while ( $cases->have_posts() ) : $cases->the_post(); ?>
						<div class="item">
							<?php
								echo the_post_thumbnail();
							?>
						</div>
					<?php endwhile; ?>
					</div>
					<div class="customNavigation">
						<a class="btn prev-success"><i class="fa fa-angle-left"></i></a>
						<a class="btn next-success"><i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			</div>
	<?php else : ?>
		<!-- Si no hay Sliders cargadas aún... -->
		<div class="col s12 m10 offset-m1">
			<div class="card-panel grey lighten-5 z-depth-1">
				<div class="card-content center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo_sm.png">
					<h5 class="green-text">Sección de Casos de Éxito AChEE</h5>
					<h6 class="grey-text">En esta área se muestran los logotipos de las compañias que han confiado en AChEE</h6>
					<h6 class="grey-text">Aún no hay casos cargados, para agregar debe ir al menú Casos de éxito en Secciones Inicio.</h6>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>