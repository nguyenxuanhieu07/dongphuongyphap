<?php

class widget_heal_1 extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_heal_1',
			'description' => 'Hiển thị bài viết của chuyên mục tùy chọn',
		);
		parent::__construct( 'widget_heal_1', 'SỐNG KHỎE - Chuyên mục 1', $widget_ops );
	}

	public function widget( $args, $instance ) {
		if ( ! empty( $instance['css_class'] ) ) {
			$css_class = $instance['css_class'];
		}else{
			$css_class = '';
		}
		if ( ! empty( $instance['category'] ) ) {
			$category = $instance['category'];
		}
		$category_link = get_category_link( $category);
		$cat_id = $category;
		$args_child = array(
			'orderby' => 'name',
			'order' => 'ASC',
			'hide_empty' => true,
			'fields' => 'all',
			'hierarchical' => true,
			'child_of' => $cat_id,
			'meta_query' => array(
				array(
					'key'       => 'featured_child_term',
					'value'     => '1',
					'compare'   => '=='
				)
			),
		);
		$child_cats = get_terms('category', $args_child);
		?>

		<div class="widget-heal-1 widget heal <?php echo $css_class; ?>">
            <div class="container">
	            <div class="widget-header">
	                <h2 class="widget-title">
						<a href="<?php echo $category_link; ?>">
							<?php 
							if ( ! empty( $instance['title'] ) ) {
								echo  apply_filters( 'widget_title', $instance['title'] ) ;
							}
							?>
						</a>
	                </h2>
					<?php 
					if(!empty($child_cats)):
						echo '<ul class="child-cat">';
							foreach ($child_cats as $child_cat):
								$child_cat_link = get_term_link($child_cat->term_id,'category');
								?>
								<li>
									<a href="<?php echo $child_cat_link;?>">
										<?php echo $child_cat->name; ?>
									</a>
								</li>
								<?php 
							endforeach; ?>
						</ul>
					<?php endif; ?>
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
							'posts_per_page' => 4,
						);
						$i = 0;
						$list_post = new WP_Query($arr_post);
						$post_count = $list_post->post_count;
						if( $list_post -> have_posts() ): while( $list_post -> have_posts() ): $list_post->the_post(); $i ++;
							?>
							<?php if( $i == 1 ){ ?>

		                        <div class="col-md-7">
		                            <div class="post big-post">
										<a href="<?php the_permalink(); ?>" class="post-thumbnail" title="<?php the_title(); ?>">
											<?php the_post_thumbnail('medium'); ?>
										</a>
		                                <h3 class="post-title">
											<a href="<?php the_permalink(); ?>"><?php echo theme_short_title(15); ?></a>
		                                </h3>
		                                <p class="post-excerpt">
		                                    <?php echo theme_short_content(35); ?>
		                                </p>
		                            </div>
		                        </div>

							<?php }else{ ?>

								<?php if( $i == 2 ) echo '<div class="col-md-5">'; ?>

	                            <div class="small-post post">
									<a href="<?php the_permalink(); ?>" class="post-thumbnail" title="<?php the_title(); ?>">
										<?php the_post_thumbnail('thumbnail'); ?>
									</a>
	                                <h3 class="post-title">
										<a href="<?php the_permalink(); ?>"><?php echo theme_short_title(15); ?></a>
	                                </h3>
	                            </div>

	                            <?php if( $i == $post_count ) echo '</div>'; ?>

							<?php } ?>

						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
				</div>
				<div class="text-center d-block d-sm-none"><a href="<?php echo $category_link; ?>" class="btn-viewmore">Xem tất cả</a></div>
			</div>
		</div>
		<?php
	}
	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Chuyên mục', 'dpyp' );
		$css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
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
		$instance[ 'sub_menu' ] = $new_instance[ 'sub_menu' ];
		$instance['category'] = strip_tags( $new_instance['category'] );
		return $instance;
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'widget_heal_1' );
});