<?php

add_action( 'admin_menu', 'my_plugin_menu' );

if ( is_page() ) {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
}

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'testimonials',
	  array(
		'labels' => array(
		  'name' => __( 'Testimonials' ),
		  'singular_name' => __( 'Testimonial' )
		),
		'public' => true,
		'has_archive' => true,
	  )
	);
}

add_action( 'init', 'create_post_type_faqs' );
function create_post_type_faqs() {
	register_post_type( 'faqs',
	  array(
		'labels' => array(
		  'name' => __( "FAQ's" ),
		  'singular_name' => __( 'FAQ' )
		),
		'public' => true,
		'has_archive' => true,
	  )
	);
}

function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'Powered By', 'manage_options', 'poweredby-azoora', 'my_plugin_options' );
}

function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<a href="//www.azoora.com" target="_blank"><img alt="Azoora Incorporated" style="max-width:220px;" src="//www.azoora.com/Assets/Images/Favicon.png" /></a><p>This site is powered by <a href="//www.azoora.com" target="_blank">Azoora Incorporated</a>.</p>';
	echo '</div>';
}

register_sidebar(array(
	'name' => __( 'Sidebar', 'RightSidebar' ),
	'id' => 'right-sidebar',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

add_theme_support( 'menus' );

add_theme_support( 'post-thumbnails' );

add_action( 'init', 'register_my_menus' );

function register_my_menus()
{
	register_nav_menus(
		array
		(
			'sidebar-menu' => __( 'Sidebar Menu' ),
			'footer-menu' => __( 'Footer Menu' ),
			'footer-menu-send-money' => __( 'Send Money - Footer Menu' )
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

function language_selector_flags(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        foreach($languages as $l){
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo '<img class="LangFlag" src="'.$l['country_flag_url'].'" alt="'.$l['language_code'].'" />';
            if(!$l['active']) echo '</a>';
        }
    }
}

?>