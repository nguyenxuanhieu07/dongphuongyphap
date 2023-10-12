<?php
/**
 * Template name: Liên hệ
 */
get_header();
?>
<main class="taxonomy-product">
	<div class="breadcrumb">
		<div class="container">
			<span class="item"><a href="#" class="breadcrumb-link">Trang chủ <i class="fa fa-angle-double-right"
						aria-hidden="true"></i></a></span>
			<span class="item">Sản phẩm</span>
		</div>
	</div>
	<section class="page-slider">
	</section>
	<section class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1 class="page-title">
						<?php echo get_queried_object()->name; ?>
					</h1>
					<div class="row list-products">
						
						<?php
						$term_id   = get_queried_object()->term_id;
						$args      = array(
							'post_type'      => 'product',
							'post_status'    => 'publish',
							'posts_per_page' => 10,
							'order'          => 'desc',
							'orderby'        => 'date',
							'tax_query'      => array(
								array(
									'taxonomy' => 'product_cat',
									'field'    => 'id',
									'terms'    => $term_id,
								),
							),
						);
						$list_post = new WP_Query($args);
						if($list_post->have_posts()) :
						?>
							<?php
							/* Start the Loop */
							$i = 1;
							  while($list_post->have_posts()) : $list_post->the_post();

								if ($i == 1):
									?>
									<div class="col-md-12">
										<?php get_template_part('components/post','product-big') ?>
									</div>
									<?php
								else:
									?>
									<div class="col-md-4">
										<?php get_template_part('components/post', 'product') ?>
									</div>
									<?php
								endif;
								$i++;
							endwhile;
							?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-4">
					<form action="" class="form-booking">
						<h2 class="form-title text-center">
							Nhận thông tin tư vấn
						</h2>
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
							<label class="form-lable" for="note">Bạn cần tư vấn gì*</label>
							<textarea class="form-control control-custom" id="note" rows="3" name="note"
								placeholder="Bạn cần tư vấn gì*"></textarea>
						</div>
						<button type="submit" class="form-control btn-send">Gửi thông tin</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>