<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AChEE
 */

get_header(); ?>

<div class="container">
	<div id="content-wrapper" class="row">
		<div class="content-overall valign-wrapper z-depth-1">
			<?php custom_breadcrumbs(); ?>
		</div>

		<div id="primary" class="content-area col s12 m12 l9">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php //the_post_navigation(); ?>

				<?php
					// Comentarios cerrados por SQL con este cód. http://ayudawp.com/desactivar-todos-los-comentarios/
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
