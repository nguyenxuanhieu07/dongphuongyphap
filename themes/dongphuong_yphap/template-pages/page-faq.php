<?php
/**
 * Template name: Câu hỏi thường gặp
 */
get_header();
?>
<main class="page-qa">
	<?php get_template_part("components/breadcrumd"); ?>
	<section class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1 class="page-title"><?php the_title(); ?></h1>
					<div id="accordion">
						<?php 
						$faq = rwmb_meta('page-faq-group') ? rwmb_meta('page-faq-group') : [];
			            foreach ($faq as $key => $value) {
							$class_title ='';
							$class_content='';
							if($key==0){
								$class_title   = 'car-btn-show';
								$class_content = 'show';
							}
						?>
						<div class="card">
							<div class="card-header" id="heading_<?php echo $key+1; ?>">
								<h5 class="mb-0">
									<a href="#" class="card-btn-text <?php echo $class_title; ?>" data-toggle="collapse"
										data-target="#collape_<?php echo $key+1; ?>" aria-expanded="true" aria-controls="<?php echo $key+1; ?>">
										<?php echo $key+1; ?>. <?php echo $value['page-faq-title']; ?>
									</a>
								</h5>
							</div>

							<div id="collape_<?php echo $key+1; ?>" class="collapse <?php echo $class_content; ?>" aria-labelledby="heading_<?php echo $key + 1; ?>"
								data-parent="#accordion">
								<div class="card-body">
									<?php echo $value['page-faq-content']; ?>
								</div>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>