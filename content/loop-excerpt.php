<?php
/**
 * This template displays the post loop.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- BEGIN .post-intro -->
	<div class="post-intro clearfix">

		<h1 class="headline"><?php the_title(); ?></h1>

		<!-- BEGIN .post-meta -->
		<div class="post-meta">
			<!-- BEGIN .post-date -->
			<div class="post-date">
				<p><?php portfolio_lite_posted_on(); ?> <em><?php esc_html_e( 'by', 'portfolio-lite' ); ?></em> <?php esc_url( the_author_posts_link() ); ?></p>
			<!-- END .post-date -->
			</div>
		<!-- END .post-meta -->
		</div>

		<?php if ( ! empty( $post->post_excerpt ) ) { ?>
		<!-- BEGIN .excerpt -->
		<div class="excerpt">
			<?php the_excerpt(); ?>
		<!-- END .excerpt -->
		</div>
		<?php } ?>

		<!-- BEGIN .post-navigation -->
		<div class="post-navigation">
			<div class="next-post"><?php next_post_link( '%link', '<i class="fa fa-angle-left" aria-hidden="true"></i>', true, '', 'category' ); ?></div>
			<div class="previous-post"><?php previous_post_link( '%link', '<i class="fa fa-angle-right" aria-hidden="true"></i>', true, '', 'category' ); ?></div>
		<!-- END .post-navigation -->
		</div>

		<?php if ( has_category() ) { ?>
			<!-- BEGIN .post-taxonomy -->
			<div class="post-taxonomy">
				<?php the_category( '<br />' ); ?>
			<!-- END .post-taxonomy -->
			</div>
		<?php } ?>

	<!-- END .post-intro -->
	</div>

<?php endwhile; ?>
<?php endif; ?>
