<?php
	$argsSlide = array(
		'post_type' => 'slider',
		'posts_per_page' => 10,
		'orderby' => 'menu_order',
		'order'  => 'ASC'
	);
	$slides = new WP_Query( $argsSlide );

	if ( $slides->have_posts() ) :
		?>
			<div class="slider">
				<ul class="slides">
					<?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
						<li>
							<?php
								echo the_post_thumbnail();
							?>
							<div class="caption center-align">
								<?php
									// $posttags = get_the_tags();
									// $count=0;
									// if ($posttags) {
									//   foreach($posttags as $tag) {
									//     $count++;
									//     if (1 == $count) {
									//     	echo '<div class="theTag">' . $tag->name . '</div>';
									//     }
									//   }
									//} 

								?>
								<div class="theTag"><?php the_title(); ?></div>
								<?php if(get_field('redir_url')){ ?>
									<a class="mainTitle" href="<?php echo get_field('redir_url'); ?>" title="<?php the_title_attribute(); ?>" rel='bookmark'><?php echo the_content(' '); ?></a>
							 <?php } else{ ?>
								<a class="mainTitle" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php echo the_content(' '); ?></a>
							<?php } ?>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
	<?php else : ?>
		<!-- Si no hay Sliders cargadas aún... -->
		<div class="slider empty">
			<ul class="slides">
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/slide-default.jpg">
					<div class="caption center-align">
						<img src="<?php header_image(); ?>" class="logo-achee" alt="<?php bloginfo( 'name' ); ?>">
						<h4 class="text-uppercase">
							Agencia Chilena de Eficiencia Energética
						</h4>
						<h5 class="light grey-text text-lighten-3">Este espacio es para ingresar imágenes relacionadas</h5>
					</div>
				</li>
			</ul>
		</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>