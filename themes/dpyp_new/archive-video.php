<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DPYP
 */

get_header();
?>

    <main class="page-content video" id="page-content">

        <?php get_template_part('component/menu-header', 'video'); ?>
        
        <?php get_template_part('template-parts/video/section', '1'); ?>
        
        <?php get_template_part('template-parts/video/section', '2'); ?>
        
        <?php get_template_part('template-parts/video/section', '3'); ?>

    </main>
    
<?php
get_footer();
