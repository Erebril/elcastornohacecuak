<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AChEE
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
	<?php get_template_part( 'template-parts/content', 'cabecera'); ?>
</div>
<div class="container">
	<div id="content-wrapper" class="row">
		<div class="content-overall valign-wrapper z-depth-1">
			<?php custom_breadcrumbs(); ?>
			<?php //wp_nav_menu(
				// array(
				// 	'theme_location' => 'innermenu',
				// 	'container_class' => 'valign menu-inner-pages',
				// 	'menu_class' => 'right',
				// 	'link_before' => '',
				// 	'items_wrap' => '<ul class="right hide-on-med-and-down"><li><a class="btn waves-effect waves-light dropdown-button" href="#!" data-activates="%1$s">Menú <i class="fa fa-angle-down fa-lg right"></i></a></li></ul><ul id="%1$s" class="%2$s dropdown-content"><li>%3$s</li></ul>',
				// )
			//); ?>
		</div>
		<div id="primary" class="content-area col s12 m12 l9">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
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
