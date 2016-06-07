<?php
/**
 * Template Name: Plantilla Página de AREAS
 *
 * @package achee-theme
 */

get_header(); ?>


<?php // Menu hijos del  primer item del menu principal "Informacion Sobre" ?>
<?php echo submenu_view(); ?>


<div class="container">
	<div id="content-wrapper" class="row">
		<div class="content-overall valign-wrapper z-depth-1">
			<?php custom_breadcrumbs(); ?>
		</div>
		<div id="primary" class="content-area col s12 m12 l9">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page-area' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
			
		</div><!-- #primary -->

		<div id="secondary" class="widget-area col s12 m12 l3" role="complementary">
			<?php dynamic_sidebar('sidebar-listado-mix'); ?>			
		</div><!-- #secondary -->
	</div>
</div>
<?php get_footer(); ?>
