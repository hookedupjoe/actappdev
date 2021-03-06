<?php
/*!
 * Theme Name: ActAppDev
 * Theme URI: https://hookedup.com/
 * Author: Joseph Francis
 * Author URI: https://hookedup.com/
 * Description: Theme that includes the Action Application Library by Joseph Francis
 * 
 * License: GNU General Public License v2 or later
 * License URI: LICENSE
 * Text Domain: ActAppDev
 * Tags: developer-library
 *
 * @package ActAppDev
 */

if ( ! defined( 'ACTAPPDEV_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ACTAPPDEV_VERSION', '1.0.8' );
}

add_filter( 'body_class','actapp_body_classes' );
function actapp_body_classes( $classes ) {
	
	if( class_exists('Kodeo_Admin_UI') ){
		$classes[] = 'kodeo-ui-active';
	}
    return $classes;
}

if ( ! function_exists( 'actappdev_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function actappdev_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ActAppDev, use a find and replace
		 * to change '_actappdev' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_actappdev', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		//add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', '_actappdev' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// // Set up the WordPress core custom background feature.
		// add_theme_support(
		// 	'custom-background',
		// 	apply_filters(
		// 		'actappdev_custom_background_args',
		// 		array(
		// 			'default-color' => 'ffffff',
		// 			'default-image' => '',
		// 		)
		// 	)
		// );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'actappdev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// function actappdev_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'actappdev_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'actappdev_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function actappdev_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', '_actappdev' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', '_actappdev' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', '_actappdev' ),
			'id'            => 'sidebar-f',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', '_actappdev' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header', '_actappdev' ),
			'id'            => 'sidebar-h',
			'description'   => esc_html__( 'Add widgets here to appear as your header.', '_actappdev' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

}
add_action( 'widgets_init', 'actappdev_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function actappdev_scripts() {
	wp_enqueue_style( 'actappdev-style', get_stylesheet_uri(), array(), ACTAPPDEV_VERSION );
	//wp_style_add_data( 'actappdev-style', 'rtl', 'replace' );

	//wp_enqueue_script( 'actappdev-navigation', get_template_directory_uri() . '/js/navigation.js', array(), ACTAPPDEV_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'actappdev_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Action App Template Entrypoint.
 */
require get_template_directory() . '/inc/actapptpl.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}



/**
 * Standard disable of stuff we don't want in the admin area
 */
function actappdev_remove_dashboard_meta() {
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Removes the 'incoming links' widget
    remove_meta_box('dashboard_primary', 'dashboard', 'normal'); //Removes the 'WordPress News' widget
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); //Removes the secondary widget
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Removes the 'Quick Draft' widget
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Removes the 'Recent Drafts' widget
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Removes the 'Activity' widget
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //Removes the 'At a Glance' widget
    remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
}
add_action('admin_init', 'actappdev_remove_dashboard_meta');


function actappdev_remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'actappdev_remove_admin_bar');

