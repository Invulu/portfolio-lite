<?php
/**
 * This template is used to display the theme slider gallery.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

?>

<!-- BEGIN .slideshow -->
<div class="slideshow">

	<!-- BEGIN .flexslider -->
	<div class="flexslider loading" data-speed="<?php echo get_theme_mod( 'portfolio_lite_transition_interval', '12000' ); ?>" data-transition="<?php echo get_theme_mod( 'portfolio_lite_transition_style', 'fade' ); ?>">

		<div class="preloader"></div>

		<!-- BEGIN .slides -->
		<ul class="slides">

			<?php while ( have_posts() ) : the_post(); if ( get_post_gallery() ) : ?>

				<?php $gallery = get_post_gallery( $post, false );
				$ids = explode( ',', $gallery['ids'] ); ?>

				<?php foreach ( $ids as $id ) { ?>
					<?php $link = wp_get_attachment_url( $id ); ?>
					<?php $image = get_post( $id ); ?>
					<?php $image_title = $image->post_title; ?>
					<?php $image_caption = $image->post_excerpt; ?>
					<li>
						<div class="feature-img bg-img" style="background-image: url(<?php echo esc_url( $link ); ?>);">
							<img src="<?php echo esc_url( $link ); ?>" />
						</div>
						<h2 class="title"><?php echo $image_caption; ?></h2>
					</li>
				<?php } ?>

			<?php endif; ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

		<!-- END .slides -->
		</ul>

		<div class="custom-controls">

			<div class="flex-slide-count">
				<span class="current-slide"><?php esc_html_e( '1', 'portfolio-lite' ); ?></span><?php esc_html_e( '/', 'portfolio-lite' ); ?><span class="total-slides"></span>
			</div>

			<ul class="flex-direction-nav">
				<li class="flex-nav-prev"><a class="flex-prev" href="#"><i class="fa fa-angle-left"></i></a></li>
				<li class="flex-nav-next"><a class="flex-next" href="#"><i class="fa fa-angle-right"></i></a></li>
			</ul>

		</div>

	<!-- END .flexslider -->
	</div>

<!-- END .slideshow -->
</div>
