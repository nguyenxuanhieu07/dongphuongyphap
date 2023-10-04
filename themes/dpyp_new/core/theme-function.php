<?php

define('THEME_URI', get_template_directory_uri());

if (!function_exists('theme_setup')):

	function theme_setup()
	{

		load_theme_textdomain('theme', get_template_directory() . '/languages');
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
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
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('ntn_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)
		));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
		);
	}
endif;
add_action('after_setup_theme', 'theme_setup');

/**
 * Register widget area.
 */
function theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('SỐNG KHỎE - List category'),
			'id'            => 'heal_page',
			'description'   => esc_html__('Add widgets here.'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('LIST LINK - List category gom bài viết'),
			'id'            => 'target_list_page',
			'description'   => esc_html__('Add widgets here.'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function theme_scripts()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.min.js?2', array(), '2', true);
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
	wp_enqueue_style('main-css', get_template_directory_uri() . '/css/styles.min.css');
	wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_scripts');

function add_meta_tags()
{
	echo '<meta name="author" content="Chuongnv_0966.486.366">';
}
add_action('wp_head', 'add_meta_tags');

/**
 * Add theme metabox
 */
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
 * Insert function help dev
 */
require_once(__DIR__) . '/theme-help.php';
/**
 * Module Admin
 */
require_once(__DIR__) . '/modules/admin/init.php';

/**
 * Insert function comment
 */
require_once(__DIR__) . '/modules/comment/init.php';

/**
 * Insert function testinomail
 */
require_once(__DIR__) . '/modules/post-type/init.php';

/**
 * Insert function category
 */
require_once(__DIR__) . '/modules/category/init.php';

/**
 * Insert function category
 */
require_once(__DIR__) . '/modules/theme-form/init.php';

/**
 * Insert function option
 */
require_once(__DIR__) . '/modules/theme-options/theme-option.php';

/**
 * Insert function widget
 */
require_once(__DIR__) . '/modules/menu/init.php';

/**
 * Insert function widget
 */
require_once(__DIR__) . '/modules/widget/init.php';

/**
 * Insert function widget
 */
require_once(__DIR__) . '/modules/load-more/load-more.php';

/**
 * Insert function widget
 */
require_once(__DIR__) . '/modules/schema/init.php';

/**
 * Insert function 
 */
require_once(__DIR__) . '/modules/set_date/init.php';

/**
 * Insert function 
 */
require_once(__DIR__) . '/modules/hotline/init.php';

/**
 * Modules Structure
 */
require_once(__DIR__) . '/modules/structure/init.php';

/**
 * User
 */
require_once(__DIR__). '/modules/user/init.php';
/**
 * page
 */
require_once(__DIR__). '/modules/page/init.php';

/**
 * disable block editor
 */

add_filter('use_block_editor_for_post', '__return_false');

/**
 * Đếm số lượt view của bài viết
 */
function customSetPostViews($postID)
{
	$countKey = 'post_views_count';
	$count    = get_post_meta($postID, $countKey, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $countKey);
		add_post_meta($postID, $countKey, '1');
	} else {
		$count++;
		update_post_meta($postID, $countKey, $count);
	}
}

/**
 * Ajax function load more comment
 */
add_action('wp_ajax_cloadmore', 'cloadmore');
add_action('wp_ajax_nopriv_cloadmore', 'cloadmore');

function cloadmore()
{

	global $post;
	$post = get_post($_POST['post_id']);
	setup_postdata($post);

	wp_list_comments(
		array(
			'avatar_size'       => 50,
			'page'              => $_POST['cpage'],
			'per_page'          => get_option('comments_per_page'),
			'style'             => 'ol',
			'short_ping'        => true,
			'reply_text'        => 'Trả lời',
			'callback'          => 'adv_theme_comment',
			'reverse_top_level' => true
		)
	);
	die;
}

add_filter('comment_form_defaults', 'custom_reply_title');
function custom_reply_title($defaults)
{
	$defaults['title_reply_before'] = '<span id="reply-title" class="h4 comment-reply-title">';
	$defaults['title_reply_after']  = '</span>';
	return $defaults;
}

add_filter('wpseo_next_rel_link', '__return_false');
add_filter('wpseo_prev_rel_link', '__return_false');



/**
 * =======================
 *  Allows CTV upload image
 *  ======================
 */
if (current_user_can('contributor') && !current_user_can('upload_files')) {
	add_action('admin_init', 'allow_contributor_uploads');
}
if (!function_exists('allow_contributor_uploads')) {
	function allow_contributor_uploads()
	{
		$contributor = get_role('contributor');
		$contributor->add_cap('upload_files');
	}
}

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