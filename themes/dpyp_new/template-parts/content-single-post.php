<?php
$enable_ads_top_post = rwmb_meta('enable_ads_top_post');
if($enable_ads_top_post == ''){
	$enable_ads_top_post = true;
}
if($enable_ads_top_post){
	if(shortcode_exists('ads_top_post')){
		echo do_shortcode('[ads_top_post]');
	}
}
?>
<h1 class="heading-title-single"><?php the_title(); ?></h1>

<?php get_template_part("template-parts/content" , "meta-1"); ?>

<div class="content-post position-relative d-flex flex-wrap">
	<div class="action-desktop d-none d-sm-block d-md-block">
		<div class="social-share-button">
			<a class="social sc-home" href="/">
				<i class="fa fa-home" aria-hidden="true"></i>
				Trang chủ
			</a>
			<a class="social sc-facebook" rel="noopener" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
				<i class="fa fa-facebook" aria-hidden="true"></i>
				Chia sẻ
			</a>
			<a class="social sc-comments" href="#">
				<i class="fa fa-comments" aria-hidden="true"></i>
				Bình luận
				<span class="number"><?php echo get_comments_number(get_the_ID()); ?></span>
			</a>
			<span class="button-wrap btn-top social">
				<i class="fa fa-angle-double-up" aria-hidden="true"></i>
				Top
			</span>
		</div>
	</div>
	<div class="inner-content-single">
		<div class="entry-content entry">
			<?php the_content(); ?>
		</div>
		<?php
		// $show_box = get_post_meta(get_the_ID(), 'show_contact_box', true);
		// if( $show_box !== 0 ) {
		// 	get_template_part("component/box" , "contact");
		// }
		?>
	</div>
</div>

<?php get_template_part("template-parts/content" , "meta-2"); ?>
<?php
$enable_ads_after_post = rwmb_meta('enable_ads_after_post');
if($enable_ads_after_post == ''){
	$enable_ads_after_post = true;
}
if($enable_ads_after_post){
	if(shortcode_exists('ads_after_post')){
		echo do_shortcode('[ads_after_post]');
	}
}
?>

<?php
$current_post_id = get_the_ID();
$comment_number  = get_comments_number( $current_post_id);
if($comment_number > 5){
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	} 
	get_template_part('template-parts/post/content-post' , 'related');

}else{
	get_template_part('template-parts/post/content-post' , 'related');
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	} 
}
?>