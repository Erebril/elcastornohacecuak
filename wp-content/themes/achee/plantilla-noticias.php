<?php
/**
 * Template Name: Plantilla página de Noticias
 *
 * @package achee-theme
 */

get_header(); ?>

<div class="container">

	<?php

		$lineamiento = isset($_GET['lineamiento']) ? $_GET['lineamiento'] : null;
		$cat = isset($_GET['cat']) ? $_GET['cat'] : null;
		$tag = isset($_GET['tag']) ? $_GET['tag'] : null;

	?>

	<div id="content-wrapper" class="row news-filters">

		<div class="news-filter-content z-depth-1">
			<div class="row news-filter-title">
				<div class="col m4">
					<p>Filtrar noticias</p>
				</div>
			</div>
			<div class="row news-dropdowns">
				<div class="">
					<?php //custom_breadcrumbs(); ?>
					<div class="col s12 m4">
						<?php dropdown_lineamiento($lineamiento); ?>
					</div>
					<div class="col s12 m4">
						<?php dropdown_categories_list($cat); ?>
					</div>
					<div class="col s12 m4">
						<?php dropdown_tags($tag); ?>
					</div>
				</div>
			</div>
		</div>
		<div id="primary" class="content-area col s12 m12 l9">
			<main id="main" class="site-main" role="main">
				<div class="col s12">
					<header class="entry-header noticias">
						<h5 class="entry-title"><?php echo __('Noticias', 'achee') ?></h5>
					</header>
				</div>

				<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

				<input type="hidden" id="current_url" name="current_url" value="<?php echo get_permalink(get_the_ID()); ?>">
				<input type="hidden" id="page_number" name="page_number" value="<?php echo $paged; ?>">
				<input type="hidden" id="tag_id" name="tag_id" value="<?php echo $tag; ?>">

				<?php


					// Custom query
					$posts_per_page = get_option('posts_per_page');
					$newsArray = array(
						'post_type' => 'post',
						'posts_per_page' => $posts_per_page,
						'orderby' => 'date',
						'paged' => $paged
					);


					// add filter lineamiento
					if(!is_null($lineamiento)){
						$newsArray['lineamientos'] = $lineamiento;
					}

					// add filter category
					if(!is_null($cat)){
						$newsArray['category_name'] = $cat;
					}

					//add filter tag
					if(!is_null($tag)){
						$newsArray['tag_id'] = $tag;
					}

					$mainNews = new WP_Query( $newsArray );
					if ( $mainNews->have_posts() ) :
						while ( $mainNews->have_posts() ) : $mainNews->the_post(); ?>
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
						<?php endwhile; // End of the loop. ?>


						<?php
							if (function_exists('custom_pagination')) {
								custom_pagination($mainNews);
							}
						?>


					<?php else : ?>
						<div class="valign-wrapper noContent">
							<div class="valign">
								<div class="card-panel grey lighten-5 z-depth-1">
									<div class="row">
										<div class="col s1 m3">
											<img src="<?php echo get_template_directory_uri(); ?>/img/iso.png" alt="" class="circle responsive-img right">
										</div>
										<div class="col s11 m8">
											<h5 class="title">Aún no existen artículos publicados en este sitio.</h5>
											<h6 class="grey-text">Para agregar una nueva publicación debe ir al menú agregar entrada en el back-end.</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
