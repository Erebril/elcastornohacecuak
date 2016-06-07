<?php
/**
 * Template Name: Plantilla Página Padre Nosotros
 *
 * @package achee-theme
 */

get_header(); ?>

<?php // Menu hijos del  primer item del menu principal "Informacion Sobre" ?>
<?php echo submenu_view(); ?>

<div class="imgBanner">
	<div class="bannerTitles valign-wrapper">
		<div class="valign banner-title w100">			
			<div class="div-overlay-effect">
				<div class="container">
					<div class="title">
						<?php the_title(); ?>
					</div>
					<div class="subtitle">
						<?php $subtitulo = get_post_meta( get_the_ID(), '_value_subtitle_string', true); ?>
						<?php echo $subtitulo; ?>
					</div>																															
				</div>
			</div>
		</div>
	</div>			
	<div class="background parallax-window" data-parallax="scroll"  data-image-src="<?php echo get_template_directory_uri().'/img/img-nosotros.jpg' ?>" data-position-y="-200px"></div>
</div>
<div class="container">
	<div id="content-wrapper" class="row parent-layout">
		<div class="content-overall valign-wrapper z-depth-1">
			<?php custom_breadcrumbs(); ?>
		</div>		
		<div id="primary" class="content-area col s12">
			<main id="main" class="site-main" role="main">

			<?php

				$op = array(
					'post_parent' => get_the_ID(),
					'post_type' => 'page',
					'orderby'   => 'menu_order',
				    'order'  => 'DESC',
				    'posts_per_page' => 5,
				);
				$my_wp_query = new WP_Query($op);


			?>
				
				<div class="about-blocks">				
					<?php if ($my_wp_query->found_posts % 4 == 0): ?>
						<?php while($my_wp_query->have_posts()) : $my_wp_query->the_post(); ?>					
						 <div class="item center item25">
						 	<div class="item-background">
							 	 <?php $icon = get_post_meta( $post->ID, '_subpage_icon', true ); ?>
							 	 <?php $subtitle_text = get_post_meta($post->ID, '_value_subtitle_string', true); ?>
							 	 <a href="<?php the_permalink(); ?>" class="logo-icon">
							 	 	<div class="icon center-align">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="<?php echo $icon ?> fa-stack-1x fa-inverse"></i>
										</span>
									</div>
								</a>
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<div class="content-p"><?php //echo limit_subtitle($subtitle_text) ?></div>
								<a href="<?php the_permalink(); ?>" class="waves-effect waves-light orange accent-4 white-text btn"><i class="tiny material-icons">label</i> Leer más</a>
						 	</div>
						</div>
						<?php endwhile; ?>
					<?php else: ?>
					<?php while($my_wp_query->have_posts()) : $my_wp_query->the_post(); ?>					
						 <div class="item center">
						 	<div class="item-background">
							 	 <?php $icon = get_post_meta( $post->ID, '_subpage_icon', true ); ?>
							 	 <?php $subtitle_text = get_post_meta($post->ID, '_value_subtitle_string', true); ?>
							 	 <a href="<?php the_permalink(); ?>" class="logo-icon">
							 	 	<div class="icon center-align">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="<?php echo $icon ?> fa-stack-1x fa-inverse"></i>
										</span>
									</div>
								</a>
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<div class="content-p"><?php //echo limit_subtitle($subtitle_text) ?></div>					 		
								<a href="<?php the_permalink(); ?>" class="waves-effect waves-light orange accent-4 white-text btn"><i class="tiny material-icons">label</i> Leer más</a>
						 	</div>
						</div>
						<?php endwhile; ?>						
					<?php endif ?>
				</div>
		
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>
<?php get_footer(); ?>
