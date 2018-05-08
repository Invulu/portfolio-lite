<?php
/**
 * This template displays the page loop.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php $has_content = get_the_content(); if ( '' != $has_content ) { ?>

	<!-- BEGIN .page-holder -->
	<div class="page-holder">

		<!-- BEGIN .article -->
		<article class="article clearfix">

			<h1 class="headline"><?php the_title(); ?></h1>

			<?php the_content( esc_html__( 'Read More', 'portfolio-lite' ) ); ?>

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

			<?php edit_post_link( esc_html__( '(Edit)', 'portfolio-lite' ), '', '' ); ?>

		<!-- END .article -->
		</div>

	<!-- END .page-holder -->
	</article>

	<?php if ( comments_open() || '0' != get_comments_number() ) comments_template(); ?>

<?php } ?>

<?php endwhile; else : ?>

	<!-- BEGIN .page-holder -->
	<div class="page-holder">

		<!-- BEGIN .article -->
		<article class="article">

			<?php get_template_part( 'content/content', 'none' ); ?>

		<!-- END .article -->
		</article>

	<!-- END .page-holder -->
	</div>

<?php endif; ?>
