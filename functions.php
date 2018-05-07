<?php
/**
 * This file includes the theme functions.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

/*
-------------------------------------------------------------------------------------------------------
	Theme Setup
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'portfolio_lite_setup' ) ) :

	/** Function portfolio_lite_setup */
	function portfolio_lite_setup() {

		/*
		* Enable support for translation.
		*/
		load_theme_textdomain( 'portfolio-lite', get_template_directory() . '/languages' );

		/*
		* Enable support for RSS feed links to head.
		*/
		add_theme_support( 'automatic-feed-links' );

		/*
		* Enable support for post thumbnails.
		*/
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'portfolio-featured-large', 2400, 1800, true ); // Large Featured Image.
		add_image_size( 'portfolio-featured-medium', 1200, 800, true ); // Medium Featured Image.
		add_image_size( 'portfolio-featured-small', 640, 640, true ); // Small Featured Image.
		add_image_size( 'portfolio-featured-square', 1200, 1200, true ); // Square Featured Image.

		/*
		* Enable support for site title tag.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable selective refresh for widgets.
		*/
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		* Enable support for custom logo.
		*/
		add_theme_support( 'custom-logo', array(
			'height'      => 360,
			'width'       => 360,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		/*
		* Enable support for custom menus.
		*/
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'portfolio-lite' ),
			'slide-menu' => esc_html__( 'Slide Menu', 'portfolio-lite' ),
			'social-menu' => esc_html__( 'Social Menu', 'portfolio-lite' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'portfolio-lite' ),
		));

		/*
		* Enable support for custom header.
		*/
		register_default_headers( array(
			'default' => array(
			'url'   => get_template_directory_uri() . '/images/default-header.jpg',
			'thumbnail_url' => get_template_directory_uri() . '/images/default-header.jpg',
			'description'   => esc_html__( 'Default Custom Header', 'portfolio-lite' ),
			),
		));
		$defaults = array(
			'width'								=> 1800,
			'height'							=> 480,
			'flex-height'					=> true,
			'flex-width'					=> true,
			'default-image' 			=> get_template_directory_uri() . '/images/default-header.jpg',
			'header-text'					=> false,
			'uploads'							=> true,
		);
		add_theme_support( 'custom-header', $defaults );

		/*
		* Enable support for custom background.
		*/
		$defaults = array(
			'default-color'          => 'ffffff',
		);
		add_theme_support( 'custom-background', $defaults );

		/*
		* Enable theme starter content.
		*/
		add_theme_support( 'starter-content', array(

			// Set default theme options.
			'options' => array(
				'custom_logo' => '{{logo}}',
				'show_on_front' => 'page',
				'page_on_front' => '{{home}}',
				'page_for_posts' => '{{blog}}',
				'blogname' => __( 'Portfolio Lite Theme', 'portfolio-lite' ),
				'blogdescription' => __( 'My <b>Awesome</b> Organic Theme', 'portfolio-lite' ),
			),

			// Starter pages to include.
			'posts' => array(
				'home' => array(
					'template' => 'template-slideshow-gallery.php',
				),
				'about' => array(
					'thumbnail' => '{{image-about}}',
				),
				'services' => array(
					'post_type' => 'page',
					'post_title' => __( 'Services', 'portfolio-lite' ),
					'post_content' => __( '<p>This is an example services page. You may want to write about the various services your company provides.</p>', 'portfolio-lite' ),
					'thumbnail' => '{{image-services}}',
				),
				'blog',
				'contact' => array(
					'thumbnail' => '{{image-contact}}',
				),
			),

			// Starter attachments for default images.
			'attachments' => array(
				'logo' => array(
					'post_title' => __( 'Logo', 'portfolio-lite' ),
					'file' => 'images/logo.png',
				),
				'image-about' => array(
					'post_title' => __( 'About Image', 'portfolio-lite' ),
					'file' => 'images/image-about.jpg',
				),
				'image-services' => array(
					'post_title' => __( 'Services Image', 'portfolio-lite' ),
					'file' => 'images/image-services.jpg',
				),
				'image-contact' => array(
					'post_title' => __( 'Contact Image', 'portfolio-lite' ),
					'file' => 'images/image-contact.jpg',
				),
			),

			// Add pages to primary navigation menu.
			'nav_menus' => array(
				'main-menu' => array(
					'name' => __( 'Primary Navigation', 'portfolio-lite' ),
					'items' => array(
						'link_home',
						'page_about',
						'page_services' => array(
							'type' => 'post_type',
							'object' => 'page',
							'object_id' => '{{services}}',
						),
						'page_blog',
						'page_contact',
					),
				)
			)

		));

	}
