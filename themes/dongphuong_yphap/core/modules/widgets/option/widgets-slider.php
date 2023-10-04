<?php
class Widgets_Slider extends WP_Widget
{
	public function __construct()
	{
		$widget_ops = array(
			'classname'   => 'widgets_slider',
			'description' => 'Hiển thị slider',
		);
		parent::__construct('widgets_slider', 'Hiển thị slider', $widget_ops);
	}

	public function widget($args, $instance)
	{
		if (!empty($instance['number_post'])) {
			$number_post = $instance['number_post'];
		}
		if (!empty($instance['select_cate'])) {
			$select_cate = $instance['select_cate'];
		}
		$args      = array(
			'post_type'      => 'post',
			'cat'            => $select_cate,
			'posts_per_page' => $number_post,
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
		$the_query = new WP_Query($args);
		$i         = 1;
		?>
		<h3><a class="question-title" href="<?php echo get_permalink($select_cate); ?>"><?php echo $instance['title']; ?></a>
		</h3>
		<?php
		while ($the_query->have_posts()):
			$the_query->the_post();
			if ($i == 1):
				?>
				<div class="row">
					<div class="col-12 col-md-4">
						<?php
						$args = array('description' => 'hidden', 'check' => '');
						get_template_part('core/component/component', 'post', $args);
						?>
					</div>
				<?php elseif ($i == 2): ?>
					<div class="col-12 col-md-4">
						<?php
						$args = array('description' => 'hidden', 'check' => '');
						get_template_part('core/component/component', 'post', $args);
						?>
					</div>
					<div class="col-12 col-md-4">
						<ul class="list-post">
						<?php elseif ($i <= ($number_post - 1) && $i > 2): ?>
							<li class="item-post"><a href="<?php echo get_permalink(get_the_ID()); ?>" class="item-link"><?php the_title(); ?></a></li>
						<?php elseif ($i == $number_post): ?>
							<li class="item-post bottom-li"><a href="<?php echo get_permalink(get_the_ID()); ?>" class="item-link"><?php the_title(); ?></a></li>
						</ul>
					</div>
				</div>
				<?php
			endif;
			$i++;
		endwhile;
	?>
	<?php
	}
	public function form($instance)
	{

		$title = !empty($instance['title']) ? $instance['title'] : '';
		$image_url = isset($instance['image_url']) ? $instance['image_url'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Tiêu đề:', 'dongphuong_yphap'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
				name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
				value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image_url'); ?>">Image Upload:</label>
			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_url'); ?>"
				id="<?php echo $this->get_field_id('image_url'); ?>" value="<?php echo esc_url($image_url); ?>"
				style="margin-top:5px;">
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button"
				name="<?php echo $this->get_field_name('image_url'); ?>[]" value="Upload Image" style="margin-top:5px;" multiple>
		</p>
		<div class="widgets-show-images">
		</div>
		 <script>
            jQuery(document).ready(function($){
                function mediaUploader(buttonClass) {
                    var customUploader;
                    $(document).on('click', buttonClass, function(e) {
                        e.preventDefault();
                        if (customUploader) {
                            customUploader.open();
                            return;
                        }
                        customUploader = wp.media.frames.file_frame = wp.media({
                            title: 'Choose Image',
                            button: {
                                text: 'Choose Image'
                            },
                            multiple: true
                        });
                        customUploader.on('select', function() {
                            attachment = customUploader.state().get('selection').first().toJSON();
                            $('.custom_media_url').val(attachment.url);
                        });
                        customUploader.open();
                    });
                }
                mediaUploader('.custom_media_button');
            });
        </script>
		<?php
	}
	public function update($new_instance, $old_instance)
	{
		$instance                = array();
		$instance['title']       = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['number_post'] = (!empty($new_instance['number_post'])) ? strip_tags($new_instance['number_post']) : '';
		$instance['select_cate'] = (!empty($new_instance['select_cate'])) ? strip_tags($new_instance['select_cate']) : '';
		echo '<pre>';
		print_r($new_instance);
		echo '</pre>';
		echo '<pre>';
		print_r($_REQUEST);
		echo '</pre>';
		echo '<pre>';
		print_r($_FILES);
		echo '</pre>';
		die();
		return $instance;
	}
}
add_action('widgets_init', function () {
	register_widget('Widgets_Slider');
});