<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package AChEE
 */

get_header(); ?>

<div class="container">
	<div id="content-wrapper" class="row">
		<div class="content-overall valign-wrapper z-depth-1">
			<?php custom_breadcrumbs(); ?>
		</div>

		<section id="primary" class="content-area col s12 m9">
			<main id="main" class="site-main" role="main">
			<!-- Comentado para pag estática -->
				<?php if ( have_posts() ) : ?>
					<header class="page-header">
						<div class="title catArchive"><h4 class="page-title"><?php //printf( esc_html__( 'Search Results for: %s', 'achee' ), '<span>' . get_search_query() . '</span>' ); ?></h4></div>
					</header>
						<?php /* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'search' );
						endwhile; ?>
						<?php  ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>

				<?php
					if (function_exists('custom_pagination')) {
						custom_pagination($wp_query);
					}
				?>

			</main><!-- #main -->
		</section><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
