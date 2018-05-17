<?php
/**
 * NYU WP Root.
 *
 *
 * @package WP Root
 * @author  Peter Arbaugh
 * @license GPL-2.0+
 * @link    https://wp.nyu.edu
 */

add_action( 'customize_register', 'wproot_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 2.2.3 of genesis-sample
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function wproot_customizer_register( $wp_customize ) {

	// Add a control for the logo size.
	$wp_customize->add_control(
		'genesis_sample_logo_width',
		array(
			'label'       => __( 'Logo Width', 'genesis-sample' ),
			'description' => __( 'The maximum width of the logo in pixels.', 'genesis-sample' ),
			'priority'    => 9,
			'section'     => 'title_tagline',
			'settings'    => 'genesis_sample_logo_width',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 100,
			),

		)
	);

}
