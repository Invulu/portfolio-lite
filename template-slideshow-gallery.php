<?php
/**
Template Name: Gallery Slideshow
 *
 * This template is used to display a page with a gallery slideshow.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class( 'slideshow-page' ); ?> id="page-<?php the_ID(); ?>">

	<?php if ( get_post_gallery() ) { ?>

		<?php get_template_part( 'content/slider', 'gallery' ); ?>

	<?php } elseif ( has_post_thumbnail() ) { ?>

		<div class="feature-img bg-img" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">
			<?php the_post_thumbnail( 'portfolio-featured-large' ); ?>
		</div>

	<?php } ?>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
