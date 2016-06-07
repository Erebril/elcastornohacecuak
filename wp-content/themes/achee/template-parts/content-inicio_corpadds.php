<?php
	$argsCases = array(
		'post_type' => 'corp-banner',
		'order' => 'ASC'
	);
	$corps = new WP_Query( $argsCases );

	if ( $corps->have_posts() ) : ?>
		<div class="col s12 m12">
			<div class="logosSlider">
				<div class="fshadow"></div>
				<div id="owl-slide-corp" class="row owl-carousel owl-theme owl-slide-home">
				<?php while ( $corps->have_posts() ) : $corps->the_post(); ?>
					<?php $link_url = get_post_meta( get_the_ID(), '_value_addsite_url', true); //addsite es la img del banner ?>				
					<div class="item">
						<a href="<?php echo $link_url ?>" class="corpBann" title="<?php the_title_attribute(); ?>" target="_blank">
							<?php the_post_thumbnail( 'adds-thumb', array( 'class' => 'link responsive-img' ) ); ?>
						</a>
					</div>
				<?php endwhile; ?>
				</div>
				<div class="customNavigation">
					<a class="btn prev-corp"><i class="fa fa-angle-left"></i></a>
					<a class="btn next-corp"><i class="fa fa-angle-right"></i></a>
				</div>
			</div>
		</div>
	<?php else : ?>
		<!-- Si no hay Sliders cargadas aún... -->
		<div class="col s12 m10 offset-m1">
			<div class="card-panel grey lighten-5 z-depth-1">
				<div class="card-content center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo_sm.png">
					<h5 class="green-text">Sección de Avisos Corporativos</h5>
					<h6 class="grey-text">En esta área se muestran los avisos corporativos de AChEE</h6>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>