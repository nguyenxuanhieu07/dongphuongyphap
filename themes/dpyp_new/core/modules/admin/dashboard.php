<?php
/**
 * Disable Default Dashboard Widgets
 */
if ( ! function_exists( 'wb_disable_default_dashboard' ) ) :
	function wb_disable_default_dashboard() {
		global $wp_meta_boxes;
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
	}
	add_action('wp_dashboard_setup', 'wb_disable_default_dashboard', 999);
endif;

/**
 * Disable Yoast SEO overview
 */
if ( ! function_exists( 'wb_remove_wpseo_dashboard' ) ) :
	function wb_remove_wpseo_dashboard() {
		remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'side' );
	}
	add_action('wp_dashboard_setup', 'wb_remove_wpseo_dashboard' );
endif;