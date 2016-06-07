			<div class="col s12 workSections title">
				<h4>Secciones</h4>
			</div>
			<div class="col s12 m12 l9">
				<div class="row">
					<div class="col s12">
						<div class="tabwraper z-depth-1">
							<div class="col s12 m3 l2">
								<ul class="sectiontabs first">
									<li class="tab-link waves-effect waves-light agenda current" data-tab="tab-1" data-position="first" data-number="1">
										<div class="text">
											<div class="icon"><i class="isIcon fa fa-newspaper-o"></i><?php //badge('post') ?></div>
											<div class="section">Noticias</div>
										</div>
									</li>
									<li class="tab-link waves-effect waves-light cursos" data-tab="tab-2" data-position="second" data-number="2">
										<div class="text">
											<div class="icon"><i class="isIcon fa fa-check"></i><?php badge('cursos') ?></div>
											<div class="section">Cursos</div>
										</div>
									</li>
									<li class="tab-link waves-effect waves-light lineas" data-tab="tab-3" data-position="third" data-number="3">
										<div class="text">
											<div class="icon"><i class="isIcon fa fa-user-plus"></i><?php badge('linea-apoyo') ?></div>
											<div class="section">Líneas de Apoyo</div>
										</div>
									</li>
									<li class="tab-link waves-effect waves-light licitaciones" data-tab="tab-4" data-position="fourth" data-number="4">
										<div class="text">
											<div class="icon"><i class="isIcon fa fa-check-square-o"></i><?php badge('licitaciones') ?></div>
											<div class="section">Licitaciones</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="col s12 m9 l10">
								<div id="tab-1" class="sectiontab-content current">
									<div class="row" id="siteNews">
										<?php get_template_part( 'template-parts/content', 'inicio_noticias' ); ?>
									</div><!-- /row -->
								</div>
								<div id="tab-2" class="sectiontab-content">
									<div class="row" id="siteCourses">
										<?php get_template_part( 'template-parts/content', 'inicio_cursos' ); ?>
									</div>
								</div>
								<div id="tab-3" class="sectiontab-content">
									<div class="row" id="siteLines">
										<?php get_template_part( 'template-parts/content', 'inicio_lineasapoyo' ); ?>
									</div>
								</div>
								<div id="tab-4" class="sectiontab-content">
									<div class="row" id="siteLines">
										<?php get_template_part( 'template-parts/content', 'inicio_licitaciones' ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div id="side-widgets" class="col s12 m12 l3">
				<?php dynamic_sidebar( 'banner-sidebar' ); ?>
				<?php //dynamic_sidebar( 'achee-twitter' ); ?>
				<?php dynamic_sidebar( 'achee-youtube' ); ?>
			</div>