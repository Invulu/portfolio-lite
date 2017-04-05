<?php
/**
 * This template displays single post content.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

get_header(); ?>

<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-featured-large' ) : false; ?>
<?php $header_image = get_header_image(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if ( get_post_gallery() || has_post_thumbnail() || ! empty( $header_image ) ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .post-header -->
		<div class="post-header">

			<!-- BEGIN .ten columns -->
			<div class="ten columns">

				<?php if ( get_post_gallery() ) { ?>

					<?php get_template_part( 'content/slider', 'gallery' ); ?>

				<?php } elseif ( has_post_thumbnail() ) { ?>

					<div class="feature-img bg-img" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">
						<?php the_post_thumbnail( 'portfolio-featured-large' ); ?>
					</div>

				<?php } elseif ( ! empty( $header_image ) ) { ?>

					<div id="custom-header" class="bg-img" style="background-image: url(<?php header_image(); ?>);">
						<img class='img-hide' src="<?php header_image(); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php echo esc_attr( get_bloginfo() ); ?>" />
					</div>

				<?php } ?>

			<!-- END .ten columns -->
			</div>

			<!-- BEGIN .six columns -->
			<div class="six columns">

				<?php get_template_part( 'content/loop', 'excerpt' ); ?>

			<!-- END .six columns -->
			</div>

		<!-- END .post-header -->
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

				<!-- BEGIN .post-area no-sidebar -->
				<div class="post-area no-sidebar">

					<?php get_template_part( 'content/loop', 'post' ); ?>

				<!-- END .post-area no-sidebar -->
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
