<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DPYP
 */

get_header();
?>

    <main id="main-home" class="main-home">

        <?php get_template_part("blocks/home" , "slide"); ?>

        <?php get_template_part("blocks/home" , "app"); ?>

        <?php get_template_part("blocks/home" , "remedial"); ?>

        <?php get_template_part("blocks/home" , "medical"); ?>

        <?php get_template_part("blocks/home" , "option"); ?>

        <?php get_template_part("blocks/home" , "doctor"); ?>

        <?php get_template_part("blocks/home" , "kol"); ?>

        <?php get_template_part("blocks/home" , "testimonial"); ?>

        <?php get_template_part("blocks/home" , "news"); ?>

        <?php get_template_part("blocks/home" , "gallery"); ?>

        <?php get_template_part("blocks/home" , "mix"); ?>

        <?php get_template_part("blocks/home" , "newpapper"); ?>

        <?php get_template_part("blocks/home" , "partner"); ?>

    </main>

<?php
get_footer();
