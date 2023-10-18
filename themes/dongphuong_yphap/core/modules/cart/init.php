<?php
if (!function_exists('add_to_cart_section')) {
	function add_to_cart_section()
	{
		session_start();
		$quantity   = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
		$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
		if (!isset($cart)) {
			$cart = [];
		}
		if (isset($_SESSION["cart"])) {
			$cart = $_SESSION["cart"];
		}
		if ($product_id) {
			$product_name  = rwmb_meta('product-name', '', $product_id) ? rwmb_meta('product-name', '', $product_id) : get_the_title($product_id);
			$product_price = rwmb_meta('product-price', '', $product_id) ? rwmb_meta('product-price', '', $product_id) : 0;
			$sale_price    = rwmb_meta('product-sale', '', $product_id) ? rwmb_meta('product-sale', '', $product_id) : 0;
			$regular_price = $product_price;
			if ($sale_price > 0) {
				$regular_price = $sale_price;
			}
			$total_price                    = $regular_price * $quantity;
			$cart['cart-item'][$product_id] = array(
				'product_name'  => $product_name,
				'regular_price' => $regular_price,
				'quantity'      => $quantity,
				'total_price'   => $total_price,
				'product_id'    => $product_id,
			);

			$_SESSION["cart"] = $cart;
			update_total_cart();
			$mess['success'] = 1;
		} else {
			$mess['success'] = 0;
		}
		wp_send_json($mess);
	}
}
add_action('wp_ajax_add_to_cart_section', 'add_to_cart_section');
add_action('wp_ajax_nopriv_add_to_cart_section', 'add_to_cart_section');

function format_price($price)
{
	$format_price = number_format($price, 0, ",", ".");
	return $format_price;
}
function product_scripts()
{
	$options = get_option('option_pages');
	$page_id = isset($options['page-checkout']) ? $options['page-checkout'] : 0;
	if ($page_id) {
		$link_checkout = get_page_link($page_id);
		wp_localize_script('main-js', 'checkout', array('url' => $link_checkout));
	}
}
add_action('wp_enqueue_scripts', 'product_scripts');

