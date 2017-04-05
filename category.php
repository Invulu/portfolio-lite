<?php
/**
 * This template is used to display category post indexes.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class( 'showcase-category' ); ?> id="post-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">

				<!-- BEGIN .post-area -->
				<div class="post-area">

					<!-- BEGIN .article -->
					<div class="article">

						<?php get_template_part( 'content/loop', 'cat' ); ?>

					<!-- END .article -->
					</div>

				<!-- END .post-area -->
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
