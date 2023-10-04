<?php
// Register Custom Post Type
function create_post_type_video() {

	$labels = array(
		'name'                  => _x( 'Videos', 'Post Type General Name', 'dongphuong' ),
		'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'dongphuong' ),
		'menu_name'             => __( 'Video', 'dongphuong' ),
		'name_admin_bar'        => __( 'Video', 'dongphuong' ),
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
	$args = array(
		'label'                 => __( 'Video', 'dongphuong' ),
		'description'           => __( 'Post Type For Video', 'dongphuong' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		);
	register_post_type( 'video', $args );

}
add_action( 'init', 'create_post_type_video', 0 );

// Register Custom Taxonomy
function create_taxonomy_videocat() {

	$labels = array(
		'name'                       => _x( 'Danh mục video', 'Taxonomy General Name', 'dongphuong' ),
		'singular_name'              => _x( 'Danh mục video', 'Taxonomy Singular Name', 'dongphuong' ),
		'menu_name'                  => __( 'Danh mục video', 'dongphuong' ),
		'all_items'                  => __( 'Tất cả video', 'dongphuong' ),
		'parent_item'                => __( 'Parent Item', 'dongphuong' ),
		'parent_item_colon'          => __( 'Parent Item:', 'dongphuong' ),
		'new_item_name'              => __( 'New Item Name', 'dongphuong' ),
		'add_new_item'               => __( 'Add New Item', 'dongphuong' ),
		'edit_item'                  => __( 'Edit Item', 'dongphuong' ),
		'update_item'                => __( 'Update Item', 'dongphuong' ),
		'view_item'                  => __( 'View Item', 'dongphuong' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'dongphuong' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'dongphuong' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'dongphuong' ),
		'popular_items'              => __( 'Popular Items', 'dongphuong' ),
		'search_items'               => __( 'Search Items', 'dongphuong' ),
		'not_found'                  => __( 'Not Found', 'dongphuong' ),
		'no_terms'                   => __( 'No items', 'dongphuong' ),
		'items_list'                 => __( 'Items list', 'dongphuong' ),
		'items_list_navigation'      => __( 'Items list navigation', 'dongphuong' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'videocat', array( 'video' ), $args );

}
add_action( 'init', 'create_taxonomy_videocat', 0 );