<?php

add_action( 'admin_menu', 'my_plugin_menu' );

require_once('wp_bootstrap_navwalker.php');

function my_plugin_menu() {
	add_options_page( 'Powered By', 'Powered By', 'manage_options', 'AzooraInc-Support', 'my_plugin_options' );
}

function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<h1>This website is powered by Azoora</h1><p>Copyright &copy; 2007-2014 Azoora Incorporated. All Rights Reserved.<br>For support please visit our Israeli partner website: http://www.connect.co.il/</p>';
	echo '</div>';
}

register_sidebar(array(
 'name' => __( 'Sidebar', 'RightSidebar' ),
 'id' => 'right-sidebar',
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h4>',
 'after_title' => '</h4>',
 ));

register_sidebar(array(
 'name' => __( 'News Ticker', 'NewsTicker' ),
 'id' => 'newsticker-sidebar',
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h4>',
 'after_title' => '</h4>',
 ));

register_sidebar(array(
 'name' => __( 'Slideshow Area', 'SlideshowArea' ),
 'id' => 'slideshow-area',
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h4>',
 'after_title' => '</h4>',
 ));

add_theme_support( 'menus' );

add_theme_support( 'post-thumbnails' );

add_action( 'init', 'register_my_menus' );

function register_my_menus()
{
	register_nav_menus(
		array
		(
			'top-menu' => __( 'Top Menu' ),
			'footer-menu' => __( 'Footer Navigation' )
		)
	);
}

add_theme_support('post-thumbnails');

if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
}

add_action( 'init', 'my_add_shortcodes' );

function my_add_shortcodes() {

	add_shortcode( 'my-login-form', 'my_login_form_shortcode' );
}

function my_login_form_shortcode() {

	if ( is_user_logged_in() )
		return '<p>You are already logged in!</p>';

	return wp_login_form( array( 'echo' => true ) );
}

function my_formatter($content) {
    $new_content = '';
    $pattern_full = '{(\[raw\].*?\[/raw\])}is';
    $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
    $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
 
    foreach ($pieces as $piece) {
        if (preg_match($pattern_contents, $piece, $matches)) {
            $new_content .= $matches[1];
        } else {
            $new_content .= wptexturize(wpautop($piece));
        }
    }
 
    return $new_content;
}
 
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
 
add_filter('the_content', 'my_formatter', 99);

?>