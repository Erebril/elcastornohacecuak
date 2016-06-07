<?php
/**
 * The template for displaying tags.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AChEE
 */

get_header(); ?>

<div class="imgBanner">
	<div class="bannerTitles valign-wrapper">
		<div class="valign banner-title">
			<div class="div-overlay-effect">
				<div class="container">
					<div class="title"><?php $cptitle = get_post_type_object( 'post' ); echo $cptitle->labels->name; ?></div>
					<div class="subtitle">
						<?php single_cat_title( '', true ); ?>
					</div>
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
				//array(
				//	'theme_location' => 'innermenu',
				//	'container_class' => 'valign menu-inner-pages',
				//	'menu_class' => 'right',
				//	'link_before' => '',
				//	'items_wrap' => '<ul class="right hide-on-med-and-down"><li><a class="btn waves-effect waves-light dropdown-button" href="#!" data-activates="%1$s">Menú <i class="fa fa-angle-down fa-lg right"></i></a></li></ul><ul id="%1$s" class="%2$s dropdown-content"><li>%3$s</li></ul>',
				//)
			//); ?>
		</div>

		<div id="primary" class="content-area col s12 m12 l9">
			<main id="main" class="site-main tag-archive" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<div class="title catArchive"><?php the_archive_title( '<h4 class="page-title">', '</h4>' ); ?></div>
					<div class="catDescription"><?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?></div>
				</header><!-- .page-header -->

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						?>
							<div class="col s12">
								<div class="row">
									<div class="col s12">
										<div class="left newstitle">
											<div class="ontitle day"><?php echo get_the_date('d') ?></div>
											<div class="ontitle date"><?php echo get_the_date('F') .' '.get_the_date('Y') ?></div>
											<div class="ontitle text">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</div>
										</div>
									</div>
								</div>
								<div class="row newsexcerpt">
									<div class="col s12 m3 newsimage">
										<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail( 'newslist-thumb', array( 'class' => 'thumb responsive-img' ) );
										} else {
											echo '<img width="920" height="350" class="responsive-img" src="' . get_template_directory_uri() . '/img/default-leftbox.png">';
										} ?>
									</div>
									<div class="col s12 m9">
											<a href="<?php the_permalink(); ?>"><?php echo the_excerpt(); ?></a>
											<a href="<?php the_permalink(); ?>" class="waves-effect waves-light orange accent-4 white-text btn"><i class="tiny material-icons">label</i> Leer más</a>
									</div>
									<div class="col s12">
										<div class="border"></div>
									</div>
								</div>
							</div>
						<?php

					endwhile;

					if (function_exists('custom_pagination')) {
						custom_pagination($wp_query);
					}
				?>

				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