endif; // End function portfolio_lite_setup.
add_action( 'after_setup_theme', 'portfolio_lite_setup' );

/*
-------------------------------------------------------------------------------------------------------
	Register Scripts
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'portfolio_lite_enqueue_scripts' ) ) {

	/** Function portfolio_lite_enqueue_scripts */
	function portfolio_lite_enqueue_scripts() {

		// Enqueue Styles.
		wp_enqueue_style( 'portfolio-style', get_stylesheet_uri() );
		wp_enqueue_style( 'portfolio-style-conditionals', get_template_directory_uri() . '/css/style-conditionals.css', array( 'portfolio-style' ), '1.0' );
		wp_enqueue_style( 'portfolio-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'portfolio-style' ), '1.0' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( 'portfolio-style' ), '1.0' );

		// Resgister Scripts.
		wp_register_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0' );
		wp_register_script( 'jquery-colourbrightness', get_template_directory_uri() . '/js/jquery.colourbrightness.js', array( 'jquery' ), '1.0' );

		// Enqueue Scripts.
		wp_enqueue_script( 'hoverIntent' );
		wp_enqueue_script( 'portfolio-slideout', get_template_directory_uri() . '/js/slideout.js', array(), '1.0' );
		wp_enqueue_script( 'portfolio-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'jquery-fitvids', 'jquery-colourbrightness' ), '1.0', true );

		// Load Flexslider on front page and slideshow page template.
		if ( is_single() || is_page_template( 'template-slideshow-gallery.php' ) ) {
			wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '20130729' );
		}

		// Load single scripts only on single pages.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_lite_enqueue_scripts' );

if ( ! function_exists( 'portfolio_lite_enqueue_admin_scripts' ) ) {

	/** Function portfolio_lite_enqueue_admin_scripts */
	function portfolio_lite_enqueue_admin_scripts( $hook ) {
		if ( 'themes.php' !== $hook ) {
			return;
		}
		wp_enqueue_script( 'portfolio-custom-admin', get_template_directory_uri() . '/js/jquery.custom.admin.js', array( 'jquery' ), '1.0', true );
	}
}
add_action( 'admin_enqueue_scripts', 'portfolio_lite_enqueue_admin_scripts' );

/*
-------------------------------------------------------------------------------------------------------
	Add Submenu Item
-------------------------------------------------------------------------------------------------------
*/

add_action( 'admin_menu', 'organic_origin_admin_menu' );

function organic_origin_admin_menu() {
	global $submenu;
	$permalink = esc_url( 'https://organicthemes.com/theme/portfolio-theme/' );
	$submenu['themes.php'][6] = array( __( 'Theme Upgrade', 'portfolio-lite' ), 'manage_options', $permalink, 6 );
}

/*
-------------------------------------------------------------------------------------------------------
	Custom Styles
-------------------------------------------------------------------------------------------------------
*/

/**
 * Changes styles upon user defined options.
 */
function portfolio_lite_custom_styles() {
	$bg_color = get_theme_mod( 'background_color', 'ffffff' );
	$display_title = get_theme_mod( 'portfolio_lite_site_title', '1' );
	$display_tagline = get_theme_mod( 'portfolio_lite_site_tagline', '1' );
	?>
	<style>
		.slideout-panel, #wrapper .post-date p {
			background-color: #<?php echo esc_attr( $bg_color ); ?>;
		}
		#wrapper .site-title {
			<?php
			if ( '1' != $display_title ) {
				echo
				'position: absolute;
				text-indent: -9999px;
				margin: 0px;
				padding: 0px;';
			};
			?>
		}
		#wrapper .site-description {
			<?php
			if ( '1' != $display_tagline ) {
				echo
				'position: absolute;
				text-indent: -9999px;
				margin: 0px;
				padding: 0px;';
			};
			?>
		}
	</style>
	<?php
}
add_action( 'wp_head', 'portfolio_lite_custom_styles', 100 );

