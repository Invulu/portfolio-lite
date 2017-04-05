<?php
/**
 * Theme customizer sanitization
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

/**
 * Sanitize Categories.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function portfolio_lite_sanitize_categories( $input ) {
	$categories = get_terms( 'category', array( 'fields' => 'ids', 'get' => 'all' ) );

	if ( in_array( $input, $categories, true ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Pages.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function portfolio_lite_sanitize_pages( $input ) {
	$pages = get_all_page_ids();

	if ( in_array( $input, $pages, true ) ) {
			return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Slideshow Transition Interval.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function portfolio_lite_sanitize_transition_interval( $input ) {
	 $valid = array(
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
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Slideshow Transition Style.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function portfolio_lite_sanitize_transition_style( $input ) {
	 $valid = array(
			 'fade' 		=> esc_html__( 'Fade', 'portfolio-lite' ),
			 'slide' 	=> esc_html__( 'Slide', 'portfolio-lite' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Columns.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function portfolio_lite_sanitize_columns( $input ) {
	 $valid = array(
			 'one' 		=> esc_html__( 'One Column', 'portfolio-lite' ),
			 'two' 		=> esc_html__( 'Two Columns', 'portfolio-lite' ),
			 'three' 	=> esc_html__( 'Three Columns', 'portfolio-lite' ),
			 'four' 	=> esc_html__( 'Four Columns', 'portfolio-lite' ),
			 'five' 	=> esc_html__( 'Five Columns', 'portfolio-lite' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Alignment.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function portfolio_lite_sanitize_align( $input ) {
	 $valid = array(
			 'left' 		=> esc_html__( 'Left Align', 'portfolio-lite' ),
			 'center' 		=> esc_html__( 'Center Align', 'portfolio-lite' ),
			 'right' 	=> esc_html__( 'Right Align', 'portfolio-lite' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Checkboxes.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function portfolio_lite_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Sanitize Text Input.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function portfolio_lite_sanitize_text( $input ) {
	 return wp_kses_post( force_balance_tags( $input ) );
}
