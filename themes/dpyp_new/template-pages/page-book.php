<?php 
/**
 * Template name: Đặt lịch
 */
get_header();
?>
    <main class="page-content" id="page-content">
        <div class="container">
            <div class="breadcrumb-nav">
                <nav class="breadcrumb">
                    <span>
                        <span>
                            <a href="/">Trang chủ</a> »
                            <span>
                                <a href="/">Xương khớp</a> »
                            </span>
                        </span>
                    </span>
                </nav>
            </div>
            <h1 class="title-page">
                Đặt lịch khám / tư vấn ONLINE
            </h1>
            <div class="row">
                <div class="col-md-6">
                    <form action="" class="form-label form-apointment">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input name="fullname" type="text" id="fullname-form" class="form-control" required="">
                                    <label for="fullname-form">Họ tên</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input name="numberphone" type="text" id="phone-form" class="form-control" inputmode="decimal" required="" pattern="(\+84|0){1}(9|8|7|5|3){1}[0-9]{8}">
                                    <label for="phone-form">Số điện thoại</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input name="email" type="email" id="email-form" inputmode="email" class="form-control">
                                    <label for="email-form">Email</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="date" id="date-trigger">
                                    <input name="date" type="text" id="date-form" inputmode="decimal" class="form-control" required="">
                                    <label for="date-form">Ngày hẹn</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="service" id="service-form" class="form-control" required>
                                <option></option>
                                <option value="Châm cứu">Châm cứu</option>
                                <option value="Bấm huyệt">Bấm huyệt</option>
                                <option value="Cấy chỉ">Cấy chỉ</option>
                                <option value="Thủy châm">Thủy châm</option>
                                <option value="Phục hồi chức năng">Phục hồi chức năng</option>
                                <option value="Chăm sóc sức khỏe">Chăm sóc sức khỏe</option>
                            </select>
                            <label for="service-form">Chọn dịch vụ điều trị</label>
                        </div>
                        <div class="form-group">
                            <select name="office" id="address-form" class="form-control" required>
                                <option></option>
                                <option value="HN:Biệt thự B31 ngõ 70 Nguyễn Thị Định, Thanh Xuân, HN">HN: Biệt thự B31 ngõ 70 Nguyễn Thị Định, Thanh Xuân, HN</option>
                                <option value="HCM:145 Hoa Lan, Phường 2, Q. Phú Nhuận, HCM">HCM: 145 Hoa Lan, Phường 2, Q. Phú Nhuận, HCM</option>
                            </select>
                            <label for="address-form">Địa chỉ điều trị</label>
                        </div>
                        <div class="form-group w-100">
                            <textarea name="content" id="content-form" class="form-control" required="required" rows="3"></textarea>
                            <label for="date-form">Nội dung</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-green" aria-label="submit">Gửi liên hệ<i class="fa fa-angle-right d-flex align-items-center justify-content-center" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="col-md-6 desc-appoinment">

					<p class="text-justify">
						<strong style="font-size: 18px;color: #056839;text-transform: uppercase;">Trung tâm Ứng dụng Đông phương y pháp</strong> xin cảm ơn Quý khách hàng đã luôn quan tâm, tin tưởng và sử dụng dịch vụ Khám chữa bệnh &amp; Chăm sóc sức khoẻ bằng phương pháp không dùng thuốc của chúng tôi trong thời gian qua.
					</p>
					<p class="text-justify">
						Để phục vụ khách hàng một cách toàn diện, chu đáo, đảm bảo hiệu quả điều trị và sự thuận tiện cho khách hàng, Quý khách vui lòng liên hệ với Trung tâm để được sắp xếp hẹn khám và điều trị với các Bác sĩ
					</p>
					<p>
						<strong>Địa chỉ 1:</strong> Biệt thự B31 ngõ 70 Nguyễn Thị Định, Thanh Xuân, HN
					</p>
					<p>
						Điện thoại: 097.457.3434 - (024) 6687 3434
					</p>
					<p>
						<strong>Địa chỉ 2:</strong>  Số 145 Hoa Lan, phường 2, quận Phú Nhuận, TP. HCM
					</p>
					<p>
						Điện thoại: (028) 6679 5254
					</p>
					<p>
						<strong>Địa chỉ 3:</strong>  Số 116 Văn Lang, P. Hồng Gai, TP Hạ Long, Quảng Ninh
					</p>
					<p>
						Điện thoại: (0203) 657 0128 - 096.478.5559
					</p>
				
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>