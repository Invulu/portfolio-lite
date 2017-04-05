<?php
/**
 * The blog sidebar template for our theme.
 * This template is used to display the sidebar on the blog page template.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

?>

<?php if ( is_active_sidebar( 'sidebar-blog' ) ) { ?>

	<div class="sidebar">
		<?php dynamic_sidebar( 'sidebar-blog' ); ?>
	</div>

<?php } ?>
