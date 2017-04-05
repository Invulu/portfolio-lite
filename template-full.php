<?php
/**
Template Name: Full Width
 *
 * This template is used to display full-width pages.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

get_header(); ?>

<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-featured-large' ) : false; ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) { ?>
		<!-- BEGIN .row -->
		<div class="row">
			<div class="feature-img bg-img" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">
				<?php the_post_thumbnail( 'portfolio-featured-large' ); ?>
			</div>
		<!-- END .row -->
		</div>
	<?php } ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">

				<!-- BEGIN .post-area full-width -->
				<div class="post-area full-width">

					<?php get_template_part( 'content/loop', 'page' ); ?>

				<!-- END .post-area full-width -->
				</div>

			<!-- END .sixteen columns -->
			</div>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
