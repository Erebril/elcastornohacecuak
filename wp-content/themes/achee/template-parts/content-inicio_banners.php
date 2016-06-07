<div class="col s12 m12">
	<div class="row" id="Partners" style="margin-bottom: 60px;">
		<?php get_template_part( 'template-parts/content', 'inicio_partners' ); ?>
	</div>
</div>
<div class="col s12 m9 mobile-full">
	<div class="row" id="corpBanners">
		<?php get_template_part( 'template-parts/content', 'inicio_corpadds' ); ?>
	</div>
	<div class="row" id="successCases">
		<?php //get_template_part( 'template-parts/content', 'inicio_exitos' ); ?>
	</div>
	<div class="row" id="ourSites">
		<?php get_template_part( 'template-parts/content', 'inicio_sitios' ); ?>
	</div><!-- /row -->
</div>
<div class="col s12 m3 hide-on-med-and-down">
	<?php dynamic_sidebar( 'achee-twitter' ); ?>	
</div>