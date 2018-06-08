<?php
/**
 * NYU WP Root.
 *
 *
 * @package WP Root
 * @author  NYU WP Team
 * @license GPL-2.0+
 * @link    https://wp.nyu.edu
 */

// Add class to body for CSS
add_filter( 'body_class', 'wproot_add_archive_body_class' );

function wproot_add_archive_body_class( $classes ) {

	$classes[] = 'post-archive';
	return $classes;
}

// Remove Genesis default archive title and description
remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );

// Add a custom archive title and description
add_action( 'genesis_before_content', 'wproot_output_category_info' );
function wproot_output_category_info() {
	if ( is_category() || is_tag() || is_tax() ) {
		echo '<div class="archive-description">' . single_term_title('<h1 class="archive-title">') . '</h1>' . term_description() . '</div>';
	}
}

// Move the post info before the post title by changing the priority
remove_action( 'genesis_entry_header', 'genesis_post_info', 12);
add_action( 'genesis_entry_header', 'genesis_post_info', 5 );

// Remove author
// Universal - Moved to functions.php

// Remove category at the bottom of each entry
// Universal - Moved to functions.php

// Run Genesis loop
genesis();
