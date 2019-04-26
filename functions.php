<?php
/**
 * hivemind functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hivemind
 */

if ( ! function_exists( 'hivemind_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hivemind_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on hivemind, use a find and replace
		 * to change 'hivemind' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hivemind', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'hivemind' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'hivemind_custom_background_args', array(
			'default-color' => '#0D0D15',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'hivemind_setup' );

function add_search_box( $items, $args ) {
	$items .= '<li>' . get_search_form( false ) . '</li>';
	return $items;
}
add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );

function hivemind_add_editor_style() {
	add_editor_style('dist/css/editor-style.css');
}
add_action('admin_init', 'hivemind_add_editor_style');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hivemind_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'hivemind_content_width', 1140 );
}
add_action( 'after_setup_theme', 'hivemind_content_width', 0 );

// Include custom JQuery
// function hivemind_include_custom_jquery() {
// 	if (! is_admin() ) {
// 		wp_deregister_script('jquery');
// 		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), null, false);
// 	}
// }
// add_action('init', 'hivemind_include_custom_jquery');

// The Excerpt Length
function tn_custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

// Comments
function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom');

function wpbeginner_remove_comment_url($arg) {
    $arg['url'] = '';
    return $arg;
}
add_filter('comment_form_default_fields', 'wpbeginner_remove_comment_url');

// Adds post link to thumbnail image
function my_post_image_html( $html, $post_id, $post_image_id ) {
  $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
  return $html;
}
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

/**
 * Enqueue scripts and styles.
 */
function hivemind_scripts() {
	wp_enqueue_style('hivemind-bs-css', get_template_directory_uri() . '/dist/css/bootstrap.min.css');

	wp_enqueue_style('hivemind-fontawsome', get_template_directory_uri() . '/fonts/font-awsome/css/fontawesome.min.css');

	wp_enqueue_style( 'hivemind-style', get_stylesheet_uri() );

	wp_enqueue_script('main', get_template_directory_uri() . '/src/js/main.js', array(), '', true);	

	wp_enqueue_script('pooper', get_template_directory_uri() . '/src/js/pooper.min.js', array(), '', true);	

	wp_enqueue_script('pace', get_template_directory_uri() . '/src/js/pace.js', array(), '', true);	

	wp_enqueue_script('hivemind-bootstrap', get_template_directory_uri() . '/src/js/bootstrap.min.js', array('jquery'), '', true);

	wp_enqueue_script('hivemind-bootstrap-hover', get_template_directory_uri() . '/src/js/bootstrap-hover.js', array('jquery'), '', true);

	wp_enqueue_script('hivemind-nav-scroll', get_template_directory_uri() . '/src/js/nav-scroll.js', array('jquery'), '', true);

	wp_enqueue_script( 'hivemind-skip-link-focus-fix', get_template_directory_uri() . '/src/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hivemind_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Widgets File.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Bootstrap Navwalker File.
 */
require get_template_directory() . '/inc/boostrap-wp-navwalker.php';

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
