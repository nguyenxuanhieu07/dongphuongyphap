<?php
get_header();
?>
<main class="single-treatment">
	<?php get_template_part("components/breadcrumd"); ?>
	<section class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1 class="page-title">
						<?php echo get_queried_object()->name; ?>
					</h1>
					<div class="entry">
						<?php echo get_queried_object()->description; ?>
					</div>
					<h2 class="archive-title">Bác sĩ phụ trách chuyên môn</h2>
					<div class="list-doctor">
						<?php
						$term_id   = get_queried_object_id();
						$id_doctor = rwmb_meta('specialize-doctor', ['object_type' => 'term'], $term_id) ? rwmb_meta('specialize-doctor', ['object_type' => 'term'], $term_id) : '';
						if ($id_doctor):
							$settings          = get_option('option_pages');
							$setting_basis     = $settings['option-basis'];
							$doctor            = get_userdata($id_doctor);
							$doctor_avatar     = get_avatar($id_doctor, 150);
							$user_name         = rwmb_meta('user-name', ['object_type' => 'user'], $id_doctor) ? rwmb_meta('user-name', ['object_type' => 'user'], $id_doctor) : $doctor->data->display_name;
							$exp_doctor        = rwmb_meta('user-exp', ['object_type' => 'user'], $id_doctor) ? rwmb_meta('user-exp', ['object_type' => 'user'], $id_doctor) : '';
							$position_doctor   = rwmb_meta('position-user', ['object_type' => 'user'], $id_doctor) ? rwmb_meta('position-user', ['object_type' => 'user'], $id_doctor) : '';
							$specialize_doctor = rwmb_meta('user-specialize', ['object_type' => 'user'], $id_doctor) ? rwmb_meta('user-specialize', ['object_type' => 'user'], $id_doctor) : '';
							$link_booking      = isset($settings['page-booking']) ? get_page_link($settings['page-booking']) : '#';
							$specialize        = [];
							if (!empty($specialize_doctor)) {
								foreach ($specialize_doctor as $key => $value) {
									array_push($specialize, $value->name);
								}
							}
							?>
							<div class="post-doctor">
								<a href="<?php echo get_author_posts_url($id_doctor); ?>" class="post-doctor-thumbnail">
									<?php echo $doctor_avatar; ?>
								</a>
								<div class="post-info">
									<h3 class="post-name"><a href="<?php echo get_author_posts_url($id_doctor); ?>"
											class="post-link">
											<?php echo $user_name; ?>
										</a></h3>
									<p class="post-position">
										<?php echo $position_doctor; ?>
									</p>
									<p class="info-item post-specialized"><b>Chuyên ngành: </b>
										<?php echo implode(",", $specialize); ?>
									</p>
									<p class="info-item post-exp"><b>Kinh nghiệm: </b>
										<?php echo $exp_doctor; ?> năm
									</p>
								</div>
								<div class="post-action">
									<a href="<?php echo get_author_posts_url($id_doctor); ?>" class="link link-more"><img
											src="<?php echo THEME_URI; ?>/images/icons/icon-more.png" alt="">Xem
										chi tiết</a>
									<a href="<?php echo $link_booking; ?>" class="link link-book"><img
											src="<?php echo THEME_URI; ?>/images/icons/icon-calender.png" alt="">Đặt
										lịch khám</a>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<h2 class="archive-title">Hệ Giải Pháp
						<?php echo get_queried_object()->name; ?> Tại Đông Phương Y Pháp
					</h2>
					<div class="row list-treatment">
						<?php
						$specialize_solution = rwmb_meta('specialize-solution', ['object_type' => 'term'], $id_doctor) ? rwmb_meta('specialize-solution', ['object_type' => 'term'], $id_doctor) : '';
						if ($specialize_solution):
							foreach ($specialize_solution as $key => $value) {
								$link_term = get_term_link($value);
								?>
								<div class="col-md-3 item-treatment">
									<div class="inner">
										<a href="<?php echo $link_term; ?>" class="inner-link">
											<img src="<?php echo THEME_URI; ?>/images/icons/sleepy.png" alt=""
												class="inner-img">
											<h2 class="inner-title">
												<?php echo $value->name; ?>
											</h2>
										</a>
									</div>
								</div>
								<?php
							}
						endif;
						?>
					</div>
					<h2 class="archive-title">Bài viết liên quan</h2>
					<div class="row list-post-author">
						<?php
						$args_post      = array(
							'post_type'      => 'post',
							'post_status'    => 'publish',
							'posts_per_page' => 6,
							'order'          => 'desc',
							'orderby'        => 'date',
							'tax_query'      => array(
								array(
									'taxonomy' => 'specialize',
									'field'    => 'id',
									'terms'    => $term_id,
								),
							),
						);
						$list_post = new WP_Query($args_post);
						if ($list_post->have_posts()):
							while ($list_post->have_posts()):
								$list_post->the_post();
								$args = array(
									'hide_content' => true
								)
								?>
								<div class="col-md-4">
									<?php get_template_part('components/post', '', $args) ?>
								</div>
							<?php
							endwhile;
						endif;
						?>
					</div>
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();