<?php
if( !function_exists('category_term') ){
    function category_term( $meta_boxes ) {

        $meta_boxes[] = array(
            'title'      => '',
            'taxonomies' => 'category',

            'fields' => array(
                array(
                    'name' => 'Giao diện chuyên khoa',
                    'id'   => 'chuyen_khoa_theme',
                    'type' => 'checkbox',
                    'std'  => 0,
                ),
            )
        );

        return $meta_boxes;
    }
    add_filter( 'rwmb_meta_boxes', 'category_term' );
}