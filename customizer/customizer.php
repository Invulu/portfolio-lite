<?php
/**
 * Theme customizer with real-time update
 *
 * Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

/**
 * Begin the customizer functions.
 *
 * @param array $wp_customize Returns classes and sanitized inputs.
 */
function portfolio_lite_theme_customizer( $wp_customize ) {

	include( get_template_directory() . '/customizer/customizer-sanitize.php');

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @since Portfolio Lite 1.0
	 * @see portfolio_lite_customize_register()
	 *
	 * @return void
	 */
	function portfolio_lite_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @since Portfolio Lite 1.0
	 * @see portfolio_lite_customize_register()
	 *
	 * @return void
	 */
	function portfolio_lite_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	// Set site name and description text to be previewed in real-time.
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'portfolio_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'portfolio_lite_customize_partial_blogdescription',
		) );
	}

	/*
	-------------------------------------------------------------------------------------------------------
		Site Title Section
	-------------------------------------------------------------------------------------------------------
	*/

		// Custom Display Site Title Option.
		$wp_customize->add_setting( 'portfolio_lite_site_title', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'portfolio_lite_sanitize_checkbox',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_lite_site_title', array(
			'label'			=> esc_html__( 'Display Site Title', 'portfolio-lite' ),
			'type'			=> 'checkbox',
			'section'		=> 'title_tagline',
			'settings'	=> 'portfolio_lite_site_title',
			'priority'	=> 10,
		) ) );

		// Custom Display Tagline Option.
		$wp_customize->add_setting( 'portfolio_lite_site_tagline', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'portfolio_lite_sanitize_checkbox',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_lite_site_tagline', array(
			'label'			=> esc_html__( 'Display Site Tagline', 'portfolio-lite' ),
			'type'			=> 'checkbox',
			'section'		=> 'title_tagline',
			'settings'	=> 'portfolio_lite_site_tagline',
			'priority'	=> 15,
		) ) );

}
add_action( 'customize_register', 'portfolio_lite_theme_customizer' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 */
function portfolio_lite_customize_preview_js() {
	wp_enqueue_script( 'portfolio-customizer', get_template_directory_uri() . '/customizer/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'portfolio_lite_customize_preview_js' );

/**
 * Logo Resizer
 */
require get_template_directory() . '/customizer/logo-resizer.php';
