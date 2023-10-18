<?php session_start(); ?>
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
            <?php if (isset($_SESSION["cart"])): ?>
                <h1 class="page-title">Thanh toán</h1>
                <form action="" class="form-checkout" method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <?php
                            $cart = $_SESSION["cart"];
                            ?>
                            <div class="cart-info">
                                <h2 class="cart-title">Thông tin giỏ hàng</h2>
                                <p class="cart-text">Bạn có
                                    <?php echo count($cart['cart-item']); ?> sản phẩm trong giỏ hàng
                                </p>
                                <div class="cart-list">
                                    <?php
                                    $product_name = '';
                                    foreach ($cart['cart-item'] as $key => $cart_item) {
                                        $product_img_url = get_the_post_thumbnail_url($cart_item['product_id'], 'full');
                                        $product_name .= $cart_item['product_name'] . ' x' . strval($cart_item['quantity']) . ',';
                                        ?>
                                        <div class="cart-item">
                                            <div class="cart-item-info">
                                                <a href="<?php echo get_the_permalink($cart_item['product_id']); ?>" class="product-images">
                                                    <img src="<?php echo $product_img_url; ?>" alt="">
                                                </a>
                                                <div class="item-info">
                                                    <h3 class="product-title"><a href="<?php echo get_the_permalink($cart_item['product_id']); ?>" class="text-link">
                                                            <?php echo $cart_item['product_name']; ?>
                                                        </a></h3>
                                                    <p class="info-text"><span>Số lượng x
                                                            <?php echo $cart_item['quantity']; ?>
                                                        </span> - <span>
                                                            <?php echo format_price($cart_item['total_price']); ?>đ
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="cart-price">
                                        <p class="item"><b>Thành tiền</b></p>
                                        <p class="item total-price">
                                            <?php echo format_price($cart['cart-total']); ?>đ
                                        </p>
                                        <input type="hidden" name="product_name" value="<?php echo $product_name ?>">
                                        <input type="hidden" name="total_price"
                                            value="<?php echo format_price($cart['cart-total']); ?>">
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
                                    <label class="form-lable" for="content">Ghi chú</label>
                                    <textarea class="form-control control-custom" id="content" rows="3" name="content"
                                        placeholder="Ghi chú"></textarea>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pay" id="pay" value="Ship COD"
                                        checked>
                                    <label class="form-check-label form-lable" for="pay">
                                        Trả tiền mặt khi nhận hàng (Ship COD)
                                    </label>
                                    <p>Khách hàng sau khi nhận được hàng mới thanh toán cho shipper.</p>
                                </div>
                                <button type="submit" class="btn-checkout">Đặt Hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <div class="thank-you">
                    <h1 class="page-title">Bạn đã đặt hàng thành công !</h1>
                   
                    <a href="<?php echo home_url(); ?>" class="btn-home">Quay về trang chủ</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_template_part("components/modal-success"); ?>
<?php get_footer(); ?>