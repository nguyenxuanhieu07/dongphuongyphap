<?php
// Create settings page
if (!function_exists('theme_option_settings_pages')) {
    function theme_option_settings_pages($settings_pages)
    {
        $settings_pages[] = array(
            'id'          => 'option_pages',
            'option_name' => 'option_pages',
            'menu_title'  => 'Theme Options',
            'icon_url'    => 'dashicons-admin-generic',
        );
        $settings_pages[] = array(
            'id'          => 'option_home',
            'option_name' => 'option_home',
            'menu_title'  => 'Home option',
            'parent'      => 'option_pages',
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
add_filter('mb_settings_pages', 'theme_option_settings_pages');
// add metabox file
if (!function_exists('theme_option_meta_box')) {
    function theme_option_meta_box($meta_boxes)
    {
        $meta_boxes[] = array(
            'title'          => __('Danh sách cơ sở'),
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'name'        => __('Cơ sở'),
                    'id'          => 'option-basis',
                    'type'        => 'group',
                    'clone'       => true,
                    'sort_clone'  => true,
                    'collapsible' => true,
                    'group_title' => array('field' => 'basis-address'),
                    'add_button'  => 'Thêm cơ sở',
                    'fields'      => array(
                        array(
                            'name' => 'Địa chỉ',
                            'id'   => 'basis-address',
                            'type' => 'text',
                            'size' => 50,
                        ),
                        array(
                            'name' => 'Số điện thoại',
                            'id'   => 'basis-numberphone',
                            'type' => 'text',
                            'size' => 50,
                        ),
                        array(
                            'name' => 'Link Map',
                            'id'   => 'map-link',
                            'type' => 'text',
                            'size' => 50,
                        ),
                        array(
                            'name' => 'iframe Map',
                            'id'   => 'map-iframe',
                            'type' => 'textarea',
                            'size' => 50,
                        ),
                    ),
                ),
            )
        );
        $pages        = get_pages();
        $option_page  = [];
        if (!empty($pages)) {
            foreach ($pages as $key => $value) {
                $option_page[$value->ID] = $value->post_title;
            }
        }
        $meta_boxes[] = array(
            'title'          => __('Trang liên kết'),
            'settings_pages' => 'option_pages',
            'fields'         => array(
                array(
                    'name'        => 'Trang Giỏ hàng',
                    'placeholder' => 'Lựa chọn',
                    'id'          => 'page-cart',
                    'type'        => 'select_advanced',
                    'options'     => $option_page,
                    'multiple'    => false,
                ),
                array(
                    'name'        => 'Trang thanh toán',
                    'placeholder' => 'Lựa chọn',
                    'id'          => 'page-checkout',
                    'type'        => 'select_advanced',
                    'options'     => $option_page,
                    'multiple'    => false,
                ),
                array(
                    'name'        => 'Đặt lịch khám',
                    'placeholder' => 'Lựa chọn',
                    'id'          => 'page-booking',
                    'type'        => 'select_advanced',
                    'options'     => $option_page,
                    'multiple'    => false,
                ),
                
            ),
        );
        return $meta_boxes;
    }
}
add_filter('rwmb_meta_boxes', 'theme_option_meta_box');

// add metabox file
if (!function_exists('home_option_meta_box')) {
    function home_option_meta_box($meta_boxes)
    {

        $meta_boxes[] = array(
            'title'          => 'Home - SLIDE',
            'settings_pages' => 'option_home',
            'fields'         => array(
                array(
                    'id'          => 'slide_primary_group',
                    'type'        => 'group',
                    'clone'       => true,
                    'sort_clone'  => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title' => array('field' => 'slide_name'),
                    'fields'      => array(
                        array(
                            'name' => 'Tiêu đề slide',
                            'id'   => 'slide_name',
                            'type' => 'text',
                        ),
                        array(
                            'name'             => 'Slide PC',
                            'id'               => 'slide_image_pc',
                            'desc'             => 'Kích thước ảnh (1920x670)',
                            'type'             => 'image_advanced',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name'             => 'Slide Mobile',
                            'id'               => 'slide_image_mb',
                            'type'             => 'image_advanced',
                            'desc'             => 'Kích thước ảnh (550x580)',
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
            'settings_pages' => 'option_home',
            'fields'         => array(
                array(
                    'id'          => 'remedial_group',
                    'type'        => 'group',
                    'clone'       => true,
                    'sort_clone'  => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title' => array('field' => 'remedial_name'),
                    'fields'      => array(
                        array(
                            'name'             => 'Ảnh Phương pháp',
                            'id'               => 'remedial_image',
                            'type'             => 'image_advanced',
                            'desc'             => 'kích thước ảnh (165x150)',
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
            'settings_pages' => 'option_home',
            'fields'         => array(
                array(
                    'id'          => 'remedial_group_2',
                    'type'        => 'group',
                    'clone'       => true,
                    'sort_clone'  => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title' => array('field' => 'remedial_name_2'),
                    'fields'      => array(
                        array(
                            'name'             => 'Ảnh',
                            'id'               => 'remedial_image_2',
                            'type'             => 'image_advanced',
                            'desc'             => 'kích thước ảnh (340X190)',
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
            'settings_pages' => 'option_home',
            'fields'         => array(
                array(
                    'id'          => 'medical_group',
                    'type'        => 'group',
                    'clone'       => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title' => array('field' => 'medical_name'),
                    'fields'      => array(
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
            'settings_pages' => 'option_home',
            'fields'         => array(
                array(
                    'id'          => 'kol_group',
                    'type'        => 'group',
                    'clone'       => true,
                    'sort_clone'  => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title' => array('field' => 'kol_name'),
                    'fields'      => array(
                        array(
                            'name'             => 'Ảnh Video',
                            'id'               => 'kol_image',
                            'type'             => 'image_advanced',
                            'desc'             => 'kích thước ảnh to (555x312) - ảnh nhỏ(265x145)',
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
            'settings_pages' => 'option_home',
            'fields'         => array(
                array(
                    'id'          => 'testimonial_group',
                    'type'        => 'group',
                    'clone'       => true,
                    'sort_clone'  => true,
                    'collapsible' => true,
                    'save_state'  => true,
                    'group_title' => array('field' => 'testimonial_name'),
                    'fields'      => array(
                        array(
                            'name'             => 'Ảnh đại diện',
                            'id'               => 'testimonial_image',
                            'type'             => 'image_advanced',
                            'desc'             => 'kích thước ảnh (70x70)',
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
            'settings_pages' => 'option_home',
            'fields'         => array(
                array(
                    'id'          => 'video_news_group',
                    'type'        => 'group',
                    'clone'       => true,
                    'collapsible' => true,
                    'sort_clone'  => true,
                    'save_state'  => true,
                    'group_title' => array('field' => 'video_news_name'),
                    'fields'      => array(
                        array(
                            'name'             => 'Ảnh Video',
                            'id'               => 'video_news_image',
                            'type'             => 'image_advanced',
                            'desc'             => 'kích thước ảnh to (635x355) - ảnh nhỏ(200x115)',
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
            'settings_pages' => 'option_home',
            'fields'         => array(
                array(
                    'name'             => 'Logo đối tác',
                    'id'               => 'album_image',
                    'type'             => 'image_advanced',
                    'desc'             => 'kích thước ảnh (350x260)',
                    'max_file_uploads' => 6,
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'          => 'Home - BÁO CHÍ',
            'settings_pages' => 'option_home',
            'fields'         => array(
                array(
                    'id'          => 'newpapper_group',
                    'type'        => 'group',
                    'clone'       => true,
                    'collapsible' => true,
                    'sort_clone'  => true,
                    'save_state'  => true,
                    'group_title' => array('field' => 'newpapper_name'),
                    'fields'      => array(
                        array(
                            'name'             => 'Ảnh Video',
                            'id'               => 'newpapper_image',
                            'type'             => 'image_advanced',
                            'desc'             => 'kích thước ảnh (255x170)',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Tiêu đề',
                            'id'   => 'newpapper_name',
                            'type' => 'text',
                        ),
                        array(
                            'name'             => 'Logo báo',
                            'id'               => 'newpapper_logo',
                            'type'             => 'image_advanced',
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
            'settings_pages' => 'option_home',
            'fields'         => array(
                array(
                    'name'             => 'Logo đối tác',
                    'id'               => 'partner_image',
                    'type'             => 'image_advanced',
                    'desc'             => 'kích thước ảnh (145x90)',
                    'max_file_uploads' => 10,
                ),
            ),
        );

        return $meta_boxes;
    }
}
add_filter('rwmb_meta_boxes', 'home_option_meta_box');


// add metabox file
if (!function_exists('form_option_meta_box')) {
    function form_option_meta_box($meta_boxes)
    {

        $bs_user        = get_users(array('role' => 'bs'));
        $bs_users_array = array();
        foreach ($bs_user as $user) {
            $bs_users_array[$user->ID] = $user->display_name;
        }
        $meta_boxes[] = array(
            'title'          => __('Nội dung form đặt lịch khám'),
            'settings_pages' => 'option_form',
            'fields'         => array(
                array(
                    'name' => 'URL action',
                    'id'   => 'google-form-action',
                    'type' => 'text',
                    'size' => 100
                ),
                array(
                    'name' => 'Họ tên',
                    'id'   => 'google-form-entry-fullname',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Số điện thoại',
                    'id'   => 'google-form-entry-numberphone',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Email',
                    'id'   => 'google-form-entry-email',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Vấn đề đang gặp phải',
                    'id'   => 'google-form-entry-note',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Bệnh lý',
                    'id'   => 'google-form-entry-pathological',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Cơ sở',
                    'id'   => 'google-form-entry-basis',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Bác sĩ',
                    'id'   => 'google-form-entry-doctor',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Ngày khám',
                    'id'   => 'google-form-entry-date',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Giờ khám',
                    'id'   => 'google-form-entry-time',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Nguồn URL  ',
                    'id'   => 'google-form-entry-url',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Nguồn referer_url ',
                    'id'   => 'google-form-entry-referer-url',
                    'type' => 'text',
                ),
                array(
                    'name'        => 'Chọn bác sĩ hiển thị',
                    'id'          => 'form-doctor',
                    'type'        => 'select_advanced',
                    'multiple'    => true,
                    'placeholder' => 'Chọn bác sĩ',
                    'options'     => $bs_users_array,
                ),
                array(
                    'id'       => 'form_category',
                    'name'     => 'Chọn bệnh lý/ triệu chứng hiển thị',
                    'type'     => 'taxonomy',
                    'taxonomy' => 'category',
                    'multiple' => true,
                    'ajax'     => true,
                ),
                array(
                    'name'        => __('Thời gian làm việc'),
                    'id'          => 'form-group-time',
                    'type'        => 'group',
                    'clone'       => true,
                    'sort_clone'  => true,
                    'collapsible' => true,
                    'group_title' => array('field' => 'form-time'),
                    'add_button'  => 'Thêm thời gian',
                    'fields'      => array(
                        array(
                            'name'       => 'Thời gian',
                            'id'         => 'form-time',
                            'type'       => 'time',
                            'size'       => 50,
                            'js_options' => [
                                'stepMinute'      => 15,
                                'controlType'     => 'select',
                                'showButtonPanel' => false,
                                'oneLine'         => true,
                            ],
                        ),
                    ),
                ),
            ),
        );
        $meta_boxes[] = array(
            'title'          => __('Nội dung form thanh toán'),
            'settings_pages' => 'option_form',
            'fields'         => array(
                array(
                    'name' => 'URL action',
                    'id'   => 'checkout-action',
                    'type' => 'text',
                    'size' => 100
                ),
                array(
                    'name' => 'Họ tên',
                    'id'   => 'checkout-fullname',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Địa chỉ',
                    'id'   => 'checkout-address',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Số điện thoại',
                    'id'   => 'checkout-numberphone',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Email',
                    'id'   => 'checkout-email',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Ghi chú',
                    'id'   => 'checkout-content',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Tên sản phẩm x số lượng',
                    'id'   => 'checkout-product-name',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Giá',
                    'id'   => 'checkout-product-price',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Phương thức thanh toán',
                    'id'   => 'checkout-pay',
                    'type' => 'text',
                ),
            )
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
        return $meta_boxes;
    }
}
add_filter('rwmb_meta_boxes', 'form_option_meta_box');