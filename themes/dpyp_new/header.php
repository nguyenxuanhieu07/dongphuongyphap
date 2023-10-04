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
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="profile" href="https://gmpg.org/xfn/11">
   <meta name="format-detection" content="telephone=no">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

   <?php wp_head(); ?>

   <!-- Google Tag Manager QuyNV -->
   <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
   j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
   'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TQ55SNV');</script>
<!-- End Google Tag Manager -->
<!-- Google tag GA4 quynv(gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WT17LFLE88"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WT17LFLE88');
</script>
</head>

<body <?php body_class(); ?>>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQ55SNV"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <header id="page-header" class="page-header">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <a class="login-header" href="/dat-lich-kham-tu-van">
                                <span class="icon-user fa fa-calendar"></span> Đặt lịch khám
                            </a>
                            <button class="btn btn-search-icon d-none d-lg-flex" data-toggle="modal" data-target="#modal-search" aria-label="Search">
                                <span class="icon-search fa fa-search"></span> Tìm kiếm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-menu">
                <nav class="navbar navbar-expand-lg primary-nav" id="primary-nav">
                    <div class="container">
                        <button class="collapsed navbar-toggler btn-menu-mb d-lg-none d-block" type="button" data-toggle="collapse" data-target="#primary-nav-collapse" aria-controls="primary-nav-collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <?php if( is_home() || is_front_page() ){ ?>
                            <h1 class="logo-header">
                                <a href="/">
                                    Đông phương y pháp
                                </a>
                            </h1>
                        <?php }else{ ?>
                            <div class="logo-header">
                                <a href="/"></a>
                            </div>
                        <?php } ?>
                        <button class="btn btn-search-icon d-lg-none d-block" data-toggle="modal" data-target="#modal-search" aria-label="Search mobile">
                            <span class="icon-search fa fa-search"></span>
                        </button>
                        <div class="navbar-collapse collapse" id="primary-nav-collapse">

                            <?php
                            if(has_nav_menu('primary')){
                                wp_nav_menu( array(
                                    'menu'              => 'primary',
                                    'theme_location'    => 'primary',
                                    'depth'             => 2,
                                    'container'         => '',
                                    'container_id'      => '',
                                    'container_class'   => '',
                                    'container_id'      => '',
                                    'menu_id'           => 'menu-primary-menu',
                                    'menu_class'        => 'menu-primary-menu',
                                    'fallback_cb'       => 'Mdn_Menu_walker::fallback',
                                    'walker'            => new Mdn_Menu_walker())
                            );
                            }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>