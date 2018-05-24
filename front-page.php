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

// Removes the entry header content
remove_action( 'genesis_entry_header', 'genesis_do_post_title');
remove_action( 'genesis_entry_header', 'wproot_excerpt');

// Replace with custom content
add_action( 'genesis_entry_header', 'wproot_custom_title_area');

function wproot_custom_title_area() {
	genesis_widget_area( 'home-header',
		array(
			'before' => '<section class="home-title-widget-area"><div class="wrap">',
			'after'	=> '</div></section>'
			)
		);
}

// Add home-page body class - probably not necessary
add_filter( 'body_class', 'wproot_add_body_class' );

function wproot_add_body_class( $classes ) {

	$classes[] = 'home-page';
	return $classes;

}

// Run Genesis loop
genesis();