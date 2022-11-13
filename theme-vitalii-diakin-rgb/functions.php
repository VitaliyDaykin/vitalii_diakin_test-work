<?php

/**
 * Ukrainian Box functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ukrainian_Box
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}


## Отключает Гутенберг (новый редактор блоков в WordPress).
## ver: 1.2
if ('disable_gutenberg') {
	remove_theme_support('core-block-patterns'); // WP 5.5

	add_filter('use_block_editor_for_post_type', '__return_false', 100);

	// отключим подключение базовых css стилей для блоков
	// ВАЖНО! когда выйдут виджеты на блоках или что-то еще, эту строку нужно будет комментировать
	remove_action('wp_enqueue_scripts', 'wp_common_block_scripts_and_styles');

	// Move the Privacy Policy help notice back under the title field.
	add_action('admin_init', function () {
		remove_action('admin_notices', ['WP_Privacy_Policy_Content', 'notice']);
		add_action('edit_form_after_title', ['WP_Privacy_Policy_Content', 'notice']);
	});
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ukrainian_box_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Ukrainian Box, use a find and replace
		* to change 'ukrainian-box' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('ukrainian-box', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'ukrainian-box'),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ukrainian_box_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'ukrainian_box_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ukrainian_box_content_width()
{
	$GLOBALS['content_width'] = apply_filters('ukrainian_box_content_width', 640);
}
add_action('after_setup_theme', 'ukrainian_box_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ukrainian_box_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'ukrainian-box'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'ukrainian-box'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'ukrainian_box_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ukrainian_box_scripts()
{
	wp_enqueue_style('style.min', get_template_directory_uri() . '/assets/css/style.min.css');
	wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/style.css');

	wp_enqueue_script('app.min', get_template_directory_uri() . '/assets/js/app.min.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'ukrainian_box_scripts');

add_image_size('card-image', 346, 192, true);
add_image_size('card-icons', 58, 58, true);

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
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}