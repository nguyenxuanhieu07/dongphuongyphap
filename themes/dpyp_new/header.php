<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DPYP
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="format-detection" content="telephone=no">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <?php wp_head(); ?>

    <!-- Google Tag Manager QuyNV -->
    <script>(function(w,d,s,l,i) {
            w[l]=w[l]||[]; w[l].push({
                'gtm.start':
                    new Date().getTime(),event: 'gtm.js'
            }); var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'? '&l='+l:''; j.async=true; j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl; f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TQ55SNV');</script>
    <!-- End Google Tag Manager -->
    <!-- Google tag GA4 quynv(gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WT17LFLE88"></script>
    <script>
        window.dataLayer=window.dataLayer||[];
        function gtag() {dataLayer.push(arguments);}
        gtag('js',new Date());

        gtag('config','G-WT17LFLE88');
    </script>
</head>

<body <?php body_class(); ?>>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQ55SNV" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header>
        <div class="container">
            <div class="header-logo">
                <div class="logo">
                    <img src="<?php echo THEME_URI; ?>/images/logo.png" alt="" class="header-img">
                </div>
                <div class="header-cta">
                    <form action="" class="form-header-search">
                        <input type="text" name="s" class="inp-search form-control" placeholder="Tìm kiếm...">
                        <button class="header-btn-search form-control">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                    <a href="#" class="header-cta-link">
                        <img src="<?php echo THEME_URI; ?>/images/icons/calender.png" alt="" class="header-img">
                        <span class="header-cta-text">Đặt lịch khám</span>
                    </a>
                </div>
            </div>
            <nav class="navbar navbar-expand-md primary-nav menu-header">
                <div class="collapse navbar-collapse collapse-primary" id="primary-nav-collapse">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(
                            array(
                                'menu'            => 'primary',
                                'theme_location'  => 'primary',
                                'depth'           => 2,
                                'container'       => '',
                                'container_id'    => '',
                                'container_class' => '',
                                'menu_id'         => 'menu-menu-top',
                                'menu_class'      => 'navbar-nav main-menu',
                                'fallback_cb'     => 'Mdn_Menu_walker::fallback',
                                'walker'          => new Mdn_Menu_walker()
                            )
                        );
                    }
                    ?>
                </div>
            </nav>
        </div>
    </header>