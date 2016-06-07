<?php
	$argsPartners = array(
		'post_type' => 'partner-banner',
		'posts_per_page' => 4,
		'order' => 'ASC'
	);
	$partners = new WP_Query( $argsPartners );

	if ( $partners->have_posts() ) : ?>
			<div class="col s12 ourSites title">
				<h4><?php echo __('Enlaces de interés', 'achee'); ?></h4>
			</div>

			<div class="col s12">
				<?php while ( $partners->have_posts() ) : $partners->the_post(); ?>
					<?php $link_url = get_post_meta( get_the_ID(), '_value_canjeaddsite_url', true); ?>
					<div class="col s12 m6 l3"><!-- el style se agrego para mostrar 4 -->
						<a href="<?php echo $link_url ?>" class="link white-text" title="<?php the_title_attribute(); ?>" target="_blank">
							<?php the_post_thumbnail( 'canjeadds-thumb', array( 'class' => 'responsive-img link ' ) ); ?>
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
					<h5 class="green-text">Sección de Avisos de Partners</h5>
					<h6 class="grey-text">En esta área se muestran los avisos de partners de AChEE</h6>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>