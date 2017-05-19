<style type="text/css" media="screen">

	<?php
		$display_title = get_theme_mod( 'portfolio_lite_site_title', '1' );
		$display_tagline = get_theme_mod( 'portfolio_lite_site_tagline', '1' );
	?>

	.slideout-panel, #wrapper .post-date p {
		background-color: #<?php echo get_theme_mod( 'background_color', '#ffffff' ); ?> ;
	}

	#wrapper .site-title {
		<?php
		if ( '1' != $display_title ) {
			echo
			'position: absolute;
			text-indent: -9999px;
			margin: 0px;
			padding: 0px;';
		};
		?>
	}

	#wrapper .site-description {
		<?php
		if ( '1' != $display_tagline ) {
			echo
			'position: absolute;
			text-indent: -9999px;
			margin: 0px;
			padding: 0px;';
		};
		?>
	}

</style>
