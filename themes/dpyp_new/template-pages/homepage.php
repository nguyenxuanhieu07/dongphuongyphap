<?php
/**
 * Template name: Trang chủ
 *
 */
get_header();
?>

    <main id="main-home" class="main-home">

        <?php get_template_part("blocks/home" , "slide"); ?>

        <?php get_template_part("blocks/home" , "app"); ?>

        <?php get_template_part("blocks/home" , "medical"); ?>

        <?php get_template_part("blocks/home" , "remedial"); ?>

        <?php get_template_part("blocks/home" , "option"); ?>

        <?php get_template_part("blocks/home" , "doctor"); ?>

        <?php get_template_part("blocks/home" , "technical"); ?>

        <?php get_template_part("blocks/home" , "kol"); ?>

        <?php get_template_part("blocks/home" , "testimonial"); ?>

        <?php get_template_part("blocks/home" , "news"); ?>

        <?php get_template_part("blocks/home" , "gallery"); ?>

        <?php get_template_part("blocks/home" , "mix"); ?>

        <?php get_template_part("blocks/home" , "newpapper"); ?>

        <?php get_template_part("blocks/home" , "partner"); ?>

        <?php get_template_part("blocks/home" , "educate"); ?>

        <?php get_template_part("blocks/home" , "system"); ?>

    </main>

<?php
get_footer();
