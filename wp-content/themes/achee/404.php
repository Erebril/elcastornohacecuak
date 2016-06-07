<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AChEE
 */

get_header(); ?>

<div class="container">
	<div id="content-wrapper" class="row">
		<div class="content-overall valign-wrapper z-depth-1">
			<?php custom_breadcrumbs(); ?>
		</div>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<section class="error not-found col s12 m12">
					<div class="page-content">
						<header class="page-header">
							<h1 class="page-title"><?php echo __( '<strong>404</strong> SITIO NO ENCONTRADO', 'achee' ); ?></h1>
						</header><!-- .page-header -->

						<p class="green-title"><?php echo __( 'Estamos realmente tristes lo sientimos, pero la página solicitada no fue encontrada.', 'achee' ); ?></p>
						<p>Parece que la página que estaba tratando de llegar no existe más o tal vez acaba de ser trasladada. Si usted está buscando algo intente utilizar el formulario de búsqueda de la parte superior o simplemente haga clic en la imagen para ir a la página de inicio.</p>
						<p>Puedes encontrar temas relacionados en:</p>

						
						<?php
							$argsLabor = array(
							'post_type' => 'nuestra-labor',
							'posts_per_page' => 99,
							'orderby' => 'menu_order',
							'order'   => 'ASC'
						);
						$ourLabors = new WP_Query( $argsLabor );

						?>							


						<div class="row col-topics"> 
						<?php if ( $ourLabors->have_posts() ) : ?>
							<?php while ( $ourLabors->have_posts() ) : $ourLabors->the_post(); ?>					
								<div class="col s12 m4">
									<?php 
										$page_ = get_page_by_title($post->post_name); 
										$url_ = get_page_link($page_->ID);
									?>
									<div class="icon center-align">
										<span class="fa-stack fa-lg">
											<?php $variable_iconlabor = get_post_meta( get_the_ID(), '_value_site_icono', true); ?>
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="<?php echo $variable_iconlabor; ?> fa-stack-1x fa-inverse"></i>
										</span>
									</div>
									<h6 class="title center-align"><?php the_title() ?></h6>
									<p><?php echo content(50) ?></p>
									<a href="<?php echo $url_; ?>" class="more"><i class="fa fa-angle-double-right"></i> Ver más</a>
								</div>												
							<?php endwhile ?>
						<?php endif; ?>
						</div>
						


					</div><!-- .page-content -->
				</section><!-- .error-404 -->

				<?php //get_sidebar(); ?>

			</main><!-- #main -->
		</div><!-- #primary -->		

	</div>
</div>

<?php get_footer(); ?>
