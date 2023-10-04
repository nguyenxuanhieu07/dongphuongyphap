<?php
if ( ! function_exists( 'wb_get_primary_term' ) ) {
    function wb_get_primary_term($post_id, $taxonomy = 'category'){
        $terms = get_the_terms($post_id, $taxonomy);
        if ($terms){        
            if ( class_exists('WPSEO_Primary_Term') ){
                $wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, get_the_id() );
                $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
                $term = get_term( $wpseo_primary_term,$taxonomy );
                if (is_wp_error($term)) { 
                    $term_primary = $terms[0]->slug;
                } else { 
                    // Yoast Primary category
                    $term_primary = $term->slug;
                }
            } 
            else {
                $term_primary = $terms[0]->slug;
            }
        }
        return $term_primary;
    }
}

require_once dirname(__FILE__). '/output.php';
// Create settings page
add_filter( 'mb_settings_pages', 'tdt_hotline_settings' );
function tdt_hotline_settings( $settings_pages ){
    $settings_pages[] = array(
        'id'            => 'hotline-options',
        'option_name'   => 'hotline_options',
        'menu_title'    => __( 'HOTLINE' ),
        'icon_url'      => 'dashicons-editor-kitchensink',
        'submenu_title' => 'Options',
    );
    return $settings_pages;
}
add_filter( 'rwmb_meta_boxes', 'tdt_hotline_fields' );
// add metabox file
function tdt_hotline_fields( $meta_boxes ) {

    $meta_boxes[] = array(
        'title'  => __( 'Bài viết (post)' ),
        'settings_pages' => 'hotline-options',
        'fields' => array(        
            array(
                'name' => 'Ẩn / Hiện hotline',
                'id'   => 'hotline_post_status',
                'type' => 'checkbox',
                'std'  => 1,
            ),
            array(
                'name'  => 'Số hotline mặc định',
                'id'    => 'hotline_post_default',
                'type'  => 'text',
                'std'   => '097.457.3434'
            ),
            array(
                'name'  => 'Zalo mặc định',
                'id'    => 'zalo_post_default',
                'type'  => 'text',
            ),
            array(
                'name'  => 'Messenger mặc định',
                'id'    => 'messenger_post_default',
                'type'  => 'text',
                'std'   => 'https://m.me/dongphuongyphap.tdt',
                'size'  => 100
            ),
            array(
                'name' => __( 'Số hotline chuyên mục' ),
                'id'     => 'hotline-post-group',
                'type'   => 'group',
                'clone'  => true,
                'sort_clone'  => true,
                'collapsible' => true,
                'group_title' => array( 'field' => 'category' ),
                'save_state' => true,
                'add_button' => 'Thêm số mới',
                'fields' => array(
                    array(
                        'name' => 'Ẩn / Hiện hotline',
                        'id'   => 'hotline_status',
                        'type' => 'checkbox',
                        'std'  => 1,
                    ),
                    array(
                        'name'       => 'Chuyên mục',
                        'id'         => 'category',
                        'type'       => 'taxonomy',
                        'taxonomy'   => 'category',
                        'field_type' => 'select_advanced',
                    ),
                    array(
                        'name'  => 'Số hotline',
                        'id'    => 'hotline-number',
                        'type'  => 'text',
                    ),
                    array(
                        'name'  => 'Số zalo',
                        'id'    => 'zalo-number',
                        'type'  => 'text',
                    ),
                    array(
                        'name'  => 'Đường dẫn messenger',
                        'id'    => 'messenger-link',
                        'type'  => 'text',
                        'size'  => 100
                    ),
                ),
            ),
        ),
    );
    $meta_boxes[] = array(
        'post_types' => 'post',
        'title'      => 'CTA riêng cho bài viết',
        'context'    => 'side',
        'priority'   => 'high',     
        'fields' => array(
            array(
                'name'  => 'Số hotline',
                'id'    => 'post_hotline_number',
                'type'  => 'text',
            ),
            array(
                'name'  => 'Số zalo',
                'id'    => 'post_zalo_number',
                'type'  => 'text',
            ),
            array(
                'name'  => 'Đường dẫn messenger',
                'id'    => 'post_messenger_link',
                'type'  => 'text',
                'size'  => 100
            ),
        ),
    );

    return $meta_boxes;
}