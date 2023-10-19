<?php
$post        = get_post(get_the_ID());
$date        = date_format(date_create($post->post_date), "d/m/Y");
$author_id   = get_the_author_meta('ID');
$author_name = get_the_author_meta('display_name', $author_id);
?>
<div class="post-box-top">
	<div class="box-info">
		<span class="info-item"><img src="<?php echo THEME_URI; ?>/images/icons/calendar2.png" alt=""
				class="icon-image"><b>Ngày đăng:</b>
			<?php echo $date; ?>
		</span>
		<span class="info-item"><b>Biên tập viên:</b> <?php echo $author_name; ?></span>
	</div>
	<div class="box-ratting">
		<?php
		if (function_exists('kk_star_ratings')):
			echo kk_star_ratings();
		endif;
		?>
	</div>
</div>