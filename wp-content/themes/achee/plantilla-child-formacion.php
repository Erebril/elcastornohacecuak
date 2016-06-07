<?php
/**
 * Template Name: Plantilla Página Hijo Formación
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
					<?php if (is_child()): ?>
					<div class="title"><?php echo get_the_title(get_parent_ID()); ?></div>
					<div class="subtitle">
						<?php echo get_the_title( get_the_ID() ); ?>
					</div>
					<?php else: ?>
					<div class="title"><?php the_title(); ?></div>
					<div class="subtitle">
						<?php $subtitulo = get_post_meta( get_the_ID(), '_value_subtitle_string', true); ?>
						<?php echo $subtitulo; ?>
					</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>	
	<div class="background parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri().'/img/medio-ambiente.jpg' ?>" data-position-y="-80px"></div>
</div>
<div class="container">
	<div id="content-wrapper" class="row">
		<div class="content-overall valign-wrapper z-depth-1">
			<?php custom_breadcrumbs(); ?>
		</div>
		<div id="primary" class="content-area col s12 m12 l12">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page-without-title' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php //get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>

