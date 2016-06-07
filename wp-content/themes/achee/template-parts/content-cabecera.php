<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AChEE
 */


	$argsbanner = array(
		'post_type' => 'cabecera',
		'posts_per_page' => 1,
		'orderby' => 'rand'
	);
	$thebanner = new WP_Query( $argsbanner );

	if ( $thebanner->have_posts() ) : ?>
		<?php while ( $thebanner->have_posts() ) : $thebanner->the_post(); ?>
			<div class="background" style="display:block;height:280px;background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>');background-size:cover;width:100%;"></div>
		<?php endwhile; ?>
	<?php else : ?>
		<div class="background" style="display:block;height:280px;background-image:url('<?php echo get_template_directory_uri(); ?>/img/default-banner.jpg');background-size:cover;width:100%;"></div>
	<?php endif; ?>

	<?php wp_reset_postdata(); ?>
