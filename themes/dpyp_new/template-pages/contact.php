<?php 
/**
 * Template name: Liên hệ
 */
get_header();
?>

<main class="page-content contact" id="page-content">
    <div class="container">

        <?php get_template_part("template-parts/content" , "breadcrumb"); ?>

        <h1 class="title-page">
            Liên hệ
        </h1>
        
        <div class="row">
            <div class="col-md-8">
                <form action="" class="form-label form-contact">
                    <div class="row">
                        <div class="col-sm-5 col-6">
                            <div class="form-group">
                                <input name="fullname" type="text" id="fullname-sidebar" class="form-control" required>
                                <label for="fullname-sidebar">Họ tên</label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="form-group">
                                <input name="email" type="email" id="email-sidebar" inputmode="email" class="form-control" >
                                <label for="email-sidebar">Email</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="numberphone" type="text" id="phone-sidebar" class="form-control" inputmode="decimal" required pattern="(\+84|0){1}(9|8|7|5|3){1}[0-9]{8}">
                                <label for="phone-sidebar">Số điện thoại</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="subject" type="text" id="subject-sidebar" class="form-control" >
                        <label for="subject-sidebar">Tiêu đề thư</label>
                    </div>
                    <div class="form-group w-100">
                        <textarea name="content" id="content-sidebar" class="form-control" required="required" rows="3"></textarea>
                        <label for="date-sidebar">Nội dung thư</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-green" aria-label="submit">Gửi liên hệ<i class="fa fa-angle-right d-flex align-items-center justify-content-center" aria-hidden="true"></i></button>
                </form>
            </div>
            <div class="col-md-4">
                <div class="contact-calendar">
                    <p class="calendar-title">
                        Lịch làm việc
                    </p>
                    <div class="content">
                        <p>Làm việc tất cả các ngày trong tuần</p>
                        <p><strong>Sáng</strong>: từ 8h - 12h</p>
                        <p><strong>Chiều</strong>: từ 13h30 - 17h30 (Nếu đến sau 17h30 vui lòng liên hệ trước để bác sĩ đặt lịch)</p>
                        <p>( Trung tâm có chỗ để xe ô tô cho quý khách )</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="office-contact">
        <div class="container">
            <h1 class="title-page">
                HỆ THỐNG ĐÔNG PHƯƠNG Y PHÁP TRÊN TOÀN QUỐC
            </h1>
            <div class="row">
                <div class="col-12">
                    <span class="title-address">ĐÔNG PHƯƠNG Y PHÁP CƠ SỞ HÀ NỘI</span>
                </div>
                <div class="col-md-4 col-12">
                    <div class="office-item">
                        <div class="thumbnail">
                            <img src="<?php echo THEME_URI; ?>/images/office-1.jpg" alt="">
                        </div>
                        <div class="location">
                            <span>Cơ sở 1</span>
                        </div>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>Biệt thự B31 ngõ 70 Nguyễn Thị Định,Thanh Xuân - Hà Nội</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:(024)66873434">(024) 6687 3434</a> - <a href="tel:097.457.3434">097.457.3434</a></p>
                        <p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/TEQfVcZaF3PoMuML6" target="_blank" rel="noopener">Xem bản đồ</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="office-item">
                        <div class="thumbnail">
                            <img src="<?php echo THEME_URI; ?>/images/office-2.jpg" alt="">
                        </div>
                        <div class="location">
                            <span>Cơ sở 2</span>
                        </div>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>Số 37A ngõ 97 Văn Cao, phường Liễu Giai, Ba Đình, Hà Nội</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:024 6253 6649">024 6253 6649</a> - <a href="tel:0963 302 349">0963 302 349</a></p>
                        <p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/PwWKGa9rPpUYpP378" target="_blank" rel="noopener">Xem bản đồ</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="office-item">
                        <div class="thumbnail">
                            <img src="<?php echo THEME_URI; ?>/images/office-3.jpg" alt="">
                        </div>
                        <div class="location">
                            <span>Cơ sở 3</span>
                        </div>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>Biệt thự 16, Ngõ 168 Nguyễn Khánh Toàn, Cầu Giấy, Hà Nội</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:024.8585.1102">024 8585 1102</a></p>
                        <p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/RUvJZa16buEmuH6G8" target="_blank" rel="noopener">Xem bản đồ</a></p>
                    </div>
                </div>
                
                <div class="col-md-4 col-12">
                    <div class="office-item">
                        <div class="thumbnail">
                            <img src="<?php echo THEME_URI; ?>/images/office-5.jpg" alt="">
                        </div>
                        <div class="location">
                            <span>Cơ sở 5</span>
                        </div>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>Số 123 Hoàng Ngân, Nhân Chính, Thanh Xuân, Hà Nội</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:0969.515.166">0969 515 166</a></p>
                        <p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/buoYGc69VwzNHNdf6" target="_blank" rel="noopener">Xem bản đồ</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="office-item">
                        <div class="thumbnail">
                            <img src="<?php echo THEME_URI; ?>/images/office-6.jpg" alt="">
                        </div>
                        <div class="location">
                            <span>Cơ sở 6</span>
                        </div>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>135A Thanh Ấm, Vân Đình, Ứng Hoà, Hà Nội</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:02433.989.666">02433 989 666</a> - <a href="tel:0963.396.115">0963 396 115</a></p>
                        <p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/dVw1rKHTjZQWpU2u9" target="_blank" rel="noopener">Xem bản đồ</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="office-item">
                        <div class="thumbnail">
                            <img src="<?php echo THEME_URI; ?>/images/office-7.jpg" alt="">
                        </div>
                        <div class="location">
                            <span>Cơ sở 7</span>
                        </div>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>Thôn Đông Ngàn, xã Đông Hội, huyện Đông Anh, Hà Nội</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:088.99.80188">088.99.80188</a></p>
                        <p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/4om462ffei7XAgEA6" target="_blank" rel="noopener">Xem bản đồ</a></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <span class="title-address">ĐÔNG PHƯƠNG Y PHÁP CƠ SỞ HỒ CHÍ MINH</span>
                </div>
                <div class="col-md-4 col-12">
                    <div class="office-item">
                        <div class="thumbnail">
                            <img src="<?php echo THEME_URI; ?>/images/office-8.jpg" alt="">
                        </div>
                        <div class="location">
                            <span>Cơ sở 1</span>
                        </div>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>Số 145 Hoa Lan, phường 2, quận Phú Nhuận, TP. HCM </p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:028.7109.6699">(028)7109 6699</a></p>
                        <p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/hdjV9Uw41EPNU9JU9" target="_blank" rel="noopener">Xem bản đồ</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="office-item">
                        <div class="thumbnail">
                            <img src="<?php echo THEME_URI; ?>/images/office-9.jpg" alt="">
                        </div>
                        <div class="location">
                            <span>Cơ sở 2</span>
                        </div>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>Số 100 Đường D1, Phường 25, Quận Bình Thạnh, TP.HCM</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:0938.449.768">0938 449 768</a> - <a href="tel:0932.088.186">0932 088 186</a></p>
                        <p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/2dWabH1AGqt195yV6" target="_blank" rel="noopener">Xem bản đồ</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="office-item">
                        <div class="thumbnail">
                            <img src="<?php echo THEME_URI; ?>/images/office-10.jpg" alt="">
                        </div>
                        <div class="location">
                            <span>Cơ sở 3</span>
                        </div>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>Số 179, đường Nguyễn Văn Thương, Phường 25, Quận Bình Thạnh, TP.HCM</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:0888.698.102">0888 698 102</a></p>
                        <p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/F6325weDv5HvVYEZ9" target="_blank" rel="noopener">Xem bản đồ</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="office-item">
                        <div class="thumbnail">
                            <img src="<?php echo THEME_URI; ?>/images/office-11.jpg" alt="">
                        </div>
                        <div class="location">
                            <span>Cơ sở 4</span>
                        </div>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>Số 48B Đặng Dung, phường Tân Định, Quận 1, TP.HCM</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:028.710.99808">(028) 710 99808</a> - <a href="tel:0903.047.368">0903 047 368</a></p>
                        <p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/WRFPameUQVahW3Gr8" target="_blank" rel="noopener">Xem bản đồ</a></p>
                    </div>
                </div>
            </div>
            <p class="unit">- Chuỗi phòng vật lý trị liệu, chữa bệnh không dùng thuốc uy tín nhất hiện nay -</p>
        </div>
    </div>
</main>

<?php get_footer(); ?>