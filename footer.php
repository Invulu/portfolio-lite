<?php
/**
 * The footer for our theme.
 * This template is used to generate the footer for the theme.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

?>

<?php if ( ! is_single() ) { ?>

<!-- END .twelve columns -->
</div>

<?php } ?>

<!-- END #panel .container -->
</main>

<!-- BEGIN .footer -->
<div class="footer">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .footer-information -->
		<div class="footer-information">

			<div
			<?php
			if ( has_nav_menu( 'footer-menu' ) ) {
				?>
				class="align-left"
				<?php
			} else {
				?>
				class="align-center"<?php } ?>>

				<p class="footer-credits">
					<?php esc_html_e( 'Copyright', 'portfolio-lite' ); ?> &copy; <?php echo esc_html( date( 'Y' ) ); ?> &middot; <?php esc_html_e( 'All Rights Reserved', 'portfolio-lite' ); ?> &middot;
					<?php esc_html( bloginfo( 'name' ) ); ?> &middot; <?php /* translators: 1: Theme name. 2: Theme link. */ printf( esc_html__( 'Theme: %1$s by %2$s', 'portfolio-lite' ), 'Portfolio Lite', '<a href="http://organicthemes.com/">Organic Themes</a>' ); ?>
				</p>

			</div>

			<?php if ( has_nav_menu( 'footer-menu' ) ) { ?>

			<div class="align-right">

				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'footer-menu',
						'title_li'        => '',
						'depth'           => 1,
						'container_class' => 'footer-menu',
					)
				);
				?>

			</div>

			<?php } ?>

		<!-- END .footer-information -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .footer -->
</div>

<!-- END #wrapper -->
</div>

<?php wp_footer(); ?>

</body>
</html>
