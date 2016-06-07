<?php
	$argsCurso = array(
		'post_type' => 'cursos',
		'posts_per_page' => 6,
		'orderby' => 'date'
	);
	$ourCurso = new WP_Query( $argsCurso );

	if ( $ourCurso->have_posts() ) : $post_count = 0; ?>
		<?php while ( $ourCurso->have_posts() ) : $post_count++; $ourCurso->the_post();
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
								<div class="title"><a href="<?php the_permalink(); ?>"><?php echo limit_title() ?><?php check_post_is_new('cursos'); ?></a></div>
								<div class="light grey-text"><a href="<?php the_permalink(); ?>"><?php echo content(32); ?></a></div>
								<a href="<?php the_permalink(); ?>" class="waves-effect waves-light orange accent-4 white-text btn hide-on-med-and-down"><i class="tiny material-icons">label</i> Leer más</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col s12 m12 l7">
					<h4 class="set_secTitle"><?php echo __('Cursos', 'achee'); ?></h4>
					<div class="set_list row">
						<div class="col s12 no-more-curso hide-on-small-only">
							<p>Por ahora, no tenemos cursos disponibles, puedes enterarte de las cursos realizados en cursos anteriores</p>
						</div>
						<div class="col s12 more-noticia-responsive-1 hide-on-med-and-up">
							<div class="valign-wrapper">
								<i class="fa fa-newspaper-o"></i>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="lineTit"><?php echo limit_title() ?><?php check_post_is_new('cursos'); ?></a>
							</div>
						</div>
				<?php else : ?>
						<div class="col s12 curso-content">
							<div class="valign-wrapper">
								<i class="fa fa-newspaper-o"></i>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="lineTit"><?php echo limit_title() ?><?php check_post_is_new('cursos'); ?></a>
							</div>
						</div>
			<?php endif;
		endwhile; ?>
					</div>
					<a href="<?php echo esc_url( get_post_type_archive_link( 'cursos' ) ); ?>" title="<?php the_title_attribute(); ?>" class="waves-effect waves-light orange accent-4 white-text btn"><i class="tiny material-icons">label</i> Ver todos los cursos</a>
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
							<h5 class="title">Por ahora, no tenemos cursos disponibles.</h5>
							<h6 class="grey-text">Puedes enterarte de las cursos realizados en cursos anteriores.</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>