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

	include( get_template_directory() . '/customizer/customizer-controls.php');

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

		/*
		-------------------------------------------------------------------------------------------------------
			Theme Options Panel
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_panel( 'portfolio_lite_theme_options', array(
			'priority'				=> 1,
			'capability'			=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title'						=> esc_html__( 'Theme Options', 'portfolio-lite' ),
			'description'			=> esc_html__( 'This panel allows you to customize specific areas of the theme.', 'portfolio-lite' ),
		) );

		/*
		-------------------------------------------------------------------------------------------------------
			Slideshow Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'portfolio_lite_slider_section' , array(
			'title'			=> esc_html__( 'Slideshow Settings', 'portfolio-lite' ),
			'description' => esc_html__( 'Options for changing the slideshow transition time and style.', 'portfolio-lite' ),
			'priority'	=> 102,
			'panel'			=> 'portfolio_lite_theme_options',
		) );

		// Slider Transition Interval.
		$wp_customize->add_setting( 'portfolio_lite_transition_interval', array(
			'default'						=> '12000',
			'sanitize_callback' => 'portfolio_lite_sanitize_transition_interval',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_lite_transition_interval', array(
			'type' 		=> 'select',
			'label' 	=> esc_html__( 'Transition Interval', 'portfolio-lite' ),
			'section' => 'portfolio_lite_slider_section',
			'choices' => array(
				'2000' 		=> esc_html__( '2 Seconds', 'portfolio-lite' ),
				'4000' 		=> esc_html__( '4 Seconds', 'portfolio-lite' ),
				'6000' 		=> esc_html__( '6 Seconds', 'portfolio-lite' ),
				'8000' 		=> esc_html__( '8 Seconds', 'portfolio-lite' ),
				'10000' 	=> esc_html__( '10 Seconds', 'portfolio-lite' ),
				'12000' 	=> esc_html__( '12 Seconds', 'portfolio-lite' ),
				'20000' 	=> esc_html__( '20 Seconds', 'portfolio-lite' ),
				'30000' 	=> esc_html__( '30 Seconds', 'portfolio-lite' ),
				'60000' 	=> esc_html__( '1 Minute', 'portfolio-lite' ),
				'999999999'	=> esc_html__( 'Hold Frame', 'portfolio-lite' ),
			),
			'priority' => 10,
		) ) );

		// Slideshow Transition Style.
		$wp_customize->add_setting( 'portfolio_lite_transition_style', array(
			'default'						=> 'fade',
			'sanitize_callback' => 'portfolio_lite_sanitize_transition_style',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_lite_transition_style', array(
			'type' 		=> 'select',
			'label' 	=> esc_html__( 'Transition Style', 'portfolio-lite' ),
			'section' => 'portfolio_lite_slider_section',
			'choices' => array(
				'fade' 		=> __( 'Fade', 'portfolio-lite' ),
				'slide' 	=> __( 'Slide', 'portfolio-lite' ),
			),
			'priority' => 20,
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