/*
-------------------------------------------------------------------------------------------------------
	Admin Notice
-------------------------------------------------------------------------------------------------------
*/

/** Function portfolio_lite_admin_notice */
function portfolio_lite_admin_notice() {
	if ( ! PAnD::is_admin_notice_active( 'notice-portfolio-lite-30' ) ) {
		return;
	}
	?>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=246727095428680";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<script>window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
		t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);

		t._e = [];
		t.ready = function(f) {
			t._e.push(f);
		};

		return t;
	}(document, "script", "twitter-wjs"));</script>

	<div data-dismissible="notice-portfolio-lite-30" class="notice updated is-dismissible">

		<p><?php printf( __( 'Enter your email to receive updates and information from <a href="%1$s" target="_blank">Organic Themes</a>. For instructions please refer to our <a href="%2$s" target="_blank">theme setup guide</a>. Upgrade to <a href="%3$s" target="_blank">premium version</a> for more options and support.', 'portfolio-lite' ), 'https://organicthemes.com/themes/', 'https://organicthemes.com/the-free-wordpress-portfolio-lite-theme/', 'https://organicthemes.com/theme/portfolio-theme/' ); ?></p>

		<div class="follows" style="overflow: hidden; margin-bottom: 12px;">

			<div id="mc_embed_signup" class="clear" style="float: left;">
				<form action="//organicthemes.us1.list-manage.com/subscribe/post?u=7cf6b005868eab70f031dc806&amp;id=c3cce2fac0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>
						<div class="mc-field-group" style="float: left;">
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
						</div>
						<div style="float: left; margin-left: 6px;"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7cf6b005868eab70f031dc806_c3cce2fac0" tabindex="-1" value=""></div>
					</div>
				</form>
			</div>

			<div class="social-links" style="float: left; margin-left: 24px; margin-top: 4px;">
				<div class="fb-like" style="float: left;" data-href="https://www.facebook.com/OrganicThemes/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
				<div class="twitter-follow" style="float: left; margin-left: 6px;"><a class="twitter-follow-button" href="https://twitter.com/OrganicThemes" data-show-count="false">Follow @OrganicThemes</a></div>
			</div>

		</div>

	</div>

	<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
	<!--End mc_embed_signup-->
	<?php
}
add_action( 'admin_init', array( 'PAnD', 'init' ) );
add_action( 'admin_notices', 'portfolio_lite_admin_notice' );

require( get_template_directory() . '/includes/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php' );

/*
-------------------------------------------------------------------------------------------------------
	Category ID to Name
-------------------------------------------------------------------------------------------------------
*/

/**
 * Changes category IDs to names.
 *
 * @param array $id IDs for categories.
 * @return array
 */

if ( ! function_exists( 'portfolio_lite_cat_id_to_name' ) ) :

function portfolio_lite_cat_id_to_name( $id ) {
	$cat = get_category( $id );
	if ( is_wp_error( $cat ) ) {
		return false; }
	return $cat->cat_name;
}
endif;

/*
-------------------------------------------------------------------------------------------------------
	Register Sidebars
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'portfolio_lite_widgets_init' ) ) :

/** Function portfolio_lite_widgets_init */
function portfolio_lite_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__( 'Default Sidebar', 'portfolio-lite' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', 'portfolio-lite' ),
		'id' => 'sidebar-blog',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
endif;
add_action( 'widgets_init', 'portfolio_lite_widgets_init' );

/*
-------------------------------------------------------------------------------------------------------
	Posted On Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'portfolio_lite_posted_on' ) ) :

/** Function portfolio_lite_posted_on */
function portfolio_lite_posted_on() {
	if ( get_the_modified_time() != get_the_time() ) {
		printf( __( '<span class="%1$s">Updated:</span> %2$s', 'portfolio-lite' ),
			'meta-prep meta-prep-author',
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				esc_url( get_permalink() ),
				esc_attr( get_the_modified_time() ),
				esc_attr( get_the_modified_date() )
			)
		);
	} else {
		printf( __( '<span class="%1$s">Posted:</span> %2$s', 'portfolio-lite' ),
			'meta-prep meta-prep-author',
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				get_the_date()
			)
		);
	}
}
endif;

