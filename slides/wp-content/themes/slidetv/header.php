<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta content="no-cache" http-equiv="pragma">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>
            <?php
            if (!is_home()):
                wp_title('|', true, 'right');
            endif;
            bloginfo('name');
            ?>
        </title>
        <?php if (is_single()){ ?>
        <meta property="og:url" content="<?php echo the_permalink() ?>">
        <meta property="og:title" content="<?php single_post_title(''); ?>">
        <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>">
        <meta property="og:type" content="article">
        <meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>">
        <?php }else{ ?>
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php bloginfo('url'); ?>">
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
        <meta property="og:description" content="<?php bloginfo('description'); ?>">
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/dist/imgs/screenshot.jpg">
        <?php } ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/dist/css/animate.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/dist/css/owl.carousel.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/dist/css/app.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/dist/css/main.min.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body <?php body_class(); ?>>