<?php
/**
 * Template name: Thanh toán
 */
get_header();
?>

<main class="check-out">
    <div class="breadcrumb">
        <div class="container">
            <span class="item"><a href="#" class="breadcrumb-link">Trang chủ <i class="fa fa-angle-double-right"
                        aria-hidden="true"></i></a></span>
            <span class="item">Thanh toán</span>
        </div>
    </div>

    <section class="page-content">
        <div class="container">
            <h1 class="page-title">Thanh toán</h1>
            <form action="" class="form-checkout" method="post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="cart-info">
                            <h2 class="cart-title">Thông tin giỏ hàng</h2>
                            <p class="cart-text">Bạn có 1 sản phẩm trong giỏ hàng</p>
                            <div class="cart-list">
                                <div class="cart-item">
                                    <div class="cart-item-info">
                                        <a href="#" class="product-images">
                                            <img src="<?php echo THEME_URI; ?>/images/product/product-img.png" alt="">
                                        </a>
                                        <div class="item-info">
                                            <h3 class="product-title"><a href="#" class="text-link">Lọ 10ml Lineabon
                                                    K2
                                                    + D3 - Hỗ trợ chống còi xương, tăng chiều cao cho trẻ sơ sinh và
                                                    trẻ
                                                    nhỏ</a></h3>
                                            <p class="info-text"><span>Số lượng X 1</span> - <span>295,000đ</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="cart-price">
                                        <p class="item"><b>Thành tiền</b></p>
                                        <p class="item total-price">295,000 đ</p>
                                        <input type="hidden" name="name_product" value="Lọ 10ml Lineabon K2
                                                        + D3 - Hỗ trợ chống còi xương, tăng chiều cao cho trẻ sơ sinh và trẻ
                                                        nhỏ">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="total_price" value="295,000 đ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="info-checkout">
                            <h2 class="cart-title">Thông tin thanh toán</h2>
                            <div class="form-group">
                                <label class="form-lable" for="fullname">Họ và tên *</label>
                                <input type="text" name="fullname" class="form-control control-custom" id="fullname"
                                    placeholder="Họ và tên *" required>
                            </div>
                            <div class="form-group">
                                <label class="form-lable" for="numberphone">Số điện thoại *</label>
                                <input type="text" name="numberphone" class="form-control control-custom"
                                    id="numberphone" placeholder="Số điện thoại *" required>
                            </div>
                            <div class="form-group">
                                <label class="form-lable" for="address">Địa chỉ *</label>
                                <input type="text" name="address" class="form-control control-custom" id="address"
                                    placeholder="Địa chỉ *" required>
                            </div>
                            <div class="form-group">
                                <label class="form-lable" for="email">Email *</label>
                                <input type="email" name="email" class="form-control control-custom" id="email"
                                    placeholder="Email *" required>
                            </div>
                            <div class="form-group">
                                <label class="form-lable" for="note">Ghi chú</label>
                                <textarea class="form-control control-custom" id="note" rows="3" name="note"
                                    placeholder="Ghi chú"></textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shipcode" id="shipcode"
                                    value="Ship COD" checked>
                                <label class="form-check-label form-lable" for="shipcode">
                                    Trả tiền mặt khi nhận hàng (Ship COD)
                                </label>
                                <p>Khách hàng sau khi nhận được hàng mới thanh toán cho shipper.</p>
                            </div>
                            <button type="submit" class="btn-checkout">Đặt Hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<?php get_footer(); ?>