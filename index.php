<?php
/**
 *
 * This template is used to display a blog. The content is displayed in post formats.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

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
							'category_name' => 'blog',
							'suppress_filters'	=> 0,
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
							'category_name' => 'blog',
							'suppress_filters'	=> 0,
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
