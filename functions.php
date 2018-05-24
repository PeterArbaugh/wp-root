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

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

// Adds image upload to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Defines the child theme.
define( 'CHILD_THEME_NAME', 'NYU WP Root' );
define( 'CHILD_THEME_URL', 'https://wp.nyu.edu' );
define( 'CHILD_THEME_VERSION', '0.1' );


//Enqueue scripts.
add_action( 'wp_enqueue_scripts', 'wproot_enqueue_scripts_styles' );

function wproot_enqueue_scripts_styles() {

	wp_enqueue_style(
		'wproot-fonts',
		'//fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,900',
		array(),
		CHILD_THEME_VERSION
	);
	wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script(
		'genesis-sample-responsive-menu',
		get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js",
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);
    
    //Not sure if we need localization for this feature, but keeping for now.
	wp_localize_script(
		'genesis-sample-responsive-menu',
		'genesis_responsive_menu',
		genesis_sample_responsive_menu_settings()
	);
    
	wp_enqueue_script(
		'wproot',
		get_stylesheet_directory_uri() . '/js/wproot.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);

}

/**
 * Defines responsive menu settings.
 *
 * @since 2.3.0 of genesis-sample
 */
//leaving in place for now
function genesis_sample_responsive_menu_settings() {

	$settings = array(
		'mainMenu'         => __( 'Menu', 'genesis-sample' ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', 'genesis-sample' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
			),
			'others'  => array(),
		),
	);

	return $settings;

}


// Adds support for HTML5 markup structure.
add_theme_support(
	'html5', array(
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
	)
);

// Adds support for accessibility.
add_theme_support(
	'genesis-accessibility', array(
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	)
);

// Adds viewport meta tag for mobile browsers.
add_theme_support(
	'genesis-responsive-viewport'
);

// Adds custom logo in Customizer > Site Identity.
add_theme_support(
	'custom-logo', array(
		'height'      => 120,
		'width'       => 700,
		'flex-height' => true,
		'flex-width'  => true,
	)
);

// Renames primary and secondary navigation menus.
add_theme_support(
	'genesis-menus', array(
		'primary'   => __( 'Header Menu', 'genesis-sample' ),
		'secondary' => __( 'Footer Menu', 'genesis-sample' ),
	)
);

// Adds support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Adds support for 1-column footer widget.
add_theme_support( 'genesis-footer-widgets', 1 );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// TEMPORARY - Add widget area to home page header
genesis_register_sidebar(
	array(
		'id'	=> 'home-header',
		'name'	=> 'Home page title',
		'description' => 'This widget area dispays in the title area of the home page and should only be used with the custom HTML widget.'
		)
	);

// Force full-width-content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove other layout options
remove_theme_support( 'genesis-inpost-layouts' );

// Removes output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

add_action( 'genesis_theme_settings_metaboxes', 'genesis_sample_remove_metaboxes' );
/**
 * Removes output of unused admin settings metaboxes.
 *
 * @since 2.6.0
 *
 * @param string $_genesis_admin_settings The admin screen to remove meta boxes from.
 */
function genesis_sample_remove_metaboxes( $_genesis_admin_settings ) {

	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );

}

add_filter( 'genesis_customizer_theme_settings_config', 'genesis_sample_remove_customizer_settings' );
/**
 * Removes output of header settings in the Customizer.
 *
 * @since 2.6.0
 *
 * @param array $config Original Customizer items.
 * @return array Filtered Customizer items.
 */
function genesis_sample_remove_customizer_settings( $config ) {

	unset( $config['genesis']['sections']['genesis_header'] );
	return $config;

}

// Displays custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'wproot_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function wproot_secondary_menu_args( $args ) {

	if ( 'secondary' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;
	return $args;

}

// Remove post meta
remove_action( 'genesis_entry_footer', 'genesis_post_meta');

// Filter post info, show post date only
add_filter( 'genesis_post_info', 'wproot_post_archive_info');

function wproot_post_archive_info( $post_info ) {
	$post_info = '[post_date]';
	return $post_info;
}

// Add excerpts to pages
add_post_type_support( 'page', 'excerpt' ); 

// Display excerpt as subtitle for pages and posts
add_action( 'genesis_entry_header', 'wproot_excerpt', 10 ); 

function wproot_excerpt() {
    if ( is_singular( 'post' && 'page' ) && has_excerpt() ) {
        printf( '<p class="excerpts">%s</p>', get_the_excerpt() );
    }
}

//remove footer and copyright information
remove_action('genesis_footer', 'genesis_do_footer');