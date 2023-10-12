<?php
/**
 * Template name: Liên hệ
 */
get_header();

$ngayThangHienTai   = date("d/m");
$ngayThangTiepTheo1 = date("d/m", strtotime("+1 day"));
$ngayThangTiepTheo2 = date("d/m", strtotime("+2 days"));
$settings           = get_option('option_form');
?>

<main class="page-communications">
    <div class="breadcrumb">
        <div class="container">
            <span class="item"><a href="#" class="breadcrumb-link">Trang chủ <i class="fa fa-angle-double-right"
                        aria-hidden="true"></i></a></span>
            <span class="item">Liên hệ</span>
        </div>
    </div>
    <section class="page-content">
        <div class="container">
            <h1 class="page-title">Thông Tin Liên Hệ</h1>
            <div class="info-meta">
                <div class="infor">
                    <p class="info-text"><b>Trung tâm Đông Phương Y Pháp</b></p>
                    <p class="info-text"><b>Thời gian làm việc:</b> Từ 8h đến 17h30, tất cả các ngày trong tuần (kể
                        cả thứ 7, chủ nhật)
                    </p>
                    <p class="info-text"><b>Địa chỉ:</b> Biệt thự B31 ngõ 70 Nguyễn Thị Định, Thanh Xuân, HN</p>
                </div>
                <a href="tel:0974573434" class="link-number-phone"><i class="fa fa-phone"
                        aria-hidden="true"></i>0974573434</a>
            </div>
            <form action="" class="communications-form form-booking">
                <div class="row">
                    <div class="col-md-5">
                        <h2 class="form-title text-center">
                            Liên hệ đặt lịch tại Đông Phương Y Pháp
                        </h2>
                        <p class="form-desc text-center">Để lại thông tin bên dưới, chuyên gia sẽ hỗ trợ bạn trong
                            thời gian sớm nhất</p>
                        <div class="form-group">
                            <label class="form-lable" for="fullname">Họ và tên *</label>
                            <input type="text" name="fullname" class="form-control control-custom" id="fullname"
                                placeholder="Họ và tên *" required>
                        </div>
                        <div class="form-group">
                            <label class="form-lable" for="numberphone">Số điện thoại *</label>
                            <input type="text" name="numberphone" class="form-control control-custom" id="numberphone"
                                placeholder="Số điện thoại *" required>
                        </div>
                        <div class="form-group">
                            <label class="form-lable" for="note">Vấn đề đang gặp phải</label>
                            <textarea class="form-control control-custom" id="note" rows="3" name="note"
                                placeholder="Vấn đề đang gặp phải"></textarea>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-lable" for="select_basis">Lựa chọn cơ sở *</label>
                                <select id="select_basis" name="basis" class="form-control control-custom" <?php if ($check_author)
                                    echo 'disabled'; ?>>
                                    <option value="">Lựa chọn cơ sở *</option>
                                    <option value="Hà Nội" <?php selected($workplace_user, 'Hà Nội'); ?>>Biệt thự B31,
                                        ngõ 70 Nguyễn Thị Định, Nhân
                                        Chính. Thanh Xuân, Hà
                                        Nội</option>
                                    <option value="Hồ Chí Minh" <?php selected($workplace_user, 'Hồ Chí Minh'); ?>>Số
                                        145 Hoa Lan, phường 2, quận Phú
                                        Nhuận, HCM</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-lable" for="select_basis">Bệnh lý của bạn *</label>
                                <select id="select_basis" class="form-control control-custom">
                                    <option selected>Bệnh lý của bạn *</option>
                                    <?php
                                    $args_child = array(
                                        'taxonomy'   => 'category',
                                        'orderby'    => 'name',
                                        'order'      => 'ASC',
                                        'hide_empty' => false,
                                        'meta_query' => array(
                                            array(
                                                'key'     => 'show_in_form',
                                                'value'   => '1',
                                                'compare' => '=='
                                            )
                                        ),
                                    );
                                    $child_cats = get_terms($args_child);
                                    foreach ($child_cats as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value->name; ?>">
                                            <?php echo $value->name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-lable" for="select_basis">Lựa chọn bác sĩ *</label>
                                <select id="select_basis" name="doctor" class="form-control control-custom" <?php if ($check_author)
                                    echo 'disabled'; ?>>
                                    <?php if ($check_author): ?>
                                        <option value="<?php echo $user_name; ?>">
                                            <?php echo $user_name; ?>
                                        </option>
                                    <?php else: ?>
                                        <option selected="">Lựa chọn bác sĩ *</option>
                                        <?php
                                        $bs_users_array = $settings['form-doctor'];
                                        foreach ($bs_users_array as $key => $value) {
                                            $user = get_userdata($value);
                                            $user_name = get_user_meta($value, 'user-name', true) ? get_user_meta($value, 'user-name', true) : $user->data->display_name;
                                            ?>
                                            <option value="<?php echo $user_name; ?>">
                                                <?php echo $user_name; ?>
                                            </option>
                                            <?php
                                        }
                                    endif;
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-lable">Ngày khám *</label>
                                <div class="list-date">
                                    <div class="date-item" data-value="<?php echo $ngayThangHienTai; ?>">
                                        <p class="item-title">
                                            <?php echo $ngayThangHienTai; ?>
                                        </p>
                                        <p class="item-text">hôm nay</p>
                                    </div>
                                    <div class="date-item" data-value="<?php echo $ngayThangTiepTheo1; ?>">
                                        <p class="item-title">
                                            <?php echo $ngayThangTiepTheo1; ?>
                                        </p>
                                        <p class="item-text">Ngày mai</p>
                                    </div>
                                    <div class="date-item" data-value="<?php echo $ngayThangTiepTheo2; ?>">
                                        <p class="item-title">
                                            <?php echo $ngayThangTiepTheo2; ?>
                                        </p>
                                        <p class="item-text">Ngày kìa</p>
                                    </div>
                                    <div class="date-item date-more">
                                        <p class="item-title">+</p>
                                        <p class="item-text">Khác</p>
                                        <input type="text" class="form-control booking-date">
                                        <input type="text" name="booking-date" hidden>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-lable">Giờ khám *</label>
                                <div class="list-time">
                                    <?php
                                    $time = $settings['form-group-time'];
                                    foreach ($time as $key => $value) {
                                        ?>
                                        <div class="date-item" data-value="<?php echo $value['form-time'] ?>">
                                            <input class="form-check-input" type="radio" name="time-hours" id="raidio1"
                                                value="<?php echo $value['form-time'] ?>" hidden="">
                                            <label class="item-title" for="raidio1">
                                                <?php echo $value['form-time'] ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                    <input type="text" name="booking-time" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="form-control btn-send">Gửi thông tin</button>
            </form>
        </div>
        <div class="page-map">
            <div class="google-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d414.7834198268681!2d105.80471310010938!3d21.00751622164824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zQmnhu4d0IHRo4buxIEIzMSBuZ8O1IDcwIE5ndXnhu4VuIFRo4buLIMSQ4buLbmggLSBUaGFuaCBYdcOibiwgSE4!5e0!3m2!1svi!2s!4v1695459885508!5m2!1svi!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="map-address">
                    <h3 class="address-title">Hệ thống cơ sở</h3>
                    <div class="address-content">
                        <a class="btn-address" data-toggle="collapse" href="#coso1" role="button" aria-expanded="false"
                            aria-controls="coso1"><i class="fa fa-chevron-circle-down" aria-hidden="false"></i>Biệt thự
                            B31
                            ngõ 70 Nguyễn Thị Định -
                            Thanh Xuân, HN</a>
                        <div class="collapse multi-collapse show" id="coso1">
                            <a href="#" class="number-phone">
                                <span class="fa fa-phone"></span>
                                <span>097.457.3434</span>
                            </a>
                            <a href="#" class="btn-book">Đặt hẹn ngay</a>
                        </div>
                        <a class="btn-address" data-toggle="collapse" href="#coso2" role="button" aria-expanded="false"
                            aria-controls="coso2"><i class="fa fa-chevron-circle-down" aria-hidden="false"></i>Số
                            145 Hoa Lan, phường 2, quận Phú
                            Nhuận, HCM</a>
                        <div class="collapse multi-collapse" id="coso2">
                            <a href="#" class="number-phone">
                                <span class="fa fa-phone"></span>
                                <span>097.457.3434</span>
                            </a>
                            <a href="#" class="btn-book">Đặt hẹn ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>