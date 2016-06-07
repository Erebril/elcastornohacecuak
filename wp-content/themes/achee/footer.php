<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AChEE
 */

?>
		</div><!-- .had-container -->
	</div><!-- #content -->
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l3 s12 right hide-on-med-and-down">
					<?php dynamic_sidebar( 'columna-4' ); ?>
				</div>
				<div class="col l3 s12 right hide-on-med-and-down">
					<?php dynamic_sidebar( 'columna-3' ); ?>
				</div>
				<div class="col l3 s12 right hide-on-med-and-down">
					<?php dynamic_sidebar( 'columna-2' ); ?>
				</div>
				<div class="col l3 s12 right">
					<?php dynamic_sidebar( 'columna-1' ); ?>
				</div>
			</div>
		</div>
		<div class="footer-info">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'achee-piepag' ); ?>
				</div>
			</div>
		</div>
	</footer>
	<!-- Flecha Top -->
	<span class="ir-arriba fa fa-arrow-up"></span>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php if(is_page('contacto')):	?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDifH0KgciwuFToJvwWyoSdIyVj6qX7XZs&callback=initMap"
async defer></script> 
<?php endif ?>

</body>
</html>
