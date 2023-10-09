<?php 
$author_content = rwmb_meta('page-author-content') ? rwmb_meta('page-author-content') : '';
$user_doctors = get_users_by_role('bs',4);
?>
<main class="archive-doctors">
	<div class="breadcrumb">
		<div class="container">
			<span class="item"><a href="#" class="breadcrumb-link">Trang chủ <i class="fa fa-angle-double-right"
						aria-hidden="true"></i></a></span>
			<span class="item">Trang gom bác sĩ</span>
		</div>
	</div>
	<?php  get_template_part("author/archive" , "slider"); ?>
	<section class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="entry">
						<?php echo $author_content; ?>
					</div>
					<?php  get_template_part("author/archive" , "number"); ?>
					<h2 class="archive-title">Đội Ngũ Chuyên Gia</h2>
					<div class="list-doctor">
						<?php 
							foreach ($user_doctors as $key => $value) {
								$args = array(
									'data'  => $value
								);
								get_template_part("component/post","doctor",$args);
							}
						?>
					</div>
				</div>
				<div class="col-md-4">
					<?php echo get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
</main>