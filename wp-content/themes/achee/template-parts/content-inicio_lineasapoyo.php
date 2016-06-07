<?php
	$argsLineas = array(
		'post_type' => 'linea-apoyo',
		'posts_per_page' => 6,
		'orderby' => 'date'
	);
	$ourLine = new WP_Query( $argsLineas );

	if ( $ourLine->have_posts() ) : $post_count = 0; ?>
		<?php while ( $ourLine->have_posts() ) : $post_count++; $ourLine->the_post();

			$fecha_cierre = get_post_meta( get_the_ID(), '_value_key_line_ecp', true);

			if( $post_count == 1 ) :
				?>
				<div class="col s12 m12 l5 hide-on-small-only">
					<div class="card hoverable">
						<div class="card-image hide-on-med-and-down">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( array(350, 210) );
							} else {
								echo '<img src="' . get_template_directory_uri() . '/img/default-labor.jpg">';
							} ?>
						</div>
						<div class="card-content">
							<div class="col s12">
								<div class="title"><a href="<?php the_permalink(); ?>"><?php echo limit_title() ?><?php check_post_is_new('linea-apoyo'); ?></a></div>
								<div class="light grey-text"><a href="<?php the_permalink(); ?>"><?php echo content(32); ?><?php echo ($fecha_cierre!="") ?  '<span class="end-date">Cierre postulaciones: '.$fecha_cierre.'</span>' :''; ?></a></div>
								<a href="<?php the_permalink(); ?>" class="waves-effect waves-light orange accent-4 white-text btn hide-on-med-and-down"><i class="tiny material-icons">label</i> Leer más</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col s12 m12 l7">
					<h4 class="set_secTitle"><?php echo __('Líneas de apoyo', 'achee'); ?></h4>
					<div class="set_list row">
						<div class="col s12 no-more-linea hide-on-small-only">
							<p>Por ahora, no tenemos líneas de apoyo disponibles, puedes enterarte de las líneas de apoyo realizados en líneas de apoyo anteriores</p>
						</div>
						<div class="col s12 more-noticia-responsive-1 hide-on-med-and-up">
							<div class="valign-wrapper">
								<i class="fa fa-newspaper-o"></i>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="lineTit"><?php echo limit_title() ?><?php check_post_is_new('linea-apoyo'); ?><?php echo ($fecha_cierre!="") ?  '<span class="end-date">Cierre postulaciones: '.$fecha_cierre.'</span>' :''; ?></a>
							</div>
						</div>
				<?php else : ?>
						<div class="col s12 linea-content">
							<div class="valign-wrapper">
								<i class="fa fa-newspaper-o"></i>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="lineTit"><?php echo limit_title() ?><?php check_post_is_new('linea-apoyo'); ?><?php echo ($fecha_cierre!="") ?  '<span class="end-date">Cierre postulaciones: '.$fecha_cierre.'</span>' :''; ?></a>
							</div>
						</div>
			<?php endif;
		endwhile; ?>
					</div>
					<a href="<?php echo esc_url( get_post_type_archive_link( 'linea-apoyo' ) ); ?>" title="<?php the_title_attribute(); ?>" class="waves-effect waves-light orange accent-4 white-text btn"><i class="tiny material-icons">label</i> Ver todas las líneas de apoyo</a>
				</div>
	<?php else : ?>
		<div class="valign-wrapper noContent">
			<div class="valign">
				<div class="card-panel grey lighten-5 z-depth-1">
					<div class="row">
						<div class="col s2">
							<img src="<?php echo get_template_directory_uri(); ?>/img/iso.png" alt="" class="circle responsive-img right">
						</div>
						<div class="col s10">
							<h5 class="title">Por ahora, no tenemos líneas de apoyo disponibles.</h5>
							<h6 class="grey-text">Puedes enterarte de las líneas de apoyo realizados en líneas de apoyo anteriores.</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>