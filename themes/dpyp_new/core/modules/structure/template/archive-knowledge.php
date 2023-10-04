<?php
get_header();
?>
<main id="page-content" class="page-content archive-page">
	<div class="container">	
		<div class="breadcrumb-nav mt-3">
			<?php 
			get_template_part( 'template-parts/content', 'breadcrumb' );
			?>
		</div>
		<h1 class="heading-title">Kiến thức bệnh học</h1>
		<div class="description-archive">
			<p>
				Tổng hợp tất cả các đầu bệnh như Cơ xương khớp: Thoái hóa, thoát vị, khô khớp, viêm khớp,...; Nam khoa: Yếu sinh lý, xuất tinh sớm,...; Tai mũi họng: Viêm họng, viêm amidan, ho, viêm mũi,...; Tiêu hóa: Dạ dày, đại tràng, trĩ,...; Da liễu: Dị ứng, mề đay,... Thông tin bài viết sẽ cho bạn góc nhìn tổng quan về bệnh, nguyên nhân, triệu chứng, cách phát hiện, cách điều trị, phòng ngừa,...
			</p>
			<p>
				Rất đơn giản chỉ cần tìm tên đầu bệnh theo bảng chữ cái dưới đây. Ví dụ bạn muốn tìm thông tin về bệnh MẤT NGỦ hãy bấm vào chữ M, danh sách sẽ hiển thị tất cả các đầu bệnh có chữ M, bạn click vào cụm từ "mất ngủ" để đến bài viết chi tiết. Tương tự với các đầu bệnh khác.
			</p>
		</div>
		<h5 class="font-weight-bold">Tìm thông tin bệnh học theo bảng chữ cái</h5>
		<ul class="browse-letters squares alpha-list">
			<?php
			foreach(range('A','Z') as $i) {
				?>
				<li><a href="#letter-<?php echo $i;?>"><?php echo $i;?></a></li>

				<?php
				if($i=='D'){
					echo '<li><a href="#letter-D2">Đ</a></li>';
				}
			}
			?>
		</ul>
		<div class="sick-list">
			<?php
			foreach(range('A','Z') as $i):
				$agrs = array(
					'posts_per_page'   => -1,
					'offset'           => 0,
					'orderby'          => 'title',
					'order'            => 'ASC',
					'post_type'        => 'knowledge',
					'post_status'      => 'publish',
					'meta_query' => array(	
						array(
							'key' => 'short_title',
							'value' => '^'.$i,
							'compare' => 'REGEXP',
						)
					),
				);
				$sick_posts = new WP_Query( $agrs);
				if ( $sick_posts->have_posts() ):
					?>
					<div class="widget-alpha-list"  id="<?php echo 'letter-'.$i; ?>">
						<div class="heading-list">
							<span class="letter">
								<?php echo $i;?>
							</span>
						</div>
						<ul class="list-post-alpha">
							<?php
							while ($sick_posts->have_posts() ) :
								$sick_posts->the_post();
								$sick_name = rwmb_meta('short_title');
								?>
								<li class="">
									<a href="<?php the_permalink();?>">
										<?php the_title();?>
									</a>
								</li>
								<?php
							endwhile;
							?>
						</ul>
					</div>
					<?php
				endif;

				if($i=='D'):
					$agrs_2 = array(
						'posts_per_page'   => -1,
						'offset'           => 0,
						'orderby'          => 'title',
						'order'            => 'ASC',
						'post_type'        => 'knowledge',
						'post_status'      => 'publish',
						'meta_query' => array(	
							array(
								'key' => 'short_title',
								'value' => '^'.'Đ',
								'compare' => 'REGEXP',
							)
						),
					);
					$sick_posts_2 = new WP_Query( $agrs_2);
					if ( $sick_posts_2->have_posts() ):
						?>
						<div class="widget-alpha-list"  id="<?php echo 'letter-D2'; ?>">
							<div class="heading-list">
								<span class="letter">
									<?php echo 'Đ';?>
								</span>
							</div>
							<ul class="list-post-alpha">
								<?php
								while ($sick_posts_2->have_posts() ) :
									$sick_posts_2->the_post();
									$sick_name = rwmb_meta('short_title');
									?>
									<li class="">
										<a href="<?php the_permalink();?>">
											<?php the_title();?>
										</a>
									</li>
									<?php
								endwhile;
								?>
							</ul>
						</div>
						<?php
					endif;
				endif; 
			endforeach;
			?>
		</div>
		
	</div>
</main>
<?php 
get_footer();
?>