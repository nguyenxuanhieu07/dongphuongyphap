<?php
if ( ! function_exists( 'wb_add_nofollow' ) ) :
    function wb_add_nofollow() {
        wp_deregister_script('wplink');
        wp_register_script('wplink', THEME_URI. '/core/modules/admin/js/nofollow.min.js', array('jquery'), '1.07', 1);
        wp_enqueue_script('wplink');
        wp_localize_script('wplink', 'wpLinkL10n', array(
            'title' => __('Insert/edit link'),
            'update' => __('Update'),
            'save' => __('Add Link'),
            'noTitle' => __('(no title)'),
            'labelTitle' => __( 'Title' ),
            'noMatchesFound' => __('No results found.'),
            'noFollow' => __(' Add <code>rel="nofollow"</code> to link', 'title-and-nofollow-for-links')
        ));
    }
    add_action('wp_enqueue_editor', 'wb_add_nofollow', 99999);
endif;


if ( ! function_exists( 'wb_add_nofollow_early' ) ) :
    function wb_add_nofollow_early() {
        if ( ! wp_script_is( 'wplink', 'registered' ) ) {
            return;
        }
        wp_deregister_script('wplink');
        wp_register_script('wplink', THEME_URI. '/core/modules/admin/js/nofollow.min.js', array('wp-a11y'), '1.07', 1);
        wp_localize_script('wplink', 'wpLinkL10n', array(
            'title' => __('Insert/edit link'),
            'update' => __('Update'),
            'save' => __('Add Link'),
            'noTitle' => __('(no title)'),
            'labelTitle' => __( 'Title' ),
            'noMatchesFound' => __('No results found.'),
            'noFollow' => __(' Add <code>rel="nofollow"</code> to link', 'title-and-nofollow-for-links')
        ));
    }
    add_action('admin_enqueue_scripts', 'wb_add_nofollow_early', 99999 );
endif;
