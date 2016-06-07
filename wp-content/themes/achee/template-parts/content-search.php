<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AChEE
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card hoverable">
		<div class="card-content">
			<header class="entry-header col s12">
				<?php the_title( sprintf( '<a href="%s" rel="bookmark" class="card-title">', esc_url( get_permalink() ) ), '</a>' ); ?>
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta  col s12">
					<?php //achee_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
			<div class="entry-summary  col s12">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<footer class="card-action col s12">
				<?php //achee_posted_on(); ?>
				<?php //achee_entry_footer(); ?>
				<?php
					$posttags = get_the_tags();
					if ($posttags) {
						echo "<p>Tags: ";
					  foreach($posttags as $tag) {
					    echo $tag->name.' | '; 
					  }
					  echo "</p>";
					}
					?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-## -->

