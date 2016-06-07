<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package AChEE
 */

if ( ! function_exists( 'achee_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function achee_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'achee' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'achee' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'achee_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function achee_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'achee' ) );
		if ( $categories_list && achee_categorized_blog() ) {			
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'achee' ) . '</span>', $categories_list ); /** Add lineamiento **/ achee_add_lineamiento();
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'achee' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'achee' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'achee' ), esc_html__( '1 Comment', 'achee' ), esc_html__( '% Comments', 'achee' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'achee' ),
			the_title( '<i class="fa fa-pencil left"></i><span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}


endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function achee_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'achee_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'achee_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so achee_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so achee_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in achee_categorized_blog.
 */
function achee_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'achee_categories' );
}
add_action( 'edit_category', 'achee_category_transient_flusher' );
add_action( 'save_post',     'achee_category_transient_flusher' );




function achee_add_lineamiento(){
	 $lineamiento = wp_get_post_terms( get_the_ID(), 'lineamientos' );
	 if(is_array($lineamiento) && isset($lineamiento[0]->name)){	 	
	 	printf('<span class="cat-links"><a href="%s" rel="lineamiento">, ' . esc_html( '%s' ) . '</a></span> ', achee_get_lineamiento_link($lineamiento[0]->term_id), $lineamiento[0]->name ); // WPCS: XSS OK.	 		 	
	 }
}

function achee_get_lineamiento_link($term_id){	
	$link = get_term_link($term_id,'lineamientos');		
	if(is_string($link)){
		return $link;
	}
	else{
		return "#";
	}
}