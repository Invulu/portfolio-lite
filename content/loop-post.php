<?php
/**
 * This template displays the post loop.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

?>

<?php $header_image = get_header_image(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php $has_content = get_the_content(); if ( '' != $has_content ) { ?>

	<!-- BEGIN .post-holder -->
	<div class="post-holder">

		<!-- BEGIN .article -->
		<article class="article clearfix">

			<?php if ( ! get_post_gallery() && ! has_post_thumbnail() && empty( $header_image ) ) { ?>
				<h1 class="headline"><?php the_title(); ?></h1>
			<?php } ?>

			<?php the_content(); ?>

			<?php wp_link_pages(array(
				'before' => '<p class="page-links"><span class="link-label">' . esc_html__( 'Pages:', 'portfolio-lite' ) . '</span>',
				'after' => '</p>',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'next_or_number' => 'next_and_number',
				'nextpagelink' => esc_html__( 'Next', 'portfolio-lite' ),
				'previouspagelink' => esc_html__( 'Previous', 'portfolio-lite' ),
				'pagelink' => '%',
				'echo' => 1,
				)
			); ?>

			<?php if ( in_category( 'blog' ) ) { ?>

			<!-- BEGIN .post-meta -->
			<div class="post-meta">

				<!-- BEGIN .post-date -->
				<div class="post-date">
					<p class="align-left"><?php portfolio_lite_posted_on(); ?> <em><?php esc_html_e( 'by', 'portfolio-lite' ); ?></em> <?php esc_url( the_author_posts_link() ); ?></p>
					<p class="align-right"><?php edit_post_link( esc_html__( '(Edit)', 'portfolio-lite' ), '', '' ); ?></p>
				<!-- END .post-date -->
				</div>

			<!-- END .post-meta -->
			</div>

			<?php } ?>

		<!-- END .article -->
		</article>

	<!-- END .post-holder -->
	</div>

	<?php if ( comments_open() || '0' != get_comments_number() ) { comments_template(); } ?>

<?php } ?>

<?php endwhile; else : ?>

	<!-- BEGIN .post-holder -->
	<div class="post-holder">

		<!-- BEGIN .article -->
		<article class="article">

			<?php get_template_part( 'content/content', 'none' ); ?>

		<!-- END .article -->
		</article>

	<!-- END .post-holder -->
	</div>

<?php endif; ?>
