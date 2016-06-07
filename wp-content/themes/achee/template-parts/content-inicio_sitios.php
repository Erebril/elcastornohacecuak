<?php
	$argsSites = array(
		'post_type' => 'nuestros-sitios',
		'posts_per_page' => 6,
		'order' => 'ASC'
	);
	$sites = new WP_Query( $argsSites );

	if ( $sites->have_posts() ) :
		?>
			<div class="col s12 ourSites title">
				<h4><?php echo __('Nuestros Sitios', 'achee'); ?></h4>
			</div>
			<div class="col s12">
				<?php while ( $sites->have_posts() ) : $sites->the_post(); ?>
					<?php $link_url = get_post_meta( get_the_ID(), '_value_site_url', true); ?>
					<div class="wrapSite" style="width: 33.33%; padding: 10px;"> <!-- el style se agrego para hacer dos filas de 3 -->
						<a href="<?php echo $link_url ?>" class="link white-text" title="<?php the_title_attribute(); ?>" target="_blank">
							<?php the_post_thumbnail( 'oursites-thumb', array( 'class' => 'responsive-img card-panel hoverable' ) ); ?>
							<div class="own-site-description"><h6><?php the_title() ?></h6><?php echo limit_content(60); ?>...</div>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
	<?php else : ?>
		<!-- Si no hay Sliders cargadas aún... -->
		<div class="col s12 m10 offset-m1">
			<div class="card-panel grey lighten-5 z-depth-1">
				<div class="card-content center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo_sm.png">
					<h5 class="green-text">Sección de sitios AChEE</h5>
					<h6 class="grey-text">En esta área se muestran los sitios asociados a AChEE</h6>
					<h6 class="grey-text">Aún no hay sitios cargados, para agregar debe ir al menú Casos de éxito en Secciones Inicio.</h6>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>