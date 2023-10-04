<?php
/**
* Custom Comment Form
*/
function theme_disable_comment_url($fields) {
	unset($fields['url']);
	return $fields;
}
add_filter('comment_form_default_fields','theme_disable_comment_url');

/**
* Display Comment List
*/
function adv_theme_comment($comment, $args, $depth) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag." ";  comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">
	<?php
	if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
	} 
	?>
	<div class="comment-author vcard">
		<?php
		if ( $args['avatar_size'] != 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
		}
		printf( __( '<b class="fn">%s</b> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
		<span>
		<?php    
		edit_comment_link( __( '(Sửa)' ), '  ', '' );
		?>
		</span>
		<span class="reply"><i class="fa fa-reply" aria-hidden="true"></i>
			<?php
			comment_reply_link(
				array_merge(
					$args,
					array(
						'add_below' => $add_below,
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'reply_text' =>'Trả lời',
					)
				)
			);
			?>
		</span>
	</div>
	<?php
	if ( $comment->comment_approved == '0' ) { ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Bình luận của bạn đang được chờ duyệt.' ); ?></em><br/><?php
	} 
	?>
	<div class="comment-meta commentmetadata">
		<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		</a>
	</div>
	<?php 
	comment_text();
	if ( 'div' != $args['style'] ){
		echo "</div>";
	}
}