<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AChEE
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="row">
			<div class="col s12">
				<div class="left newstitle">
					<div class="ontitle day"><?php echo get_the_date('d') ?></div>
					<div class="ontitle date"><?php echo get_the_date('F') .' '.get_the_date('Y') ?></div>
					<div class="ontitle text">
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="entry-meta">
			<?php //achee_posted_on(); ?>
		</div> --><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">

		<div>
			<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'extra-large', array( 'class' => 'responsive-img' ) );
				}
			?>
		</div>
		<?php the_content(); ?>
		<?php
			/*wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'achee' ),
				'after'  => '</div>',
			) );*/
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php achee_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<div class="share-networks">
	<h5>Compartir</h5>
	<?php echo do_shortcode( '[feather_share]' ); ?>
</div>
