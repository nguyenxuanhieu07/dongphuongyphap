<?php
get_header();
?>
<main class="single-product">
	<?php get_template_part("component/breadcrumd"); ?>
	<section class="page-content">
		<?php get_template_part("products/single", "boxinfo"); ?>
		<?php get_template_part("products/single", "content"); ?>
	</section>
</main>
<?php
get_footer();