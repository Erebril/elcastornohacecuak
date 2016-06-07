<?php
/**
 * Template Name: Plantilla formulario de Contacto
 *
 * @package achee-theme
 */

get_header(); ?>

<div class="container">
	<div id="content-wrapper" class="row">
		<div class="content-overall valign-wrapper z-depth-1">
			<?php custom_breadcrumbs(); ?>		
		</div>

		<div id="primary" class="content-area col s12">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<section class="custom-form">
						<h5 class="title"><!-- <i class="fa fa-list-ul"></i> --> <?php echo __('Formulario de contacto', 'achee') ?></h5>
						<?php the_content(); ?>
					</section>

				<?php endwhile; // End of the loop. ?>


				<section class="columns">
					<div class="col s12 m3">
						<h6>
							<span class="fa-stack fa-lg">
								<i class="fa fa-square fa-stack-2x"></i>
								<i class="fa fa-user fa-stack-1x fa-inverse"></i>
							</span>
							<strong>Patrocinio y/o colaboración</strong>
						</h6>
						<p>La AChEE ofrece la posibilidad de entregar merchandising, hacer uso del logo AChEE, poner a disposición su página web a través del uso banners, y asistencia a charlas por parte de sus miembros, con el fin de promover la difusión y fomento de la eficiencia energética a nivel local, regional y nacional.</p>
						<p>Para solicitar patrocinio debe ponerse en contacto con Mariela Castillo a su mail es <a href="mailto:mcastillo@acee.cl">mcastillo@acee.cl</a></p>
					</div>
					<div class="col s12 m3">
						<h6>
							<i class="fa fa-clock-o fa-2x"></i>
							<strong>Patrocinio y/o colaboración</strong>
						</h6>
						<div class="nointerlined">
							<p>Lunes - Viernes: 9 : 30  am a 17:30 pm</p>
							<p>Sábado: día libre</p>
							<p>Domingo: día libre</p>
						</div>
						<h6>
							<i class="fa fa-share-square-o fa-2x"></i>
							<strong>Redes Sociales</strong>
						</h6>
						<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto</p>

					</div>
					<div class="col s12 m3">
						<h6>
							<i class="fa fa-phone fa-2x"></i>
							<strong>Teléfono</strong>
						</h6>
						<p>(56 2) 2571 2200 - (56 2) 2571 2200</p>
						<div class="mail">
							<h6>
								<i class="fa fa-envelope fa-2x"></i>
								<strong>Correo</strong>
							</h6>
							<p><a href="mailto:info@acee.cl">info@acee.cl</a></p>
						</div>
					</div>
					<div class="col s12 m3">
						<h6>
							<i class="fa fa-map fa-2x"></i>
							<strong>Dirección</strong>
						</h6>
						<div class="nointerlined">
							<p>Agencia Chilena de Eficiencia Energética</p>
							<p>Monseñor Sotero Sanz N°221</p>
							<p>Providencia, Santiago - Chile</p>
						</div>
					</div>
				</section>

			</main><!-- #main -->

		</div><!-- #primary -->

	</div>
</div>


<section class="map">
	<div class="had-container">
		<div class="row">
    		<div id="map" style="height:600px;"></div>
		</div>
	</div>
</section>


<?php get_footer(); ?>
