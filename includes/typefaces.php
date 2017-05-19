<?php
/**
 * Google Fonts Implementation
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

/**
 * Register Google Font URLs
 *
 * @since Portfolio Lite 1.0
 */
function portfolio_lite_fonts_url() {
	$fonts_url = '';

	/*
	Translators: If there are characters in your language that are not
	* supported by Lora, translate this to 'off'. Do not translate
	* into your own language.
	*/

	$raleway = _x( 'on', 'Raleway font: on or off', 'portfolio-lite' );
	$roboto = _x( 'on', 'Roboto font: on or off', 'portfolio-lite' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'portfolio-lite' );
	$montserrat = _x( 'on', 'Montserrat font: on or off', 'portfolio-lite' );
	$droid_serif = _x( 'on', 'Droid Serif font: on or off', 'portfolio-lite' );
	$cabin = _x( 'on', 'Cabin font: on or off', 'portfolio-lite' );
	$lato = _x( 'on', 'Lato font: on or off', 'portfolio-lite' );

	if ( 'off' !== $raleway || 'off' !== $roboto || 'off' !== $open_sans || 'off' !== $montserrat || 'off' !== $droid_serif || 'off' !== $cabin || 'off' !== $lato ) {

		$font_families = array();

		if ( 'off' !== $raleway ) {
			$font_families[] = 'Raleway:400,200,300,800,700,500,600,900,100';
		}

		if ( 'off' !== $roboto ) {
			$font_families[] = 'Roboto:400,100italic,100,300,300italic,400italic,500,500italic,700,700italic,900,900italic';
		}

		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:400,300,600,700,800,800italic,700italic,600italic,400italic,300italic';
		}

		if ( 'off' !== $montserrat ) {
			$font_families[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		}

		if ( 'off' !== $droid_serif ) {
			$font_families[] = 'Droid Serif:400,400italic,700,700italic';
		}

		if ( 'off' !== $cabin ) {
			$font_families[] = 'Cabin:400,400italic,500,500italic,600,600italic,700,700italic';
		}

		if ( 'off' !== $lato ) {
			$font_families[] = 'Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue Google Fonts on Front End
 *
 * @since Portfolio Lite 1.0
 */
function portfolio_lite_scripts_styles() {
	wp_enqueue_style( 'portfolio-fonts', portfolio_lite_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'portfolio_lite_scripts_styles' );

/**
 * Add Google Scripts for use with the editor
 *
 * @since Portfolio Lite 1.0
 */
function portfolio_lite_editor_styles() {
	add_editor_style( array( 'style.css', portfolio_lite_fonts_url() ) );
}
add_action( 'after_setup_theme', 'portfolio_lite_editor_styles' );
