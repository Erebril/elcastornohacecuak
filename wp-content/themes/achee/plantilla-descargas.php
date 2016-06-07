<?php
/**
 * Template Name: Plantilla página de Biblioteca
 *
 * @package achee-theme
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
					<section class="custom-form">
						<h5 class="title"><?php the_title(); ?></h5>
						<?php the_content(); ?>
					</section>
				<?php endwhile; // End of the loop. ?>

				<?php
					
					// Obtengo categorias principal de de downloads
					$download_categories = get_terms('dlm_download_category',array('hide_empty'=>false,'parent'=>0));		


					// Obtengo primer resultado => Biblioteca
					/*if (!is_object($download_categories) && isset($download_categories[0])) {										
						$download_cat   = $download_categories[0];
						$down_cat_title = $download_categories[0]->name;
						// Hijos de categoria hijos de la categoria (subcategorias)
						$download_cat_childs = get_terms('dlm_download_category',array('hide_empty'=>false,'parent'=>$download_cat->term_id));					
					}	*/	
					
				?>

				<?php if (!is_object($download_categories)): ?>
				<?php foreach ($download_categories as $key => $cat_down): ?>
						<?php 						
							$download_cat   = $cat_down;
							//$down_cat_title = $cat_down->name;
							// Hijos de categoria hijos de la categoria (subcategorias)
							$download_cat_childs = get_terms('dlm_download_category',array('hide_empty'=>false,'parent'=>$download_cat->term_id));					
						?>

					
						<?php if ( isset($download_cat_childs) && isset($download_cat_childs[0]) ): ?>
										<div class="entry-header" style="margin-bottom:5px;">
											<h5 class="entry-title title-cat-download"><?= $download_cat->name ?></h5>
										</div>

											<?php //Listo sub categorias en caso de existir ?>
											<?php if (is_array($download_cat_childs) && !empty($download_cat_childs)): ?>	
												<div class="clearfix" style="margin-top: 10px; margin-bottom: 30px">
												  <ul class="collapsible" data-collapsible="accordion">							  
												  	<?php foreach ($download_cat_childs as $i => $child): ?>
													    <li class="download-cat-item">								    
													      <div class="collapsible-header"><i class="fa fa-chevron-right down-icon"></i><?= $child->name; ?></div>
													      <div class="collapsible-body">
													      		<?php
																$downloads_query = array(
																	'post_type'      => 'dlm_download',						
																	'posts_per_page' => -1, //all
																	'orderby'        => 'date',
																//	'parent'          => $download_cat[0]->term_id						
																);				
																$downloads_query['dlm_download_category'] = $child->slug;
																$list_of_downloads = new WP_Query( $downloads_query );
																?>											
																<?php if ( $list_of_downloads->have_posts() ) : ?>						
																	<ul class="collection">
																	<?php while ( $list_of_downloads->have_posts() ) : $list_of_downloads->the_post(); ?>																											
																			<li class="collection-item">
																				<div class="row">
																					<div class="col s12 m3 center-align">
																						<?php if (has_post_thumbnail()): ?>
																							<?php the_post_thumbnail( 'download-thumb', array( 'class' => 'thumb' ) ); ?>															
																						<?php else: ?>
																							<img width="200" class="thumb" src="<?php echo get_template_directory_uri() . '/img/default-leftbox.png'; ?>">																																			
																						<?php endif ?>
																					</div>
																					<div class="col s12 m9">
																		      			<div class="collection-title"><?php the_title() ?></div>													      
																		      			<?php the_content(); ?>
																						<div class="collection-links">
																			  				<?php echo do_shortcode('[download id="'.get_the_ID().'" template="custom"]'); ?>													      	
																		      			</div>																																																			      			
																		      		</div>													      				
																				</div>														  													      
																		    </li>
																	<?php endwhile; // End of the loop. ?>
																	</ul>
																<?php else: ?>
																	<ul class="collection">
																		<li class="collection-item">
																				<div class="row">
																					<div class="col s12 m3 center-align">																						
																					</div>
																					<div class="col s12 m9">
																		      			<div class="collection-title"><?php echo __('No hay contenido aún','achee') ?></div>													      
																		      																																																      	
																		      		</div>													      				
																				</div>														  													      
																		    </li>
																		</ul>
															    <?php endif ?>
													      </div>
													    </li>							  		
												  	<?php endforeach ?>							            
												  </ul>
												</div>																			
										<?php else: ?>
												<?php 
													$downloads_query = array(
																		'post_type'      => 'dlm_download',						
																		'posts_per_page' => -1, //all
																		'orderby'        => 'date',
																	//	'parent'          => $download_cat[0]->term_id						
																);				
													$downloads_query['dlm_download_category'] = $cat_slug;
													$list_of_downloads = new WP_Query( $downloads_query );
													?>											
													<?php if ( $list_of_downloads->have_posts() ) : ?>						
														<ul class="collection download-cat-item">
														<?php while ( $list_of_downloads->have_posts() ) : $list_of_downloads->the_post(); ?>																											
																<li class="collection-item">
																	<div class="row">
																		<div class="col s12 m3 center-align">		      													  														
																			<?php the_post_thumbnail( 'download-thum', array( 'class' => 'thumb' ) ); ?>																
																		</div>
																		<div class="col s12 m9">
															      			<div class="collection-title"><?php the_title() ?></div>													      
															      			<?php the_content(); ?>
																			<div class="collection-links">
																  				<?php echo do_shortcode('[download id="'.get_the_ID().'" template="custom"]'); ?>													      	
															      			</div>																																																			      			
															      		</div>													      				
																	</div>														  													      
															    </li>
														<?php endwhile; // End of the loop. ?>
														</ul>
													<?php else: ?>
														<h5><?php echo __('No hay contenido aún','achee') ?></h5>
												    <?php endif ?>

											<?php endif ?>
									<?php else: ?>
										<div class="entry-header" style="margin-bottom:5px;">
											<h5 class="entry-title">No hay descargas aún</h5>
										</div>
									<?php endif ?>


				<?php endforeach ?>
				<?php endif; ?>

				

			</main><!-- #main -->			
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>