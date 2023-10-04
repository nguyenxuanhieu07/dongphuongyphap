<section class="home-slide">
	<?php
	$theme_options =  get_option('option_pages');
	
	if (isset( $theme_options['slide_primary_group'] ) ) :
		$slide_group = $theme_options['slide_primary_group'];

		if(isset($slide_group) && count($slide_group[0]) > 1){
			foreach ($slide_group as $slide) {

			$slide_name = $slide['slide_name'];
			$slide_pc = $slide['slide_image_pc'];
			$slide_mb = $slide['slide_image_mb'];
			$slide_link = $slide['slide_link'];

			foreach ($slide_pc as $image) {
				$images_pc_src = wp_get_attachment_image_url( $image, 'full', false );
			}
			foreach ($slide_mb as $image) {
				$images_mb_src = wp_get_attachment_image_url( $image, 'full', false );
			}
			?>
            <div class="item-slide">
            	<a href="<?php echo ( isset($slide_link) && $slide_link != null ) ? $slide_link : '#'; ?>">
					<img src="<?php echo $images_pc_src; ?>" class="d-none d-sm-block d-md-block" alt="<?php if( isset($slide_name) && $slide_name != null ) echo $slide_name; ?>">
					<img src="<?php echo $images_mb_src; ?>" class="d-block d-sm-none d-md-none" alt="<?php if( isset($slide_name) && $slide_name != null ) echo $slide_name; ?>">
				</a>
			</div>
		<?php }
		} ?>
	<?php endif; ?>
</section>