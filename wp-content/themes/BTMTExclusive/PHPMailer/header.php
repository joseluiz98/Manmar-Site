<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta content="no-cache" http-equiv="pragma">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php if (!is_home()): wp_title('|', true, 'right'); endif; bloginfo('name'); ?></title>
        <?php if (is_single()): ?>
        <meta property="og:url" content="<?php echo the_permalink() ?>">
        <meta property="og:title" content="<?php single_post_title(''); ?>">
        <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>">
        <meta property="og:type" content="article">
        <meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>">
        <?php else: ?>
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php bloginfo('url'); ?>">
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
        <meta property="og:description" content="<?php bloginfo('description'); ?>">
        <meta property="og:image" content="<?php echo get_fbimage(); ?>">
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/dist/imgs/screenshot.jpg">
        <?php endif;


            
            //wp_register_style('bootstrapcss', get_template_directory_uri() . '/dist/css/bootstrap.min.css',false,'1.1','all');

            // wp_register_style('contraste', get_template_directory_uri() . '/contraste.css',false,'1.1','all');

            // wp_register_style('maincss', get_template_directory_uri() . '/dist/css/main.min.css',false,'1.1','all');
            
            //wp_enqueue_style('bootstrapcss');
            // wp_enqueue_style('contraste');
            // wp_enqueue_style('maincss');

            //wp_head(); 
        ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/bootstrap.min.css" type="text/css" >
        <link rel="stylesheet" title="normal" href="<?php echo get_template_directory_uri(); ?>/dist/css/main.min.css" type="text/css" >
        <link rel="alternate stylesheet" title="contraste" href="<?php echo get_template_directory_uri(); ?>/dist/css/contraste.css" type="text/css" >
        
    </head>
    <body <?php body_class(); ?>>

    <div class="modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-md-11">
                        <?php include 'searchform.php'; ?>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="">&times;</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed hide-on-mobile c-hamburger c-hamburger--htx hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span>toggle menu</span>
                </button>
                <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/logo.jpg" alt="Rodrigo 15" title="Rodrigo 15">
                </a>
            </div>
            <div id="navbar" class="collapse navbar-collapse navbar-right">
                <?php
                    $menu = "menu-default";
                    wp_nav_menu( 
                    array(
                        'menu'              => $menu,
                        'theme_location'    => $menu,
                        'depth'             => 2,
                        'container'         => 'div',
                        'menu_class'        => 'nav navbar-nav',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                ?>
                <ul id="menu-menu-2" class="nav navbar-nav">
                    <li><a href="https://www.facebook.com/RodrigoPachecoBH" target="_blank" alt="Facebbok" title="Facebbok"><span class='rp-facebook'></span></a></li>
                    <li><a href="https://www.instagram.com/rodrigopachecobh/" target="_blank" alt="Instagram" title="Instagram"><span class='rp-instagram'></span></a></li>
                    <li><a href="https://twitter.com/rodrigo15bh" target="_blank" alt="Twitter" title="Twitter"><span class='rp-twitter'></span></a></li>
                    <li><a href="https://www.youtube.com/channel/UC8z2NYOucY0W3Fxk_oT2P8Q" target="_blank" alt="Youtube" title="Youtube"><span class='rp-youtube'></span></a></li>
                    <li><a href="#" id="btModal" data-toggle="modal" data-target="#modalSearch" alt="Pesquisar" title="Pesquisar"><img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/search.jpg" alt="Pesquisar"></a></li>
                </ul>
            </div>
        </div>
    </nav>