/*
------------------------------------------------------------------------------------------------------
	Content Width
------------------------------------------------------------------------------------------------------
*/

if ( ! isset( $content_width ) ) { $content_width = 760; }

if ( ! function_exists( 'portfolio_lite_content_width' ) ) :

/** Function portfolio_lite_content_width */
function portfolio_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'portfolio_lite_content_width', 760 );
}
endif;
add_action( 'after_setup_theme', 'portfolio_lite_content_width', 0 );

/*
-------------------------------------------------------------------------------------------------------
	Comments Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'portfolio_lite_comment' ) ) :

	/**
	 * Setup our comments for the theme.
	 *
	 * @param array $comment IDs for categories.
	 * @param array $args Comment arguments.
	 * @param array $depth Level of replies.
	 */
	function portfolio_lite_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'portfolio-lite' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'portfolio-lite' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
			default :
		?>
		<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">

		<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 36;
					if ( '0' != $comment->comment_parent ) {
						$avatar_size = 36; }

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s %2$s', 'portfolio-lite' ),
							sprintf( '<span class="comment-name">%s</span>', wp_kses_post( get_comment_author_link() ) ),
							sprintf( '<a class="comment-time" href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( esc_html__( '%1$s, %2$s', 'portfolio-lite' ), get_comment_date(), get_comment_time() )
							)
						);
						?>
					</div><!-- END .comment-author .vcard -->
				</footer>

				<div class="comment-content">
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'portfolio-lite' ); ?></em>
					<br />
				<?php endif; ?>
					<?php comment_text(); ?>
					<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'portfolio-lite' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
					<?php edit_comment_link( esc_html__( '(Edit)', 'portfolio-lite' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

			</article><!-- #comment-## -->

		<?php
		break;
		endswitch;
	}
endif; // Ends check for portfolio_lite_comment().

/*
-------------------------------------------------------------------------------------------------------
	Custom Excerpt
-------------------------------------------------------------------------------------------------------
*/

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Portfolio Lite 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function portfolio_lite_excerpt_more( $more_link ) {
	if ( is_admin() ) {
		return $more_link;
	}

	$more_link = sprintf( '<p class="more-link-wrapper"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue Reading<span class="screen-reader-text"> "%s"</span>', 'portfolio-lite' ), get_the_title( get_the_ID() ) )
	);
	return $more_link;
}
add_filter( 'excerpt_more', 'portfolio_lite_excerpt_more' );

/**
 * Adds paragraph wrapper to more tags.
 *
 * @since Portfolio Lite 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function portfolio_lite_more_link( $more_link ) {
	if ( is_admin() ) {
		return $more_link;
	}

	$more_link = sprintf( '<p class="more-link-wrapper"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue Reading<span class="screen-reader-text"> "%s"</span>', 'portfolio-lite' ), get_the_title( get_the_ID() ) )
	);
	return $more_link;
}
add_filter( 'the_content_more_link', 'portfolio_lite_more_link', 10, 2 );

/*
-------------------------------------------------------------------------------------------------------
	Custom Page Links
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds custom page links to pages.
 *
 * @param array $args for page links.
 * @return array
 */

if ( ! function_exists( 'portfolio_lite_wp_link_pages_args_prevnext_add' ) ) :

