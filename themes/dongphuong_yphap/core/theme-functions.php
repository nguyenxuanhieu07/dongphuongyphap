<?php

define('THEME_URI', get_template_directory_uri());
define('MTB_DIR', get_template_directory() . '/core/extensions/meta-box/');
require_once(MTB_DIR) . 'meta-box.php';
require_once(MTB_DIR) . 'extensions/mb-settings-page/mb-settings-page.php';
require_once(MTB_DIR) . 'extensions/meta-box-group/meta-box-group.php';
require_once(MTB_DIR) . 'extensions/mb-term-meta/mb-term-meta.php';
require_once(MTB_DIR) . 'extensions/meta-box-tabs/meta-box-tabs.php';
require_once(MTB_DIR) . 'extensions/mb-user-meta/mb-user-meta.php';
require_once(MTB_DIR) . 'extensions/meta-box-include-exclude/meta-box-include-exclude.php';
require_once(MTB_DIR) . 'extensions/meta-box-conditional-logic/meta-box-conditional-logic.php';
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dongphuong_yphap_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dongphuong_yphap, use a find and replace
	 * to change 'dongphuong_yphap' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('dongphuong_yphap', get_template_directory() . '/languages');

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
			'primary' => esc_html__('Menu chính'),
			'footer'  => esc_html__('Menu footer'),
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
			'dongphuong_yphap_custom_background_args',
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
add_action('after_setup_theme', 'dongphuong_yphap_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dongphuong_yphap_content_width()
{
	$GLOBALS['content_width'] = apply_filters('dongphuong_yphap_content_width', 640);
}
add_action('after_setup_theme', 'dongphuong_yphap_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dongphuong_yphap_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'dongphuong_yphap'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'dongphuong_yphap'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'dongphuong_yphap_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function dongphuong_yphap_scripts()
{
	wp_enqueue_script('jquery-min', get_template_directory_uri() . '/js/jquery.min.js', array(), '221414', true);
	wp_enqueue_script('jquery-datepicker', get_template_directory_uri() . '/assets/color-picker/jquery-clockpicker.min.js', array(), '221414', true);
	wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/assets/jquery-ui-1.12.1/jquery-ui.min.js', array(), '221414', true);
	wp_enqueue_script('slick', get_template_directory_uri() . '/assets/slick/slick.min.js', array(), '221414', true);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js?2', array('jquery'), '2', true);
	wp_localize_script('main-js', 'vmajax', array('ajaxurl' => admin_url('admin-ajax.php')));
	// font-awesome
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css');
	// chỉ trang chủ
	if (is_home() || is_front_page() || is_post_type_archive('video')) {
		// slick
		wp_enqueue_script('slick', get_template_directory_uri() . '/assets/slick/slick.min.js', array(), '', true);
		wp_enqueue_style('slick', get_template_directory_uri() . '/assets/slick/slick.css');
		wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css');
	}
	// bootstrap
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array(), '', true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	wp_dequeue_style('wp-block-library');
	wp_enqueue_style('jquery-datepicker', get_template_directory_uri() . '/assets/color-picker/jquery-clockpicker.min.css');
	wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/assets/jquery-ui-1.12.1/jquery-ui.min.css');
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/slick/slick.css');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css');
	wp_enqueue_style('main-css', get_template_directory_uri() . '/css/styles.min.css');
	wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'dongphuong_yphap_scripts');
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
/**
 * Insert function help dev
 */
require_once(__DIR__) . '/theme-help.php';
/**
 * Insert function widget
 */
require_once(__DIR__) . '/modules/menu/init.php';

/**
 * Insert function testinomail
 */
require_once(__DIR__) . '/modules/post-type/init.php';

/**
 * Insert function category
 */
require_once(__DIR__) . '/modules/theme-form/init.php';

/**
 * Insert function option
 */
require_once(__DIR__) . '/modules/theme-options/theme-option.php';

/**
 * Insert function comment
 */
require_once(__DIR__) . '/modules/comment/init.php';
/**
 * Insert function cart
 */
require_once(__DIR__) . '/modules/cart/init.php';

/**
 * disable block editor
 */

add_filter('use_block_editor_for_post', '__return_false');
//add “noindex, nofollow” to all search results pages

add_filter('wpseo_robots', 'yoast_seo_robots_modify_search');
function yoast_seo_robots_modify_search($robots)
{
	if (is_search()) {
		return "noindex, nofollow";
	} else {
		return $robots;
	}
}

/**
 * ẩn editor
 */
function hide_editor()
{
	$post_type = array('products');
	foreach ($post_type as $key => $value) {
		remove_post_type_support($value, 'editor');
	}

	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	if (!isset($post_id))
		return;
	$template                 = get_post_meta($post_id, '_wp_page_template', true);
	$templates_to_hide_editor = array(
		'template-pages/archive-author.php',
		'template-pages/page-basis.php',
		'template-pages/check-out.php',
		'template-pages/contact.php',
	);
	if (in_array($template, $templates_to_hide_editor)) {
		remove_post_type_support('page', 'editor');
	}
}
add_action('init', 'hide_editor');