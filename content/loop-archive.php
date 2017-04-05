<?php
/**
 * This template displays the archive loop.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

?>

<?php if ( have_posts() ) : ?>

	<h1 class="archive-title"><?php the_archive_title(); ?></h1>

<?php while ( have_posts() ) : the_post(); ?>

	<!-- BEGIN .post class -->
	<div <?php post_class( 'archive-holder' ); ?> id="post-<?php the_ID(); ?>">

		<!-- BEGIN .article -->
		<article class="article">

			<h2 class="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<?php if ( has_post_thumbnail() ) { ?>
				<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'portfolio-lite' ), the_title_attribute( 'echo=0' ) ) ); ?>">
					<?php the_post_thumbnail( 'portfolio-featured-large' ); ?>
				</a>
			<?php } ?>

			<?php the_excerpt(); ?>

			<?php $tag_list = get_the_tag_list(); if ( ! empty( $tag_list ) ) { ?>
				<div class="post-tags">
					<p><?php esc_html_e( 'Tags:', 'portfolio-lite' ); ?> <?php the_tags( '', ' | ' ); ?></p>
				</div>
			<?php } ?>

			<!-- BEGIN .post-meta -->
			<div class="post-meta">

				<div class="post-date">
					<p class="align-left">
						<?php portfolio_lite_posted_on(); ?> <em><?php esc_html_e( 'by', 'portfolio-lite' ); ?></em> <?php esc_url( the_author_posts_link() ); ?>
					</p>
					<?php if ( comments_open() ) { ?>
						<p class="align-right">
							<a href="<?php the_permalink(); ?>#comments"><?php comments_number( esc_html__( 'Leave a Comment', 'portfolio-lite' ), esc_html__( '1 Comment', 'portfolio-lite' ), '% Comments' ); ?></a>
						</p>
					<?php } ?>
				</div>

			<!-- END .post-meta -->
			</div>

		<!-- END .article -->
		</article>

	<!-- END .post class -->
	</div>

<?php endwhile; ?>

<?php the_posts_pagination( array(
	'prev_text' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Previous Page', 'portfolio-lite' ) . ' </span>&laquo;',
	'next_text' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Next Page', 'portfolio-lite' ) . ' </span>&raquo;',
) ); ?>

<?php else : ?>

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
