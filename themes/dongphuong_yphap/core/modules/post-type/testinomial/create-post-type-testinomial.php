<?php 
// Register Custom Post Type
function create_post_type_testimonial() {

	$labels = array(
		'name'                  => _x( 'Post Types', 'Post Type General Name', 'dongphuong' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'dongphuong' ),
		'menu_name'             => __( 'Chia sẻ', 'dongphuong' ),
		'name_admin_bar'        => __( 'Chia sẻ', 'dongphuong' ),
		'archives'              => __( 'Item Archives', 'dongphuong' ),
		'attributes'            => __( 'Item Attributes', 'dongphuong' ),
		'parent_item_colon'     => __( 'Parent Item:', 'dongphuong' ),
		'all_items'             => __( 'All Items', 'dongphuong' ),
		'add_new_item'          => __( 'Add New Item', 'dongphuong' ),
		'add_new'               => __( 'Add New', 'dongphuong' ),
		'new_item'              => __( 'New Item', 'dongphuong' ),
		'edit_item'             => __( 'Edit Item', 'dongphuong' ),
		'update_item'           => __( 'Update Item', 'dongphuong' ),
		'view_item'             => __( 'View Item', 'dongphuong' ),
		'view_items'            => __( 'View Items', 'dongphuong' ),
		'search_items'          => __( 'Search Item', 'dongphuong' ),
		'not_found'             => __( 'Not found', 'dongphuong' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dongphuong' ),
		'featured_image'        => __( 'Featured Image', 'dongphuong' ),
		'set_featured_image'    => __( 'Set featured image', 'dongphuong' ),
		'remove_featured_image' => __( 'Remove featured image', 'dongphuong' ),
		'use_featured_image'    => __( 'Use as featured image', 'dongphuong' ),
		'insert_into_item'      => __( 'Insert into item', 'dongphuong' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'dongphuong' ),
		'items_list'            => __( 'Items list', 'dongphuong' ),
		'items_list_navigation' => __( 'Items list navigation', 'dongphuong' ),
		'filter_items_list'     => __( 'Filter items list', 'dongphuong' ),
		);
	$rewrite = array(
		'slug'                  => 'chia-se',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
		);
	$args = array(
		'label'                 => __( 'Testimonial', 'dongphuong' ),
		'description'           => __( 'Post Type Testimonial', 'dongphuong' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
		'taxonomies'            => array( 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-chat',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'create_post_type_testimonial', 0 );