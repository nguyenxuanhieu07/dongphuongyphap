<?php
// Create settings page
if( ! function_exists('theme_option_settings_pages')){
    function theme_option_settings_pages( $settings_pages ){
        $settings_pages[] = array(
            'id'            => 'option_pages',
            'option_name'   => 'option_pages',
            'menu_title'    => 'Theme Options' ,
            'icon_url'      => 'dashicons-admin-generic',
        );

        $settings_pages[] = array(
            'id'          => 'option_form',
            'option_name' => 'option_form',
            'menu_title'  => 'Cài đặt - Form',
            'parent'      => 'option_pages',
        );

        return $settings_pages;
    }
}
add_filter( 'mb_settings_pages', 'theme_option_settings_pages' );


// add metabox file
if( !function_exists('theme_option_meta_box')){
    function theme_option_meta_box( $meta_boxes ) {

        $meta_boxes[] = array(
            'title'          => 'Home - SLIDE',
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'id'     => 'slide_primary_group',
                    'type'   => 'group',
                    'clone'       => true,
                    'sort_clone'    => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title'   => array('field' => 'slide_name'),
                    'fields'         => array(
                        array(
                            'name' => 'Tiêu đề slide',
                            'id'   => 'slide_name',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Slide PC',
                            'id'   => 'slide_image_pc',
                            'desc' => 'Kích thước ảnh (1920x670)',
                            'type' => 'image_advanced',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Slide Mobile',
                            'id'   => 'slide_image_mb',
                            'type' => 'image_advanced',
                            'desc' => 'Kích thước ảnh (550x580)',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Slide link',
                            'id'   => 'slide_link',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'          => 'Home - DỊCH VỤ',
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'id'     => 'remedial_group',
                    'type'   => 'group',
                    'clone'       => true,
                    'sort_clone'    => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title'   => array('field' => 'remedial_name'),
                    'fields'         => array(
                        array(
                            'name' => 'Ảnh Phương pháp',
                            'id'   => 'remedial_image',
                            'type' => 'image_advanced',
                            'desc' => 'kích thước ảnh (165x150)',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Tiêu đề',
                            'id'   => 'remedial_name',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Đường dẫn',
                            'id'   => 'remedial_link',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'          => 'Home - GÓI ĐIỀU TRỊ',
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'id'     => 'remedial_group_2',
                    'type'   => 'group',
                    'clone'       => true,
                    'sort_clone'    => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title'   => array('field' => 'remedial_name_2'),
                    'fields'         => array(
                        array(
                            'name' => 'Ảnh',
                            'id'   => 'remedial_image_2',
                            'type' => 'image_advanced',
                            'desc' => 'kích thước ảnh (340X190)',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Tiêu đề',
                            'id'   => 'remedial_name_2',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Đường dẫn',
                            'id'   => 'remedial_link_2',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'          => 'Home - ĐIỀU TRỊ HIỆU QUẢ CÁC BỆNH',
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'id'     => 'medical_group',
                    'type'   => 'group',
                    'clone'       => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title'   => array('field' => 'medical_name'),
                    'fields'         => array(
                        array(
                            'name' => 'Class icon',
                            'id'   => 'medical_icon',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Tiêu đề',
                            'id'   => 'medical_name',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Đường dẫn',
                            'id'   => 'medical_link',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'          => 'Home - VIDEO_KOL',
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'id'     => 'kol_group',
                    'type'   => 'group',
                    'clone'       => true,
                    'sort_clone'    => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title'   => array('field' => 'kol_name'),
                    'fields'         => array(
                        array(
                            'name' => 'Ảnh Video',
                            'id'   => 'kol_image',
                            'type' => 'image_advanced',
                            'desc' => 'kích thước ảnh to (555x312) - ảnh nhỏ(265x145)',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Tiêu đề',
                            'id'   => 'kol_name',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'ID video',
                            'id'   => 'kol_video',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'          => 'Home - CHIA SẺ BÊNH NHÂN',
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'id'     => 'testimonial_group',
                    'type'   => 'group',
                    'clone'       => true,
                    'sort_clone'    => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title'   => array('field' => 'testimonial_name'),
                    'fields'         => array(
                        array(
                            'name' => 'Ảnh đại diện',
                            'id'   => 'testimonial_image',
                            'type' => 'image_advanced',
                            'desc' => 'kích thước ảnh (70x70)',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Tên bệnh nhân',
                            'id'   => 'testimonial_name',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Nội dung ngắn',
                            'id'   => 'testimonial_desc',
                            'type' => 'textarea',
                        ),
                        array(
                            'name' => 'Đường dẫn',
                            'id'   => 'testimonial_link',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'          => 'Home - VIDEO - TIN TỨC & HOẠT ĐỘNG',
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'id'     => 'video_news_group',
                    'type'   => 'group',
                    'clone'       => true,
                    'collapsible' => true,
                    'sort_clone'    => true,
                    'save_state'  => true,
                    'group_title'   => array('field' => 'video_news_name'),
                    'fields'         => array(
                        array(
                            'name' => 'Ảnh Video',
                            'id'   => 'video_news_image',
                            'type' => 'image_advanced',
                            'desc' => 'kích thước ảnh to (635x355) - ảnh nhỏ(200x115)',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Tiêu đề',
                            'id'   => 'video_news_name',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Đường dẫn',
                            'id'   => 'video_news_link',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'          => 'Home - Album',
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'name' => 'Logo đối tác',
                    'id'   => 'album_image',
                    'type' => 'image_advanced',
                    'desc' => 'kích thước ảnh (350x260)',
                    'max_file_uploads' => 6,
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'          => 'Home - BÁO CHÍ',
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'id'     => 'newpapper_group',
                    'type'   => 'group',
                    'clone'       => true,
                    'collapsible' => true,
                    'sort_clone'    => true,
                    'save_state'  => true,
                    'group_title'   => array('field' => 'newpapper_name'),
                    'fields'         => array(
                        array(
                            'name' => 'Ảnh Video',
                            'id'   => 'newpapper_image',
                            'type' => 'image_advanced',
                            'desc' => 'kích thước ảnh (255x170)',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Tiêu đề',
                            'id'   => 'newpapper_name',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Logo báo',
                            'id'   => 'newpapper_logo',
                            'type' => 'image_advanced',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Đường dẫn',
                            'id'   => 'newpapper_link',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'          => 'Home - ĐỐI TÁC',
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'name' => 'Logo đối tác',
                    'id'   => 'partner_image',
                    'type' => 'image_advanced',
                    'desc' => 'kích thước ảnh (145x90)',
                    'max_file_uploads' => 10,
                ),
            ),
        );

        return $meta_boxes;
    }
}
add_filter( 'rwmb_meta_boxes', 'theme_option_meta_box' );


// add metabox file
if( !function_exists('form_option_meta_box')){
    function form_option_meta_box( $meta_boxes ) {


        $meta_boxes[] = array(
            'title'  => __( 'Nội dung form đặt lịch khám' ),
            'settings_pages' => 'option_form',
            'fields' => array(
                array(
                    'name'  => 'URL action',
                    'id'    => 'google-form-action',
                    'type'  => 'text',
                    'size'  => 100
                ),
                array(
                    'name'  => 'Họ tên',
                    'id'    => 'google-form-entry-fullname',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Số điện thoại',
                    'id'    => 'google-form-entry-numberphone',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Email',
                    'id'    => 'google-form-entry-email',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Dịch vụ',
                    'id'    => 'google-form-entry-service',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'office',
                    'id'    => 'google-form-entry-office',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Ngày đặt lịch',
                    'id'    => 'google-form-entry-date',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Câu hỏi',
                    'id'    => 'google-form-entry-content',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Nguồn URL (google ads, facebook ads, link báo...) ',
                    'id'    => 'google-form-entry-url',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Nguồn referer_url (google ads, facebook ads, link báo...) ',
                    'id'    => 'google-form-entry-referer-url',
                    'type'  => 'text',
                ),

            ),
        );

        $meta_boxes[] = array(
            'title'  => __( 'Nội dung form liên hệ' ),
            'settings_pages' => 'option_form',
            'fields' => array(
                array(
                    'name'  => 'URL action',
                    'id'    => 'google-form-contact-action',
                    'type'  => 'text',
                    'size'  => 100
                ),
                array(
                    'name'  => 'Họ tên',
                    'id'    => 'google-form-contact-entry-fullname',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Số điện thoại',
                    'id'    => 'google-form-contact-entry-numberphone',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Email',
                    'id'    => 'google-form-contact-entry-email',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Tiêu đề thu',
                    'id'    => 'google-form-contact-entry-subject',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Nội dung',
                    'id'    => 'google-form-contact-entry-content',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Nguồn URL (google ads, facebook ads, link báo...) ',
                    'id'    => 'google-form-contact-entry-url',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Nguồn referer_url (google ads, facebook ads, link báo...) ',
                    'id'    => 'google-form-contact-entry-referer-url',
                    'type'  => 'text',
                ),

            ),
        );

        $meta_boxes[] = array(
            'title'  => __( 'Nội dung form sidebar' ),
            'settings_pages' => 'option_form',
            'fields' => array(
                array(
                    'name'  => 'URL action',
                    'id'    => 'google-form-sidebar-action',
                    'type'  => 'text',
                    'size'  => 100
                ),
                array(
                    'name'  => 'Họ tên',
                    'id'    => 'google-form-sidebar-entry-fullname',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Số điện thoại',
                    'id'    => 'google-form-sidebar-entry-numberphone',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Email',
                    'id'    => 'google-form-sidebar-entry-email',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Nội dung',
                    'id'    => 'google-form-sidebar-entry-content',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Category',
                    'id'    => 'google-form-sidebar-entry-category',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Nguồn URL (google ads, facebook ads, link báo...) ',
                    'id'    => 'google-form-sidebar-entry-url',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Nguồn referer_url (google ads, facebook ads, link báo...) ',
                    'id'    => 'google-form-sidebar-entry-referer-url',
                    'type'  => 'text',
                ),

            ),
        );

        $meta_boxes[] = array(
            'title'  => __( 'Nội dung form footer' ),
            'settings_pages' => 'option_form',
            'fields' => array(
                array(
                    'name'  => 'URL action',
                    'id'    => 'google-form-footer-action',
                    'type'  => 'text',
                    'size'  => 100
                ),
                array(
                    'name'  => 'Họ tên',
                    'id'    => 'google-form-footer-entry-fullname',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Số điện thoại',
                    'id'    => 'google-form-footer-entry-numberphone',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Nguồn URL (google ads, facebook ads, link báo...) ',
                    'id'    => 'google-form-footer-entry-url',
                    'type'  => 'text',
                ),
                array(
                    'name'  => 'Nguồn referer_url (google ads, facebook ads, link báo...) ',
                    'id'    => 'google-form-footer-entry-referer-url',
                    'type'  => 'text',
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'          => 'Footer option - mạng xã hội',
            'settings_pages' => 'option_form',
            'fields'         => array(
                array(
                    'name' => 'Liên kết Facebook',
                    'id'   => 'footer_facebook',
                    'type' => 'text',
                    'size' => 100,
                ),
                
                array(
                    'name' => 'Liên kết instagram',
                    'id'   => 'footer_instagram',
                    'type' => 'text',
                    'size' => 100,
                ),

                array(
                    'name' => 'liên kết Youtube',
                    'id'   => 'footer_youtube',
                    'type' => 'text',
                    'size' => 100,
                ),
            ),
        );


        $meta_boxes[] = array(
            'title'          => 'HOTLINE',
            'settings_pages' => 'option_form',
            'fields'         => array(
                array(
                    'name' => 'Bật/tắt hotline',
                    'id'   => 'hotline_check',
                    'type' => 'checkbox',
                ),
                
                array(
                    'name' => 'Messenger',
                    'id'   => 'hotline_messenger',
                    'type' => 'text',
                    'size' => 100,
                ),

                array(
                    'name' => 'Phone',
                    'id'   => 'hotline_phone',
                    'type' => 'text',
                    'size' => 100,
                ),
            ),
        );

        return $meta_boxes;
    }
}
add_filter( 'rwmb_meta_boxes', 'form_option_meta_box' );