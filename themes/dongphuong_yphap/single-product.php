<?php
get_header();
$product_name = rwmb_meta('product-name') ? rwmb_meta('product-name') : get_the_title();
$product_desc = rwmb_meta('product-desc') ? rwmb_meta('product-desc') : '';
$args_product = array(
	'product_name' => $product_name,
	'product_desc' => $product_desc,
);
?>
<main class="single-product">
	<?php get_template_part("components/breadcrumd"); ?>
	<?php get_template_part("components/notification"); ?>
	<?php get_template_part("blocks/product/product-info", "top", $args_product); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php get_template_part("blocks/product/product", "info", $args_product); ?>
				<?php get_template_part("blocks/product/product", "uses"); ?>
				<?php get_template_part("blocks/product/product", "uses-object"); ?>
				<?php get_template_part("blocks/product/product", "usesing"); ?>
				<?php get_template_part("blocks/product/product-note", "usesing"); ?>
				<?php get_template_part("blocks/product/product", "reason"); ?>
				<h2 class="archive-title">Bình Luận</h2>
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()):
					comments_template();
				endif;
				?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
				<div class="customer-benefits">
					<h3 class="benefits-title">Quyền lợi khách hàng</h3>
					<div class="entry-benefits">
						<p class="entry-title">Truy xuất nguồn gốc</p>
						<ul class="list-benefits">
							<li class="item">Quét mã QR truy xuất nguồn gốc Kiểm định</li>
							<li class="item">Kiểm tra giấy tờ kiểm định của Bộ Y tế</li>
							<li class="item">Tư vấn bởi dược sĩ</li>
							<li class="item">Được tư vấn bởi chuyên viên tốt nghiệp ĐH Y Dược</li>
						</ul>
						<p class="entry-title">Vận chuyển</p>
						<ul class="list-benefits list-bottom">
							<li class="item">Giao hàng COD toàn quốc 24/7</li>
							<li class="item">Giá sỉ tốt nhất</li>
							<li class="item">Giá bán sỉ, lẻ tốt nhất thị trường</li>
						</ul>
					</div>
				</div>
				<?php get_sidebar('same-product'); ?>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();