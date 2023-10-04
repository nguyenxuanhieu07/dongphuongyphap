<?php
/**
* The template for displaying comments.
*
* The area of the page that contains both current comments
* and the comment form.
*
* @package _mbbasetheme
*/

/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area clearfix  ">
	<?php if ( have_comments() ) : ?>
		<p class="comment-section-title">Bình luận</p>
		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'avatar_size' => 50,
				'type'=>'comment',
				'style'      => 'ol',
				'short_ping' => true,
				'reply_text' =>'Trả lời',
				'callback' => 'adv_theme_comment',
				'reverse_top_level' => true
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		$comments =     get_comments(array(
		    'post_id' => get_the_ID(),
		    'status' => 'approve' 
		));
		$cpage = get_comment_pages_count( $comments );
		// $cpage = get_query_var('cpage') ? get_query_var('cpage') : 1;
		
		if( $cpage > 1 ) {
			echo '<div class="load-more-comment text-center"><a class="comment_loadmore mb-3">Xem thêm&nbsp;&nbsp;<i class="fa fa-angle-double-down" aria-hidden="true"></i></a></div>
			<script>
			var ajaxurl = \'' . site_url('wp-admin/admin-ajax.php') . '\',
			parent_post_id = ' . get_the_ID() . ',
			cpage = ' . $cpage . '
			</script>';
		}
		?>
		<?php else: ?>
			<p class="response-none">Trở thành người đầu tiên bình luận cho bài viết này!</p>
		<?php endif;  ?>

		<?php

		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
		<p class="no-comments"><?php _e( 'Comments are closed.', '_mbbasetheme' ); ?></p>
	<?php endif; ?>
	<?php
	$str ='<div class="w-100">';
	$str .='<p class="comment-form-comment">';
	$str .='<label for="comment">Nội dung</label>';
	$str .='<textarea class="form-control" id="comment" name="comment" placeholder="Nội dung bình luận"  rows="5" aria-required="true"></textarea>';
	$str .='</p></div>';
	$args = array(
		'fields' => apply_filters(
			'comment_form_default_fields', array(
				'author' =>'<div class="comment-form-author ">' . '<input class="form-control" id="author" placeholder=" Họ tên" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30" />'.
				'</div>'
				,
				'email'  => '<div class="comment-form-email ">' . '<input class="form-control" id="email" placeholder="Email của bạn" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30" />'  .
				'</div>',
				
			)
		),
		'comment_field' => $str,
		'comment_notes_after' => '',
		'title_reply' => '',
		'label_submit' => 'Gửi bình luận',
		'title_reply_to'    => __( 'Trả lời %s' ),
		'cancel_reply_link' => __( 'Hủy trả lời' ),
	);

	comment_form($args);
	?>
</div><!-- #comments -->