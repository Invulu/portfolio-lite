<?php
/**
Template Name: Blog
 *
 * This template is used to display a blog page.
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

		<?php if ( is_active_sidebar( 'sidebar-blog' ) ) { ?>

			<!-- BEGIN .eleven columns -->
			<div class="columns eleven">

				<!-- BEGIN .post-area -->
				<div class="post-area">

					<?php
						$blog_query = new WP_Query( array(
							'category_name'    => 'blog',
							'suppress_filters' => 0,
						) );
					?>

					<?php if ( $blog_query->have_posts() ) { ?>

						<?php get_template_part( 'content/loop', 'blog' ); ?>

					<?php } else { ?>

						<?php get_template_part( 'content/loop', 'archive' ); ?>

					<?php } ?>

				<!-- END .post-area -->
				</div>

			<!-- END .eleven columns -->
			</div>

			<!-- BEGIN .five columns -->
			<div class="columns five">

				<?php get_sidebar( 'blog' ); ?>

			<!-- END .five columns -->
			</div>

		<?php } else { ?>

			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">

				<!-- BEGIN .post-area -->
				<div class="post-area">

					<?php
						$blog_query = new WP_Query( array(
							'category_name'    => 'blog',
							'suppress_filters' => 0,
						) );
					?>

					<?php if ( $blog_query->have_posts() ) { ?>

						<?php get_template_part( 'content/loop', 'blog' ); ?>

					<?php } else { ?>

						<?php get_template_part( 'content/loop', 'archive' ); ?>

					<?php } ?>

				<!-- END .post-area -->
				</div>

			<!-- END .sixteen columns -->
			</div>

		<?php } ?>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