if (!function_exists('update_cart')) {
	function update_cart()
	{
		session_start();
		$cart    = $_SESSION["cart"];
		$data    = json_decode(stripslashes($_POST['data']));
		$options = get_option('option_pages');
		$page_id = isset($options['page-checkout']) ? $options['page-checkout'] : 0;
		if ($page_id) {
			$link_checkout = get_page_link($page_id);
		}
		foreach ($data as $key => $value) {
			$product_id    = $value->product_id;
			$product_price = rwmb_meta('product-price', '', $product_id) ? rwmb_meta('product-price', '', $product_id) : 0;
			$sale_price    = rwmb_meta('product-sale', '', $product_id) ? rwmb_meta('product-sale', '', $product_id) : 0;
			$regular_price = $product_price;

			if ($sale_price > 0) {
				$regular_price = $sale_price;
			}
			$total_price                                   = $regular_price * $value->quantity;
			$cart['cart-item'][$product_id]['quantity']    = $value->quantity;
			$cart['cart-item'][$product_id]['total_price'] = $total_price;

		}
		$_SESSION["cart"] = $cart;
		update_total_cart();
		$html = '';
		?>
		<h1 class="page-title">Giỏ Hàng</h1>
		<form action="" class="form-cart" method="post">
			<div class="row">
				<div class="col-md-8">
					<div class="cart-product">
						<div class="cart-thead">
							<div class="thead-item product-remove"></div>
							<div class="thead-item product-thumbnail"></div>
							<div class="thead-item product-name">Sản phẩm</div>
							<div class="thead-item product-price">Giá</div>
							<div class="thead-item cart-quantity">Số lượng</div>
							<div class="thead-item product-total-price">Tạm tính</div>
						</div>
						<div class="cart-content">
							<?php
							foreach ($_SESSION["cart"]['cart-item'] as $key => $cart_item) {
								$product_img_url = get_the_post_thumbnail_url($cart_item['product_id'], 'full');
								?>
								<div class="cart-item">
									<div class="product-remove">
										<a href="#" class="remove">
											<i class="fa fa-trash" aria-hidden="true"></i>
										</a>
									</div>
									<div class="product-thumbnail">
										<a href="<?php echo get_the_permalink($cart_item['product_id']); ?>" class="cart-image">
											<img src="<?php echo $product_img_url; ?>" alt="">
										</a>
									</div>
									<div class="product-name">
										<a href="<?php echo get_the_permalink($cart_item['product_id']); ?>">
											<?php echo $cart_item['product_name']; ?>
										</a>
									</div>
									<div class="product-price">
										<span class="price-item">
											<?php echo format_price($cart_item['regular_price']); ?>đ
										</span>
									</div>
									<div class="cart-quantity">
										<div class="product-quantity">
											<span class="quantity-minus">-</span>
											<input type="number" value="<?php echo $cart_item['quantity']; ?>"
												class="input-quantity" min="1"
												name="quantity[<?php echo $cart_item['product_id']; ?>]">
											<span class="quantity-plus">+</span>
										</div>
										<input type="hidden" class="product-id" value="<?php echo $cart_item['product_id']; ?>">
									</div>
									<div class="product-total-price">
										<span class="total-price">
											<?php echo format_price($cart_item['total_price']); ?>đ
										</span>
									</div>
								</div>
							<?php } ?>
							<div class="cart-action">
								<button type="submit" class="btn upadate-cart">Cập nhật giỏ hàng</button>
							</div>
						</div>
					</div>
					<div class="loader">
						<div class="bar1"></div>
						<div class="bar2"></div>
						<div class="bar3"></div>
						<div class="bar4"></div>
						<div class="bar5"></div>
						<div class="bar6"></div>
						<div class="bar7"></div>
						<div class="bar8"></div>
						<div class="bar9"></div>
						<div class="bar10"></div>
						<div class="bar11"></div>
						<div class="bar12"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="cart-collaterals">
						<table class="table-collaterals">
							<tr>
								<th>Tạm tính</th>
								<td>
									<?php echo format_price($_SESSION["cart"]['cart-total']); ?>đ
								</td>
							</tr>
							<tr>
								<th>Tổng</th>
								<td class="total-price">
									<?php echo format_price($_SESSION["cart"]['cart-total']); ?>đ
								</td>
							</tr>
						</table>
						<a href="<?php echo $link_checkout; ?>" class="cart-checkout">Tiến hành thanh toán</a>
					</div>
				</div>
			</div>
		</form>
		<?php
		$html = ob_get_clean();
		echo $html;
		die();
	}
}
add_action('wp_ajax_update_cart', 'update_cart');
add_action('wp_ajax_nopriv_update_cart', 'update_cart');

if (!function_exists('delete_cart_item')) {
	function delete_cart_item()
	{
		session_start();
		$product_id = $_POST['product_id'];
		if ($product_id) {
			unset($_SESSION["cart"]['cart-item'][$product_id]);
			update_total_cart();
			$html = '';
			?>
			<table class="table-collaterals">
				<tr>
					<th>Tạm tính</th>
					<td>
						<?php echo format_price($_SESSION["cart"]['cart-total']); ?>đ
					</td>
				</tr>
				<tr>
					<th>Tổng</th>
					<td class="total-price">
						<?php echo format_price($_SESSION["cart"]['cart-total']); ?>đ
					</td>
				</tr>
			</table>
			<?php
			$html = ob_get_clean();
			echo $html;
			die();
		}
	}
}
add_action('wp_ajax_delete_cart_item', 'delete_cart_item');
add_action('wp_ajax_nopriv_delete_cart_item', 'delete_cart_item');

function update_total_cart()
{
	session_start();
	$cart       = $_SESSION["cart"];
	$total_cart = 0;
	foreach ($cart['cart-item'] as $key => $cart_item) {
		$total_cart += $cart_item['total_price'];
	}
	$_SESSION["cart"]['cart-total'] = $total_cart;
}