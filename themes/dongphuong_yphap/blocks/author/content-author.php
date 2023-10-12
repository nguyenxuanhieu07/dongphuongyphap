<?php
$id_user        = get_the_author_meta('ID');
$user_structure = get_user_meta($id_user, 'user-structure', true) ? get_user_meta($id_user, 'user-structure', true) : '';
if ($user_structure) {
	foreach ($user_structure as $key => $value) {
		?>
		<h2 class="archive-title">
			<?php echo $value['structure-title'] ?>
		</h2>
		<?php if ($value['style-structure'] == 'style_1'): ?>
			<div class="entry">
				<?php echo $value['disease-faq-desc']; ?>
			</div>
		<?php else: ?>
			<div class="box-list">
				<?php
				$count = count($value['structure-option2']);
				foreach ($value['structure-option2'] as $key_img => $value_img) {
					$url_img = wp_get_attachment_image_url($value_img['structure-option2-images'][0], '');
					$link    = isset($value_img['structure-option2-link']) ? isset($value_img['structure-option2-link']) : '#';
					$title   = $value_img['structure-option2-title'];
					if ($key_img == 0) {
						?>
						<div class="item-top">
							<a href="<?php echo $link; ?>" class="item-imge">
								<img src="<?php echo $url_img; ?>" alt="">
							</a>
							<h3 class="item-title"><a href="<?php echo $link; ?>" class="text-link">
									<?php echo $title; ?>
								</a></h3>
						</div>
						<div class="list-adive-bottom">
							<?php
					} elseif ($key_img > 0 && $key_img < $count - 1) {
						?>
							<div class="inner">
								<a href="<?php echo $link; ?>" class="item-imge">
									<img src="<?php echo $url_img; ?>" alt="">
								</a>
								<h3 class="item-title"><a href="<?php echo $link; ?>" class="text-link">
										<?php echo $title; ?>
									</a></h3>
							</div>
							<?php
					} elseif ($key_img == $count - 1) {
						?>
							<div class="inner">
								<a href="<?php echo $link; ?>" class="item-imge">
									<img src="<?php echo $url_img; ?>" alt="">
								</a>
								<h3 class="item-title"><a href="<?php echo $link; ?>" class="text-link">
										<?php echo $title; ?>
									</a></h3>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		<?php endif; ?>
	<?php
	}
}