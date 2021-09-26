<!doctype html>
<html <?php language_attributes(); ?> style="scroll-behavior: smooth; overflow-x: hidden;">

<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="apple-touch-icon" sizes="57x57" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="1024x1024" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-1024x1024.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-startup-image-320x460.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-startup-image-640x920.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-startup-image-640x1096.png">
    <link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-startup-image-750x1294.png">
    <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 736px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 3)" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-startup-image-1182x2208.png">
    <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 736px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 3)" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-startup-image-1242x2148.png">
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-startup-image-748x1024.png">
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-startup-image-1496x2048.png">
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-startup-image-768x1004.png">
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" href="<?= get_template_directory_uri(); ?>/images/favicon/apple-touch-startup-image-1536x2008.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri(); ?>/images/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri(); ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="228x228" href="<?= get_template_directory_uri(); ?>/images/favicon/coast-228x228.png">
    <link rel="manifest" href="<?= get_template_directory_uri(); ?>/images/favicon/manifest.json">
    <link rel="shortcut icon" href="<?= get_template_directory_uri(); ?>/images/favicon/favicon.ico">
    <link rel="yandex-tableau-widget" href="<?= get_template_directory_uri(); ?>/images/favicon/yandex-browser-manifest.json">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title">
    <meta name="application-name">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="msapplication-TileColor" content="%23ffffff">
    <meta name="msapplication-TileImage" content="<?= get_template_directory_uri(); ?>/images/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="<?= get_template_directory_uri(); ?>/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="%23ffffff">

    <link rel="stylesheet" type="text/css" href="<?= get_stylesheet_uri(); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php the_field( 'code_in_head_tag', 'options' ); ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!--[if IE]>
            <div class="alert alert--ie" role="alert">
                <string>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
            </div>
        <![endif]-->

    <?php the_field( 'code_after_body_opening_tag', 'options' ); ?>

    <a class="screen-reader-shortcut-header" href="#main" tabindex="0"><?= __('Skip to main content', 'crunch'); ?></a>
