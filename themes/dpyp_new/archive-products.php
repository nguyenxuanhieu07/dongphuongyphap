<?php
get_header();
?>
<main class="archive-products">
	<?php get_template_part("component/breadcrumd"); ?>
	<?php get_template_part("products/component","slider"); ?>
	<?php get_template_part("products/product", "content"); ?>
</main>
<?php
get_footer();