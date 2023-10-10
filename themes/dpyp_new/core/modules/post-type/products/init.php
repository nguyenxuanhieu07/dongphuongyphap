<?php
require_once dirname(__FILE__) . '/meta-box.php';
if (!function_exists('wb_create_post_type_products')) {
	function wb_create_post_type_products()
	{
		if (current_user_can('user_aprove_comments'))
			return;
		$labels  = array(
			'name'                  => _x('Sản Phẩm', 'Post Type Name', 'dongphuong_yphap'),
			'singular_name'         => _x('Sản Phẩm', 'Post Type Singular Name', 'dongphuong_yphap'),
			'menu_name'             => __('Sản Phẩm', 'dongphuong_yphap'),
			'name_admin_bar'        => __('Sản Phẩm', 'dongphuong_yphap'),
			'archives'              => __('Tất cả Sản Phẩm', 'dongphuong_yphap'),
			'parent_item_colon'     => __('Parent Item:', 'dongphuong_yphap'),
			'all_items'             => __('Tất cả Sản Phẩm', 'dongphuong_yphap'),
			'add_new_item'          => __('Thêm Sản Phẩm', 'dongphuong_yphap'),
			'add_new'               => __('Thêm mới', 'dongphuong_yphap'),
			'new_item'              => __('New Event', 'dongphuong_yphap'),
			'edit_item'             => __('Edit Item', 'dongphuong_yphap'),
			'update_item'           => __('Update Item', 'dongphuong_yphap'),
			'view_item'             => __('View Item', 'dongphuong_yphap'),
			'search_items'          => __('Search Item', 'dongphuong_yphap'),
			'not_found'             => __('Not found', 'dongphuong_yphap'),
			'not_found_in_trash'    => __('Not found in Trash', 'dongphuong_yphap'),
			'featured_image'        => __('Featured Image', 'dongphuong_yphap'),
			'set_featured_image'    => __('Set featured image', 'dongphuong_yphap'),
			'remove_featured_image' => __('Remove featured image', 'dongphuong_yphap'),
			'use_featured_image'    => __('Use as featured image', 'dongphuong_yphap'),
			'insert_into_item'      => __('Insert into item', 'dongphuong_yphap'),
			'uploaded_to_this_item' => __('Uploaded to this item', 'dongphuong_yphap'),
			'items_list'            => __('Items list', 'dongphuong_yphap'),
			'items_list_navigation' => __('Items list navigation', 'dongphuong_yphap'),
			'filter_items_list'     => __('Filter items list', 'dongphuong_yphap'),
		);
		$rewrite = array(
			'slug'       => 'san-pham',
			'with_front' => true,
			'pages'      => true,
			'feeds'      => true,
		);
		$args    = array(
			'label'               => __('Sản Phẩm', 'dongphuong_yphap'),
			'description'         => __('Tổng hợp những Sản Phẩm', 'dongphuong_yphap'),
			'labels'              => $labels,
			'supports'            => array('title', 'editor', 'author', 'thumbnail', 'comments', 'revisions'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 10,
			'menu_icon'           => 'dashicons-archive',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
		);
		register_post_type('product', $args);
	}
	add_action('init', 'wb_create_post_type_products', 0);
}

if (!function_exists('wb_create_products_cat')) {

	function wb_create_products_cat()
	{
		$labels  = array(
			'name'                       => _x('Chuyên mục sản phẩm', 'Taxonomy General Name', 'dongphuong_yphap'),
			'singular_name'              => _x('Chuyên mục sản phẩm', 'Taxonomy Singular Name', 'dongphuong_yphap'),
			'menu_name'                  => __('Chuyên mục sản phẩm', 'dongphuong_yphap'),
			'all_items'                  => __('Tất cả Chuyên mục sản phẩm', 'dongphuong_yphap'),
			'parent_item'                => __('Chuyên mục cha', 'dongphuong_yphap'),
			'parent_item_colon'          => __('Chuyên mục cha', 'dongphuong_yphap'),
			'new_item_name'              => __('Thêm chuyên mục', 'dongphuong_yphap'),
			'add_new_item'               => __('Thêm mới Chuyên mục sản phẩm', 'dongphuong_yphap'),
			'edit_item'                  => __('Chỉnh sửa', 'dongphuong_yphap'),
			'update_item'                => __('Cập nhập', 'dongphuong_yphap'),
			'view_item'                  => __('Xem chuyên mục', 'dongphuong_yphap'),
			'separate_items_with_commas' => __('Separate items with commas', 'dongphuong_yphap'),
			'add_or_remove_items'        => __('Add or remove items', 'dongphuong_yphap'),
			'choose_from_most_used'      => __('Choose from the most used', 'dongphuong_yphap'),
			'popular_items'              => __('Popular Items', 'dongphuong_yphap'),
			'search_items'               => __('Search Items', 'dongphuong_yphap'),
			'not_found'                  => __('Not Found', 'dongphuong_yphap'),
			'no_terms'                   => __('No items', 'dongphuong_yphap'),
			'items_list'                 => __('Items list', 'dongphuong_yphap'),
			'items_list_navigation'      => __('Items list navigation', 'dongphuong_yphap'),
		);
		$rewrite = array(
			'slug'         => 'chuyen-muc',
			'with_front'   => true,
			'hierarchical' => true,
		);
		$args    = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'rewrite'           => $rewrite,
		);
		register_taxonomy('product_cat', array('product'), $args);

	}
	add_action('init', 'wb_create_products_cat', 0);
}

if (!function_exists('add_to_cart_section')) {
	function add_to_cart_section()
	{
		session_start();
		$quantity   = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
		$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
		if (!isset($cart)) {
			$cart = [];
		}
		if (isset($_SESSION["cart"])) {
			$cart = $_SESSION["cart"];
		}
		if ($product_id) {
			$product_name  = rwmb_meta('product-name', '', $product_id) ? rwmb_meta('product-name', '', $product_id) : get_the_title($product_id);
			$product_price = rwmb_meta('product-price', '', $product_id) ? rwmb_meta('product-price', '', $product_id) : 0;
			$sale_price    = rwmb_meta('product-sale', '', $product_id) ? rwmb_meta('product-sale', '', $product_id) : 0;
			$total_cart   = 0;
			$regular_price = $product_price;
			if ($sale_price > 0) {
				$regular_price = $sale_price;
			}
			$total_price       = $regular_price * $quantity;
			$cart['cart-item'][$product_id] = array(
				'product_name'  => $product_name,
				'regular_price' => $regular_price,
				'quantity'      => $quantity,
				'total_price'   => $total_price,
				'product_id'    => $product_id,
			);
			foreach ($cart['cart-item'] as $key => $cart_item) {
				$total_cart += $cart_item['total_price'];
			}
			$_SESSION["cart"]  = $cart;
			$_SESSION["cart"]['cart-total'] = $total_cart;
			$mess['success']   = 1;
		} else {
			$mess['success'] = 0;
		}
		wp_send_json($mess);
	}
}
add_action('wp_ajax_add_to_cart_section', 'add_to_cart_section');
add_action('wp_ajax_nopriv_add_to_cart_section', 'add_to_cart_section');

function format_price($price)
{
	$format_price = number_format($price, 0, ",", ".");
	return $format_price;
}
function product_scripts()
{
	$options = get_option('dongphuong-setting-products');
	$page_id = isset($options['page-checkout']) ? $options['page-checkout'] : 0;
	if ($page_id) {
		$link_checkout = get_page_link($page_id);
		wp_localize_script('main-js', 'checkout', array('url' => $link_checkout));
	}
}
add_action('wp_enqueue_scripts', 'product_scripts');