<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <title><?php echo get_field('brand_name','option'); ?></title>
    <script src="https://use.fontawesome.com/22d4621214.js"></script>
    <link rel="stylesheet" href="https://use.typekit.net/fcz6wxe.css">
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a033b1e69fde30011eef3d0&product=inline-share-buttons"></script>
    <?php wp_head(); ?>

    <?=get_field('header_code',   'option');?>
    <?=get_field('tracking_code', 'option');?>

    <?php if (get_field('google_analytics', 'option')): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-<?=get_field('google_analytics', 'option')?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-<?=get_field('google_analytics', 'option')?>');
    </script>
    <?php endif; ?>

</head>
<body <?=body_class()?>>

    <?php include(get_template_directory() .'/template-parts/global/header.php'); ?>

    <?php
    $template = ml_get_template();
    if (!is_front_page() && get_field('remove_headerClearance', get_the_ID()) == false):?>
        <div class="js-header-space"></div>
    <?php endif; ?>