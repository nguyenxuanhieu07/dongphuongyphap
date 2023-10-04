<?php

class widget_target_link extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_target_link',
			'description' => 'Hiển thị bài viết của chuyên mục tùy chọn',
		);
		parent::__construct( 'widget_target_link', 'LIST LINK - Chuyên mục 1', $widget_ops );
	}

	public function widget( $args, $instance ) {
		if ( ! empty( $instance['css_class'] ) ) {
			$css_class = $instance['css_class'];
		}else{
			$css_class = '';
		}
		if ( ! empty( $instance['number_post'] ) ) {
			$number_post = $instance['number_post'];
		}
		if ( ! empty( $instance['category'] ) ) {
			$category = $instance['category'];
		}
		$category_link = get_category_link( $category);
		?>

        <div class="widget-target widget <?php echo $css_class; ?>">
            <div class="container">
	            <div class="widget-header">
	                <h3 class="widget-title">
						<a href="<?php echo $category_link; ?>">
							<?php 
							if ( ! empty( $instance['title'] ) ) {
								echo  apply_filters( 'widget_title', $instance['title'] ) ;
							}
							?>
						</a>
	                </h3>
	                <a href="<?php echo $category_link; ?>" class="view-all">Xem thêm<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
	            </div>
                <div class="widget-content">
                    <div class="row">

						<?php $arr_post = array(
							'post_type'	=> 'post',
							'post_status' => 'publish',
							'order'	=> 'date',
							'orderby' => 'desc',
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field' => 'id',
									'terms'	=> array($category),
									'include_children' => true,
								)
							),
							'meta_query' => array(
								array(
									'key' => 'featured_link_target',
									'value' => '1',
								)
							),
							'posts_per_page' => $number_post,
						);
						$i = 0;
						$list_post = new WP_Query($arr_post);
						$post_count = $list_post->post_count;
						if( $list_post -> have_posts() ): while( $list_post -> have_posts() ): $list_post->the_post(); $i ++;
							?>

	                        <div class="col-md-4 col-12">
	                            <div class="post post-row">
									<a href="<?php the_permalink(); ?>" class="post-thumbnail" title="<?php the_title(); ?>">
										<?php the_post_thumbnail('thumbnail'); ?>
									</a>
	                                <h3 class="post-title">
										<a href="<?php the_permalink(); ?>"><?php echo theme_short_title(15); ?></a>
	                                </h3>
	                            </div>
	                        </div>

						<?php endwhile; endif; wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>
        </div>

		<?php
	}
	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Chuyên mục', 'dpyp' );
		$css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
		$number_post = ! empty( $instance['number_post'] ) ? $instance['number_post'] : esc_html__( '6', 'dpyp' );
		$category = ! empty( $instance['category'] ) ? $instance['category'] : esc_html__( 'Chọn category', 'dpyp' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Tiêu đề:', 'dpyp' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'css_class' ) ); ?>"><?php esc_attr_e( 'CSS Class:', 'dpyp' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'css_class' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'css_class' ) ); ?>" type="text" value="<?php echo esc_attr( $css_class ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number_post' ) ); ?>"><?php esc_attr_e( 'Số bài viết hiển thị:', 'dpyp' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number_post' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_post' ) ); ?>" type="number" value="<?php echo esc_attr( $number_post ); ?>">
		</p>
		<p>Chọn chuyên mục hiển thị:
			<select name="<?php echo $this->get_field_name('category') ?>" class="widefat">
				<?php
				$taxonomies = array(
					'category',
				);
				$args = array(
					'orderby' => 'name',
					'order' => 'ASC',
					'hide_empty' => true,
					'exclude' => array(),
					'exclude_tree' => array(),
					'include' => array(),
					'fields' => 'all',
					'hierarchical' => true,
					'child_of' => 0,
					'pad_counts' => false,
				);
				$cats = get_terms($taxonomies, $args);
				foreach ($cats as $cat) {
					?>
					<option
					value="<?php echo $cat->term_id ?>" <?php if ($category == $cat->term_id) echo 'selected' ?>><?php echo $cat->name ?></option>
					<?php
				}
				?>
			</select>
		</p>
		<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? strip_tags( $new_instance['css_class'] ) : '';
		$instance['number_post'] = ( ! empty( $new_instance['number_post'] ) ) ? strip_tags( $new_instance['number_post'] ) : '';
		$instance['category'] = strip_tags( $new_instance['category'] );
		return $instance;
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'widget_target_link' );
});