function portfolio_lite_wp_link_pages_args_prevnext_add( $args ) {
	global $page, $numpages, $more, $pagenow;

	if ( ! $args['next_or_number'] == 'next_and_number' ) {
		return $args; }

	$args['next_or_number'] = 'number'; // Keep numbering for the main part.
	if ( ! $more ) {
		return $args; }

	if ( $page -1 ) { // There is a previous page.
		$args['before'] .= _wp_link_page( $page -1 )
			. $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'; }

	if ( $page < $numpages ) { // There is a next page.
		$args['after'] = _wp_link_page( $page + 1 )
			. $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
			. $args['after']; }

	return $args;
}
endif;
add_filter( 'wp_link_pages_args', 'portfolio_lite_wp_link_pages_args_prevnext_add' );

/*
-------------------------------------------------------------------------------------------------------
	Remove First Gallery
-------------------------------------------------------------------------------------------------------
*/

/**
 * Removes first gallery shortcode from slideshow page template.
 *
 * @param array $content Content output on slideshow page template.
 * @return array
 */

if ( ! function_exists( 'portfolio_lite_remove_gallery' ) ) :

function portfolio_lite_remove_gallery( $content ) {
	if ( is_page_template( 'template-slideshow.php' ) && get_post_gallery() || is_single() && get_post_gallery() ) {
		$regex = get_shortcode_regex( array( 'gallery' ) );
		$content = preg_replace( '/'. $regex .'/s', '', $content, 1 );
		$content = $content;
	}
	return $content;
}
endif;
add_filter( 'the_content', 'portfolio_lite_remove_gallery' );

/*
-------------------------------------------------------------------------------------------------------
	Body Class
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

if ( ! function_exists( 'portfolio_lite_body_class' ) ) :

function portfolio_lite_body_class( $classes ) {

	$header_image = get_header_image();
	$post_pages = is_home() || is_archive() || is_search() || is_attachment();
	$slide_pages = is_page_template( 'template-slideshow-gallery.php' );

	if ( $slide_pages ) {
		$classes[] = 'portfolio-slideshow'; }

	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
		$classes[] = 'portfolio-has-logo';
	} else {
		$classes[] = 'portfolio-no-logo';
	}

	if ( '' != get_theme_mod( 'portfolio_lite_site_title', '1' ) ) {
		$classes[] = 'portfolio-has-title';
	} else {
		$classes[] = 'portfolio-no-title';
	}

	if ( '' != get_theme_mod( 'portfolio_lite_site_tagline', '1' ) ) {
		$classes[] = 'portfolio-has-desc';
	} else {
		$classes[] = 'portfolio-no-desc';
	}

	if ( ! is_single() ) {
		$classes[] = 'portfolio-not-single'; }

	if ( is_singular() && ! has_post_thumbnail() ) {
		$classes[] = 'portfolio-no-img'; }

	if ( is_singular() && has_post_thumbnail() ) {
		$classes[] = 'portfolio-has-img'; }

	if ( $post_pages && ! empty( $header_image ) || is_page() && ! has_post_thumbnail() && ! empty( $header_image ) || is_single() && ! has_post_thumbnail() && ! empty( $header_image ) ) {
		$classes[] = 'portfolio-header-active';
	} else {
		$classes[] = 'portfolio-header-inactive';
	}

	if ( is_singular() ) {
		$classes[] = 'portfolio-singular';
	}

	if ( is_page() && is_active_sidebar( 'sidebar-1' ) || is_home() && is_active_sidebar( 'sidebar-blog' ) || is_category( 'blog' ) && is_active_sidebar( 'sidebar-blog' ) || is_archive() && is_active_sidebar( 'sidebar-blog' ) || is_search() && is_active_sidebar( 'sidebar-blog' ) ) {
		$classes[] = 'portfolio-has-sidebar';
	} else {
		$classes[] = 'portfolio-no-sidebar';
	}

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'portfolio-sidebar-1';
	}

	if ( '' != get_theme_mod( 'background_image' ) ) {
		// This class will render when a background image is set
		// regardless of whether the user has set a color as well.
		$classes[] = 'portfolio-background-image';
	} else if ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ), true ) ) {
		// This class will render when a background color is set
		// but no image is set. In the case the content text will
		// Adjust relative to the background color.
		$classes[] = 'portfolio-relative-text';
	}

	return $classes;
}
endif;
add_action( 'body_class', 'portfolio_lite_body_class' );

/*
-------------------------------------------------------------------------------------------------------
	Includes
-------------------------------------------------------------------------------------------------------
*/

require_once( get_template_directory() . '/customizer/customizer.php' );
require_once( get_template_directory() . '/includes/typefaces.php' );
require_once( get_template_directory() . '/includes/plugin-activation.php' );
require_once( get_template_directory() . '/includes/plugin-activation-class.php' );
