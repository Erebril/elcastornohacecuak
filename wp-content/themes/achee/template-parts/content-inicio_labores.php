<?php
	$argsLabor = array(
		'post_type' => 'nuestra-labor',
		'posts_per_page' => 10,
		'orderby' => 'menu_order',
		'order'   => 'ASC'
	);
	$ourLabors = new WP_Query( $argsLabor );

	if ( $ourLabors->have_posts() ) :
		?>
		<div class="col s12">
			<?php while ( $ourLabors->have_posts() ) : $ourLabors->the_post(); ?>
				<div class="block col s12 m4">
					<div class="col s12 boxIcon">
						<?php $variable_iconlabor = get_post_meta( get_the_ID(), '_value_site_icono', true); ?>
						<h5><i class="<?php echo $variable_iconlabor ?>"></i></h5>
					</div>
					<div class="col s12">
						<!-- MODIFICADO POR ACHEE 
					<a href="<?php echo esc_url( get_permalink() ); ?>" alt="" class="tileLink"> -->
							<h5 style="height: 27px;"><?php the_title(); ?></h5>
						<!-- </a> -->
					</div>
					<div class="col s12 theExcerpt">
						<?php echo content(50); ?>
					</div>
					<div class="col s12">						
						<?php 
							$page_ = get_page_by_title($post->post_name); 
							$url_ = get_page_link($page_->ID);
						?>
						<a href="<?php echo $url_ ?>" title="<?php the_title_attribute(); ?>" class="theLink">
							<i class="fa fa-angle-double-right left"></i> Ver Más
						</a>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php else : ?>
		<div class="col s12 m10 offset-m1">
			<div class="card-panel grey lighten-5 z-depth-1">
				<div class="card-content center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo_sm.png">
					<h5 class="green-text">Sección de Labores AChEE</h5>
					<h6 class="grey-text">En esta área se agrega el contenido de Nuestra Labor que se gestiona desde el menú de Nuestra Labor del back-end</h6>
				</div>
			</div>
		</div>
	<?php endif; ?>