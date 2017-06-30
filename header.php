<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="wrap">
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php $header_image = get_header_image(); ?>
<?php $blog = is_home(); ?>

<?php if ( has_nav_menu( 'slide-menu' ) ) { ?>

<!-- BEGIN #slide-menu -->
<nav id="slide-menu" class="slideout-menu">

	<?php
		wp_nav_menu( array(
			'theme_location'		=> 'slide-menu',
			'title_li'					=> '',
			'depth'							=> 2,
			'fallback_cb'			 	=> 'wp_page_menu',
			'container_class' 	=> '',
			'menu_class'				=> 'menu',
			)
		);
	?>

<!-- END #slide-menu -->
</nav>

<?php } elseif ( has_nav_menu( 'main-menu' ) ) { ?>

<!-- BEGIN #slide-menu -->
<nav id="slide-menu" class="slideout-menu">

	<?php
		wp_nav_menu( array(
			'theme_location'		=> 'main-menu',
			'title_li'					=> '',
			'depth'							=> 2,
			'fallback_cb'			 	=> 'wp_page_menu',
			'container_class' 	=> '',
			'menu_class'				=> 'menu',
			)
		);
	?>

<!-- END #slide-menu -->
</nav>

<?php } else { ?>

<!-- BEGIN #slide-menu -->
<nav id="slide-menu" class="slideout-menu">

	<ul class="menu"><?php wp_list_pages( 'title_li=&depth=2' ); ?></ul>

<!-- END #slide-menu -->
</nav>

<?php } ?>

<!-- BEGIN #wrapper -->
<div id="wrapper">

	<!-- BEGIN #header -->
	<div id="header" class="top-header">

		<?php if ( has_custom_logo() ) { ?>

			<div class="site-logo"><?php the_custom_logo(); ?></div>

		<?php } ?>

		<!-- BEGIN .top-navigation -->
		<div class="top-navigation">

			<?php if ( has_nav_menu( 'social-menu' ) ) { ?>

				<?php wp_nav_menu( array(
					'theme_location' => 'social-menu',
					'title_li' => '',
					'depth' => 1,
					'container_class' => 'social-menu',
					'menu_class'      => 'social-icons',
					'link_before'     => '<span>',
					'link_after'      => '</span>',
					)
				); ?>

			<?php } ?>

			<button class="menu-toggle">
				<svg class="icon-menu-open" version="1.1" id="icon-open" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
					<rect y="2" width="24" height="2"/>
					<rect y="11" width="24" height="2"/>
					<rect y="20" width="24" height="2"/>
				</svg>
				<svg class="icon-menu-close" version="1.1" id="icon-close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
					<rect x="0" y="11" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 12 28.9706)" width="24" height="2"/>
					<rect x="0" y="11" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 28.9706 12)" width="24" height="2"/>
				</svg>
			</button>

		<!-- END .top-navigation -->
		</div>

	<!-- END #header -->
	</div>

	<!-- BEGIN #panel -->
	<main id="panel" class="container clearfix">

		<?php if ( ! is_single() ) { ?>

		<!-- BEGIN .four columns -->
		<div id="header" class="four columns side-header">

			<?php if ( has_custom_logo() ) { ?>

				<div class="site-logo"><?php the_custom_logo(); ?></div>

			<?php } ?>

			<?php if ( has_nav_menu( 'main-menu' ) ) { ?>

				<!-- BEGIN #navigation -->
				<nav id="navigation">

					<?php
						wp_nav_menu( array(
							'theme_location'		=> 'main-menu',
							'title_li'					=> '',
							'depth'							=> 2,
							'fallback_cb'			 	=> 'wp_page_menu',
							'container_class' 	=> '',
							'menu_class'				=> 'menu',
							)
						);
					?>

				<!-- END #navigation -->
				</nav>

			<?php } ?>

		<!-- END .four columns -->
		</div>

		<!-- BEGIN .twelve columns -->
		<div class="twelve columns">

			<!-- BEGIN #masthead -->
			<div id="masthead">

				<?php if ( is_page_template( 'template-slideshow-gallery.php' ) ) { ?>
					<div class="site-title-slideshow">
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a></p>
						<h1 class="title"><?php the_title(); ?></h1>
					</div>
				<?php } elseif ( is_front_page() && is_home() ) { ?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
					</h1>
				<?php } else { ?>
					<p class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
					</p>
				<?php } ?>

				<p class="site-description">
					<?php echo html_entity_decode( esc_html( get_bloginfo( 'description' ) ) ); ?>
				</p>

			<!-- END #masthead -->
			</div>

			<?php if ( $blog && ! empty( $header_image ) || is_category() && ! empty( $header_image ) || is_search() && ! empty( $header_image ) || is_archive() && ! empty( $header_image ) ) { ?>

				<div id="custom-header" class="bg-img" style="background-image: url(<?php header_image(); ?>);">
					<img class='img-hide' src="<?php header_image(); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php echo esc_attr( get_bloginfo() ); ?>" />
				</div>

			<?php } ?>

		<?php } elseif ( is_single() && ( has_post_thumbnail() || ! empty( $header_image ) ) ) { ?>

		<!-- BEGIN .row -->
		<div class="row">

			<!-- BEGIN .ten columns -->
			<div class="ten columns">

				<!-- BEGIN #masthead -->
				<div id="masthead">

					<?php if ( is_front_page() && is_home() ) { ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
						</h1>
					<?php } else { ?>
						<p class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
						</p>
					<?php } ?>

					<p class="site-description">
						<?php echo html_entity_decode( esc_html( get_bloginfo( 'description' ) ) ); ?>
					</p>

				<!-- END #masthead -->
				</div>

			<!-- END .ten columns -->
			</div>

		<!-- END .row -->
		</div>

		<?php } else { ?>

		<!-- BEGIN .row -->
		<div class="row">

			<!-- BEGIN #masthead -->
			<div id="masthead" class="full-width">

				<?php if ( is_front_page() && is_home() ) { ?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
					</h1>
				<?php } else { ?>
					<p class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
					</p>
				<?php } ?>

				<p class="site-description">
					<?php echo html_entity_decode( esc_html( get_bloginfo( 'description' ) ) ); ?>
				</p>

			<!-- END #masthead -->
			</div>

		<!-- END .row -->
		</div>

		<?php } ?>
