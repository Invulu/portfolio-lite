<?php
/**
 * This template displays the archive loop.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

?>

<?php if ( have_posts() ) : ?>

<?php if ( '' != category_description() ) { ?>
	<div class="cat-intro">
		<h1 class="headline"><?php echo single_cat_title(); ?></h1>
		<?php echo category_description(); ?>
	</div>
<?php } ?>

<!-- BEGIN .showcase-posts -->
<div class="showcase-posts">

<?php while ( have_posts() ) : the_post(); ?>

<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-featured-large' ) : false; ?>

	<!-- BEGIN .post class -->
	<div <?php post_class( 'archive-holder' ); ?> id="post-<?php the_ID(); ?>">

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="feature-img">
				<a class="img-text" href="<?php the_permalink(); ?>" rel="bookmark"><h2 class="title"><?php the_title(); ?></h2></a>
				<div class="bg-img" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">
					<?php the_post_thumbnail( 'portfolio-featured-large' ); ?>
				</div>
			</div>
		<?php } else { ?>
			<h2 class="title no-img text-center"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php } ?>

	<!-- END .post class -->
	</div>

<?php endwhile; ?>

<!-- END .showcase-posts -->
</div>

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
